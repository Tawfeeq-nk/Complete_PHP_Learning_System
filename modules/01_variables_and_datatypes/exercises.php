<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 1: Exercises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .exercise {
            background: #fff3cd;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #ffc107;
        }

        .solution {
            background: #d4edda;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #28a745;
        }

        pre {
            background: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <h1>Module 1: Variables and Data Types - Exercises</h1>
    <div
        style="background:#f8f9fa;padding:15px;border-radius:8px;margin-bottom:20px;display:flex;gap:15px;flex-wrap:wrap;align-items:center;">
        <a href="lesson.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Back to Lesson</a>
        <span style="color:#ddd;">|</span>
        <a href="../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Back to Modules</a>
        <span style="color:#ddd;">|</span>
        <a href="../../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Home</a>
        <span style="color:#ddd;">|</span>
        <a href="../../projects/index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Projects</a>
    </div>

    <div class="exercise">
        <h2>Exercise 1: Create Variables</h2>
        <p>Create variables for:</p>
        <ul>
            <li>Your name (string)</li>
            <li>Your age (integer)</li>
            <li>Your height in meters (float)</li>
            <li>Whether you like PHP (boolean)</li>
        </ul>
        <p>Display all variables with their types.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        // Your solution here
        $name = "Your Name";
        $age = 25;
        $height = 1.75;
        $likesPHP = true;

        echo "Name: $name (Type: " . gettype($name) . ")<br>";
        echo "Age: $age (Type: " . gettype($age) . ")<br>";
        echo "Height: $height (Type: " . gettype($height) . ")<br>";
        echo "Likes PHP: " . ($likesPHP ? 'true' : 'false') . " (Type: " . gettype($likesPHP) . ")<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $name = "Your Name";
        $age = 25;
        $height = 1.75;
        $likesPHP = true;

        echo "Name: $name (Type: " . gettype($name) . ")<br>";
        echo "Age: $age (Type: " . gettype($age) . ")<br>";
        echo "Height: $height (Type: " . gettype($height) . ")<br>";
        echo "Likes PHP: " . ($likesPHP ? 'true' : 'false') . " (Type: " . gettype($likesPHP) . ")<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Constants</h2>
        <p>Create constants for:</p>
        <ul>
            <li>Website name</li>
            <li>Maximum login attempts (3)</li>
            <li>Database version (1.0)</li>
        </ul>
        <p>Display all constants.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        define("WEBSITE_NAME", "My Learning Site");
        define("MAX_LOGIN_ATTEMPTS", 3);
        define("DB_VERSION", 1.0);

        echo "Website: " . WEBSITE_NAME . "<br>";
        echo "Max Login Attempts: " . MAX_LOGIN_ATTEMPTS . "<br>";
        echo "DB Version: " . DB_VERSION . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        define("WEBSITE_NAME", "My Learning Site");
        define("MAX_LOGIN_ATTEMPTS", 3);
        define("DB_VERSION", 1.0);

        echo "Website: " . WEBSITE_NAME . "<br>";
        echo "Max Login Attempts: " . MAX_LOGIN_ATTEMPTS . "<br>";
        echo "DB Version: " . DB_VERSION . "<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 3: Variable Variables</h2>
        <p>Create a variable <code>$color</code> with value "blue", then use it to create <code>$blue</code> with value
            "sky". Display both.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $color = "blue";
        $$color = "sky";

        echo "Color variable: $color<br>";
        echo "Blue variable: $blue<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $color = "blue";
        $$color = "sky";
        echo "Color variable: $color<br>";
        echo "Blue variable: $blue<br>";
        ?>
    </div>

    <div style="margin-top:40px;padding-top:20px;border-top:2px solid #ddd;">
        <p style="color:#666;">
            <a href="lesson.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Back to Lesson</a> |
            <a href="../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Back to Modules</a> |
            <a href="../../START_HERE.php" style="color:#667eea;text-decoration:none;font-weight:500;">Dashboard</a>
        </p>
    </div>

    <body>
        <?php include __DIR__ . '/../_nav_ui.php'; ?>
        <h1>Module 1: Variables and Data Types - Exercises</h1>
        <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>