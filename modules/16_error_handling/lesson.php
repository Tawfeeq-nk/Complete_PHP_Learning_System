<?php
/**
 * MODULE 16: ERROR HANDLING & LOGGING
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 16: Error Handling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h2 {
            color: #667eea;
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
        <h1>⚠️ MODULE 16: ERROR HANDLING & LOGGING</h1>
        <p><strong>Level:</strong> Intermediate-Advanced | Production-ready error handling techniques.</p>
    </div>

    <div class="container">
        <h2>Try-Catch-Finally Blocks</h2>
        <pre>
&lt;?php
try {
    // Risky code
    $pdo = new PDO("mysql:host=localhost;dbname=db", "root", "");
    $result = $pdo->query("SELECT * FROM users");
} catch (PDOException $e) {
    // Handle database errors
    echo "Database Error: " . $e->getMessage();
    log_error($e);
} catch (Exception $e) {
    // Handle other exceptions
    echo "Error: " . $e->getMessage();
} finally {
    // Runs regardless of exception
    echo "Cleanup code here";
}
?&gt;
    </pre>
    </div>

    <div class="container">
        <h2>Custom Error Handler</h2>
        <pre>
&lt;?php
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    echo "Error [$errno]: $errstr in $errfile:$errline";
    log_to_file("Error [$errno]: $errstr in $errfile:$errline");
    return true;
});

// Logging function
function log_error($message) {
    file_put_contents('logs/error.log', 
        date('Y-m-d H:i:s') . " - " . $message . "\n", 
        FILE_APPEND);
}
?&gt;
    </pre>
    </div>

</body>

</html>