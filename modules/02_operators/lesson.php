<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 2: Operators</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #2196F3;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Module 2: Operators</h1>
    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>

    <h2>1. Arithmetic Operators</h2>
    <p>Used for mathematical operations</p>
    <table>
        <tr>
            <th>Operator</th>
            <th>Name</th>
            <th>Example</th>
        </tr>
        <tr>
            <td><code>+</code></td>
            <td>Addition</td>
            <td><code>$a + $b</code></td>
        </tr>
        <tr>
            <td><code>-</code></td>
            <td>Subtraction</td>
            <td><code>$a - $b</code></td>
        </tr>
        <tr>
            <td><code>*</code></td>
            <td>Multiplication</td>
            <td><code>$a * $b</code></td>
        </tr>
        <tr>
            <td><code>/</code></td>
            <td>Division</td>
            <td><code>$a / $b</code></td>
        </tr>
        <tr>
            <td><code>%</code></td>
            <td>Modulus (remainder)</td>
            <td><code>$a % $b</code></td>
        </tr>
        <tr>
            <td><code>**</code></td>
            <td>Exponentiation</td>
            <td><code>$a ** $b</code></td>
        </tr>
    </table>

    <div class="example">
        <h3>Example:</h3>
        <pre><?php
        $a = 10;
        $b = 3;

        echo "$a + $b = " . ($a + $b) . "<br>";
        echo "$a - $b = " . ($a - $b) . "<br>";
        echo "$a * $b = " . ($a * $b) . "<br>";
        echo "$a / $b = " . ($a / $b) . "<br>";
        echo "$a % $b = " . ($a % $b) . "<br>";
        echo "$a ** $b = " . ($a ** $b) . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $a = 10;
        $b = 3;
        echo "$a + $b = " . ($a + $b) . "<br>";
        echo "$a - $b = " . ($a - $b) . "<br>";
        echo "$a * $b = " . ($a * $b) . "<br>";
        echo "$a / $b = " . ($a / $b) . "<br>";
        echo "$a % $b = " . ($a % $b) . "<br>";
        echo "$a ** $b = " . ($a ** $b) . "<br>";
        ?>
    </div>

    <h2>2. Assignment Operators</h2>
    <p>Used to assign values to variables</p>
    <table>
        <tr>
            <th>Operator</th>
            <th>Equivalent To</th>
            <th>Example</th>
        </tr>
        <tr>
            <td><code>=</code></td>
            <td>-</td>
            <td><code>$a = 5</code></td>
        </tr>
        <tr>
            <td><code>+=</code></td>
            <td><code>$a = $a + $b</code></td>
            <td><code>$a += $b</code></td>
        </tr>
        <tr>
            <td><code>-=</code></td>
            <td><code>$a = $a - $b</code></td>
            <td><code>$a -= $b</code></td>
        </tr>
        <tr>
            <td><code>*=</code></td>
            <td><code>$a = $a * $b</code></td>
            <td><code>$a *= $b</code></td>
        </tr>
        <tr>
            <td><code>/=</code></td>
            <td><code>$a = $a / $b</code></td>
            <td><code>$a /= $b</code></td>
        </tr>
        <tr>
            <td><code>%=</code></td>
            <td><code>$a = $a % $b</code></td>
            <td><code>$a %= $b</code></td>
        </tr>
    </table>

    <div class="example">
        <h3>Example:</h3>
        <pre><?php
        $x = 10;
        echo "Initial: $x<br>";

        $x += 5;  // $x = $x + 5
        echo "After += 5: $x<br>";

        $x -= 3;  // $x = $x - 3
        echo "After -= 3: $x<br>";

        $x *= 2;  // $x = $x * 2
        echo "After *= 2: $x<br>";

        $x /= 4;  // $x = $x / 4
        echo "After /= 4: $x<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $x = 10;
        echo "Initial: $x<br>";
        $x += 5;
        echo "After += 5: $x<br>";
        $x -= 3;
        echo "After -= 3: $x<br>";
        $x *= 2;
        echo "After *= 2: $x<br>";
        $x /= 4;
        echo "After /= 4: $x<br>";
        ?>
    </div>

    <h2>3. Comparison Operators</h2>
    <p>Used to compare two values (returns true or false)</p>
    <table>
        <tr>
            <th>Operator</th>
            <th>Name</th>
            <th>Example</th>
        </tr>
        <tr>
            <td><code>==</code></td>
            <td>Equal (value)</td>
            <td><code>$a == $b</code></td>
        </tr>
        <tr>
            <td><code>===</code></td>
            <td>Identical (value and type)</td>
            <td><code>$a === $b</code></td>
        </tr>
        <tr>
            <td><code>!=</code> or <code><></code></td>
            <td>Not equal</td>
            <td><code>$a != $b</code></td>
        </tr>
        <tr>
            <td><code>!==</code></td>
            <td>Not identical</td>
            <td><code>$a !== $b</code></td>
        </tr>
        <tr>
            <td><code><</code></td>
            <td>Less than</td>
            <td><code>$a < $b</code></td>
        </tr>
        <tr>
            <td><code>></code></td>
            <td>Greater than</td>
            <td><code>$a > $b</code></td>
        </tr>
        <tr>
            <td><code><=</code></td>
            <td>Less than or equal</td>
            <td><code>$a <= $b</code></td>
        </tr>
        <tr>
            <td><code>>=</code></td>
            <td>Greater than or equal</td>
            <td><code>$a >= $b</code></td>
        </tr>
    </table>

    <div class="example">
        <h3>Example:</h3>
        <pre><?php
        $a = 5;
        $b = "5";
        $c = 10;

        var_dump($a == $b);   // true (same value)
        var_dump($a === $b);  // false (different types)
        var_dump($a != $b);   // false
        var_dump($a !== $b);  // true
        var_dump($a < $c);    // true
        var_dump($a > $c);    // false
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $a = 5;
        $b = "5";
        $c = 10;
        var_dump($a == $b);
        echo "<br>";
        var_dump($a === $b);
        echo "<br>";
        var_dump($a != $b);
        echo "<br>";
        var_dump($a !== $b);
        echo "<br>";
        var_dump($a < $c);
        echo "<br>";
        var_dump($a > $c);
        ?>
    </div>

    <h2>4. Logical Operators</h2>
    <p>Used to combine conditional statements</p>
    <table>
        <tr>
            <th>Operator</th>
            <th>Name</th>
            <th>Example</th>
        </tr>
        <tr>
            <td><code>and</code> or <code>&&</code></td>
            <td>And</td>
            <td><code>$a && $b</code></td>
        </tr>
        <tr>
            <td><code>or</code> or <code>||</code></td>
            <td>Or</td>
            <td><code>$a || $b</code></td>
        </tr>
        <tr>
            <td><code>xor</code></td>
            <td>Xor (exclusive or)</td>
            <td><code>$a xor $b</code></td>
        </tr>
        <tr>
            <td><code>!</code></td>
            <td>Not</td>
            <td><code>!$a</code></td>
        </tr>
    </table>

    <div class="example">
        <h3>Example:</h3>
        <pre><?php
        $age = 25;
        $hasLicense = true;

        // AND operator
        if ($age >= 18 && $hasLicense) {
            echo "Can drive<br>";
        }

        // OR operator
        if ($age < 18 || !$hasLicense) {
            echo "Cannot drive<br>";
        }

        // NOT operator
        $isMinor = !($age >= 18);
        echo "Is minor: " . ($isMinor ? 'true' : 'false') . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $age = 25;
        $hasLicense = true;
        if ($age >= 18 && $hasLicense) {
            echo "Can drive<br>";
        }
        if ($age < 18 || !$hasLicense) {
            echo "Cannot drive<br>";
        }
        $isMinor = !($age >= 18);
        echo "Is minor: " . ($isMinor ? 'true' : 'false') . "<br>";
        ?>
    </div>

    <h2>5. Increment/Decrement Operators</h2>
    <table>
        <tr>
            <th>Operator</th>
            <th>Name</th>
            <th>Example</th>
        </tr>
        <tr>
            <td><code>++$a</code></td>
            <td>Pre-increment</td>
            <td>Increments then returns</td>
        </tr>
        <tr>
            <td><code>$a++</code></td>
            <td>Post-increment</td>
            <td>Returns then increments</td>
        </tr>
        <tr>
            <td><code>--$a</code></td>
            <td>Pre-decrement</td>
            <td>Decrements then returns</td>
        </tr>
        <tr>
            <td><code>$a--</code></td>
            <td>Post-decrement</td>
            <td>Returns then decrements</td>
        </tr>
    </table>

    <div class="example">
        <h3>Example:</h3>
        <pre><?php
        $a = 5;
        echo "Initial: $a<br>";

        $b = ++$a;  // Pre-increment: $a becomes 6, then $b = 6
        echo "After ++\$a: a=$a, b=$b<br>";

        $c = $a++;  // Post-increment: $c = 6, then $a becomes 7
        echo "After \$a++: a=$a, c=$c<br>";

        $d = --$a;  // Pre-decrement: $a becomes 6, then $d = 6
        echo "After --\$a: a=$a, d=$d<br>";

        $e = $a--;  // Post-decrement: $e = 6, then $a becomes 5
        echo "After \$a--: a=$a, e=$e<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $a = 5;
        echo "Initial: $a<br>";
        $b = ++$a;
        echo "After ++\$a: a=$a, b=$b<br>";
        $c = $a++;
        echo "After \$a++: a=$a, c=$c<br>";
        $d = --$a;
        echo "After --\$a: a=$a, d=$d<br>";
        $e = $a--;
        echo "After \$a--: a=$a, e=$e<br>";
        ?>
    </div>

    <h2>6. String Operators</h2>
    <p>Used to concatenate strings</p>
    <div class="example">
        <pre><?php
        $firstName = "John";
        $lastName = "Doe";

        // Concatenation operator
        $fullName = $firstName . " " . $lastName;
        echo "Full Name: $fullName<br>";

        // Concatenation assignment
        $greeting = "Hello, ";
        $greeting .= $fullName;
        echo "$greeting<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $firstName = "John";
        $lastName = "Doe";
        $fullName = $firstName . " " . $lastName;
        echo "Full Name: $fullName<br>";
        $greeting = "Hello, ";
        $greeting .= $fullName;
        echo "$greeting<br>";
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Arithmetic operators perform math operations</li>
        <li>Assignment operators assign and modify values</li>
        <li><code>==</code> compares values, <code>===</code> compares values AND types</li>
        <li>Logical operators combine conditions</li>
        <li>Increment/decrement can be pre or post</li>
        <li>Use <code>.</code> to concatenate strings</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>

</html>