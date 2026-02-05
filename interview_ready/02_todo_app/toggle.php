<?php
/**
 * Project 02: Todo App - Toggle Todo Status
 * Mark a todo as complete or incomplete
 */

session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$todo_id = intval($_GET['id'] ?? 0);

// Verify todo exists and belongs to this user
$check = $conn->prepare("SELECT is_complete FROM todos WHERE id = ? AND user_id = ? LIMIT 1");
if (!$check) {
    die("Database error: " . $conn->error);
}

$check->bind_param('ii', $todo_id, $_SESSION['user_id']);
$check->execute();
$result = $check->get_result();
$todo = $result->fetch_assoc();
$check->close();

if (!$todo) {
    die("Todo not found or access denied");
}

// Toggle the status
$new_status = !$todo['is_complete'];
$update = $conn->prepare("UPDATE todos SET is_complete = ? WHERE id = ? AND user_id = ?");
if ($update) {
    $update->bind_param('iii', $new_status, $todo_id, $_SESSION['user_id']);
    $update->execute();
    $update->close();
}

// Redirect back to list
header('Location: index.php');
exit;
?>
