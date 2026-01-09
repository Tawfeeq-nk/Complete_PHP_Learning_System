<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 8: Forms and User Input</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        h1 { color: #333; }
        h2 { color: #666; margin-top: 30px; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .example { background: #e8f4f8; padding: 15px; margin: 15px 0; border-left: 4px solid #2196F3; }
        form { background: #f9f9f9; padding: 20px; border-radius: 5px; }
        input, textarea, select { width: 100%; padding: 8px; margin: 5px 0; }
        button { background: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Module 8: Forms and User Input</h1>
    
    <h2>1. GET Method</h2>
    <p>Data is sent in the URL (visible, limited length)</p>
    <div class="example">
        <h3>Form Example:</h3>
        <form method="GET" action="">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Enter your name">
            <button type="submit">Submit</button>
        </form>
        
        <h3>PHP Code:</h3>
        <pre><?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "Hello, $name!<br>";
}
?></pre>
        <p><strong>Current Output:</strong></p>
        <?php
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            echo "Hello, $name!<br>";
        }
        ?>
    </div>

    <h2>2. POST Method</h2>
    <p>Data is sent in the request body (not visible, no length limit)</p>
    <div class="example">
        <h3>Form Example:</h3>
        <form method="POST" action="">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your email">
            <label>Message:</label>
            <textarea name="message" placeholder="Enter message"></textarea>
            <button type="submit">Submit</button>
        </form>
        
        <h3>PHP Code:</h3>
        <pre><?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if (!empty($email) && !empty($message)) {
        echo "Email: $email<br>";
        echo "Message: $message<br>";
    }
}
?></pre>
        <p><strong>Current Output:</strong></p>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';
            
            if (!empty($email) && !empty($message)) {
                echo "Email: $email<br>";
                echo "Message: $message<br>";
            }
        }
        ?>
    </div>

    <h2>3. Input Validation</h2>
    <p>Always validate and sanitize user input</p>
    <div class="example">
        <pre><?php
function validateInput($data) {
    $data = trim($data);              // Remove whitespace
    $data = stripslashes($data);      // Remove backslashes
    $data = htmlspecialchars($data);  // Convert special chars to HTML entities
    return $data;
}

// Example usage
if (isset($_POST['username'])) {
    $username = validateInput($_POST['username']);
    echo "Validated: $username<br>";
}
?></pre>
    </div>

    <h2>4. Form with Validation</h2>
    <div class="example">
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Age:</label>
            <input type="number" name="age" min="1" max="120" required>
            <button type="submit">Submit</button>
        </form>
        
        <pre><?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $age = $_POST['age'] ?? '';
    
    // Validation
    if (empty($username)) {
        echo "Username is required<br>";
    } elseif (strlen($username) < 3) {
        echo "Username must be at least 3 characters<br>";
    } elseif (!is_numeric($age) || $age < 1 || $age > 120) {
        echo "Age must be between 1 and 120<br>";
    } else {
        echo "Valid submission!<br>";
        echo "Username: " . htmlspecialchars($username) . "<br>";
        echo "Age: $age<br>";
    }
}
?></pre>
        <p><strong>Current Output:</strong></p>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
            $username = $_POST['username'] ?? '';
            $age = $_POST['age'] ?? '';
            
            if (empty($username)) {
                echo "Username is required<br>";
            } elseif (strlen($username) < 3) {
                echo "Username must be at least 3 characters<br>";
            } elseif (!is_numeric($age) || $age < 1 || $age > 120) {
                echo "Age must be between 1 and 120<br>";
            } else {
                echo "Valid submission!<br>";
                echo "Username: " . htmlspecialchars($username) . "<br>";
                echo "Age: $age<br>";
            }
        }
        ?>
    </div>

    <h2>5. Common Input Types</h2>
    <div class="example">
        <form method="POST" action="">
            <label>Text:</label>
            <input type="text" name="text_input">
            
            <label>Email:</label>
            <input type="email" name="email_input">
            
            <label>Number:</label>
            <input type="number" name="number_input">
            
            <label>Password:</label>
            <input type="password" name="password_input">
            
            <label>Checkbox:</label>
            <input type="checkbox" name="agree" value="yes"> I agree
            
            <label>Radio:</label>
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            
            <label>Select:</label>
            <select name="country">
                <option value="">Choose...</option>
                <option value="us">USA</option>
                <option value="uk">UK</option>
                <option value="ca">Canada</option>
            </select>
            
            <button type="submit">Submit</button>
        </form>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li>GET: Data in URL, visible, limited length</li>
        <li>POST: Data in body, not visible, no length limit</li>
        <li>Always validate and sanitize user input</li>
        <li>Use <code>htmlspecialchars()</code> to prevent XSS attacks</li>
        <li>Check if input exists with <code>isset()</code> or <code>??</code></li>
        <li>Use HTML5 validation attributes (required, min, max, etc.)</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>
</html>
