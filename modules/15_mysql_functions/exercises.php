<?php
/**
 * MODULE 15 EXERCISES
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 15: Exercises - MySQL Functions</title>
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

        .exercise {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #667eea;
            margin: 15px 0;
        }

        .solution {
            background: #e8f5e9;
            padding: 15px;
            margin-top: 10px;
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
    </style>
</head>

<body>

    <div class="container">
        <h1>📝 MODULE 15: EXERCISES - MySQL Functions</h1>
    </div>

    <div class="container">
        <div class="exercise">
            <h3>Exercise 1: String Functions</h3>
            <p><strong>Task:</strong> Create a query that displays user full names (first + last) in uppercase.</p>

            <button onclick="toggleSolution('sol1')">Show Solution</button>
            <div id="sol1" class="solution">
                <pre>
SELECT UPPER(CONCAT(first_name, ' ', last_name)) as full_name
FROM users;
            </pre>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="exercise">
            <h3>Exercise 2: Date Functions</h3>
            <p><strong>Task:</strong> Get posts created in the last 7 days.</p>

            <button onclick="toggleSolution('sol2')">Show Solution</button>
            <div id="sol2" class="solution">
                <pre>
SELECT * FROM posts
WHERE DATEDIFF(NOW(), created_at) <= 7
ORDER BY created_at DESC;
            </pre>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="exercise">
            <h3>Exercise 3: Transactions</h3>
            <p><strong>Task:</strong> Safely transfer money between accounts using transactions.</p>

            <button onclick="toggleSolution('sol3')">Show Solution</button>
            <div id="sol3" class="solution">
                <pre>
&lt;?php
try {
    $pdo->beginTransaction();
    
    $amount = 50;
    $fromId = 1;
    $toId = 2;
    
    // Deduct from account 1
    $stmt = $pdo->prepare("UPDATE accounts SET balance = balance - :amount WHERE id = :id");
    $stmt->execute([':amount' => $amount, ':id' => $fromId]);
    
    // Add to account 2
    $stmt->execute([':amount' => $amount, ':id' => $toId]);
    
    $pdo->commit();
    echo "Transfer successful!";
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Transfer failed!";
}
?&gt;
            </pre>
            </div>
        </div>
    </div>

    <script>
        function toggleSolution(id) {
            document.getElementById(id).style.display =
                document.getElementById(id).style.display === 'none' ? 'block' : 'none';
        }
    </script>

</body>

</html>