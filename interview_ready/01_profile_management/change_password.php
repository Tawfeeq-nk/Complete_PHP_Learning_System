<?php
/**
 * Profile Management: Change Password
 * Beginner Project 01 - Securely change user password
 */

session_start();
require_once __DIR__ . '/../config.php';

// Check if user is logged in
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$errors = [];
$success = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate inputs
    if (empty($current_password)) {
        $errors[] = 'Current password is required';
    }
    if (empty($new_password)) {
        $errors[] = 'New password is required';
    } elseif (strlen($new_password) < 6) {
        $errors[] = 'New password must be at least 6 characters';
    }
    if ($new_password !== $confirm_password) {
        $errors[] = 'New passwords do not match';
    }

    // Verify current password
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ? LIMIT 1");
        if ($stmt) {
            $stmt->bind_param('i', $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();

            if (!$row || !password_verify($current_password, $row['password'])) {
                $errors[] = 'Current password is incorrect';
            }
        } else {
            $errors[] = 'Database error: ' . $conn->error;
        }
    }

    // Update password if no errors
    if (empty($errors)) {
        $hashed = password_hash($new_password, PASSWORD_BCRYPT);
        $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        if ($update) {
            $update->bind_param('si', $hashed, $_SESSION['user_id']);
            if ($update->execute()) {
                $success = true;
            } else {
                $errors[] = 'Error updating password: ' . $update->error;
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
    <title>Change Password — Project 01</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .errors { background: #fee; border: 1px solid #fcc; color: #c33; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .errors ul { margin-left: 20px; margin-bottom: 0; }
        .success { background: #efe; border: 1px solid #cfc; color: #3c3; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 600; }
        input { width: 100%; padding: 10px; border: 2px solid #e1e8ed; border-radius: 6px; font-size: 14px; }
        input:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); }
        .submit { padding: 12px; background: #667eea; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; }
        .submit:hover { opacity: 0.9; }
        .cancel { display: inline-block; margin-top: 12px; color: #667eea; text-decoration: none; }
        .info { background: #f0f4ff; border: 1px solid #d4e0ff; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; color: #444; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="index.php">← Back to Profile</a>
        </div>

        <h1>Change Password</h1>

        <?php if ($success): ?>
            <div class="success">
                ✓ Password changed successfully!<br>
                <small style="font-size:13px;">You can now log in with your new password.</small>
            </div>
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

        <div class="info">
            💡 For security, we'll ask for your current password before letting you change it.
        </div>

        <form method="POST">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required autofocus>
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
                <small style="color:#999;">At least 6 characters</small>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="submit">Change Password</button>
            <a href="index.php" class="cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
