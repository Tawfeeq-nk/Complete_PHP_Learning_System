<?php
/**
 * Project 02: Todo App - View All Todos
 * Beginner-friendly CRUD system with database relationships
 */

session_start();
require_once __DIR__ . '/../config.php';

// Check if user is logged in
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// Fetch user's todos (ordered by creation date, newest first)
$stmt = $conn->prepare("
    SELECT id, title, description, is_complete, created_at 
    FROM todos 
    WHERE user_id = ? 
    ORDER BY created_at DESC
");

if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$todos = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Count completed and incomplete todos
$completed = array_filter($todos, fn($t) => $t['is_complete']);
$incomplete = array_filter($todos, fn($t) => !$t['is_complete']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Todos — Project 02</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 700px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .stats { display: flex; gap: 15px; margin: 20px 0; }
        .stat { flex: 1; background: #f5f5f5; padding: 15px; border-radius: 6px; text-align: center; }
        .stat-num { font-size: 24px; font-weight: bold; color: #667eea; }
        .stat-label { color: #666; font-size: 13px; }
        .add-btn { display: inline-block; padding: 10px 16px; background: #667eea; color: #fff; text-decoration: none; border-radius: 6px; font-weight: 600; margin-bottom: 20px; }
        .add-btn:hover { opacity: 0.9; }
        .todos-section { margin-bottom: 25px; }
        .todos-section h2 { font-size: 18px; color: #333; margin-bottom: 12px; border-bottom: 2px solid #e1e8ed; padding-bottom: 8px; }
        .todo-item { background: #f9f9f9; padding: 15px; margin-bottom: 10px; border-radius: 6px; display: flex; justify-content: space-between; align-items: flex-start; border-left: 4px solid #667eea; }
        .todo-item.completed { opacity: 0.6; }
        .todo-item.completed .todo-title { text-decoration: line-through; color: #999; }
        .todo-content { flex: 1; }
        .todo-title { font-weight: 600; color: #333; margin-bottom: 4px; }
        .todo-desc { font-size: 13px; color: #666; }
        .todo-date { font-size: 12px; color: #999; margin-top: 6px; }
        .todo-actions { display: flex; gap: 8px; }
        .btn-small { padding: 6px 10px; font-size: 12px; text-decoration: none; border: none; border-radius: 4px; cursor: pointer; }
        .btn-edit { background: #667eea; color: #fff; }
        .btn-delete { background: #e74c3c; color: #fff; }
        .btn-toggle { background: #27ae60; color: #fff; }
        .btn-small:hover { opacity: 0.9; }
        .empty { text-align: center; color: #999; padding: 40px 20px; }
        .empty-icon { font-size: 48px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="../home.php">← Home</a> | <a href="../01_profile_management/index.php">Profile</a>
        </div>

        <h1>My Todo List</h1>

        <!-- Stats -->
        <div class="stats">
            <div class="stat">
                <div class="stat-num"><?php echo count($todos); ?></div>
                <div class="stat-label">Total Todos</div>
            </div>
            <div class="stat">
                <div class="stat-num"><?php echo count($incomplete); ?></div>
                <div class="stat-label">To Do</div>
            </div>
            <div class="stat">
                <div class="stat-num"><?php echo count($completed); ?></div>
                <div class="stat-label">Completed</div>
            </div>
        </div>

        <!-- Add Button -->
        <a href="add.php" class="add-btn">+ Add New Todo</a>

        <!-- Active Todos -->
        <?php if (!empty($incomplete)): ?>
            <div class="todos-section">
                <h2>📋 Active Todos</h2>
                <?php foreach ($incomplete as $todo): ?>
                    <div class="todo-item">
                        <div class="todo-content">
                            <div class="todo-title"><?php echo htmlspecialchars($todo['title']); ?></div>
                            <?php if (!empty($todo['description'])): ?>
                                <div class="todo-desc"><?php echo htmlspecialchars(substr($todo['description'], 0, 100)); ?>...</div>
                            <?php endif; ?>
                            <div class="todo-date">Created: <?php echo date('M j, Y', strtotime($todo['created_at'])); ?></div>
                        </div>
                        <div class="todo-actions">
                            <a href="toggle.php?id=<?php echo $todo['id']; ?>" class="btn-small btn-toggle">✓ Done</a>
                            <a href="edit.php?id=<?php echo $todo['id']; ?>" class="btn-small btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $todo['id']; ?>" class="btn-small btn-delete" onclick="return confirm('Delete this todo?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Completed Todos -->
        <?php if (!empty($completed)): ?>
            <div class="todos-section">
                <h2>✅ Completed</h2>
                <?php foreach ($completed as $todo): ?>
                    <div class="todo-item completed">
                        <div class="todo-content">
                            <div class="todo-title"><?php echo htmlspecialchars($todo['title']); ?></div>
                            <?php if (!empty($todo['description'])): ?>
                                <div class="todo-desc"><?php echo htmlspecialchars(substr($todo['description'], 0, 100)); ?>...</div>
                            <?php endif; ?>
                            <div class="todo-date">Created: <?php echo date('M j, Y', strtotime($todo['created_at'])); ?></div>
                        </div>
                        <div class="todo-actions">
                            <a href="toggle.php?id=<?php echo $todo['id']; ?>" class="btn-small btn-toggle">↩ Undo</a>
                            <a href="delete.php?id=<?php echo $todo['id']; ?>" class="btn-small btn-delete" onclick="return confirm('Delete this todo?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Empty State -->
        <?php if (empty($todos)): ?>
            <div class="empty">
                <div class="empty-icon">📝</div>
                <p>No todos yet!</p>
                <p><a href="add.php" style="color:#667eea;font-weight:bold;">Create your first todo</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
