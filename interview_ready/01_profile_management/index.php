<?php
/**
 * Profile Management: View Profile
 * Beginner Project 01 - View user profile and account info
 */

session_start();
require_once __DIR__ . '/../config.php';

// Check if user is logged in
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// Fetch user profile
$stmt = $conn->prepare("SELECT id, username, email, age, bio, profile_image, registration_date FROM users WHERE id = ? LIMIT 1");
if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    die("User not found");
}

// Format registration date
$reg_date = new DateTime($user['registration_date']);
$formatted_date = $reg_date->format('F j, Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Profile — Project 01</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .profile-section { margin-bottom: 25px; padding-bottom: 20px; border-bottom: 1px solid #e1e8ed; }
        .profile-section:last-child { border-bottom: none; }
        .profile-avatar { text-align: center; margin-bottom: 20px; }
        .avatar { width: 100px; height: 100px; border-radius: 50%; background: #667eea; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 36px; margin: 0 auto; font-weight: bold; }
        .avatar.no-image { background: #ddd; color: #666; }
        .profile-field { margin-bottom: 15px; }
        .label { font-weight: 600; color: #333; margin-bottom: 4px; }
        .value { color: #666; word-break: break-word; }
        .bio-text { background: #f5f5f5; padding: 10px; border-radius: 5px; line-height: 1.5; }
        .actions { display: flex; gap: 10px; margin-top: 20px; }
        .btn { padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; border: none; cursor: pointer; display: inline-block; }
        .btn-primary { background: #667eea; color: #fff; }
        .btn-secondary { background: #e1e8ed; color: #333; }
        .btn-danger { background: #e74c3c; color: #fff; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="../home.php">← Home</a>
        </div>

        <h1>My Profile</h1>

        <!-- Profile Avatar Section -->
        <div class="profile-section profile-avatar">
            <?php if (!empty($user['profile_image'])): ?>
                <img src="profile_images/<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Profile" style="width:100px;height:100px;border-radius:50%;object-fit:cover;">
            <?php else: ?>
                <div class="avatar no-image"><?php echo strtoupper(substr($user['username'], 0, 1)); ?></div>
            <?php endif; ?>
        </div>

        <!-- Profile Information -->
        <div class="profile-section">
            <div class="profile-field">
                <div class="label">Username</div>
                <div class="value"><?php echo htmlspecialchars($user['username']); ?></div>
            </div>

            <div class="profile-field">
                <div class="label">Email</div>
                <div class="value"><?php echo htmlspecialchars($user['email']); ?></div>
            </div>

            <div class="profile-field">
                <div class="label">Age</div>
                <div class="value"><?php echo htmlspecialchars($user['age']); ?></div>
            </div>

            <div class="profile-field">
                <div class="label">Member Since</div>
                <div class="value"><?php echo htmlspecialchars($formatted_date); ?></div>
            </div>
        </div>

        <!-- Bio Section -->
        <div class="profile-section">
            <div class="label">Bio</div>
            <div class="value">
                <?php if (!empty($user['bio'])): ?>
                    <div class="bio-text"><?php echo nl2br(htmlspecialchars($user['bio'])); ?></div>
                <?php else: ?>
                    <p style="color:#999;">No bio yet. <a href="edit.php">Add one!</a></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="actions">
            <a href="edit.php" class="btn btn-primary">Edit Profile</a>
            <a href="change_password.php" class="btn btn-secondary">Change Password</a>
            <a href="../logout.php" class="btn btn-danger">Log Out</a>
        </div>
    </div>
</body>
</html>
