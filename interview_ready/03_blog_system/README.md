# Project 03: Blog System 🎯

**Difficulty:** Intermediate → Advanced  
**Concepts:** Multiple tables, relationships, comments, publishing workflow, complex queries

## What You'll Learn

- ✅ Working with multiple related tables (posts, comments, users)
- ✅ Complex JOIN queries with multiple tables
- ✅ Publishing workflow (draft vs published)
- ✅ Comment system with nested relationships
- ✅ Aggregate queries (counting comments)
- ✅ Access control at database level
- ✅ CASCADE deletion (delete post = delete comments)
- ✅ Rich content management

## Features

1. **View Blog** (`index.php`)
   - See all published posts from all users
   - Posts ordered by newest first
   - Comment count for each post
   - Excerpt preview of post content

2. **Write Post** (`create.php`)
   - Create new posts with title and content
   - Choose to publish or save as draft
   - Character count validation
   - Posts only visible when published

3. **View Post** (`view.php`)
   - Read full post content
   - See author and creation date
   - View all comments on the post
   - Add new comments (logged-in users only)
   - Edit/delete your own posts

4. **My Posts** (`my_posts.php`)
   - Dashboard of all your posts
   - See both draft and published
   - Quick statistics (comments, date)
   - Edit or delete any post

5. **Edit Post** (`edit.php`)
   - Modify post title and content
   - Change publish status
   - Only post author can edit

6. **Delete Post** (`delete.php`)
   - Remove post and all comments permanently
   - Only post author can delete

7. **Comments System**
   - Nested in post view
   - Any logged-in user can comment
   - Comments are permanent (no delete yet)
   - Shows commenter name and date

## Database Schema

```sql
CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    status ENUM('draft', 'published') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)

CREATE TABLE blog_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)
```

## How to Use

### As a Reader
1. Visit `/interview_ready/03_blog_system/index.php` (public blog)
2. Browse all published posts
3. Click a post to read and see comments
4. Log in to add a comment

### As a Writer
1. Log in at `/interview_ready/login.php`
2. Visit `/interview_ready/03_blog_system/my_posts.php`
3. Click "Write New Post"
4. Write your post, choose draft or publish
5. If published, it appears on blog immediately
6. Edit or delete any time

## Key Learning Points

🔑 **JOINs with Multiple Tables**: See how the blog connects users, posts, and comments:

```php
SELECT p.id, p.title, u.username,
       (SELECT COUNT(*) FROM blog_comments WHERE post_id = p.id)
FROM blog_posts p
JOIN users u ON p.user_id = u.id
WHERE p.status = 'published'
```

🔑 **Access Control**: Users can only edit/delete their own posts:

```php
$stmt->prepare("UPDATE blog_posts SET ... WHERE id = ? AND user_id = ?");
```

🔑 **CASCADE Deletion**: When a post is deleted, all comments are too:

```sql
FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE
```

🔑 **Status Publishing**: Using ENUM for strict status values:

```sql
status ENUM('draft', 'published') -- only these values allowed
```

🔑 **Draft Privacy**: Draft posts only show to the author:

```php
if ($post['status'] === 'draft' && $_SESSION['user_id'] != $post['user_id']) {
    die("Access denied");
}
```

## Code Concepts Used

- **JOINs**: Connect related tables
- **Subqueries**: Count comments per post
- **WHERE + AND**: Filter by multiple conditions
- **ORDER BY DESC**: Newest first
- **LIMIT**: Show only recent posts
- **ON DELETE CASCADE**: Cascade deletions
- **Access Control**: User-level permission checks
- **ENUM**: Restrict values to specific options

## Common Mistakes to Avoid

❌ Forgetting to check `user_id` before edit/delete  
❌ Not accessing draft posts (should be restricted)  
❌ Showing all posts (should filter by status = published)  
❌ Not validating content length on both CREATE and UPDATE  
❌ Trusting `$_GET['id']` without verification  

## Future Enhancements

Once you master this, consider adding:
- Tags/categories for posts
- Search functionality
- Like/upvote system
- Comment moderation
- Email notifications
- Markdown support for posts
- Author profiles/bios
- Post preview before publishing

## Comparison: CRUD Progression

| Project | Tables | Relationships | Complexity |
|---------|--------|---------------|----------|
| 01 Profile | 1 (users) | Self-edit | Beginner |
| 02 Todo | 2 (users, todos) | User → Todos | Intermediate |
| 03 Blog | 3 (users, posts, comments) | User → Posts → Comments | Advanced |

---

**You've now built a complete 3-project progression!** Start small with Profile Management, level up through Todos, and master complex relationships with Blogs.
