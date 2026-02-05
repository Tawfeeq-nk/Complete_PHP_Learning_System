# Project 02: Todo App 🎯

**Difficulty:** Beginner → Intermediate  
**Concepts:** CRUD, foreign keys, relationships, query filtering

## What You'll Learn

- ✅ **CREATE** - Add new todos to the database
- ✅ **READ** - Fetch and display todos from database
- ✅ **UPDATE** - Edit existing todos
- ✅ **DELETE** - Remove todos
- ✅ Foreign keys and relationships (user_id → user)
- ✅ Filtering queries (WHERE user_id = ?)
- ✅ Input validation on CREATE and UPDATE
- ✅ Access control (user can only see/edit their own todos)

## Features

1. **View All Todos** (`index.php`)
   - See all your todos in one place
   - Separate sections for active and completed todos
   - Stats showing total, to-do, and completed counts
   - Created date for each todo

2. **Add Todo** (`add.php`)
   - Create a new todo with title and description
   - Character count validation
   - Saves to database immediately

3. **Edit Todo** (`edit.php`)
   - Modify title and description
   - Shows completion status
   - Only owner can edit

4. **Toggle Status** (`toggle.php`)
   - Mark as complete/incomplete
   - Instantly updates database

5. **Delete Todo** (`delete.php`)
   - Permanently remove a todo
   - Confirmation before delete

## Database Schema

```sql
CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    is_complete BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)
```

## How to Use

1. Log in at `/interview_ready/login.php`
2. Visit `/interview_ready/02_todo_app/index.php`
3. Click "+ Add New Todo" to create one
4. Use "Edit" to modify, "Done" to complete, or "Delete" to remove

## Code Concepts

- **Foreign Keys**: `user_id` links todos to users. `ON DELETE CASCADE` means if a user is deleted, all their todos are too.
- **Access Control**: Every query checks `WHERE user_id = ?` to ensure users only see their own data
- **CRUD Operations**: Complete examples of all four database operations
- **Status Tracking**: Using boolean `is_complete` field to track completion
- **Timestamps**: `created_at` and `updated_at` automatically managed by database

## Key Learning Points

🔑 **User Isolation**: Notice how every query filters by `user_id`. This is critical for security!

```php
// ✅ Good - only this user's todos
SELECT * FROM todos WHERE user_id = ?

// ❌ Bad - anyone can see all todos
SELECT * FROM todos
```

🔑 **Access Check**: Before editing/deleting, verify it belongs to the user:

```php
$stmt->prepare("SELECT ... WHERE id = ? AND user_id = ?");
```

🔑 **Prepared Statements**: All queries use `?` placeholders to prevent SQL injection

## Common Mistakes to Avoid

❌ Forgetting to check `user_id` when editing/deleting  
❌ Not validating input on UPDATE (just like CREATE)  
❌ Trusting `$_GET['id']` without verifying ownership  
❌ Not using prepared statements  

## Next Steps

Once comfortable with CRUD, move to **Project 03: Blog System** to learn:
- More complex layouts and relationships
- Comments on posts
- Published vs draft status
- More advanced querying
