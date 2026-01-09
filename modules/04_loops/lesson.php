<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 4: Loops</title>
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
    <h1>Module 4: Loops</h1>

    <h2>1. For Loop</h2>
    <p>Repeats code a specific number of times</p>
    <p><strong>Syntax:</strong> <code>for (init; condition; increment) { code }</code></p>
    <div class="example">
        <pre><?php
        // Count from 1 to 5
        for ($i = 1; $i <= 5; $i++) {
            echo "Number: $i<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        for ($i = 1; $i <= 5; $i++) {
            echo "Number: $i<br>";
        }
        ?>
    </div>

    <div class="example">
        <h3>Countdown Example:</h3>
        <pre><?php
        for ($i = 10; $i >= 1; $i--) {
            echo "$i... ";
        }
        echo "Blast off!<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        for ($i = 10; $i >= 1; $i--) {
            echo "$i... ";
        }
        echo "Blast off!<br>";
        ?>
    </div>

    <h2>2. While Loop</h2>
    <p>Repeats code while condition is true</p>
    <p><strong>Syntax:</strong> <code>while (condition) { code }</code></p>
    <div class="example">
        <pre><?php
        $count = 1;
        while ($count <= 5) {
            echo "Count: $count<br>";
            $count++;
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $count = 1;
        while ($count <= 5) {
            echo "Count: $count<br>";
            $count++;
        }
        ?>
    </div>

    <h2>3. Do-While Loop</h2>
    <p>Executes code at least once, then repeats while condition is true</p>
    <p><strong>Syntax:</strong> <code>do { code } while (condition);</code></p>
    <div class="example">
        <pre><?php
        $num = 1;
        do {
            echo "Number: $num<br>";
            $num++;
        } while ($num <= 3);
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $num = 1;
        do {
            echo "Number: $num<br>";
            $num++;
        } while ($num <= 3);
        ?>
    </div>

    <h2>4. Foreach Loop</h2>
    <p>Iterates over arrays (most common for arrays)</p>
    <p><strong>Syntax:</strong> <code>foreach ($array as $value) { code }</code></p>
    <div class="example">
        <pre><?php
        $fruits = ["Apple", "Banana", "Cherry"];
        foreach ($fruits as $fruit) {
            echo "Fruit: $fruit<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana", "Cherry"];
        foreach ($fruits as $fruit) {
            echo "Fruit: $fruit<br>";
        }
        ?>
    </div>

    <div class="example">
        <h3>Foreach with Keys:</h3>
        <pre><?php
        $person = [
            "name" => "John",
            "age" => 25,
            "city" => "New York"
        ];
        foreach ($person as $key => $value) {
            echo "$key: $value<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $person = [
            "name" => "John",
            "age" => 25,
            "city" => "New York"
        ];
        foreach ($person as $key => $value) {
            echo "$key: $value<br>";
        }
        ?>
    </div>

    <h2>5. Loop Control: Break</h2>
    <p>Exits the loop immediately</p>
    <div class="example">
        <pre><?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i == 5) {
                break; // Exit loop when $i is 5
            }
            echo "$i ";
        }
        echo "<br>Loop ended at 5<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i == 5) {
                break;
            }
            echo "$i ";
        }
        echo "<br>Loop ended at 5<br>";
        ?>
    </div>

    <h2>6. Loop Control: Continue</h2>
    <p>Skips the rest of current iteration and continues to next</p>
    <div class="example">
        <pre><?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i % 2 == 0) {
                continue; // Skip even numbers
            }
            echo "$i "; // Only odd numbers printed
        }
        echo "<br>Only odd numbers printed<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            if ($i % 2 == 0) {
                continue;
            }
            echo "$i ";
        }
        echo "<br>Only odd numbers printed<br>";
        ?>
    </div>

    <h2>7. Nested Loops</h2>
    <p>Loop inside another loop</p>
    <div class="example">
        <pre><?php
        // Multiplication table
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                echo "$i x $j = " . ($i * $j) . " | ";
            }
            echo "<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                echo "$i x $j = " . ($i * $j) . " | ";
            }
            echo "<br>";
        }
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li><code>for</code> - Use when you know how many times to loop</li>
        <li><code>while</code> - Use when condition might be false from start</li>
        <li><code>do-while</code> - Use when you need to execute at least once</li>
        <li><code>foreach</code> - Best for iterating arrays</li>
        <li><code>break</code> - Exit loop early</li>
        <li><code>continue</code> - Skip to next iteration</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>

</html>