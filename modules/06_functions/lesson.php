<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 6: Functions</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        h1 { color: #333; }
        h2 { color: #666; margin-top: 30px; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .example { background: #e8f4f8; padding: 15px; margin: 15px 0; border-left: 4px solid #2196F3; }
    </style>
</head>
<body>
    <h1>Module 6: Functions</h1>
    
    <h2>1. Basic Function</h2>
    <p>Functions are reusable blocks of code</p>
    <div class="example">
        <pre><?php
function greet() {
    echo "Hello, World!<br>";
}

greet(); // Call the function
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function greet() {
            echo "Hello, World!<br>";
        }
        greet();
        ?>
    </div>

    <h2>2. Function with Parameters</h2>
    <p>Functions can accept input values</p>
    <div class="example">
        <pre><?php
function greetPerson($name) {
    echo "Hello, $name!<br>";
}

greetPerson("John");
greetPerson("Jane");
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function greetPerson($name) {
            echo "Hello, $name!<br>";
        }
        greetPerson("John");
        greetPerson("Jane");
        ?>
    </div>

    <h2>3. Function with Multiple Parameters</h2>
    <div class="example">
        <pre><?php
function add($a, $b) {
    return $a + $b;
}

$result = add(5, 3);
echo "5 + 3 = $result<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function add($a, $b) {
            return $a + $b;
        }
        $result = add(5, 3);
        echo "5 + 3 = $result<br>";
        ?>
    </div>

    <h2>4. Return Values</h2>
    <p>Functions can return values using <code>return</code></p>
    <div class="example">
        <pre><?php
function multiply($a, $b) {
    return $a * $b;
}

$product = multiply(4, 5);
echo "4 × 5 = $product<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function multiply($a, $b) {
            return $a * $b;
        }
        $product = multiply(4, 5);
        echo "4 × 5 = $product<br>";
        ?>
    </div>

    <h2>5. Default Parameter Values</h2>
    <p>Parameters can have default values</p>
    <div class="example">
        <pre><?php
function greetWithDefault($name = "Guest") {
    echo "Hello, $name!<br>";
}

greetWithDefault("John");
greetWithDefault(); // Uses default
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function greetWithDefault($name = "Guest") {
            echo "Hello, $name!<br>";
        }
        greetWithDefault("John");
        greetWithDefault();
        ?>
    </div>

    <h2>6. Type Declarations</h2>
    <p>Specify expected types for parameters and return values</p>
    <div class="example">
        <pre><?php
function addNumbers(int $a, int $b): int {
    return $a + $b;
}

echo addNumbers(5, 3) . "<br>";

function getFullName(string $first, string $last): string {
    return "$first $last";
}

echo getFullName("John", "Doe") . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function addNumbers(int $a, int $b): int {
            return $a + $b;
        }
        echo addNumbers(5, 3) . "<br>";
        function getFullName(string $first, string $last): string {
            return "$first $last";
        }
        echo getFullName("John", "Doe") . "<br>";
        ?>
    </div>

    <h2>7. Variable Scope</h2>
    <p>Variables inside functions are local by default</p>
    <div class="example">
        <pre><?php
$globalVar = "I'm global";

function testScope() {
    $localVar = "I'm local";
    echo "Inside function: $localVar<br>";
    // echo $globalVar; // Error - not accessible
}

testScope();
echo "Outside function: $globalVar<br>";
// echo $localVar; // Error - not accessible
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $globalVar = "I'm global";
        function testScope() {
            $localVar = "I'm local";
            echo "Inside function: $localVar<br>";
        }
        testScope();
        echo "Outside function: $globalVar<br>";
        ?>
    </div>

    <h2>8. Global Variables</h2>
    <p>Use <code>global</code> keyword to access global variables</p>
    <div class="example">
        <pre><?php
$count = 0;

function increment() {
    global $count;
    $count++;
}

increment();
increment();
echo "Count: $count<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $count = 0;
        function increment() {
            global $count;
            $count++;
        }
        increment();
        increment();
        echo "Count: $count<br>";
        ?>
    </div>

    <h2>9. Anonymous Functions (Closures)</h2>
    <p>Functions without a name</p>
    <div class="example">
        <pre><?php
$greet = function($name) {
    return "Hello, $name!";
};

echo $greet("John") . "<br>";

// Arrow function (PHP 7.4+)
$add = fn($a, $b) => $a + $b;
echo "5 + 3 = " . $add(5, 3) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $greet = function($name) {
            return "Hello, $name!";
        };
        echo $greet("John") . "<br>";
        $add = fn($a, $b) => $a + $b;
        echo "5 + 3 = " . $add(5, 3) . "<br>";
        ?>
    </div>

    <h2>10. Recursive Functions</h2>
    <p>Functions that call themselves</p>
    <div class="example">
        <pre><?php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

echo "Factorial of 5: " . factorial(5) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        function factorial($n) {
            if ($n <= 1) {
                return 1;
            }
            return $n * factorial($n - 1);
        }
        echo "Factorial of 5: " . factorial(5) . "<br>";
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Functions make code reusable and organized</li>
        <li>Use parameters to pass data into functions</li>
        <li>Use <code>return</code> to send data back</li>
        <li>Default parameters provide flexibility</li>
        <li>Type declarations improve code safety</li>
        <li>Variables are local to functions unless declared <code>global</code></li>
        <li>Recursive functions solve problems by calling themselves</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>
</html>
