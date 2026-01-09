<?php
/**
 * MODULE 14: SQL QUERIES
 * Advanced SQL queries for data manipulation and retrieval
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 14: SQL Queries</title>
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
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }

        pre {
            background: #f0f0f0;
            padding: 15px;
            border-left: 4px solid #667eea;
            overflow-x: auto;
        }

        code {
            background: #f0f0f0;
            padding: 2px 6px;
            border-radius: 3px;
        }

        .example {
            background: #e8f4f8;
            padding: 15px;
            border-left: 4px solid #0284c7;
            margin: 10px 0;
        }

        .tip {
            background: #fef3c7;
            padding: 15px;
            border-left: 4px solid #f59e0b;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>📊 MODULE 14: SQL QUERIES</h1>
        <p><strong>Level:</strong> Intermediate | <strong>Prerequisites:</strong> Module 13</p>
        <p>Master advanced SQL queries including JOINs, aggregation, and filtering.</p>
    </div>

    <!-- 1. BASIC FILTERING -->
    <div class="container">
        <h2>1️⃣ WHERE and Filtering</h2>

        <h3>Basic WHERE Clause</h3>
        <pre>
&lt;?php
// Get products with price > 50
$sql = "SELECT * FROM products WHERE price > 50";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?&gt;
    </pre>

        <h3>Multiple Conditions (AND, OR)</h3>
        <pre>
&lt;?php
// AND - Both conditions must be true
$sql = "SELECT * FROM products 
        WHERE price > 50 AND quantity > 10";

// OR - At least one condition must be true
$sql = "SELECT * FROM products 
        WHERE category = 'electronics' 
        OR price > 100";

// Combining AND/OR
$sql = "SELECT * FROM products 
        WHERE (category = 'electronics' OR category = 'gadgets')
        AND price < 500";
?&gt;
    </pre>

        <h3>LIKE Pattern Matching</h3>
        <pre>
&lt;?php
// Products starting with 'Laptop'
$sql = "SELECT * FROM products WHERE name LIKE 'Laptop%'";

// Products containing 'phone'
$sql = "SELECT * FROM products WHERE name LIKE '%phone%'";

// Using prepared statements for safety
$searchTerm = "%mouse%";
$sql = "SELECT * FROM products WHERE name LIKE :term";
$stmt = $pdo->prepare($sql);
$stmt->execute([':term' => $searchTerm]);
?&gt;
    </pre>

        <h3>IN Operator</h3>
        <pre>
&lt;?php
// Get products with specific IDs
$sql = "SELECT * FROM products WHERE id IN (1, 3, 5)";

// Using prepared statements
$ids = [1, 3, 5];
$placeholders = implode(',', array_fill(0, count($ids), '?'));
$sql = "SELECT * FROM products WHERE id IN ($placeholders)";
$stmt = $pdo->prepare($sql);
$stmt->execute($ids);
?&gt;
    </pre>
    </div>

    <!-- 2. SORTING AND LIMITING -->
    <div class="container">
        <h2>2️⃣ ORDER BY and LIMIT</h2>

        <h3>Sorting Results</h3>
        <pre>
&lt;?php
// Sort by price ascending (cheapest first)
$sql = "SELECT * FROM products ORDER BY price ASC";

// Sort by price descending (most expensive first)
$sql = "SELECT * FROM products ORDER BY price DESC";

// Sort by multiple columns
$sql = "SELECT * FROM products 
        ORDER BY category ASC, price DESC";

// Sort by date
$sql = "SELECT * FROM orders 
        ORDER BY created_at DESC";
?&gt;
    </pre>

        <h3>Limiting Results (Pagination)</h3>
        <pre>
&lt;?php
// Get first 10 products
$sql = "SELECT * FROM products LIMIT 10";

// Get 10 products starting from position 20 (pagination)
// Page 1: LIMIT 0, 10
// Page 2: LIMIT 10, 10
// Page 3: LIMIT 20, 10

$page = 2;
$perPage = 10;
$offset = ($page - 1) * $perPage;
$sql = "SELECT * FROM products LIMIT $offset, $perPage";
?&gt;
    </pre>
    </div>

    <!-- 3. AGGREGATE FUNCTIONS -->
    <div class="container">
        <h2>3️⃣ Aggregate Functions</h2>

        <p>Aggregate functions calculate values across multiple rows:</p>

        <pre>
&lt;?php
// COUNT - Number of records
$sql = "SELECT COUNT(*) as total FROM products";
$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Total products: " . $result['total'];

// SUM - Total of a column
$sql = "SELECT SUM(price) as total_value FROM products";
$result = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
echo "Total inventory value: $" . $result['total_value'];

// AVG - Average value
$sql = "SELECT AVG(price) as avg_price FROM products";
$avg = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC)['avg_price'];
echo "Average price: $" . round($avg, 2);

// MIN/MAX - Minimum and maximum
$sql = "SELECT MIN(price) as min_price, MAX(price) as max_price FROM products";
$result = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
echo "Price range: $" . $result['min_price'] . " - $" . $result['max_price'];
?&gt;
    </pre>
    </div>

    <!-- 4. GROUP BY -->
    <div class="container">
        <h2>4️⃣ GROUP BY - Grouping Data</h2>

        <h3>Basic GROUP BY</h3>
        <pre>
&lt;?php
// Count products by category
$sql = "SELECT category, COUNT(*) as count 
        FROM products 
        GROUP BY category";

$stmt = $pdo->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['category'] . ": " . $row['count'] . " products&lt;br&gt;";
}
?&gt;
    </pre>

        <h3>GROUP BY with HAVING</h3>
        <pre>
&lt;?php
// Get categories with more than 5 products
$sql = "SELECT category, COUNT(*) as count 
        FROM products 
        GROUP BY category
        HAVING count > 5";

$stmt = $pdo->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?&gt;
    </pre>

        <div class="example">
            <h4>Key Difference:</h4>
            <ul>
                <li><strong>WHERE:</strong> Filters rows BEFORE grouping</li>
                <li><strong>HAVING:</strong> Filters groups AFTER grouping</li>
            </ul>
        </div>
    </div>

    <!-- 5. JOINS -->
    <div class="container">
        <h2>5️⃣ JOINs - Combining Tables</h2>

        <p>JOINs combine data from multiple tables based on related columns.</p>

        <h3>INNER JOIN (Default)</h3>
        <pre>
&lt;?php
// Get all orders with customer details
$sql = "SELECT orders.id, orders.total, customers.name, customers.email
        FROM orders
        INNER JOIN customers ON orders.customer_id = customers.id";

$stmt = $pdo->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?&gt;
    </pre>

        <h3>LEFT JOIN</h3>
        <pre>
&lt;?php
// Get all customers and their orders (customers without orders show NULL)
$sql = "SELECT customers.name, orders.id, orders.total
        FROM customers
        LEFT JOIN orders ON customers.id = orders.customer_id";
?&gt;
    </pre>

        <h3>Multiple JOINs</h3>
        <pre>
&lt;?php
// Get order details with customer and product info
$sql = "SELECT 
            o.id as order_id,
            c.name as customer_name,
            p.name as product_name,
            oi.quantity
        FROM orders o
        INNER JOIN customers c ON o.customer_id = c.id
        INNER JOIN order_items oi ON o.id = oi.order_id
        INNER JOIN products p ON oi.product_id = p.id";
?&gt;
    </pre>
    </div>

    <!-- 6. DISTINCT -->
    <div class="container">
        <h2>6️⃣ DISTINCT - Removing Duplicates</h2>

        <pre>
&lt;?php
// Get unique categories
$sql = "SELECT DISTINCT category FROM products";

// Get unique cities of customers
$sql = "SELECT DISTINCT city FROM customers";

// With WHERE clause
$sql = "SELECT DISTINCT category FROM products WHERE price > 100";
?&gt;
    </pre>
    </div>

</body>

</html>