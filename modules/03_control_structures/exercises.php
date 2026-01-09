<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 3: Exercises</title>
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
    <h1>Module 3: Control Structures - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Age Category</h2>
        <p>Create a program that categorizes age:</p>
        <ul>
            <li>0-12: Child</li>
            <li>13-19: Teenager</li>
            <li>20-64: Adult</li>
            <li>65+: Senior</li>
        </ul>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $age = 25;
        if ($age <= 12) {
            $category = "Child";
        } elseif ($age <= 19) {
            $category = "Teenager";
        } elseif ($age <= 64) {
            $category = "Adult";
        } else {
            $category = "Senior";
        }
        echo "Age $age: $category<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $age = 25;
        if ($age <= 12) {
            $category = "Child";
        } elseif ($age <= 19) {
            $category = "Teenager";
        } elseif ($age <= 64) {
            $category = "Adult";
        } else {
            $category = "Senior";
        }
        echo "Age $age: $category<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Day of Week</h2>
        <p>Use switch to display message based on day of week</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $day = "Saturday";
        switch ($day) {
            case "Monday":
            case "Tuesday":
            case "Wednesday":
            case "Thursday":
            case "Friday":
                echo "$day is a weekday<br>";
                break;
            case "Saturday":
            case "Sunday":
                echo "$day is a weekend<br>";
                break;
            default:
                echo "Invalid day<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $day = "Saturday";
        switch ($day) {
            case "Monday":
            case "Tuesday":
            case "Wednesday":
            case "Thursday":
            case "Friday":
                echo "$day is a weekday<br>";
                break;
            case "Saturday":
            case "Sunday":
                echo "$day is a weekend<br>";
                break;
            default:
                echo "Invalid day<br>";
        }
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>