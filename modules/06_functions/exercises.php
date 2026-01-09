<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 6: Exercises</title>
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
    <h1>Module 6: Functions - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Calculate Area</h2>
        <p>Create a function that calculates the area of a rectangle (length × width)</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        function calculateArea($length, $width)
        {
            return $length * $width;
        }

        $area = calculateArea(5, 3);
        echo "Area of rectangle (5×3): $area<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function calculateArea($length, $width)
        {
            return $length * $width;
        }
        $area = calculateArea(5, 3);
        echo "Area of rectangle (5×3): $area<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Check Even Number</h2>
        <p>Create a function that returns true if number is even, false otherwise</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        function isEven($number)
        {
            return $number % 2 == 0;
        }

        echo "Is 4 even? " . (isEven(4) ? 'Yes' : 'No') . "<br>";
        echo "Is 5 even? " . (isEven(5) ? 'Yes' : 'No') . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function isEven($number)
        {
            return $number % 2 == 0;
        }
        echo "Is 4 even? " . (isEven(4) ? 'Yes' : 'No') . "<br>";
        echo "Is 5 even? " . (isEven(5) ? 'Yes' : 'No') . "<br>";
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>