<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 5: Arrays</title>
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
    <h1>Module 5: Arrays</h1>
    
    <h2>1. Indexed Arrays</h2>
    <p>Arrays with numeric indexes (start at 0)</p>
    <div class="example">
        <pre><?php
// Method 1: array() function
$fruits = array("Apple", "Banana", "Cherry");

// Method 2: Short syntax (PHP 5.4+)
$colors = ["Red", "Green", "Blue"];

// Accessing elements
echo "First fruit: " . $fruits[0] . "<br>";
echo "Second color: " . $colors[1] . "<br>";

// Display all
print_r($fruits);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = array("Apple", "Banana", "Cherry");
        $colors = ["Red", "Green", "Blue"];
        echo "First fruit: " . $fruits[0] . "<br>";
        echo "Second color: " . $colors[1] . "<br>";
        echo "<br>All fruits:<br>";
        print_r($fruits);
        ?>
    </div>

    <h2>2. Associative Arrays</h2>
    <p>Arrays with named keys</p>
    <div class="example">
        <pre><?php
$person = [
    "name" => "John",
    "age" => 25,
    "city" => "New York"
];

echo "Name: " . $person["name"] . "<br>";
echo "Age: " . $person["age"] . "<br>";
echo "City: " . $person["city"] . "<br>";

print_r($person);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $person = [
            "name" => "John",
            "age" => 25,
            "city" => "New York"
        ];
        echo "Name: " . $person["name"] . "<br>";
        echo "Age: " . $person["age"] . "<br>";
        echo "City: " . $person["city"] . "<br>";
        echo "<br>Full array:<br>";
        print_r($person);
        ?>
    </div>

    <h2>3. Multidimensional Arrays</h2>
    <p>Arrays containing other arrays</p>
    <div class="example">
        <pre><?php
$students = [
    ["name" => "John", "age" => 20, "grade" => "A"],
    ["name" => "Jane", "age" => 19, "grade" => "B"],
    ["name" => "Bob", "age" => 21, "grade" => "A"]
];

echo "First student: " . $students[0]["name"] . "<br>";
echo "Second student's grade: " . $students[1]["grade"] . "<br>";

// Loop through
foreach ($students as $student) {
    echo $student["name"] . " - Grade: " . $student["grade"] . "<br>";
}
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $students = [
            ["name" => "John", "age" => 20, "grade" => "A"],
            ["name" => "Jane", "age" => 19, "grade" => "B"],
            ["name" => "Bob", "age" => 21, "grade" => "A"]
        ];
        echo "First student: " . $students[0]["name"] . "<br>";
        echo "Second student's grade: " . $students[1]["grade"] . "<br>";
        echo "<br>All students:<br>";
        foreach ($students as $student) {
            echo $student["name"] . " - Grade: " . $student["grade"] . "<br>";
        }
        ?>
    </div>

    <h2>4. Array Functions</h2>
    
    <h3>count() - Get array length</h3>
    <div class="example">
        <pre><?php
$fruits = ["Apple", "Banana", "Cherry"];
echo "Number of fruits: " . count($fruits) . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana", "Cherry"];
        echo "Number of fruits: " . count($fruits) . "<br>";
        ?>
    </div>

    <h3>array_push() - Add element to end</h3>
    <div class="example">
        <pre><?php
$fruits = ["Apple", "Banana"];
array_push($fruits, "Cherry", "Date");
print_r($fruits);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana"];
        array_push($fruits, "Cherry", "Date");
        print_r($fruits);
        ?>
    </div>

    <h3>array_pop() - Remove last element</h3>
    <div class="example">
        <pre><?php
$fruits = ["Apple", "Banana", "Cherry"];
$last = array_pop($fruits);
echo "Removed: $last<br>";
print_r($fruits);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana", "Cherry"];
        $last = array_pop($fruits);
        echo "Removed: $last<br>";
        print_r($fruits);
        ?>
    </div>

    <h3>array_shift() - Remove first element</h3>
    <div class="example">
        <pre><?php
$fruits = ["Apple", "Banana", "Cherry"];
$first = array_shift($fruits);
echo "Removed: $first<br>";
print_r($fruits);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana", "Cherry"];
        $first = array_shift($fruits);
        echo "Removed: $first<br>";
        print_r($fruits);
        ?>
    </div>

    <h3>array_unshift() - Add element to beginning</h3>
    <div class="example">
        <pre><?php
$fruits = ["Banana", "Cherry"];
array_unshift($fruits, "Apple");
print_r($fruits);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Banana", "Cherry"];
        array_unshift($fruits, "Apple");
        print_r($fruits);
        ?>
    </div>

    <h3>in_array() - Check if value exists</h3>
    <div class="example">
        <pre><?php
$fruits = ["Apple", "Banana", "Cherry"];
if (in_array("Banana", $fruits)) {
    echo "Banana is in the array!<br>";
}
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana", "Cherry"];
        if (in_array("Banana", $fruits)) {
            echo "Banana is in the array!<br>";
        }
        ?>
    </div>

    <h3>array_search() - Find key of value</h3>
    <div class="example">
        <pre><?php
$fruits = ["Apple", "Banana", "Cherry"];
$key = array_search("Banana", $fruits);
echo "Banana is at index: $key<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $fruits = ["Apple", "Banana", "Cherry"];
        $key = array_search("Banana", $fruits);
        echo "Banana is at index: $key<br>";
        ?>
    </div>

    <h3>sort() - Sort array</h3>
    <div class="example">
        <pre><?php
$numbers = [3, 1, 4, 1, 5, 9, 2];
sort($numbers);
print_r($numbers);
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $numbers = [3, 1, 4, 1, 5, 9, 2];
        sort($numbers);
        print_r($numbers);
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Indexed arrays use numeric keys (0, 1, 2...)</li>
        <li>Associative arrays use named keys</li>
        <li>Multidimensional arrays contain other arrays</li>
        <li>Many built-in functions for array manipulation</li>
        <li>Use <code>print_r()</code> or <code>var_dump()</code> to debug arrays</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>
</html>
