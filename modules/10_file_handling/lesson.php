<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 10: File Handling</title>
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

        .warning {
            background: #fff3cd;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #ffc107;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <?php include __DIR__ . '/../_module_nav.php'; ?>
    <?php include __DIR__ . '/../_nav_ui.php'; ?>
    <h1>Module 10: File Handling</h1>

    <h2>1. Reading Files</h2>

    <h3>file_get_contents() - Read entire file</h3>
    <div class="example">
        <pre><?php
        // Create a test file first
        file_put_contents('test.txt', 'Hello, World!');

        // Read the file
        $content = file_get_contents('test.txt');
        echo "File content: $content<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        file_put_contents('test.txt', 'Hello, World!');
        $content = file_get_contents('test.txt');
        echo "File content: $content<br>";
        ?>
    </div>

    <h3>fopen() and fread() - Read file line by line</h3>
    <div class="example">
        <pre><?php
        // Create test file with multiple lines
        file_put_contents('lines.txt', "Line 1\nLine 2\nLine 3");

        // Read line by line
        $file = fopen('lines.txt', 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {
                echo htmlspecialchars($line) . "<br>";
            }
            fclose($file);
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        file_put_contents('lines.txt', "Line 1\nLine 2\nLine 3");
        $file = fopen('lines.txt', 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {
                echo htmlspecialchars($line) . "<br>";
            }
            fclose($file);
        }
        ?>
    </div>

    <h2>2. Writing Files</h2>

    <h3>file_put_contents() - Write entire file</h3>
    <div class="example">
        <pre><?php
        // Write to file (creates if doesn't exist, overwrites if exists)
        file_put_contents('output.txt', 'This is written content');

        // Append to file
        file_put_contents('output.txt', "\nThis is appended", FILE_APPEND);

        echo "File written!<br>";
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        file_put_contents('output.txt', 'This is written content');
        file_put_contents('output.txt', "\nThis is appended", FILE_APPEND);
        echo "File written! Content: " . file_get_contents('output.txt') . "<br>";
        ?>
    </div>

    <h3>fopen() and fwrite() - Write with file handle</h3>
    <div class="example">
        <pre><?php
        $file = fopen('write.txt', 'w');
        if ($file) {
            fwrite($file, "First line\n");
            fwrite($file, "Second line\n");
            fclose($file);
            echo "File written with fwrite()<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $file = fopen('write.txt', 'w');
        if ($file) {
            fwrite($file, "First line\n");
            fwrite($file, "Second line\n");
            fclose($file);
            echo "File written with fwrite()<br>";
        }
        ?>
    </div>

    <h2>3. File Modes</h2>
    <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
        <tr>
            <th style="border: 1px solid #ddd; padding: 10px; background: #2196F3; color: white;">Mode</th>
            <th style="border: 1px solid #ddd; padding: 10px; background: #2196F3; color: white;">Description</th>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;"><code>r</code></td>
            <td style="border: 1px solid #ddd; padding: 10px;">Read only, file pointer at start</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;"><code>w</code></td>
            <td style="border: 1px solid #ddd; padding: 10px;">Write only, creates/truncates file</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;"><code>a</code></td>
            <td style="border: 1px solid #ddd; padding: 10px;">Write only, append to end</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;"><code>x</code></td>
            <td style="border: 1px solid #ddd; padding: 10px;">Write only, creates file (fails if exists)</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px;"><code>r+</code></td>
            <td style="border: 1px solid #ddd; padding: 10px;">Read/Write, file pointer at start</td>
        </tr>
    </table>

    <h2>4. File Information</h2>
    <div class="example">
        <pre><?php
        $filename = 'test.txt';

        if (file_exists($filename)) {
            echo "File exists: Yes<br>";
            echo "File size: " . filesize($filename) . " bytes<br>";
            echo "Last modified: " . date('Y-m-d H:i:s', filemtime($filename)) . "<br>";
            echo "Is readable: " . (is_readable($filename) ? 'Yes' : 'No') . "<br>";
            echo "Is writable: " . (is_writable($filename) ? 'Yes' : 'No') . "<br>";
        } else {
            echo "File does not exist<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        $filename = 'test.txt';
        if (file_exists($filename)) {
            echo "File exists: Yes<br>";
            echo "File size: " . filesize($filename) . " bytes<br>";
            echo "Last modified: " . date('Y-m-d H:i:s', filemtime($filename)) . "<br>";
            echo "Is readable: " . (is_readable($filename) ? 'Yes' : 'No') . "<br>";
            echo "Is writable: " . (is_writable($filename) ? 'Yes' : 'No') . "<br>";
        } else {
            echo "File does not exist<br>";
        }
        ?>
    </div>

    <h2>5. Directory Operations</h2>
    <div class="example">
        <pre><?php
        // Check if directory exists
        if (!is_dir('my_folder')) {
            mkdir('my_folder', 0777, true);
            echo "Directory created<br>";
        }

        // List files in directory
        $files = scandir('.');
        echo "Files in current directory:<br>";
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                echo "- $file<br>";
            }
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        if (!is_dir('my_folder')) {
            mkdir('my_folder', 0777, true);
            echo "Directory created<br>";
        }
        $files = scandir('.');
        echo "Files in current directory:<br>";
        $count = 0;
        foreach ($files as $file) {
            if ($file != '.' && $file != '..' && $count < 5) {
                echo "- $file<br>";
                $count++;
            }
        }
        ?>
    </div>

    <h2>6. Deleting Files</h2>
    <div class="example">
        <pre><?php
        // Create a file to delete
        file_put_contents('delete_me.txt', 'This will be deleted');

        if (file_exists('delete_me.txt')) {
            unlink('delete_me.txt');
            echo "File deleted<br>";
        }
        ?></pre>
        <p><strong>Output:</strong></p>
        <?php
        file_put_contents('delete_me.txt', 'This will be deleted');
        if (file_exists('delete_me.txt')) {
            unlink('delete_me.txt');
            echo "File deleted<br>";
        }
        ?>
    </div>

    <h2>Key Takeaways</h2>
    <ul>
        <li><code>file_get_contents()</code> - Simple way to read entire file</li>
        <li><code>file_put_contents()</code> - Simple way to write entire file</li>
        <li><code>fopen()</code>, <code>fread()</code>, <code>fwrite()</code> - More control</li>
        <li>Always check if file exists before operations</li>
        <li>Close file handles with <code>fclose()</code></li>
        <li>Use appropriate file modes (r, w, a, etc.)</li>
        <li>Be careful with file permissions</li>
    </ul>

    <p><a href="../index.php">← Back to Modules</a> | <a href="exercises.php">Try Exercises →</a></p>
</body>

</html>