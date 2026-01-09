<?php
/**
 * MODULE 13: DATABASE BASICS
 * Understanding relational databases and MySQL fundamentals
 * 
 * Learning Outcomes:
 * - Understand database concepts and structure
 * - Connect to MySQL databases with PHP
 * - Perform CRUD operations (Create, Read, Update, Delete)
 * - Work with PDO and MySQLi
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 13: Database Basics</title>
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
        <h1>📊 MODULE 13: DATABASE BASICS</h1>
        <p><strong>Level:</strong> Intermediate | <strong>Prerequisites:</strong> Module 1-12</p>
    </div>

    <!-- 1. DATABASE FUNDAMENTALS -->
    <div class="container">
        <h2>1️⃣ Database Fundamentals</h2>

        <h3>What is a Database?</h3>
        <p>A database is an organized collection of structured data stored and accessed electronically. It consists of:
        </p>
        <ul>
            <li><strong>Database:</strong> Container for tables</li>
            <li><strong>Tables:</strong> Collections of related data (rows and columns)</li>
            <li><strong>Rows (Records):</strong> Individual data entries</li>
            <li><strong>Columns (Fields):</strong> Attributes of the data</li>
            <li><strong>Primary Key:</strong> Unique identifier for each record</li>
        </ul>

        <div class="example">
            <h4>Example: Users Table Structure</h4>
            <pre>
users TABLE:
┌────┬──────────────┬─────────────────────────┬─────────────┐
│ id │ username     │ email                   │ created_at  │
├────┼──────────────┼─────────────────────────┼─────────────┤
│ 1  │ john_doe     │ john@example.com        │ 2024-01-01  │
│ 2  │ jane_smith   │ jane@example.com        │ 2024-01-02  │
│ 3  │ bob_johnson  │ bob@example.com         │ 2024-01-03  │
└────┴──────────────┴─────────────────────────┴─────────────┘
        </pre>
        </div>
    </div>

    <!-- 2. CONNECTING TO DATABASE -->
    <div class="container">
        <h2>2️⃣ Connecting to MySQL</h2>

        <h3>Method 1: Using PDO (Recommended)</h3>
        <p>PDO (PHP Data Objects) is more secure and supports multiple database types.</p>

        <pre>
&lt;?php
// Database credentials
$host = 'localhost';
$dbname = 'my_database';
$username = 'root';
$password = '';

try {
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    
    // Set error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
}
?&gt;
    </pre>

        <h3>Method 2: Using MySQLi</h3>
        <p>MySQLi (MySQL Improved) is simpler but MySQL-specific.</p>

        <pre>
&lt;?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
?&gt;
    </pre>

        <div class="tip">
            <strong>💡 Tip:</strong> Use PDO for new projects. It's more secure, flexible, and follows modern PHP
            standards.
        </div>
    </div>

    <!-- 3. CRUD OPERATIONS -->
    <div class="container">
        <h2>3️⃣ CRUD Operations (Create, Read, Update, Delete)</h2>

        <h3>CREATE - Inserting Data</h3>
        <pre>
&lt;?php
$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

// Using prepared statements (safe from SQL injection)
$username = "john_doe";
$email = "john@example.com";

$sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':username' => $username,
    ':email' => $email
]);

echo "Record inserted successfully!";
?&gt;
    </pre>

        <h3>READ - Fetching Data</h3>
        <pre>
&lt;?php
$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

// Fetch all records
$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo $user['username'] . " - " . $user['email'] . "&lt;br&gt;";
}

// Fetch single record
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => 1]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo "User: " . $user['username'];
?&gt;
    </pre>

        <h3>UPDATE - Modifying Data</h3>
        <pre>
&lt;?php
$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

$userId = 1;
$newEmail = "newemail@example.com";

$sql = "UPDATE users SET email = :email WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':email' => $newEmail,
    ':id' => $userId
]);

echo $stmt->rowCount() . " record(s) updated.";
?&gt;
    </pre>

        <h3>DELETE - Removing Data</h3>
        <pre>
&lt;?php
$pdo = new PDO("mysql:host=localhost;dbname=test_db", "root", "");

$userId = 1;

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute([':id' => $userId]);

echo $stmt->rowCount() . " record(s) deleted.";
?&gt;
    </pre>
    </div>

    <!-- 4. PREPARED STATEMENTS -->
    <div class="container">
        <h2>4️⃣ Prepared Statements (Security)</h2>

        <p>Prepared statements protect against SQL injection attacks by separating code from data.</p>

        <pre>
&lt;?php
// ❌ UNSAFE - SQL Injection Vulnerable
$username = $_GET['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";

// ✅ SAFE - Using Prepared Statements
$sql = "SELECT * FROM users WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $username]);
$user = $stmt->fetch();
?&gt;
    </pre>

        <div class="example">
            <h4>Why Prepared Statements Matter:</h4>
            <p>If a user enters: <code>admin' OR '1'='1</code> as username</p>
            <p>❌ Unsafe query executes: <code>SELECT * FROM users WHERE username = 'admin' OR '1'='1'</code> (returns
                all users!)</p>
            <p>✅ Safe query treats it as a literal string (no match found)</p>
        </div>
    </div>

    <!-- 5. PRACTICE CONCEPTS -->
    <div class="container">
        <h2>🎯 Key Concepts to Master</h2>
        <ul>
            <li>✅ Understanding database structure and relationships</li>
            <li>✅ Connecting to databases securely with PDO</li>
            <li>✅ Performing CRUD operations</li>
            <li>✅ Using prepared statements to prevent SQL injection</li>
            <li>✅ Handling database errors properly</li>
            <li>✅ Fetching data in different formats (array, objects)</li>
        </ul>
    </div>

    <!-- NEXT STEPS -->
    <div class="container">
        <h2>📌 Next Steps</h2>
        <p>Complete the exercises in <strong>exercises.php</strong> then move to Module 14: SQL Queries</p>
        <p><a href="exercises.php">Start Exercises →</a></p>
    </div>

</body>

</html>