<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 9: Superglobals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #666;
            margin-top: 30px;
        }

        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
        }

        pre {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }

        .example {
            background: #e8f4f8;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #2196F3;
        }

        .warning {
            background: #fff3cd;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #ffc107;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <?php include __DIR__ . '/../_module_nav.php'; ?>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <h1>Module 9: Superglobals</h1>
    <p>Superglobals are built-in variables that are always available in all scopes.</p>

    <h2>1. $_GET</h2>
    <p>Contains data sent via GET method (URL parameters)</p>
    <div class="example">
        <pre><?php
        // URL: page.php?name=John&age=25
        if (isset($_GET['name'])) {
            echo "Name: " . htmlspecialchars($_GET['name']) . "<br>";
        }
        if (isset($_GET['age'])) {
            echo "Age: " . htmlspecialchars($_GET['age']) . "<br>";
        }

        // Display all GET data
        echo "<pre>All GET data:\n";
        print_r($_GET);
        echo "</pre>";
        ?></pre>
        <p><strong>Try it:</strong> Add <code>?name=John&age=25</code> to the URL</p>
        <?php
        if (isset($_GET['name'])) {
            echo "Name: " . htmlspecialchars($_GET['name']) . "<br>";
        }
        if (isset($_GET['age'])) {
            echo "Age: " . htmlspecialchars($_GET['age']) . "<br>";
        }
        ?>
    </div>

    <h2>2. $_POST</h2>
    <p>Contains data sent via POST method (form submissions)</p>
    <div class="example">
        <pre><?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            echo "Name: " . htmlspecialchars($name) . "<br>";
            echo "Email: " . htmlspecialchars($email) . "<br>";
        }
        ?></pre>
    </div>

    <h2>3. $_REQUEST</h2>
    <p>Contains data from GET, POST, and COOKIE (not recommended - use specific superglobals)</p>
    <div class="warning">
        <strong>Warning:</strong> $_REQUEST combines GET, POST, and COOKIE data. It's less secure and can cause
        confusion. Prefer $_GET or $_POST.
    </div>

    <h2>4. $_SERVER</h2>
    <p>Contains server and execution environment information</p>
    <div class="example">
        <pre><?php
        echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
        echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
        echo "Script Name: " . $_SERVER['SCRIPT_NAME'] . "<br>";
        echo "Request URI: " . $_SERVER['REQUEST_URI'] . "<br>";
        echo "HTTP Host: " . $_SERVER['HTTP_HOST'] . "<br>";
        echo "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        echo "Server Name: " . ($_SERVER['SERVER_NAME'] ?? 'N/A') . "<br>";
        echo "Request Method: " . ($_SERVER['REQUEST_METHOD'] ?? 'N/A') . "<br>";
        echo "Script Name: " . ($_SERVER['SCRIPT_NAME'] ?? 'N/A') . "<br>";
        echo "Request URI: " . ($_SERVER['REQUEST_URI'] ?? 'N/A') . "<br>";
        echo "HTTP Host: " . ($_SERVER['HTTP_HOST'] ?? 'N/A') . "<br>";
        echo "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'N/A') . "<br>";
        ?>
    </div>

    <h2>5. $_SESSION</h2>
    <p>Contains session variables (covered in Module 11)</p>
    <div class="example">
        <pre><?php
        session_start();
        $_SESSION['user'] = 'John';
        echo "Session user: " . $_SESSION['user'] . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = 'John';
        echo "Session user: " . ($_SESSION['user'] ?? 'Not set') . "<br>";
        ?>
    </div>

    <h2>6. $_COOKIE</h2>
    <p>Contains HTTP cookies (covered in Module 11)</p>
    <div class="example">
        <pre><?php
        // Set a cookie
        setcookie("username", "John", time() + 3600);

        // Read cookie
        if (isset($_COOKIE['username'])) {
            echo "Cookie username: " . $_COOKIE['username'] . "<br>";
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

    <h2>7. $_FILES</h2>
    <p>Contains uploaded file information</p>
    <div class="example">
        <pre><?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            echo "File Name: " . $file['name'] . "<br>";
            echo "File Type: " . $file['type'] . "<br>";
            echo "File Size: " . $file['size'] . " bytes<br>";
            echo "Temp Location: " . $file['tmp_name'] . "<br>";
        }
        ?></pre>
    </div>

    <h2>8. $_ENV</h2>
    <p>Contains environment variables</p>
    <div class="example">
        <pre><?php
        // Get environment variable
        $path = $_ENV['PATH'] ?? 'Not set';
        echo "PATH: $path<br>";
        ?></pre>
    </div>

    <h2>9. $GLOBALS</h2>
    <p>Contains all global variables in the script</p>
    <div class="example">
        <pre><?php
        $globalVar = "I'm global";

        function testGlobals()
        {
            echo "Global var: " . $GLOBALS['globalVar'] . "<br>";
        }

        testGlobals();
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $globalVar = "I'm global";
        function testGlobals()
        {
            echo "Global var: " . $GLOBALS['globalVar'] . "<br>";
        }
        testGlobals();
        ?>
    </div>

    <h2>Security Best Practices</h2>
    <ul>
        <li>Always validate and sanitize superglobal data</li>
        <li>Use <code>htmlspecialchars()</code> to prevent XSS</li>
        <li>Use <code>isset()</code> or <code>??</code> to check if key exists</li>
        <li>Never trust user input - always validate</li>
        <li>Use prepared statements for database queries</li>
    </ul>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Superglobals are available everywhere</li>
        <li><code>$_GET</code> - URL parameters</li>
        <li><code>$_POST</code> - Form data</li>
        <li><code>$_SERVER</code> - Server information</li>
        <li><code>$_SESSION</code> - Session data</li>
        <li><code>$_COOKIE</code> - Cookie data</li>
        <li><code>$_FILES</code> - Uploaded files</li>
        <li>Always sanitize and validate!</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>

</html>