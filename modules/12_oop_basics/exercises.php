<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 12: Exercises</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .exercise { background: #fff3cd; padding: 15px; margin: 15px 0; border-left: 4px solid #ffc107; }
        .solution { background: #d4edda; padding: 15px; margin: 15px 0; border-left: 4px solid #28a745; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Module 12: OOP Basics - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Create a Book Class</h2>
        <p>Create a Book class with title, author, and price. Add a method to display book info.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
class Book {
    public $title;
    public $author;
    public $price;
    
    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }
    
    public function getInfo() {
        return "$this->title by $this->author - $$this->price";
    }
}

$book = new Book("PHP Guide", "John Doe", 29.99);
echo $book->getInfo() . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class Book {
            public $title;
            public $author;
            public $price;
            
            public function __construct($title, $author, $price) {
                $this->title = $title;
                $this->author = $author;
                $this->price = $price;
            }
            
            public function getInfo() {
                return "$this->title by $this->author - $$this->price";
            }
        }
        
        $book = new Book("PHP Guide", "John Doe", 29.99);
        echo $book->getInfo() . "<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Rectangle Class</h2>
        <p>Create a Rectangle class with width and height. Add methods to calculate area and perimeter.</p>
    </div>

    <div class="solution">
        <h3>Solution:</h3>
        <pre><?php
class Rectangle {
    public $width;
    public $height;
    
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    
    public function getArea() {
        return $this->width * $this->height;
    }
    
    public function getPerimeter() {
        return 2 * ($this->width + $this->height);
    }
}

$rect = new Rectangle(5, 3);
echo "Area: " . $rect->getArea() . "<br>";
echo "Perimeter: " . $rect->getPerimeter() . "<br>";
?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class Rectangle {
            public $width;
            public $height;
            
            public function __construct($width, $height) {
                $this->width = $width;
                $this->height = $height;
            }
            
            public function getArea() {
                return $this->width * $this->height;
            }
            
            public function getPerimeter() {
                return 2 * ($this->width + $this->height);
            }
        }
        
        $rect = new Rectangle(5, 3);
        echo "Area: " . $rect->getArea() . "<br>";
        echo "Perimeter: " . $rect->getPerimeter() . "<br>";
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>
</html>
