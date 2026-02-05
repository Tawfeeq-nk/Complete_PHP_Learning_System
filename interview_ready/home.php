<?php
session_start();
require_once __DIR__ . '/config.php';

// If logged in, fetch user details for display
$user = null;
if (!empty($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT id, username, email, age, registration_date FROM users WHERE id = ? LIMIT 1");
    if ($stmt) {
        $stmt->bind_param('i', $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home — Beginner PHP</title>
    <style>
        body {
            font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15)
        }

        h1 {
            margin-bottom: 6px;
            font-size: 26px;
            color: #333
        }

        p {
            color: #555
        }

        .actions {
            margin-top: 18px
        }

        a.btn {
            display: inline-block;
            padding: 10px 14px;
            background: #667eea;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            margin-right: 8px
        }

        .meta {
            margin-top: 12px;
            color: #666
        }
    </style>
</head>

<body>
    <div class="card">
        <?php if ($user): ?>
            <h1>Welcome back, <?php echo htmlspecialchars($user['username']); ?>!</h1>
            <p>You're logged in. Here's a quick summary of your account.</p>
            <div class="meta">
                <strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?><br>
                <strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?><br>
                <strong>Member since:</strong> <?php echo htmlspecialchars($user['registration_date']); ?><br>
            </div>
            <div class="actions">
                <a class="btn" href="01_profile_management/index.php">View Profile</a>
                <a class="btn" href="02_todo_app/index.php">My Todos</a>
                <a class="btn" href="03_blog_system/index.php">Blog</a>
                <a class="btn" href="logout.php">Log out</a>
            </div>
        <?php else: ?>
            <h1>Welcome to Beginner PHP</h1>
            <p>This is a simple starter site demonstrating simple projects using MySQL and PHP.</p>
            <div class="actions">
                <a class="btn" href="register.php">Create Account</a>
                <a class="btn" href="login.php">Log in</a>
            </div>
            <p class="meta" style="margin-top:14px;color:#666">No account? Use the <strong>Create Account</strong> button to
                get started.</p>
        <?php endif; ?>
    </div>
</body>

</html>