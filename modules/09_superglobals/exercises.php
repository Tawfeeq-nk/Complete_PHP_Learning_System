<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 9: Exercises</title>
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
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <h1>Module 9: Superglobals - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Display Server Info</h2>
        <p>Display the server name, request method, and script name using $_SERVER</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        echo "Server Name: " . ($_SERVER['SERVER_NAME'] ?? 'N/A') . "<br>";
        echo "Request Method: " . ($_SERVER['REQUEST_METHOD'] ?? 'N/A') . "<br>";
        echo "Script Name: " . ($_SERVER['SCRIPT_NAME'] ?? 'N/A') . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        echo "Server Name: " . ($_SERVER['SERVER_NAME'] ?? 'N/A') . "<br>";
        echo "Request Method: " . ($_SERVER['REQUEST_METHOD'] ?? 'N/A') . "<br>";
        echo "Script Name: " . ($_SERVER['SCRIPT_NAME'] ?? 'N/A') . "<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Handle GET Parameters</h2>
        <p>Create code that safely displays GET parameters (name and city)</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $name = htmlspecialchars($_GET['name'] ?? 'Not provided');
        $city = htmlspecialchars($_GET['city'] ?? 'Not provided');

        echo "Name: $name<br>";
        echo "City: $city<br>";

        echo "<p>Try: ?name=John&city=NewYork</p>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $name = htmlspecialchars($_GET['name'] ?? 'Not provided');
        $city = htmlspecialchars($_GET['city'] ?? 'Not provided');
        echo "Name: $name<br>";
        echo "City: $city<br>";
        echo "<p>Try adding: ?name=John&city=NewYork to the URL</p>";
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>