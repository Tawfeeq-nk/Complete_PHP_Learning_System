<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 4: Exercises</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .exercise { background: #fff3cd; padding: 15px; margin: 15px 0; border-left: 4px solid #ffc107; }
        .solution { background: #d4edda; padding: 15px; margin: 15px 0; border-left: 4px solid #28a745; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Module 4: Loops - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Sum of Numbers</h2>
        <p>Use a for loop to calculate the sum of numbers from 1 to 10</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
$sum = 0;
for ($i = 1; $i <= 10; $i++) {
    $sum += $i;
}
echo "Sum of 1 to 10: $sum<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $sum = 0;
        for ($i = 1; $i <= 10; $i++) {
            $sum += $i;
        }
        echo "Sum of 1 to 10: $sum<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Print Even Numbers</h2>
        <p>Use a while loop to print even numbers from 2 to 20</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
$num = 2;
while ($num <= 20) {
    echo "$num ";
    $num += 2;
}
echo "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $num = 2;
        while ($num <= 20) {
            echo "$num ";
            $num += 2;
        }
        echo "<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 3: Array Iteration</h2>
        <p>Use foreach to display all items in an array with their index</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
$colors = ["Red", "Green", "Blue", "Yellow"];
foreach ($colors as $index => $color) {
    echo "Index $index: $color<br>";
}
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $colors = ["Red", "Green", "Blue", "Yellow"];
        foreach ($colors as $index => $color) {
            echo "Index $index: $color<br>";
        }
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>
</html>
