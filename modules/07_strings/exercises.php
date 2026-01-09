<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 7: Exercises</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .exercise { background: #fff3cd; padding: 15px; margin: 15px 0; border-left: 4px solid #ffc107; }
        .solution { background: #d4edda; padding: 15px; margin: 15px 0; border-left: 4px solid #28a745; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Module 7: Strings - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Format Name</h2>
        <p>Take "john doe" and format it as "John Doe"</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
$name = "john doe";
$formatted = ucwords($name);
echo $formatted . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $name = "john doe";
        $formatted = ucwords($name);
        echo $formatted . "<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Extract Domain</h2>
        <p>Extract "example" from "user@example.com"</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
$email = "user@example.com";
$parts = explode("@", $email);
$domain = explode(".", $parts[1])[0];
echo "Domain: $domain<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $email = "user@example.com";
        $parts = explode("@", $email);
        $domain = explode(".", $parts[1])[0];
        echo "Domain: $domain<br>";
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>
</html>
