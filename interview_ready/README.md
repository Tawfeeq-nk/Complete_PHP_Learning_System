# Interview Ready - Complete Beginner PHP Project Suite 🚀

Welcome to a **progressive learning system** where you'll build from beginner all the way to intermediate/advanced PHP concepts. Each project builds on the last!

## 📚 What's Inside

```
interview_ready/
├── Authentication System (Provided)
│   ├── register.php      - User registration
│   ├── login.php         - User login
│   ├── logout.php        - Session logout
│   └── home.php          - Landing page
│
├── 01_profile_management/ - BEGINNER ⭐
│   ├── index.php         - View your profile
│   ├── edit.php          - Edit profile info & upload picture
│   ├── change_password.php - Securely change password
│   └── profile_images/   - Profile picture storage
│
├── 02_todo_app/           - INTERMEDIATE ⭐⭐
│   ├── index.php         - View all your todos
│   ├── add.php           - Create new todo
│   ├── edit.php          - Edit existing todo
│   ├── toggle.php        - Mark complete/incomplete
│   └── delete.php        - Delete todo
│
├── 03_blog_system/        - ADVANCED ⭐⭐⭐
│   ├── index.php         - Public blog feed
│   ├── view.php          - Read post + comments
│   ├── create.php        - Write new post
│   ├── edit.php          - Edit your posts
│   ├── delete.php        - Delete your posts
│   ├── my_posts.php      - Dashboard of your posts
│   └── [Comments built-in to view.php]
│
└── config.php            - Database configuration (all projects)
```

## 🎯 Learning Progression

### **Project 01: Profile Management** (Beginner)
**Time to complete:** 1-2 hours  
**Concepts:**
- User sessions & authentication
- Form validation
- Password hashing (`password_hash()` / `password_verify()`)
- File uploads & storage
- UPDATE queries
- Input sanitization (prevent XSS)

**Real-world skills:** Personal settings pages, user profiles, account management

---

### **Project 02: Todo App** (Intermediate)
**Time to complete:** 2-3 hours  
**Concepts:**
- **CRUD operations** (Create, Read, Update, Delete)
- Foreign key relationships (`user_id`)
- Access control (users only see their own todos)
- Complex WHERE clauses
- Filtering and sorting queries
- Status tracking (boolean `is_complete`)

**Real-world skills:** Task management, data ownership, relational databases

---

### **Project 03: Blog System** (Advanced)
**Time to complete:** 3-4 hours  
**Concepts:**
- Multiple related tables (users, posts, comments)
- Complex JOINs across 3 tables
- Subqueries (count comments per post)
- Publishing workflow (draft vs published)
- Cascading deletes (delete post = delete comments)
- Status enums (`ENUM('draft', 'published')`)
- Aggregate functions (COUNT)

**Real-world skills:** Content management, multi-user systems, complex databases

---

## 🗄️ Database Architecture

All projects share one database (`php_from_zero`) with 4 tables:

```
┌─────────────┐
│   users     │
├─────────────┤
│ id (PK)     │
│ username    │
│ email       │
│ password    │
│ age         │
│ bio         │
│ profile_img │
│ created_at  │
└─────────────┘
      ↓
      ├─────────────────┬──────────────────┐
      ↓                 ↓                  ↓
┌─────────────┐  ┌─────────────────┐  ┌─────────────┐
│   todos     │  │  blog_posts     │  │blog_comments│
├─────────────┤  ├─────────────────┤  ├─────────────┤
│ id (PK)     │  │ id (PK)         │  │ id (PK)     │
│ user_id(FK) │  │ user_id(FK)     │  │post_id (FK) │
│ title       │  │ title           │  │user_id (FK) │
│ description │  │ content         │  │ content     │
│ is_complete │  │ status (enum)   │  │ created_at  │
│ created_at  │  │ created_at      │  └─────────────┘
│ updated_at  │  │ updated_at      │
└─────────────┘  └─────────────────┘
```

## ⚡ Quick Start

### Prerequisites
- XAMPP or similar (Apache + MySQL + PHP)
- PHP 7.4+
- MySQL running locally

### Setup (First Time Only)

1. **Navigate to root:**
   ```
   cd d:\xampp\htdocs\php_from_zero\interview_ready
   ```

2. **Access via browser:**
   - Register: `http://localhost/php_from_zero/interview_ready/register.php`
   - Login: `http://localhost/php_from_zero/interview_ready/login.php`
   - Home: `http://localhost/php_from_zero/interview_ready/home.php`

3. **Database automatically created:**
   - Database `php_from_zero` created on first run
   - All tables created automatically
   - No manual SQL needed!

## 🚀 Start Learning

### For Beginners
1. Register an account
2. Go to **[Project 01: Profile Management](01_profile_management/)**
   - Read the README inside
   - Follow the code comments
   - Try modifying things

### For Intermediate Learners
1. After finishing Project 01, move to **[Project 02: Todo App](02_todo_app/)**
   - Learn CRUD operations
   - Understand relationships

### For Advanced Learners
1. Complete Projects 01 & 02 first
2. Tackle **[Project 03: Blog System](03_blog_system/)**
   - Master complex queries
   - Build real systems

## 💡 Key Concepts at Each Level

| Concept | Project 01 | Project 02 | Project 03 |
|---------|-----------|-----------|-----------|
| Sessions | ✅ | ✅ | ✅ |
| Form Validation | ✅ | ✅ | ✅ |
| Password Security | ✅ | - | - |
| File Uploads | ✅ | - | - |
| Basic Queries | ✅ | ✅ | ✅ |
| CRUD | ✅ | ✅✅ | ✅✅✅ |
| Relationships | - | ✅ | ✅✅ |
| Access Control | - | ✅ | ✅ |
| JOINs | - | - | ✅ |
| Cascading Deletes | - | - | ✅ |
| Complex Queries | - | - | ✅ |

## 🔒 Security Features Implemented

- ✅ Password hashing with bcrypt
- ✅ Prepared statements (prevent SQL injection)
- ✅ Input sanitization (prevent XSS)
- ✅ User sessions
- ✅ Access control (users only see their data)
- ✅ File upload validation
- ✅ MIME type checking

## 📖 How to Learn from Code

Each project has this structure:

```php
// 1. Session check (protect pages)
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// 2. Database connection
require_once __DIR__ . '/../config.php';

// 3. Handle data (POST requests)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    // Update database
    // Redirect or show message
}

// 4. Fetch data (GET requests)
$stmt = $conn->prepare("...");
// Execute, bind, fetch

// 5. Display HTML + PHP loops
?>
<html>
    <?php foreach ($items as $item): ?>
        <!-- Show item -->
    <?php endforeach; ?>
</html>
```

## 🐛 Common Issues

**Issue:** "Database error" on first visit  
**Solution:** Make sure MySQL is running in XAMPP

**Issue:** "Access denied" on projects  
**Solution:** You need to be logged in. Visit `/login.php` first

**Issue:** File upload not working  
**Solution:** Check that `profile_images/` folder exists and is writable

**Issue:** Todo/Blog pages show nothing  
**Solution:** Create some items first! They won't show if you have none.

## 📊 Code Statistics

| Project | Files | Approx Lines | Concepts |
|---------|-------|--------------|----------|
| 01 Profile | 4 | 600 | Sessions, Files, Validation |
| 02 Todo | 6 | 550 | CRUD, Relations, Queries |
| 03 Blog | 7 | 750 | JOINs, Cascades, Publishing |
| **Total** | **17** | **1900** | **Full Stack Basics** |

## 🎓 What's Next After This?

Once you've completed all 3 projects, you're ready for:
- Building a full-stack application
- Learning frameworks (Laravel, Symfony)
- Database optimization
- API design
- Advanced security
- Testing and debugging

## 📚 Additional Learning Resources

Look for these in the parent folder:
- `LEARNING_PATH.php` - Structured learning guide
- `README.md` - Project overview
- `modules/` - Individual lesson modules
- `interview_ready/beginner.php` - Quick reference

## ✅ Project Checklist

Track your progress:

- [ ] Understand authentication (register/login)
- [ ] **Project 01: Profile Management**
  - [ ] View profile works
  - [ ] Edit profile (text fields)
  - [ ] Upload profile picture
  - [ ] Change password
  - [ ] Reviewed code comments
- [ ] **Project 02: Todo App**
  - [ ] Create todos
  - [ ] Edit todos
  - [ ] Mark complete/incomplete
  - [ ] Delete todos
  - [ ] Understand access control
- [ ] **Project 03: Blog System**
  - [ ] Write draft posts
  - [ ] Publish posts
  - [ ] View public blog
  - [ ] Add comments
  - [ ] Edit/delete your posts
  - [ ] Understand relationships

## 🤝 Getting Help

- Check README files in each project
- Read code comments
- Look at similar patterns in other files
- Compare against the database schema
- Test small changes one at a time

## 🎉 Congratulations!

You're building a real, working system with proper:
- ✅ Database design
- ✅ User authentication
- ✅ Security practices
- ✅ Access control
- ✅ Data relationships

**This is how real web applications work!**

---

**Happy learning! Start with [01_profile_management/](01_profile_management/) today.** 🚀
