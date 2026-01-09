<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 8: Exercises</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .exercise { background: #fff3cd; padding: 15px; margin: 15px 0; border-left: 4px solid #ffc107; }
        form { background: #f9f9f9; padding: 20px; border-radius: 5px; margin: 15px 0; }
        input, button { padding: 8px; margin: 5px 0; }
        button { background: #2196F3; color: white; border: none; border-radius: 3px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Module 8: Forms and User Input - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Simple Contact Form</h2>
        <p>Create a form with name, email, and message fields. Validate and display the submitted data.</p>
    </div>

    <div class="exercise">
        <h3>Your Form:</h3>
        <form method="POST" action="">
            <label>Name:</label>
            <input type="text" name="name" required><br>
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <label>Message:</label>
            <textarea name="message" required></textarea><br>
            <button type="submit">Submit</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
            $name = htmlspecialchars($_POST['name'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');
            
            echo "<h3>Submitted Data:</h3>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Message: $message<br>";
        }
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>
</html>
