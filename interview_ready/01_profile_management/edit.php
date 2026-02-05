<?php
/**
 * Profile Management: Edit Profile
 * Beginner Project 01 - Edit username, email, age, bio, and upload profile picture
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

// Fetch current user data
$stmt = $conn->prepare("SELECT username, email, age, bio, profile_image FROM users WHERE id = ? LIMIT 1");
if (!$stmt) {
    die("Database error: " . $conn->error);
}
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $bio = trim($_POST['bio'] ?? '');

    // Validate inputs
    if (empty($username)) {
        $errors[] = 'Username is required';
    } elseif (strlen($username) < 3) {
        $errors[] = 'Username must be at least 3 characters';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    if (empty($age)) {
        $errors[] = 'Age is required';
    } elseif (!is_numeric($age) || $age < 13 || $age > 120) {
        $errors[] = 'Age must be between 13 and 120';
    }

    // Check if username or email are already taken by another user
    if (empty($errors)) {
        $check = $conn->prepare("SELECT id FROM users WHERE (username = ? OR email = ?) AND id != ? LIMIT 1");
        if ($check) {
            $check->bind_param('ssi', $username, $email, $_SESSION['user_id']);
            $check->execute();
            $check->store_result();
            if ($check->num_rows > 0) {
                $errors[] = 'Username or email already taken by another user';
            }
            $check->close();
        }
    }

    // Handle profile picture upload
    $profile_image = $user['profile_image']; // Keep existing image by default
    if (!empty($_FILES['profile_image']['name'])) {
        $file = $_FILES['profile_image'];
        $filename = basename($file['name']);
        $filesize = $file['size'];
        $filetmp = $file['tmp_name'];
        $fileerror = $file['error'];

        // Validate file
        if ($fileerror !== UPLOAD_ERR_OK) {
            $errors[] = 'Error uploading file';
        } elseif ($filesize > 2 * 1024 * 1024) {
            $errors[] = 'File is too large (max 2MB)';
        } else {
            // Validate file type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $filetmp);
            finfo_close($finfo);

            if (!in_array($mime, ['image/jpeg', 'image/png', 'image/gif'])) {
                $errors[] = 'Invalid file type. Only JPG, PNG, and GIF allowed';
            } else {
                // Save file with unique name
                $new_filename = 'profile_' . $_SESSION['user_id'] . '_' . time() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                $upload_path = __DIR__ . '/profile_images/' . $new_filename;

                if (move_uploaded_file($filetmp, $upload_path)) {
                    // Delete old image if exists
                    if (!empty($user['profile_image'])) {
                        $old_path = __DIR__ . '/profile_images/' . $user['profile_image'];
                        if (file_exists($old_path)) {
                            unlink($old_path);
                        }
                    }
                    $profile_image = $new_filename;
                } else {
                    $errors[] = 'Failed to save file';
                }
            }
        }
    }

    // Update database if no errors
    if (empty($errors)) {
        $update = $conn->prepare("UPDATE users SET username = ?, email = ?, age = ?, bio = ?, profile_image = ? WHERE id = ?");
        if ($update) {
            $update->bind_param('ssissi', $username, $email, $age, $bio, $profile_image, $_SESSION['user_id']);
            if ($update->execute()) {
                $success = true;
                $user = compact('username', 'email', 'age', 'bio', 'profile_image');
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
    <title>Edit Profile — Project 01</title>
    <style>
        body { font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        h1 { font-size: 26px; color: #333; margin-bottom: 8px; }
        .breadcrumb { color: #666; font-size: 14px; margin-bottom: 20px; }
        .breadcrumb a { color: #667eea; text-decoration: none; }
        .errors { background: #fee; border: 1px solid #fcc; color: #c33; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .errors ul { margin-left: 20px; margin-bottom: 0; }
        .success { background: #efe; border: 1px solid #cfc; color: #3c3; padding: 12px; border-radius: 6px; margin-bottom: 20px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; color: #333; font-weight: 600; }
        input, textarea { width: 100%; padding: 10px; border: 2px solid #e1e8ed; border-radius: 6px; font-size: 14px; }
        textarea { resize: vertical; min-height: 100px; }
        input:focus, textarea:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 3px rgba(102,126,234,0.1); }
        .file-input { padding: 10px; }
        .submit { padding: 12px; background: #667eea; color: #fff; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; width: 100%; }
        .submit:hover { opacity: 0.9; }
        .cancel { display: inline-block; margin-top: 12px; color: #667eea; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="index.php">← Back to Profile</a>
        </div>

        <h1>Edit Profile</h1>

        <?php if ($success): ?>
            <div class="success">✓ Profile updated successfully!</div>
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

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" min="13" max="120" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio (Optional)</label>
                <textarea id="bio" name="bio" placeholder="Tell us about yourself..."><?php echo htmlspecialchars($user['bio']); ?></textarea>
                <small style="color:#999;">Max 500 characters</small>
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Picture (Optional)</label>
                <input type="file" id="profile_image" name="profile_image" class="file-input" accept="image/*">
                <small style="color:#999;">JPG, PNG, or GIF • Max 2MB</small>
                <?php if (!empty($user['profile_image'])): ?>
                    <p style="margin-top:8px;color:#666;"><strong>Current:</strong> <?php echo htmlspecialchars($user['profile_image']); ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="submit">Save Changes</button>
            <a href="index.php" class="cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
