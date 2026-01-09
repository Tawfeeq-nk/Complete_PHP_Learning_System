# 📋 PROJECT 1: TODO APPLICATION

## 🎯 Project Overview

A complete todo management application with user authentication and database storage.

## ✨ Features

- User registration and login
- Create, read, update, delete todos
- Mark todos as complete/incomplete
- Filter todos by status
- Delete todos
- User dashboard

## 📁 Project Structure

````
01_todo_app/
├── config/
│   └── database.php          # Database connection
├── classes/
│   ├── User.php              # User class
│   └── Todo.php              # Todo class
├── public/
│   ├── index.php             # Home page
│   ├── login.php             # Login page
│   ├── register.php          # Registration page
│   └── dashboard.php         # Todo dashboard
├── views/
│   ├── header.php            # Header template
│   ├── footer.php            # Footer template
│   ├── todo_form.php         # Todo form
│   └── todo_list.php         # Display todos
├── css/
│   └── style.css             # Stylesheet
└── db_schema.sql             # Database schema

## 🗄️ Database Schema

### users table
- id (INT, Primary Key, Auto-increment)
- username (VARCHAR 100, Unique)
- email (VARCHAR 100, Unique)
- password (VARCHAR 255) - bcrypt hash
- created_at (TIMESTAMP)

### todos table
- id (INT, Primary Key, Auto-increment)
- user_id (INT, Foreign Key)
- title (VARCHAR 255)
- description (TEXT)
- is_complete (BOOLEAN)
- due_date (DATE)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)

## 🚀 Getting Started

1. Create database: `CREATE DATABASE todo_app;`
2. Import schema: `mysql -u root todo_app < db_schema.sql`
3. Configure database connection in config/database.php
4. Access application: http://localhost/projects/01_todo_app/public/

## 💻 Key Implementation Points

### Database Connection (config/database.php)
```php
<?php
class Database {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=todo_app",
            "root",
            ""
        );
    }

    public function getConnection() {
        return $this->pdo;
    }
}
?>
````

### User Class

```php
<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Register user
    // Login user
    // Get user by ID
    // Update user
}
?>
```

### Todo Class

```php
<?php
class Todo {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Get user todos
    // Create todo
    // Update todo
    // Delete todo
    // Mark as complete
}
?>
```

## 📚 Learning Outcomes

- Database design
- User authentication
- CRUD operations
- Session management
- Password security
- Form handling

## ✅ Completion Checklist

- [ ] Design database schema
- [ ] Implement User class
- [ ] Implement Todo class
- [ ] Create registration page
- [ ] Create login page
- [ ] Create dashboard with todos
- [ ] Add edit todo functionality
- [ ] Add delete todo functionality
- [ ] Add mark complete functionality
- [ ] Add styling
- [ ] Deploy to server

## 🎓 Skills Developed

✓ Database design
✓ User authentication
✓ CRUD operations
✓ Security (password hashing, prepared statements)
✓ Session management
✓ Form handling and validation
