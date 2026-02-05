<?php
/**
 * Database Configuration
 * Connection settings for the beginner registration system
 */

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'php_from_zero');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if (!$conn->query($sql)) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db(DB_NAME);

// Create users table if it doesn't exist
$create_users_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    bio TEXT,
    profile_image VARCHAR(255),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    is_active BOOLEAN DEFAULT TRUE
)";

if (!$conn->query($create_users_sql)) {
    die("Error creating users table: " . $conn->error);
}

// Create todos table (Project 02)
$create_todos_sql = "CREATE TABLE IF NOT EXISTS todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    is_complete BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if (!$conn->query($create_todos_sql)) {
    die("Error creating todos table: " . $conn->error);
}

// Create blog_posts table (Project 03)
$create_posts_sql = "CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    status ENUM('draft', 'published') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if (!$conn->query($create_posts_sql)) {
    die("Error creating blog_posts table: " . $conn->error);
}

// Create blog_comments table (Project 03)
$create_comments_sql = "CREATE TABLE IF NOT EXISTS blog_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if (!$conn->query($create_comments_sql)) {
    die("Error creating blog_comments table: " . $conn->error);
}

// Add missing columns to users table if they don't exist
$check_bio = $conn->query("SHOW COLUMNS FROM users LIKE 'bio'");
if ($check_bio->num_rows === 0) {
    $conn->query("ALTER TABLE users ADD COLUMN bio TEXT");
}

$check_profile_image = $conn->query("SHOW COLUMNS FROM users LIKE 'profile_image'");
if ($check_profile_image->num_rows === 0) {
    $conn->query("ALTER TABLE users ADD COLUMN profile_image VARCHAR(255)");
}

$check_last_login = $conn->query("SHOW COLUMNS FROM users LIKE 'last_login'");
if ($check_last_login->num_rows === 0) {
    $conn->query("ALTER TABLE users ADD COLUMN last_login TIMESTAMP NULL");
}

$check_is_active = $conn->query("SHOW COLUMNS FROM users LIKE 'is_active'");
if ($check_is_active->num_rows === 0) {
    $conn->query("ALTER TABLE users ADD COLUMN is_active BOOLEAN DEFAULT TRUE");
}

// Set character set to utf8
$conn->set_charset("utf8");
