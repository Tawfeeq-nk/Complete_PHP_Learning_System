<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 11: Sessions and Cookies</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        h1 { color: #333; }
        h2 { color: #666; margin-top: 30px; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .example { background: #e8f4f8; padding: 15px; margin: 15px 0; border-left: 4px solid #2196F3; }
        .warning { background: #fff3cd; padding: 15px; margin: 15px 0; border-left: 4px solid #ffc107; }
    </style>
</head>
<body>
    <h1>Module 11: Sessions and Cookies</h1>
    
    <h2>1. Sessions</h2>
    <p>Sessions store data on the server, identified by a session ID stored in a cookie</p>
    
    <h3>Starting a Session</h3>
    <div class="example">
        <pre><?php
// Must be called before any output
session_start();

// Set session variables
$_SESSION['username'] = 'John';
$_SESSION['email'] = 'john@example.com';

echo "Session started!<br>";
echo "Username: " . $_SESSION['username'] . "<br>";
echo "Email: " . $_SESSION['email'] . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['username'] = 'John';
        $_SESSION['email'] = 'john@example.com';
        echo "Session started!<br>";
        echo "Username: " . $_SESSION['username'] . "<br>";
        echo "Email: " . $_SESSION['email'] . "<br>";
        ?>
    </div>

    <h3>Reading Session Data</h3>
    <div class="example">
        <pre><?php
session_start();

if (isset($_SESSION['username'])) {
    echo "Welcome back, " . $_SESSION['username'] . "!<br>";
} else {
    echo "No session data found<br>";
}
?></pre>
    </div>

    <h3>Destroying a Session</h3>
    <div class="example">
        <pre><?php
session_start();

// Remove specific session variable
unset($_SESSION['username']);

// Or destroy entire session
// session_destroy();
?></pre>
    </div>

    <h2>2. Cookies</h2>
    <p>Cookies store data on the client's browser</p>
    
    <h3>Setting Cookies</h3>
    <div class="example">
        <pre><?php
// Set a cookie (name, value, expiration)
setcookie("username", "John", time() + 3600); // Expires in 1 hour
setcookie("theme", "dark", time() + (86400 * 30)); // Expires in 30 days

echo "Cookies set!<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        setcookie("username", "John", time() + 3600);
        setcookie("theme", "dark", time() + (86400 * 30));
        echo "Cookies set! (Refresh to see them)<br>";
        ?>
    </div>

    <h3>Reading Cookies</h3>
    <div class="example">
        <pre><?php
if (isset($_COOKIE['username'])) {
    echo "Cookie username: " . $_COOKIE['username'] . "<br>";
} else {
    echo "Cookie not set<br>";
}
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        if (isset($_COOKIE['username'])) {
            echo "Cookie username: " . $_COOKIE['username'] . "<br>";
        } else {
            echo "Cookie not set (refresh page after setting)<br>";
        }
        ?>
    </div>

    <h3>Deleting Cookies</h3>
    <div class="example">
        <pre><?php
// Delete cookie by setting expiration in the past
setcookie("username", "", time() - 3600);
echo "Cookie deleted<br>";
?></pre>
    </div>

    <h2>3. Sessions vs Cookies</h2>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr>
            <th style="border: 1px solid #ddd; padding: 10px; background: #2196F3; color: white;">Feature</th>
            <th style="border: 1px solid #ddd; padding: 10px; background: #2196F3; color: white;">Sessions</th>
            <th style="border: 1px solid #ddd; padding: 10px; background: #2196F3; color: white;">Cookies</th>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Storage</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Server</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Client Browser</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Security</td>
            <td style="border: 1px solid #ddd; padding: 10px;">More secure</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Less secure</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Size Limit</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Large</td>
            <td style="border: 1px solid #ddd; padding: 10px;">4KB</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;">Persistence</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Until browser closes</td>
            <td style="border: 1px solid #ddd; padding: 10px;">Until expiration</td>
        </tr>
    </table>

    <h2>4. Practical Example: Login System</h2>
    <div class="example">
        <pre><?php
session_start();

// Simulate login
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    if ($username) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        echo "Logged in as $username<br>";
    }
}

// Check if logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    echo "Welcome, " . $_SESSION['username'] . "!<br>";
    echo '<form method="POST"><button name="logout">Logout</button></form>';
} else {
    echo '<form method="POST">
        <input type="text" name="username" placeholder="Username">
        <button name="login">Login</button>
    </form>';
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    echo "Logged out!<br>";
    header("Refresh:0");
}
?></pre>
    </div>

    <div class="warning">
        <strong>Security Note:</strong>
        <ul>
            <li>Never store sensitive data in cookies</li>
            <li>Use HTTPS for session cookies</li>
            <li>Regenerate session ID on login</li>
            <li>Set secure cookie flags (HttpOnly, Secure)</li>
        </ul>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Sessions store data on server, identified by session ID</li>
        <li>Cookies store data on client browser</li>
        <li>Use <code>session_start()</code> before accessing sessions</li>
        <li>Cookies set with <code>setcookie()</code> before any output</li>
        <li>Sessions are more secure for sensitive data</li>
        <li>Cookies persist longer but have size limits</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>
</html>
