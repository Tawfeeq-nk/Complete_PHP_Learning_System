<?php
/**
 * Project 03: Blog System - View Single Post
 * View a post and its comments
 */

session_start();
require_once __DIR__ . '/../config.php';

$post_id = intval($_GET['id'] ?? 0);

// Fetch post with author info
$stmt = $conn->prepare("
    SELECT p.id, p.title, p.content, p.status, p.created_at, p.user_id,
           u.username
    FROM blog_posts p
    JOIN users u ON p.user_id = u.id
    WHERE p.id = ?
    LIMIT 1
");

if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param('i', $post_id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();
$stmt->close();

if (!$post) {
    die("Post not found");
}

// Check access (draft posts can only be viewed by author)
if ($post['status'] === 'draft' && (empty($_SESSION['user_id']) || $_SESSION['user_id'] != $post['user_id'])) {
    die("You don't have permission to view this post");
}

// Fetch comments
$comments_stmt = $conn->prepare("
    SELECT c.id, c.content, c.created_at, u.username
    FROM blog_comments c
    JOIN users u ON c.user_id = u.id
    WHERE c.post_id = ?
    ORDER BY c.created_at ASC
");

if ($comments_stmt) {
    $comments_stmt->bind_param('i', $post_id);
    $comments_stmt->execute();
    $result = $comments_stmt->get_result();
    $comments = $result->fetch_all(MYSQLI_ASSOC);
    $comments_stmt->close();
} else {
    $comments = [];
}

// Handle comment submission
$comment_error = '';
$comment_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['user_id'])) {
    $comment_content = trim($_POST['comment'] ?? '');

    if (empty($comment_content)) {
        $comment_error = 'Comment cannot be empty';
    } elseif (strlen($comment_content) > 1000) {
        $comment_error = 'Comment must be less than 1000 characters';
    } else {
        $insert = $conn->prepare("INSERT INTO blog_comments (post_id, user_id, content) VALUES (?, ?, ?)");
        if ($insert) {
            $insert->bind_param('iis', $post_id, $_SESSION['user_id'], $comment_content);
            if ($insert->execute()) {
                $comment_success = true;
                // Refresh comments
                header("Location: view.php?id=" . $post_id);
                exit;
            } else {
                $comment_error = 'Error posting comment';
            }
            $insert->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo htmlspecialchars($post['title']); ?> — Blog</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 700px; margin: 0 auto; }
        .location { background: #fff; padding: 20px; border-radius: 10px 10px 0 0; }
        .location a { color: #667eea; text-decoration: none; }
        .post-box { background: #fff; padding: 30px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .post-header { margin-bottom: 20px; padding-bottom: 20px; border-bottom: 2px solid #e1e8ed; }
        .post-title { font-size: 28px; font-weight: bold; color: #333; margin-bottom: 12px; }
        .post-meta { color: #666; font-size: 14px; }
        .post-meta strong { color: #667eea; }
        .draft-badge { background: #fff3cd; color: #856404; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; margin-left: 10px; }
        .post-content { color: #444; line-height: 1.8; margin-bottom: 20px; }
        .post-actions { margin-top: 20px; padding-top: 20px; border-top: 2px solid #e1e8ed; display: flex; gap: 10px; }
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; font-size: 13px; font-weight: 600; }
        .btn-edit { background: #667eea; color: #fff; }
        .btn-delete { background: #e74c3c; color: #fff; }
        .btn:hover { opacity: 0.9; }
        .comments-section { background: #fff; padding: 30px; border-radius: 0 0 10px 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-top: 10px; }
        .comments-title { font-size: 20px; font-weight: bold; color: #333; margin-bottom: 20px; }
        .comment { background: #f9f9f9; padding: 15px; border-radius: 6px; margin-bottom: 15px; border-left: 3px solid #667eea; }
        .comment-author { font-weight: bold; color: #333; }
        .comment-date { font-size: 12px; color: #999; }
        .comment-text { color: #555; margin-top: 8px; }
        .comment-form { margin-top: 20px; padding-top: 20px; border-top: 1px solid #e1e8ed; }
        .comment-form.login-prompt { text-align: center; color: #999; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 600; }
        textarea { width: 100%; padding: 10px; border: 2px solid #e1e8ed; border-radius: 6px; resize: vertical; min-height: 80px; }
        textarea:focus { outline: none; border-color: #667eea; }
        .submit { padding: 10px 16px; background: #667eea; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
        .submit:hover { opacity: 0.9; }
        .error { background: #fee; border: 1px solid #fcc; color: #c33; padding: 12px; border-radius: 6px; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="location">
            <a href="index.php">← Back to Blog</a>
        </div>

        <div class="post-box">
            <div class="post-header">
                <h1 class="post-title">
                    <?php echo htmlspecialchars($post['title']); ?>
                    <?php if ($post['status'] === 'draft'): ?>
                        <span class="draft-badge">DRAFT</span>
                    <?php endif; ?>
                </h1>
                <div class="post-meta">
                    By <strong><?php echo htmlspecialchars($post['username']); ?></strong><br>
                    <?php echo date('F j, Y \a\t H:i', strtotime($post['created_at'])); ?>
                </div>
            </div>

            <div class="post-content">
                <?php echo nl2br(htmlspecialchars($post['content'])); ?>
            </div>

            <?php if (!empty($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                <div class="post-actions">
                    <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-delete" onclick="return confirm('Delete this post?')">Delete</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="comments-section">
            <div class="comments-title">
                💬 Comments (<?php echo count($comments); ?>)
            </div>

            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <span class="comment-author"><?php echo htmlspecialchars($comment['username']); ?></span>
                        <span class="comment-date" style="margin-left:10px;">
                            <?php echo date('M j, Y H:i', strtotime($comment['created_at'])); ?>
                        </span>
                        <div class="comment-text">
                            <?php echo nl2br(htmlspecialchars($comment['content'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color:#999;">No comments yet. Be the first!</p>
            <?php endif; ?>

            <div class="comment-form">
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <?php if (!empty($comment_error)): ?>
                        <div class="error"><?php echo htmlspecialchars($comment_error); ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <label for="comment">Add a Comment</label>
                        <textarea id="comment" name="comment" placeholder="Share your thoughts..." required></textarea>
                        <button type="submit" class="submit" style="margin-top:8px;">Post Comment</button>
                    </form>
                <?php else: ?>
                    <div class="comment-form login-prompt">
                        <a href="../login.php" style="color:#667eea;font-weight:bold;">Log in</a> to comment
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
