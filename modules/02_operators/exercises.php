<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 2: Exercises</title>
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
    <h1>Module 2: Operators - Exercises</h1>
    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>

    <div class="exercise">
        <h2>Exercise 1: Calculate Total Price</h2>
        <p>Given: price = 25.50, quantity = 3, tax = 0.10 (10%)</p>
        <p>Calculate: subtotal, tax amount, and total price</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $price = 25.50;
        $quantity = 3;
        $taxRate = 0.10;

        $subtotal = $price * $quantity;
        $taxAmount = $subtotal * $taxRate;
        $total = $subtotal + $taxAmount;

        echo "Price per item: $$price<br>";
        echo "Quantity: $quantity<br>";
        echo "Subtotal: $$subtotal<br>";
        echo "Tax (10%): $$taxAmount<br>";
        echo "Total: $$total<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $price = 25.50;
        $quantity = 3;
        $taxRate = 0.10;
        $subtotal = $price * $quantity;
        $taxAmount = $subtotal * $taxRate;
        $total = $subtotal + $taxAmount;
        echo "Price per item: $$price<br>";
        echo "Quantity: $quantity<br>";
        echo "Subtotal: $$subtotal<br>";
        echo "Tax (10%): $$taxAmount<br>";
        echo "Total: $$total<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Comparison Operators</h2>
        <p>Compare: $a = 5, $b = "5", $c = 10</p>
        <p>Check: $a == $b, $a === $b, $a < $c, $a>= $c</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
        $a = 5;
        $b = "5";
        $c = 10;

        echo "\$a == \$b: " . ($a == $b ? 'true' : 'false') . "<br>";
        echo "\$a === \$b: " . ($a === $b ? 'true' : 'false') . "<br>";
        echo "\$a < \$c: " . ($a < $c ? 'true' : 'false') . "<br>";
        echo "\$a >= \$c: " . ($a >= $c ? 'true' : 'false') . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $a = 5;
        $b = "5";
        $c = 10;
        echo "\$a == \$b: " . ($a == $b ? 'true' : 'false') . "<br>";
        echo "\$a === \$b: " . ($a === $b ? 'true' : 'false') . "<br>";
        echo "\$a < \$c: " . ($a < $c ? 'true' : 'false') . "<br>";
        echo "\$a >= \$c: " . ($a >= $c ? 'true' : 'false') . "<br>";
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>