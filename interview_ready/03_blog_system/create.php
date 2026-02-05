<?php
/**
 * Project 03: Blog System - Create New Post
 * Write and publish a new blog post
 */

session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $status = $_POST['status'] ?? 'draft';

    // Validate
    if (empty($title)) {
        $errors[] = 'Title is required';
    } elseif (strlen($title) > 255) {
        $errors[] = 'Title must be less than 255 characters';
    }

    if (empty($content)) {
        $errors[] = 'Content is required';
    } elseif (strlen($content) < 10) {
        $errors[] = 'Content must be at least 10 characters';
    } elseif (strlen($content) > 50000) {
        $errors[] = 'Content must be less than 50000 characters';
    }

    if (!in_array($status, ['draft', 'published'])) {
        $status = 'draft';
    }

    // Insert into database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO blog_posts (user_id, title, content, status) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param('isss', $_SESSION['user_id'], $title, $content, $status);
            if ($stmt->execute()) {
                $post_id = $stmt->insert_id;
                $stmt->close();
                
                if ($status === 'published') {
                    header("Location: view.php?id=" . $post_id);
                } else {
                    header("Location: my_posts.php");
                }
                exit;
            } else {
                $errors[] = 'Database error: ' . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = 'Database error: ' . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Write a Post — Project 03</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .errors { background: #fee; border: 1px solid #fcc; color: #c33; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .errors ul { margin-left: 20px; margin-bottom: 0; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 600; }
        input[type="text"], textarea, select { width: 100%; padding: 10px; border: 2px solid #e1e8ed; border-radius: 6px; font-size: 14px; }
        textarea { resize: vertical; min-height: 300px; font-family: 'Courier New', monospace; }
        textarea:focus, input:focus, select:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); }
        .buttons { display: flex; gap: 10px; }
        .btn { padding: 12px 16px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 14px; }
        .btn-publish { background: #667eea; color: #fff; }
        .btn-draft { background: #e1e8ed; color: #333; }
        .btn-cancel { background: transparent; color: #667eea; text-decoration: underline; }
        .btn:hover { opacity: 0.9; }
        .help { font-size: 13px; color: #999; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="index.php">← Back to Blog</a> | <a href="my_posts.php">My Posts</a>
        </div>

        <h1>✏️ Write a New Post</h1>

        <?php if (!empty($errors)): ?>
            <div class="errors">
                <strong>Please fix these errors:</strong>
                <ul>
                    <?php foreach ($errors as $e): ?>
                        <li><?php echo htmlspecialchars($e); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="title">Post Title *</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title ?? ''); ?>" placeholder="Enter an interesting title..." required autofocus maxlength="255">
                <div class="help"><span id="titlecount">0</span>/255 characters</div>
            </div>

            <div class="form-group">
                <label for="content">Content *</label>
                <textarea id="content" name="content" placeholder="Write your post here..." required><?php echo htmlspecialchars($content ?? ''); ?></textarea>
                <div class="help"><span id="contentcount">0</span>/50000 characters</div>
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" required>
                    <option value="draft" <?php echo ($status ?? 'draft') === 'draft' ? 'selected' : ''; ?>>Draft (Private)</option>
                    <option value="published" <?php echo ($status ?? '') === 'published' ? 'selected' : ''; ?>>Published (Visible to All)</option>
                </select>
                <div class="help">Drafts are only visible to you</div>
            </div>

            <div class="buttons">
                <button type="submit" name="action" value="save" class="btn btn-publish">Publish Post</button>
                <a href="index.php" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('title').addEventListener('input', function() {
            document.getElementById('titlecount').textContent = this.value.length;
        });
        document.getElementById('content').addEventListener('input', function() {
            document.getElementById('contentcount').textContent = this.value.length;
        });
    </script>
</body>
</html>
