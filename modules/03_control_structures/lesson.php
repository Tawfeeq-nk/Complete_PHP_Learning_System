<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 3: Control Structures</title>
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
    </style>
</head>

<body>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <?php include __DIR__ . '/../_module_nav.php'; ?>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <h1>Module 3: Control Structures</h1>

    <h2>1. If Statement</h2>
    <p>Executes code if condition is true</p>
    <div class="example">
        <pre><?php
        $age = 20;
        if ($age >= 18) {
            echo "You are an adult.<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $age = 20;
        if ($age >= 18) {
            echo "You are an adult.<br>";
        }
        ?>
    </div>

    <h2>2. If-Else Statement</h2>
    <p>Executes one block if true, another if false</p>
    <div class="example">
        <pre><?php
        $age = 15;
        if ($age >= 18) {
            echo "You are an adult.<br>";
        } else {
            echo "You are a minor.<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $age = 15;
        if ($age >= 18) {
            echo "You are an adult.<br>";
        } else {
            echo "You are a minor.<br>";
        }
        ?>
    </div>

    <h2>3. If-Elseif-Else Statement</h2>
    <p>Checks multiple conditions</p>
    <div class="example">
        <pre><?php
        $score = 85;
        if ($score >= 90) {
            echo "Grade: A<br>";
        } elseif ($score >= 80) {
            echo "Grade: B<br>";
        } elseif ($score >= 70) {
            echo "Grade: C<br>";
        } else {
            echo "Grade: F<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $score = 85;
        if ($score >= 90) {
            echo "Grade: A<br>";
        } elseif ($score >= 80) {
            echo "Grade: B<br>";
        } elseif ($score >= 70) {
            echo "Grade: C<br>";
        } else {
            echo "Grade: F<br>";
        }
        ?>
    </div>

    <h2>4. Ternary Operator</h2>
    <p>Short form of if-else: <code>condition ? value_if_true : value_if_false</code></p>
    <div class="example">
        <pre><?php
        $age = 20;
        $status = ($age >= 18) ? "Adult" : "Minor";
        echo "Status: $status<br>";

        // Nested ternary
        $score = 85;
        $grade = ($score >= 90) ? "A" : (($score >= 80) ? "B" : "C");
        echo "Grade: $grade<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $age = 20;
        $status = ($age >= 18) ? "Adult" : "Minor";
        echo "Status: $status<br>";
        $score = 85;
        $grade = ($score >= 90) ? "A" : (($score >= 80) ? "B" : "C");
        echo "Grade: $grade<br>";
        ?>
    </div>

    <h2>5. Switch Statement</h2>
    <p>Selects one of many blocks to execute</p>
    <div class="example">
        <pre><?php
        $day = "Monday";
        switch ($day) {
            case "Monday":
                echo "Start of work week<br>";
                break;
            case "Friday":
                echo "TGIF!<br>";
                break;
            case "Saturday":
            case "Sunday":
                echo "Weekend!<br>";
                break;
            default:
                echo "Regular weekday<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $day = "Monday";
        switch ($day) {
            case "Monday":
                echo "Start of work week<br>";
                break;
            case "Friday":
                echo "TGIF!<br>";
                break;
            case "Saturday":
            case "Sunday":
                echo "Weekend!<br>";
                break;
            default:
                echo "Regular weekday<br>";
        }
        ?>
    </div>

    <h2>6. Match Expression (PHP 8.0+)</h2>
    <p>Modern alternative to switch (returns a value)</p>
    <div class="example">
        <pre><?php
        $status = 404;
        $message = match ($status) {
            200 => "OK",
            404 => "Not Found",
            500 => "Server Error",
            default => "Unknown Status"
        };
        echo "Status $status: $message<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $status = 404;
        $message = match ($status) {
            200 => "OK",
            404 => "Not Found",
            500 => "Server Error",
            default => "Unknown Status"
        };
        echo "Status $status: $message<br>";
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Use <code>if</code> for simple conditions</li>
        <li>Use <code>if-elseif-else</code> for multiple conditions</li>
        <li>Ternary operator is shorthand for simple if-else</li>
        <li>Use <code>switch</code> when comparing one variable to many values</li>
        <li>Don't forget <code>break</code> in switch statements!</li>
        <li><code>match</code> is modern and returns values</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>

</html>