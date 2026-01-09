<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 5: Exercises</title>
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
    <h1>Module 5: Arrays - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Create and Display Array</h2>
        <p>Create an array of 5 colors and display each using foreach</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $colors = ["Red", "Green", "Blue", "Yellow", "Purple"];
        foreach ($colors as $color) {
            echo "$color<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $colors = ["Red", "Green", "Blue", "Yellow", "Purple"];
        foreach ($colors as $color) {
            echo "$color<br>";
        }
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Student Information</h2>
        <p>Create an associative array for a student with name, age, and grade. Display all information.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $student = [
            "name" => "Alice",
            "age" => 20,
            "grade" => "A"
        ];

        foreach ($student as $key => $value) {
            echo ucfirst($key) . ": $value<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $student = [
            "name" => "Alice",
            "age" => 20,
            "grade" => "A"
        ];
        foreach ($student as $key => $value) {
            echo ucfirst($key) . ": $value<br>";
        }
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 3: Array Operations</h2>
        <p>Start with array [1, 2, 3]. Add 4 and 5, then remove the first element.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $numbers = [1, 2, 3];
        array_push($numbers, 4, 5);
        echo "After adding 4 and 5: ";
        print_r($numbers);
        echo "<br>";

        array_shift($numbers);
        echo "After removing first: ";
        print_r($numbers);
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $numbers = [1, 2, 3];
        array_push($numbers, 4, 5);
        echo "After adding 4 and 5: ";
        print_r($numbers);
        echo "<br>";
        array_shift($numbers);
        echo "After removing first: ";
        print_r($numbers);
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>