<?php
/**
 * Project 03: Blog System - View All Published Posts
 * See all publicly published blog posts from all users
 */

session_start();
require_once __DIR__ . '/../config.php';

// Fetch all published posts with author info
$stmt = $conn->prepare("
    SELECT p.id, p.title, p.content, p.created_at, u.username, u.id as user_id,
           (SELECT COUNT(*) FROM blog_comments WHERE post_id = p.id) as comment_count
    FROM blog_posts p
    JOIN users u ON p.user_id = u.id
    WHERE p.status = 'published'
    ORDER BY p.created_at DESC
    LIMIT 20
");

if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->execute();
$result = $stmt->get_result();
$posts = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Blog — Project 03</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .header { background: #fff; padding: 30px; border-radius: 10px 10px 0 0; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h1 { font-size: 32px; color: #333; margin: 0 0 8px; }
        .location { color: #666; margin-bottom: 15px; }
        .location a { color: #667eea; text-decoration: none; }
        .create-btn { display: inline-block; padding: 10px 16px; background: #667eea; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600; }
        .create-btn:hover { opacity: 0.9; }
        .posts { background: #fff; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-radius: 0 0 10px 10px; }
        .post { padding: 20px; border-bottom: 1px solid #e1e8ed; }
        .post:last-child { border-bottom: none; }
        .post-title { font-size: 20px; font-weight: bold; color: #333; margin-bottom: 8px; }
        .post-title a { color: #333; text-decoration: none; }
        .post-title a:hover { color: #667eea; }
        .post-meta { font-size: 13px; color: #999; margin-bottom: 12px; }
        .post-meta a { color: #667eea; text-decoration: none; }
        .post-excerpt { color: #555; line-height: 1.6; margin-bottom: 12px; }
        .post-footer { display: flex; justify-content: space-between; align-items: center; }
        .comments-badge { background: #f0f4ff; padding: 6px 10px; border-radius: 4px; font-size: 13px; color: #667eea; font-weight: 600; }
        .read-more { color: #667eea; text-decoration: none; font-weight: 600; }
        .empty { text-align: center; padding: 40px; color: #999; }
        .empty-icon { font-size: 48px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="location">
                <a href="../home.php">← Home</a>
            </div>
            <h1>📝 Blog</h1>
            
            <?php if (!empty($_SESSION['user_id'])): ?>
                <a href="create.php" class="create-btn">✏️ Write a Post</a>
            <?php else: ?>
                <p style="color:#666;">
                    <a href="../login.php" style="color:#667eea;font-weight:bold;">Log in</a> to write your own post
                </p>
            <?php endif; ?>
        </div>

        <div class="posts">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post">
                        <div class="post-title">
                            <a href="view.php?id=<?php echo $post['id']; ?>">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </div>
                        <div class="post-meta">
                            By <a href="#"><strong><?php echo htmlspecialchars($post['username']); ?></strong></a> 
                            on <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                        </div>
                        <div class="post-excerpt">
                            <?php 
                            $excerpt = substr(strip_tags($post['content']), 0, 200);
                            echo htmlspecialchars($excerpt);
                            if (strlen($post['content']) > 200) echo '...';
                            ?>
                        </div>
                        <div class="post-footer">
                            <a href="view.php?id=<?php echo $post['id']; ?>" class="read-more">Read more →</a>
                            <span class="comments-badge">
                                💬 <?php echo $post['comment_count']; ?> comment<?php echo $post['comment_count'] !== '1' ? 's' : ''; ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty">
                    <div class="empty-icon">📭</div>
                    <p>No posts yet. Be the first to <a href="create.php" style="color:#667eea;font-weight:bold;">write one!</a></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
