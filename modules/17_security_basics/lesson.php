<?php
/**
 * MODULE 17: SECURITY BASICS
 * SQL Injection, XSS, CSRF, Password Security, Input Validation
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 17: Security Basics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .danger {
            background: #fee;
            color: #c33;
            padding: 10px;
            border-left: 4px solid #c33;
        }

        .safe {
            background: #efe;
            color: #3c3;
            padding: 10px;
            border-left: 4px solid #3c3;
        }

        pre {
            background: #f0f0f0;
            padding: 15px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>🔒 MODULE 17: SECURITY BASICS</h1>
        <p>Essential security practices for PHP applications.</p>
    </div>

    <div class="container">
        <h2>SQL Injection Prevention</h2>

        <div class="danger">
            <h4>❌ VULNERABLE:</h4>
            <pre>
$username = $_GET['user'];
$sql = "SELECT * FROM users WHERE username = '$username'";
// Attacker enters: admin' OR '1'='1
        </pre>
        </div>

        <div class="safe">
            <h4>✅ SAFE:</h4>
            <pre>
$username = $_GET['user'];
$sql = "SELECT * FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $username]);
        </pre>
        </div>
    </div>

    <div class="container">
        <h2>XSS (Cross-Site Scripting) Prevention</h2>

        <div class="danger">
            <h4>❌ VULNERABLE:</h4>
            <pre>
&lt;?php echo $_GET['comment']; ?&gt;
// User enters: &lt;script&gt;alert('hacked')&lt;/script&gt;
        </pre>
        </div>

        <div class="safe">
            <h4>✅ SAFE:</h4>
            <pre>
&lt;?php echo htmlspecialchars($_GET['comment'], ENT_QUOTES, 'UTF-8'); ?&gt;
// Or use htmlescapefunction
        </pre>
        </div>
    </div>

    <div class="container">
        <h2>Password Security</h2>

        <pre>
&lt;?php
// Hashing passwords with bcrypt
$password = "user_password";
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Store hashedPassword in database

// Verify password on login
if (password_verify($_POST['password'], $storedHash)) {
    echo "Password correct!";
} else {
    echo "Invalid password!";
}
?&gt;
    </pre>
    </div>

    <div class="container">
        <h2>Input Validation</h2>

        <pre>
&lt;?php
// Validate email
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email";
} else {
    echo "Invalid email";
}

// Validate integer
$id = $_GET['id'];
if (filter_var($id, FILTER_VALIDATE_INT)) {
    echo "Valid ID";
}

// Sanitize string
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
?&gt;
    </pre>
    </div>

</body>

</html>