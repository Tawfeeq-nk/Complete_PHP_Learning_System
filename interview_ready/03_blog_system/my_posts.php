<?php
/**
 * Project 03: Blog System - My Posts
 * View all posts (draft and published) created by the logged-in user
 */

session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// Fetch user's posts
$stmt = $conn->prepare("
    SELECT id, title, status, created_at,
           (SELECT COUNT(*) FROM blog_comments WHERE post_id = blog_posts.id) as comment_count
    FROM blog_posts
    WHERE user_id = ?
    ORDER BY created_at DESC
");

if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$published = array_filter($posts, fn($p) => $p['status'] === 'published');
$drafts = array_filter($posts, fn($p) => $p['status'] === 'draft');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Posts — Project 03</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .create-btn { display: inline-block; padding: 10px 16px; background: #667eea; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600; margin-bottom: 20px; }
        .create-btn:hover { opacity: 0.9; }
        .posts-section { margin-bottom: 30px; }
        .posts-section h2 { font-size: 18px; color: #333; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid #e1e8ed; }
        .post-item { background: #f9f9f9; padding: 15px; margin-bottom: 10px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .post-info { flex: 1; }
        .post-title { font-weight: 600; color: #333; margin-bottom: 4px; }
        .post-meta { font-size: 13px; color: #999; }
        .post-badge { display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; margin-right: 8px; }
        .badge-published { background: #d4edda; color: #155724; }
        .badge-draft { background: #fff3cd; color: #856404; }
        .post-actions { display: flex; gap: 8px; }
        .btn-small { padding: 6px 10px; font-size: 12px; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; }
        .btn-view { background: #667eea; color: #fff; }
        .btn-edit { background: #17a2b8; color: #fff; }
        .btn-delete { background: #e74c3c; color: #fff; }
        .btn-small:hover { opacity: 0.9; }
        .empty { text-align: center; color: #999; padding: 30px; }
        .empty-icon { font-size: 40px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="index.php">← Back to Blog</a> | <a href="../01_profile_management/index.php">Profile</a>
        </div>

        <h1>My Blog Posts</h1>

        <a href="create.php" class="create-btn">✏️ Write New Post</a>

        <!-- Published Posts -->
        <?php if (!empty($published)): ?>
            <div class="posts-section">
                <h2>📖 Published (<?php echo count($published); ?>)</h2>
                <?php foreach ($published as $post): ?>
                    <div class="post-item">
                        <div class="post-info">
                            <div class="post-title"><?php echo htmlspecialchars($post['title']); ?></div>
                            <div class="post-meta">
                                <span class="post-badge badge-published">Published</span>
                                <?php echo date('M j, Y', strtotime($post['created_at'])); ?> • 
                                💬 <?php echo $post['comment_count']; ?> comment<?php echo $post['comment_count'] !== 1 ? 's' : ''; ?>
                            </div>
                        </div>
                        <div class="post-actions">
                            <a href="view.php?id=<?php echo $post['id']; ?>" class="btn-small btn-view">View</a>
                            <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn-small btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn-small btn-delete" onclick="return confirm('Delete this post?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Draft Posts -->
        <?php if (!empty($drafts)): ?>
            <div class="posts-section">
                <h2>📝 Drafts (<?php echo count($drafts); ?>)</h2>
                <?php foreach ($drafts as $post): ?>
                    <div class="post-item">
                        <div class="post-info">
                            <div class="post-title"><?php echo htmlspecialchars($post['title']); ?></div>
                            <div class="post-meta">
                                <span class="post-badge badge-draft">Draft</span>
                                <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                            </div>
                        </div>
                        <div class="post-actions">
                            <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn-small btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn-small btn-delete" onclick="return confirm('Delete this post?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Empty State -->
        <?php if (empty($posts)): ?>
            <div class="empty">
                <div class="empty-icon">📭</div>
                <p>You haven't written any posts yet.</p>
                <p><a href="create.php" style="color:#667eea;font-weight:bold;">Create your first post</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
