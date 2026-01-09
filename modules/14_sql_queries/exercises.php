<?php
/**
 * MODULE 14 EXERCISES: SQL Queries
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 14: Exercises - SQL Queries</title>
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
        <h1>📝 MODULE 14: EXERCISES - SQL Queries</h1>
        <p>Practice advanced SQL queries with real-world scenarios.</p>
    </div>

    <!-- EXERCISE 1 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 1: Filtering with WHERE</h3>
            <p><strong>Task:</strong> Write a query to find all products with price between $50 and $200.</p>

            <button onclick="toggleSolution('sol1')">Show Solution</button>
            <div id="sol1" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
$sql = "SELECT * FROM products 
        WHERE price >= 50 AND price <= 200
        ORDER BY price ASC";

$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?&gt;

Alternative using BETWEEN:
&lt;?php
$sql = "SELECT * FROM products 
        WHERE price BETWEEN 50 AND 200
        ORDER BY price ASC";
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 2 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 2: Search Functionality</h3>
            <p><strong>Task:</strong> Create a search function that finds products by name (partial match).</p>

            <button onclick="toggleSolution('sol2')">Show Solution</button>
            <div id="sol2" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
$searchTerm = "laptop";  // User input

$sql = "SELECT * FROM products 
        WHERE name LIKE :search
        ORDER BY name ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute([':search' => "%$searchTerm%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo count($results) . " results found.";
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 3 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 3: Pagination</h3>
            <p><strong>Task:</strong> Implement pagination to show 5 products per page.</p>

            <button onclick="toggleSolution('sol3')">Show Solution</button>
            <div id="sol3" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 5;
$offset = ($page - 1) * $perPage;

// Get total count
$countStmt = $pdo->query("SELECT COUNT(*) as total FROM products");
$totalProducts = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalProducts / $perPage);

// Get paginated results
$sql = "SELECT * FROM products 
        ORDER BY name ASC
        LIMIT $offset, $perPage";

$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "Page $page of $totalPages | Total: $totalProducts products";
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <!-- EXERCISE 4 -->
    <div class="container">
        <div class="exercise">
            <h3>Exercise 4: Aggregate Queries</h3>
            <p><strong>Task:</strong> Write queries to calculate:</p>
            <ul>
                <li>Total number of products</li>
                <li>Average product price</li>
                <li>Most expensive and cheapest product names</li>
            </ul>

            <button onclick="toggleSolution('sol4')">Show Solution</button>
            <div id="sol4" class="solution">
                <h4>Solution:</h4>
                <pre>
&lt;?php
// Total products
$sql = "SELECT COUNT(*) as total FROM products";
$total = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC)['total'];

// Average price
$sql = "SELECT AVG(price) as avg_price FROM products";
$avgPrice = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC)['avg_price'];

// Expensive and cheap
$sql = "SELECT name, price FROM products ORDER BY price DESC LIMIT 1";
$expensive = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT name, price FROM products ORDER BY price ASC LIMIT 1";
$cheap = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

echo "Total: " . $total . "&lt;br&gt;";
echo "Average: $" . round($avgPrice, 2) . "&lt;br&gt;";
echo "Most Expensive: " . $expensive['name'] . " - $" . $expensive['price'] . "&lt;br&gt;";
echo "Cheapest: " . $cheap['name'] . " - $" . $cheap['price'];
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