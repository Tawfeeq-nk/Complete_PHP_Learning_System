<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 7: Strings</title>
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
    <h1>Module 7: Strings</h1>
    
    <h2>1. String Creation</h2>
    <p>Strings can be created with single or double quotes</p>
    <div class="example">
        <pre><?php
$single = 'Single quotes';
$double = "Double quotes";

echo $single . "<br>";
echo $double . "<br>";

// Difference: variables are parsed in double quotes
$name = "John";
echo "Hello, $name<br>";  // Works
echo 'Hello, $name<br>';  // Literal $name
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $single = 'Single quotes';
        $double = "Double quotes";
        echo $single . "<br>";
        echo $double . "<br>";
        $name = "John";
        echo "Hello, $name<br>";
        echo 'Hello, $name<br>';
        ?>
    </div>

    <h2>2. String Concatenation</h2>
    <p>Join strings with <code>.</code> operator</p>
    <div class="example">
        <pre><?php
$first = "Hello";
$second = "World";
$combined = $first . " " . $second;
echo $combined . "<br>";

// Concatenation assignment
$greeting = "Hi";
$greeting .= " there!";
echo $greeting . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $first = "Hello";
        $second = "World";
        $combined = $first . " " . $second;
        echo $combined . "<br>";
        $greeting = "Hi";
        $greeting .= " there!";
        echo $greeting . "<br>";
        ?>
    </div>

    <h2>3. String Length</h2>
    <p>Get string length with <code>strlen()</code></p>
    <div class="example">
        <pre><?php
$text = "Hello World";
echo "Length: " . strlen($text) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "Hello World";
        echo "Length: " . strlen($text) . "<br>";
        ?>
    </div>

    <h2>4. String Functions</h2>
    
    <h3>strtolower() - Convert to lowercase</h3>
    <div class="example">
        <pre><?php
$text = "HELLO WORLD";
echo strtolower($text) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "HELLO WORLD";
        echo strtolower($text) . "<br>";
        ?>
    </div>

    <h3>strtoupper() - Convert to uppercase</h3>
    <div class="example">
        <pre><?php
$text = "hello world";
echo strtoupper($text) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "hello world";
        echo strtoupper($text) . "<br>";
        ?>
    </div>

    <h3>ucfirst() - First letter uppercase</h3>
    <div class="example">
        <pre><?php
$text = "hello world";
echo ucfirst($text) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "hello world";
        echo ucfirst($text) . "<br>";
        ?>
    </div>

    <h3>ucwords() - Each word capitalized</h3>
    <div class="example">
        <pre><?php
$text = "hello world";
echo ucwords($text) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "hello world";
        echo ucwords($text) . "<br>";
        ?>
    </div>

    <h3>trim() - Remove whitespace</h3>
    <div class="example">
        <pre><?php
$text = "  Hello World  ";
echo "Before: '$text'<br>";
echo "After: '" . trim($text) . "'<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "  Hello World  ";
        echo "Before: '$text'<br>";
        echo "After: '" . trim($text) . "'<br>";
        ?>
    </div>

    <h3>substr() - Extract substring</h3>
    <div class="example">
        <pre><?php
$text = "Hello World";
echo substr($text, 0, 5) . "<br>";  // "Hello"
echo substr($text, 6) . "<br>";     // "World"
echo substr($text, 0, -6) . "<br>"; // "Hello"
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "Hello World";
        echo substr($text, 0, 5) . "<br>";
        echo substr($text, 6) . "<br>";
        echo substr($text, 0, -6) . "<br>";
        ?>
    </div>

    <h3>str_replace() - Replace text</h3>
    <div class="example">
        <pre><?php
$text = "Hello World";
$newText = str_replace("World", "PHP", $text);
echo $newText . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "Hello World";
        $newText = str_replace("World", "PHP", $text);
        echo $newText . "<br>";
        ?>
    </div>

    <h3>explode() - Split string into array</h3>
    <div class="example">
        <pre><?php
$text = "apple,banana,cherry";
$fruits = explode(",", $text);
print_r($fruits);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "apple,banana,cherry";
        $fruits = explode(",", $text);
        print_r($fruits);
        ?>
    </div>

    <h3>implode() - Join array into string</h3>
    <div class="example">
        <pre><?php
$fruits = ["apple", "banana", "cherry"];
$text = implode(", ", $fruits);
echo $text . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["apple", "banana", "cherry"];
        $text = implode(", ", $fruits);
        echo $text . "<br>";
        ?>
    </div>

    <h3>strpos() - Find position</h3>
    <div class="example">
        <pre><?php
$text = "Hello World";
$pos = strpos($text, "World");
echo "Position of 'World': $pos<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "Hello World";
        $pos = strpos($text, "World");
        echo "Position of 'World': $pos<br>";
        ?>
    </div>

    <h3>str_contains() - Check if contains (PHP 8.0+)</h3>
    <div class="example">
        <pre><?php
$text = "Hello World";
if (str_contains($text, "World")) {
    echo "Text contains 'World'<br>";
}
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $text = "Hello World";
        if (str_contains($text, "World")) {
            echo "Text contains 'World'<br>";
        }
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Single quotes: literal text, no variable parsing</li>
        <li>Double quotes: variables are parsed</li>
        <li>Use <code>.</code> to concatenate strings</li>
        <li>Many built-in functions for string manipulation</li>
        <li><code>explode()</code> splits, <code>implode()</code> joins</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>
</html>
