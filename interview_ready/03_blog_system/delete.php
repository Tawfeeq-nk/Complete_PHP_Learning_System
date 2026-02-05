<?php
/**
 * Project 03: Blog System - Delete Post
 * Delete a blog post and its comments
 */

session_start();
require_once __DIR__ . '/../config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$post_id = intval($_GET['id'] ?? 0);

// Verify post exists and belongs to this user, then delete
// Comments will be deleted automatically due to ON DELETE CASCADE
$delete = $conn->prepare("DELETE FROM blog_posts WHERE id = ? AND user_id = ?");
if ($delete) {
    $delete->bind_param('ii', $post_id, $_SESSION['user_id']);
    $delete->execute();
    $delete->close();
}

// Redirect to my posts
header('Location: my_posts.php');
exit;
?>
