<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 11: Exercises</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .exercise {
            background: #fff3cd;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #ffc107;
        }

        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 15px 0;
        }

        input,
        button {
            padding: 8px;
            margin: 5px 0;
        }

        button {
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <h1>Module 11: Sessions and Cookies - Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Session Counter</h2>
        <p>Create a page that counts how many times a user has visited using sessions</p>
    </div>

    <div class="exercise">
        <h3>Your Solution:</h3>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['visit_count'])) {
            $_SESSION['visit_count'] = 1;
        } else {
            $_SESSION['visit_count']++;
        }

        echo "You have visited this page " . $_SESSION['visit_count'] . " time(s).<br>";
        ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Cookie Preference</h2>
        <p>Store user's language preference in a cookie</p>
    </div>

    <div class="exercise">
        <h3>Your Solution:</h3>
        <form method="POST">
            <label>Select Language:</label>
            <select name="language">
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
            </select>
            <button type="submit" name="save">Save Preference</button>
        </form>

        <?php
        if (isset($_POST['save'])) {
            $lang = $_POST['language'] ?? 'en';
            setcookie('language', $lang, time() + (86400 * 30));
            echo "Language preference saved!<br>";
        }

        if (isset($_COOKIE['language'])) {
            echo "Your language preference: " . $_COOKIE['language'] . "<br>";
        }
        ?>
    </div>

    <p><a href="lesson.php">← Back to Lesson</a> | <a href="../index.php">Back to Modules</a></p>
</body>

</html>