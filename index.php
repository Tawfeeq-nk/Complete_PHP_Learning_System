<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First PHP Page</title>
</head>

<body>
    <div
        style="background: #667eea; color: white; padding: 30px 20px; text-align: center; margin-bottom: 30px; border-radius: 10px;">
        <h1 style="margin: 0 0 10px 0;">🚀 PHP Backend Learning Hub</h1>
        <p style="margin: 0; font-size: 1.1em; margin-bottom: 20px;">From Zero to Expert Level</p>
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
            <a href="START_HERE.php"
                style="background: white; color: #667eea; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block;">
                📖 Quick Start Guide
            </a>
            <a href="modules/index.php"
                style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block; border: 2px solid white;">
                📚 All Modules
            </a>
            <a href="LEARNING_PATH.md"
                style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; display: inline-block; border: 2px solid white;">
                📍 Learning Path
            </a>
        </div>
    </div>

    <h1>Hello World from PHP!</h1>

    <?php
    echo "Hi, I'm PHP running on the server!<br>";
    echo "Today's date is: " . date('Y-m-d') . "<br>";
    echo "Your name could be here if we had forms... but soon!";
    ?>

    <p>This line is plain HTML.</p>

    <!-- Example of variables and if-else statement -->
    <?php
    // Example of variables
    $title = "example string inside variable";
    $name = "John Doe";
    $age = 20;
    echo "Hello, $title!<br>";
    echo "Your name is: " . $name . "<br>";
    echo "Your age is: " . $age . "<br>";
    ?>


    <?php
    // Example of if-else statement
    echo "<h2>Example of if-else statement:</h2>";
    if ($age >= 18) {
        echo "You are an adult.";
    } else {
        echo "You are a minor.";
    }
    ?>

    <?php
    // Example of for loop
    echo "<h2>Example of for loop:</h2>";
    for ($i = 0; $i < 10; $i++) {
        echo "The number is: " . $i . "<br>";
    }
    ?>

    <?php
    // Example of while loop
    echo "<h2>Example of while loop:</h2>";
    while ($i < 20) {
        echo "<p>The number is: " . $i . "</p>";
        $i++;
    }
    ?>

    <?php
    // Example of do-while loop
    echo "<h2>Example of do-while loop:</h2>";
    do {
        echo "The number is: " . $i . "<br>";
        $i++;
    } while ($i < 30);
    ?>

    <?php
    // Example of foreach loop
    echo "<h2>Example of foreach loop:</h2>";
    $array = array("apple", "banana", "cherry");
    foreach ($array as $value) {
        echo "<p>The fruit is: " . $value . "</p>";
    }
    ?>

    <!-- Example of array -->
    <?php
    echo "<h2>Example of array:</h2>";
    $fruits = array("apple", "banana", "cherry");
    echo "<p>The fruits are: " . implode(", ", $fruits) . "</p>";
    ?>


</body>

</html>