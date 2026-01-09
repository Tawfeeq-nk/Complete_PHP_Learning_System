<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 10: Exercises</title>
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
    <h1>Module 10: File Handling - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Write and Read File</h2>
        <p>Write "Hello, PHP!" to a file, then read and display it</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $filename = 'exercise.txt';
        file_put_contents($filename, 'Hello, PHP!');
        $content = file_get_contents($filename);
        echo "File content: $content<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $filename = 'exercise.txt';
        file_put_contents($filename, 'Hello, PHP!');
        $content = file_get_contents($filename);
        echo "File content: $content<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Append to File</h2>
        <p>Create a file, write a line, then append another line</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $filename = 'append.txt';
        file_put_contents($filename, "First line\n");
        file_put_contents($filename, "Second line\n", FILE_APPEND);
        echo "File content:<br>";
        echo nl2br(file_get_contents($filename));
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $filename = 'append.txt';
        file_put_contents($filename, "First line\n");
        file_put_contents($filename, "Second line\n", FILE_APPEND);
        echo "File content:<br>";
        echo nl2br(file_get_contents($filename));
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>