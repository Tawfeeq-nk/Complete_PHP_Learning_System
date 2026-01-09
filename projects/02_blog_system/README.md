# 📰 PROJECT 2: BLOG SYSTEM

## 🎯 Project Overview

A complete blog management system with user authentication, post creation, comments, and categorization.

## ✨ Features

- User registration and login
- Create, edit, delete blog posts
- Comments on posts
- Categories/Tags system
- Search functionality
- Admin dashboard
- Post publishing workflow (draft/published)

## 📁 Project Structure

````
02_blog_system/
├── config/
│   └── database.php
├── classes/
│   ├── User.php
│   ├── Post.php
│   ├── Comment.php
│   └── Category.php
├── public/
│   ├── index.php              # Home/Blog list
│   ├── post.php               # Single post view
│   ├── create-post.php        # Create post
│   ├── edit-post.php          # Edit post
│   ├── admin-dashboard.php    # Admin panel
│   └── api/                   # API endpoints
│       ├── create-post.php
│       ├── create-comment.php
│       └── delete-post.php
├── views/
│   ├── post-list.php
│   ├── post-detail.php
│   ├── post-form.php
│   ├── comments.php
│   └── sidebar.php
├── css/
│   └── blog.css
└── db_schema.sql

## 🗄️ Database Schema

### users table
- id, username, email, password, role, created_at

### posts table
- id, user_id, title, content, slug, category_id, status, created_at, updated_at

### comments table
- id, post_id, user_id, content, created_at

### categories table
- id, name, slug, description

## 🚀 Key Features Implementation

### Search Functionality
```php
<?php
// Search posts
$search = $_GET['q'] ?? '';
$sql = "SELECT * FROM posts
        WHERE title LIKE :search AND status = 'published'
        ORDER BY created_at DESC";
?>
````

### Pagination

```php
<?php
$page = $_GET['page'] ?? 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;

$sql = "SELECT * FROM posts LIMIT $offset, $perPage";
?>
```

### Post Slug Generation

```php
<?php
function generateSlug($title) {
    return strtolower(trim(
        preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'
    ));
}
?>
```

## 📚 Learning Outcomes

- User roles and permissions
- Complex database relationships
- URL slug generation
- Pagination
- Comment system
- Category management
- Post status workflow

## ✅ Completion Checklist

- [ ] Database schema with relationships
- [ ] User authentication with roles
- [ ] Post CRUD operations
- [ ] Comment system
- [ ] Category system
- [ ] Search functionality
- [ ] Pagination
- [ ] Admin dashboard
- [ ] Frontend design
- [ ] API endpoints
