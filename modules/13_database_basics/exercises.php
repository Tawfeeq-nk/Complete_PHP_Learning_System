<?php
/**
 * MODULE 13 EXERCISES: Database Basics
 * Practice connecting to databases and performing CRUD operations
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 13: Exercises - Database Basics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h2 {
            color: #667eea;
        }

        .exercise {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #667eea;
            margin: 15px 0;
        }

        pre {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }

        .solution {
            background: #e8f5e9;
            padding: 15px;
            margin-top: 10px;
            border-left: 4px solid #4caf50;
            display: none;
        }

        button {
            background: #667eea;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #5568d3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>📝 MODULE 13: EXERCISES - Database Basics</h1>
        <p>Complete all exercises and check solutions below.</p>
    </div>

    <!-- EXERCISE 1 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 1: Database Connection</h3>
            <p><strong>Task:</strong> Create a PHP script that connects to a MySQL database using PDO.</p>
            <p><strong>Requirements:</strong></p>
            <ul>
                <li>Use PDO to connect to 'test_db' database</li>
                <li>Use error handling (try-catch)</li>
                <li>Display "Connected successfully!" on success</li>
                <li>Database: test_db | User: root | Password: (empty)</li>
            </ul>

            <button onclick="toggleSolution('sol1')">Show Solution</button>
            <div id="sol1" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=test_db;charset=utf8mb4",
        "root",
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
}
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 2 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 2: Create Table and Insert Data</h3>
            <p><strong>Task:</strong> Create a simple 'products' table and insert 3 sample products.</p>
            <p><strong>Requirements:</strong></p>
            <ul>
                <li>Table columns: id (primary key, auto-increment), name, price, quantity</li>
                <li>Insert 3 products with realistic data</li>
                <li>Use prepared statements</li>
                <li>Display success message with affected rows count</li>
            </ul>

            <button onclick="toggleSolution('sol2')">Show Solution</button>
            <div id="sol2" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
    
    // Create table
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        quantity INT NOT NULL
    )");
    
    // Insert data using prepared statements
    $products = [
        ['Laptop', 999.99, 5],
        ['Mouse', 29.99, 50],
        ['Keyboard', 79.99, 30]
    ];
    
    $sql = "INSERT INTO products (name, price, quantity) VALUES (:name, :price, :quantity)";
    $stmt = $pdo->prepare($sql);
    
    foreach ($products as $product) {
        $stmt->execute([
            ':name' => $product[0],
            ':price' => $product[1],
            ':quantity' => $product[2]
        ]);
    }
    
    echo "3 products inserted successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 3 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 3: Fetch and Display Data</h3>
            <p><strong>Task:</strong> Fetch all products from the database and display them in a table format.</p>
            <p><strong>Requirements:</strong></p>
            <ul>
                <li>Fetch all products from 'products' table</li>
                <li>Display in HTML table with headers: ID, Name, Price, Quantity</li>
                <li>Use FETCH_ASSOC for fetch mode</li>
                <li>Handle no results gracefully</li>
            </ul>

            <button onclick="toggleSolution('sol3')">Show Solution</button>
            <div id="sol3" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
    
    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($products)) {
        echo "No products found.";
    } else {
        echo "&lt;table border='1' cellpadding='10'&gt;";
        echo "&lt;tr&gt;&lt;th&gt;ID&lt;/th&gt;&lt;th&gt;Name&lt;/th&gt;&lt;th&gt;Price&lt;/th&gt;&lt;th&gt;Quantity&lt;/th&gt;&lt;/tr&gt;";
        
        foreach ($products as $product) {
            echo "&lt;tr&gt;";
            echo "&lt;td&gt;" . $product['id'] . "&lt;/td&gt;";
            echo "&lt;td&gt;" . $product['name'] . "&lt;/td&gt;";
            echo "&lt;td&gt;$" . $product['price'] . "&lt;/td&gt;";
            echo "&lt;td&gt;" . $product['quantity'] . "&lt;/td&gt;";
            echo "&lt;/tr&gt;";
        }
        
        echo "&lt;/table&gt;";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 4 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 4: Update Record</h3>
            <p><strong>Task:</strong> Update the price of a product with ID 1.</p>
            <p><strong>Requirements:</strong></p>
            <ul>
                <li>Find product with ID = 1</li>
                <li>Update price to 1299.99</li>
                <li>Use prepared statement with named placeholders</li>
                <li>Display number of rows affected</li>
            </ul>

            <button onclick="toggleSolution('sol4')">Show Solution</button>
            <div id="sol4" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
    
    $newPrice = 1299.99;
    $productId = 1;
    
    $sql = "UPDATE products SET price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':price' => $newPrice,
        ':id' => $productId
    ]);
    
    echo $stmt->rowCount() . " product(s) updated.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 5 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 5: Delete Record</h3>
            <p><strong>Task:</strong> Delete a product with ID 3 and verify deletion.</p>
            <p><strong>Requirements:</strong></p>
            <ul>
                <li>Delete product where ID = 3</li>
                <li>Display confirmation message</li>
                <li>Show remaining products count</li>
                <li>Use error handling</li>
            </ul>

            <button onclick="toggleSolution('sol5')">Show Solution</button>
            <div id="sol5" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");
    
    $productId = 3;
    
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $productId]);
    
    $deletedRows = $stmt->rowCount();
    
    if ($deletedRows > 0) {
        echo "Product deleted successfully!&lt;br&gt;";
    } else {
        echo "Product not found!&lt;br&gt;";
    }
    
    // Count remaining products
    $countStmt = $pdo->query("SELECT COUNT(*) as total FROM products");
    $result = $countStmt->fetch(PDO::FETCH_ASSOC);
    echo "Remaining products: " . $result['total'];
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <script>
        function toggleSolution(id) {
            const element = document.getElementById(id);
            element.style.display = element.style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>

</html>