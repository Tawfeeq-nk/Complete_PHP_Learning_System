`
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 12: OOP Basics</title>
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
    <h1>Module 12: Object-Oriented Programming (OOP) Basics</h1>

    <h2>1. Classes and Objects</h2>
    <p>A class is a blueprint, an object is an instance of that class</p>
    <div class="example">
        <pre><?php
        class Person
        {
            // Properties (attributes)
            public $name;
            public $age;

            // Method (function)
            public function introduce()
            {
                return "Hi, I'm $this->name and I'm $this->age years old.";
            }
        }

        // Create objects (instances)
        $person1 = new Person();
        $person1->name = "John";
        $person1->age = 25;
        echo $person1->introduce() . "<br>";

        $person2 = new Person();
        $person2->name = "Jane";
        $person2->age = 30;
        echo $person2->introduce() . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class Person
        {
            public $name;
            public $age;

            public function introduce()
            {
                return "Hi, I'm $this->name and I'm $this->age years old.";
            }
        }

        $person1 = new Person();
        $person1->name = "John";
        $person1->age = 25;
        echo $person1->introduce() . "<br>";

        $person2 = new Person();
        $person2->name = "Jane";
        $person2->age = 30;
        echo $person2->introduce() . "<br>";
        ?>
    </div>

    <h2>2. Constructor</h2>
    <p>Special method called when object is created</p>
    <div class="example">
        <pre><?php
        class Car
        {
            public $brand;
            public $model;

            // Constructor
            public function __construct($brand, $model)
            {
                $this->brand = $brand;
                $this->model = $model;
            }

            public function getInfo()
            {
                return "$this->brand $this->model";
            }
        }

        $car = new Car("Toyota", "Camry");
        echo $car->getInfo() . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class Car
        {
            public $brand;
            public $model;

            public function __construct($brand, $model)
            {
                $this->brand = $brand;
                $this->model = $model;
            }

            public function getInfo()
            {
                return "$this->brand $this->model";
            }
        }

        $car = new Car("Toyota", "Camry");
        echo $car->getInfo() . "<br>";
        ?>
    </div>

    <h2>3. Visibility Modifiers</h2>
    <ul>
        <li><code>public</code> - Accessible everywhere</li>
        <li><code>private</code> - Only accessible within the class</li>
        <li><code>protected</code> - Accessible within class and child classes</li>
    </ul>
    <div class="example">
        <pre><?php
        class BankAccount
        {
            private $balance = 0;

            public function deposit($amount)
            {
                if ($amount > 0) {
                    $this->balance += $amount;
                }
            }

            public function getBalance()
            {
                return $this->balance;
            }
        }

        $account = new BankAccount();
        $account->deposit(100);
        echo "Balance: $" . $account->getBalance() . "<br>";
        // echo $account->balance; // Error - private property
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class BankAccount
        {
            private $balance = 0;

            public function deposit($amount)
            {
                if ($amount > 0) {
                    $this->balance += $amount;
                }
            }

            public function getBalance()
            {
                return $this->balance;
            }
        }

        $account = new BankAccount();
        $account->deposit(100);
        echo "Balance: $" . $account->getBalance() . "<br>";
        ?>
    </div>

    <h2>4. Inheritance</h2>
    <p>Child class inherits properties and methods from parent class</p>
    <div class="example">
        <pre><?php
        class Animal
        {
            public $name;

            public function __construct($name)
            {
                $this->name = $name;
            }

            public function speak()
            {
                return "Some sound";
            }
        }

        class Dog extends Animal
        {
            public function speak()
            {
                return "Woof!";
            }
        }

        class Cat extends Animal
        {
            public function speak()
            {
                return "Meow!";
            }
        }

        $dog = new Dog("Buddy");
        echo $dog->name . " says: " . $dog->speak() . "<br>";

        $cat = new Cat("Whiskers");
        echo $cat->name . " says: " . $cat->speak() . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class Animal
        {
            public $name;

            public function __construct($name)
            {
                $this->name = $name;
            }

            public function speak()
            {
                return "Some sound";
            }
        }

        class Dog extends Animal
        {
            public function speak()
            {
                return "Woof!";
            }
        }

        class Cat extends Animal
        {
            public function speak()
            {
                return "Meow!";
            }
        }

        $dog = new Dog("Buddy");
        echo $dog->name . " says: " . $dog->speak() . "<br>";

        $cat = new Cat("Whiskers");
        echo $cat->name . " says: " . $cat->speak() . "<br>";
        ?>
    </div>

    <h2>5. Static Properties and Methods</h2>
    <p>Belong to the class, not instances</p>
    <div class="example">
        <pre><?php
        class Counter
        {
            public static $count = 0;

            public static function increment()
            {
                self::$count++;
            }

            public static function getCount()
            {
                return self::$count;
            }
        }

        Counter::increment();
        Counter::increment();
        echo "Count: " . Counter::getCount() . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class Counter
        {
            public static $count = 0;

            public static function increment()
            {
                self::$count++;
            }

            public static function getCount()
            {
                return self::$count;
            }
        }

        Counter::increment();
        Counter::increment();
        echo "Count: " . Counter::getCount() . "<br>";
        ?>
    </div>

    <h2>6. Getters and Setters</h2>
    <p>Control access to properties</p>
    <div class="example">
        <pre><?php
        class User
        {
            private $email;

            public function setEmail($email)
            {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->email = $email;
                } else {
                    echo "Invalid email!<br>";
                }
            }

            public function getEmail()
            {
                return $this->email;
            }
        }

        $user = new User();
        $user->setEmail("john@example.com");
        echo "Email: " . $user->getEmail() . "<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        class User
        {
            private $email;

            public function setEmail($email)
            {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->email = $email;
                } else {
                    echo "Invalid email!<br>";
                }
            }

            public function getEmail()
            {
                return $this->email;
            }
        }

        $user = new User();
        $user->setEmail("john@example.com");
        echo "Email: " . $user->getEmail() . "<br>";
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>Class = blueprint, Object = instance</li>
        <li>Constructor (<code>__construct</code>) initializes objects</li>
        <li>Visibility: public, private, protected</li>
        <li>Inheritance allows code reuse</li>
        <li>Static members belong to the class</li>
        <li>Use getters/setters for controlled access</li>
        <li>OOP makes code organized and reusable</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>

</html>