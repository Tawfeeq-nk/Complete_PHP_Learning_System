<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 1: Variables and Data Types</title>
    <style>
        <body>

        <?php include __DIR__ . '/../_nav_ui.php'; ?>
        <h1>Module 1: Variables and Data Types</h1>h2 {
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
    <h1>Module 1: Variables and Data Types</h1>
    <div
        style="background:#f8f9fa;padding:15px;border-radius:8px;margin-bottom:20px;display:flex;gap:15px;flex-wrap:wrap;align-items:center;">
        <a href="../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Back to Modules</a>
        <span style="color:#ddd;">|</span>
        <a href="exercises.php" style="color:#667eea;text-decoration:none;font-weight:500;">Try Exercises →</a>
        <span style="color:#ddd;">|</span>
        <a href="../../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Home</a>
        <span style="color:#ddd;">|</span>
        <a href="../../projects/index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Projects</a>
    </div>

    <h2>1. What are Variables?</h2>
    <p>Variables are containers that store data. In PHP, variables start with a <code>$</code> sign.</p>

    <div class="example">
        <h3>Example:</h3>
        <pre><?php
        $name = "John";
        $age = 25;
        $price = 19.99;
        $isActive = true;
        ?></pre>
    </div>

    <h2>2. Rules for Variable Names</h2>
    <ul>
        <li>Must start with a letter or underscore (_)</li>
        <li>Can contain letters, numbers, and underscores</li>
        <li>Case-sensitive: <code>$name</code> and <code>$Name</code> are different</li>
        <li>Cannot start with a number</li>
    </ul>

    <h2>3. Data Types in PHP</h2>

    <h3>String</h3>
    <p>Text data enclosed in quotes (single or double)</p>
    <div class="example">
        <pre><?php
        $text1 = "Hello World";  // Double quotes
        $text2 = 'Hello World';  // Single quotes
        echo "String 1: $text1<br>";
        echo "String 2: $text2<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text1 = "Hello World";
        $text2 = 'Hello World';
        echo "String 1: $text1<br>";
        echo "String 2: $text2<br>";
        ?>
    </div>

    <h3>Integer</h3>
    <p>Whole numbers (positive or negative)</p>
    <div class="example">
        <pre><?php
        $age = 25;
        $negative = -10;
        $zero = 0;
        echo "Age: $age<br>";
        echo "Negative: $negative<br>";
        echo "Zero: $zero<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $age = 25;
        $negative = -10;
        $zero = 0;
        echo "Age: $age<br>";
        echo "Negative: $negative<br>";
        echo "Zero: $zero<br>";
        ?>
    </div>

    <h3>Float (Floating Point Number)</h3>
    <p>Decimal numbers</p>
    <div class="example">
        <pre><?php
        $price = 19.99;
        $temperature = -5.5;
        $pi = 3.14159;
        echo "Price: $price<br>";
        echo "Temperature: $temperature<br>";
        echo "Pi: $pi<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $price = 19.99;
        $temperature = -5.5;
        $pi = 3.14159;
        echo "Price: $price<br>";
        echo "Temperature: $temperature<br>";
        echo "Pi: $pi<br>";
        ?>
    </div>

    <h3>Boolean</h3>
    <p>True or False values</p>
    <div class="example">
        <pre><?php
        $isActive = true;
        $isLoggedIn = false;
        var_dump($isActive);    // Shows: bool(true)
        var_dump($isLoggedIn);  // Shows: bool(false)
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $isActive = true;
        $isLoggedIn = false;
        var_dump($isActive);
        echo "<br>";
        var_dump($isLoggedIn);
        ?>
    </div>

    <h3>NULL</h3>
    <p>Represents a variable with no value</p>
    <div class="example">
        <pre><?php
        $data = null;
        var_dump($data);  // Shows: NULL
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $data = null;
        var_dump($data);
        ?>
    </div>

    <h2>4. Checking Data Types</h2>
    <p>Use <code>var_dump()</code> or <code>gettype()</code> to check variable types</p>
    <div class="example">
        <pre><?php
        $name = "John";
        $age = 25;
        $price = 19.99;
        $isActive = true;

        echo "Type of \$name: " . gettype($name) . "<br>";
        echo "Type of \$age: " . gettype($age) . "<br>";
        echo "Type of \$price: " . gettype($price) . "<br>";
        echo "Type of \$isActive: " . gettype($isActive) . "<br>";

        echo "<br>Using var_dump():<br>";
        var_dump($name);
        echo "<br>";
        var_dump($age);
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $name = "John";
        $age = 25;
        $price = 19.99;
        $isActive = true;

        echo "Type of \$name: " . gettype($name) . "<br>";
        echo "Type of \$age: " . gettype($age) . "<br>";
        echo "Type of \$price: " . gettype($price) . "<br>";
        echo "Type of \$isActive: " . gettype($isActive) . "<br>";

        echo "<br>Using var_dump():<br>";
        var_dump($name);
        echo "<br>";
        var_dump($age);
        ?>
    </div>

    <h2>5. Variable Variable Names</h2>
    <p>You can use a variable's value as another variable's name</p>
    <div class="example">
        <pre><?php
        $fruit = "apple";
        $$fruit = "red";  // Creates $apple = "red"
        
        echo "Fruit: $fruit<br>";
        echo "Apple color: $apple<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruit = "apple";
        $$fruit = "red";
        echo "Fruit: $fruit<br>";
        echo "Apple color: $apple<br>";
        ?>
    </div>

    <h2>6. Constants</h2>
    <p>Constants are values that cannot be changed once defined. Use <code>define()</code> or <code>const</code></p>
    <div class="example">
        <pre><?php
        define("PI", 3.14159);
        define("SITE_NAME", "My Website");

        const MAX_USERS = 100;

        echo "PI: " . PI . "<br>";
        echo "Site Name: " . SITE_NAME . "<br>";
        echo "Max Users: " . MAX_USERS . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        define("PI", 3.14159);
        define("SITE_NAME", "My Website");
        const MAX_USERS = 100;
        echo "PI: " . PI . "<br>";
        echo "Site Name: " . SITE_NAME . "<br>";
        echo "Max Users: " . MAX_USERS . "<br>";
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Variables store data and start with <code>$</code></li>
        <li>PHP has 8 data types: String, Integer, Float, Boolean, Array, Object, NULL, Resource</li>
        <li>PHP is loosely typed - you don't need to declare types</li>
        <li>Use <code>var_dump()</code> or <code>gettype()</code> to check types</li>
        <li>Constants are defined with <code>define()</code> or <code>const</code></li>
    </ul>

    <div style="margin-top:40px;padding-top:20px;border-top:2px solid #ddd;">
        <p style="color:#666;">
            <a href="../index.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Back to Modules</a> |
            <a href="exercises.php" style="color:#667eea;text-decoration:none;font-weight:500;">Try Exercises →</a> |
            <a href="../../START_HERE.php" style="color:#667eea;text-decoration:none;font-weight:500;">Dashboard</a>
        </p>
    </div>
</body>

</html>