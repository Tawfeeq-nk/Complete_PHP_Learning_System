<?php
/**
 * Project 02: Todo App - Delete Todo
 * Delete a todo item
 */

session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$todo_id = intval($_GET['id'] ?? 0);

// Verify todo exists and belongs to this user, then delete
$delete = $conn->prepare("DELETE FROM todos WHERE id = ? AND user_id = ?");
if ($delete) {
    $delete->bind_param('ii', $todo_id, $_SESSION['user_id']);
    $delete->execute();
    $delete->close();
}

// Redirect back to list
header('Location: index.php');
exit;
?>
