<?php
/**
 * Project 02: Todo App - Edit Todo
 * Edit an existing todo
 */

session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$todo_id = intval($_GET['id'] ?? 0);
$errors = [];
$success = false;

// Fetch the todo (and verify it belongs to this user)
$stmt = $conn->prepare("SELECT id, title, description, is_complete FROM todos WHERE id = ? AND user_id = ? LIMIT 1");
if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param('ii', $todo_id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$todo = $result->fetch_assoc();
$stmt->close();

if (!$todo) {
    die("Todo not found or access denied");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Validate
    if (empty($title)) {
        $errors[] = 'Title is required';
    } elseif (strlen($title) > 255) {
        $errors[] = 'Title must be less than 255 characters';
    }

    if (strlen($description) > 5000) {
        $errors[] = 'Description must be less than 5000 characters';
    }

    // Update database
    if (empty($errors)) {
        $update = $conn->prepare("UPDATE todos SET title = ?, description = ? WHERE id = ? AND user_id = ?");
        if ($update) {
            $update->bind_param('ssii', $title, $description, $todo_id, $_SESSION['user_id']);
            if ($update->execute()) {
                $success = true;
                $todo['title'] = $title;
                $todo['description'] = $description;
            } else {
                $errors[] = 'Database error: ' . $update->error;
            }
            $update->close();
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
    <title>Edit Todo — Project 02</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .errors { background: #fee; border: 1px solid #fcc; color: #c33; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .errors ul { margin-left: 20px; margin-bottom: 0; }
        .success { background: #efe; border: 1px solid #cfc; color: #3c3; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .status { background: #f0f4ff; border: 1px solid #d4e0ff; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; color: #444; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 600; }
        input, textarea { width: 100%; padding: 10px; border: 2px solid #e1e8ed; border-radius: 6px; font-size: 14px; }
        textarea { resize: vertical; min-height: 120px; }
        input:focus, textarea:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); }
        .submit { padding: 12px; background: #667eea; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
        .submit:hover { opacity: 0.9; }
        .cancel { display: inline-block; margin-top: 12px; color: #667eea; text-decoration: none; }
        .charcount { font-size: 12px; color: #999; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="index.php">← Back to Todos</a>
        </div>

        <h1>Edit Todo</h1>

        <?php if ($success): ?>
            <div class="success">✓ Todo updated successfully!</div>
        <?php endif; ?>

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

        <?php if ($todo['is_complete']): ?>
            <div class="status">
                ✅ This todo is marked as complete. <a href="toggle.php?id=<?php echo $todo['id']; ?>">Mark as incomplete</a>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="title">Todo Title *</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($todo['title']); ?>" required autofocus>
                <div class="charcount"><span id="titlecount"><?php echo strlen($todo['title']); ?></span>/255 characters</div>
            </div>

            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea id="description" name="description"><?php echo htmlspecialchars($todo['description']); ?></textarea>
                <div class="charcount"><span id="desccount"><?php echo strlen($todo['description']); ?></span>/5000 characters</div>
            </div>

            <button type="submit" class="submit">Save Changes</button>
            <a href="index.php" class="cancel">Cancel</a>
        </form>
    </div>

    <script>
        document.getElementById('title').addEventListener('input', function() {
            document.getElementById('titlecount').textContent = this.value.length;
        });
        document.getElementById('description').addEventListener('input', function() {
            document.getElementById('desccount').textContent = this.value.length;
        });
    </script>
</body>
</html>
