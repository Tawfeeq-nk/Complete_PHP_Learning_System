# Project 01: Profile Management 🎯

**Difficulty:** Beginner  
**Concepts:** User sessions, form handling, file uploads, password hashing

## What You'll Learn

- ✅ How to protect pages with session authentication
- ✅ Form validation and error handling
- ✅ Updating user data in the database (UPDATE queries)
- ✅ File uploads and storage
- ✅ Password verification and hashing
- ✅ Security best practices (input sanitization, prepared statements)

## Features

1. **View Profile** (`index.php`)
   - Display user info (username, email, age, bio)
   - Show profile picture or avatar
   - Member since date

2. **Edit Profile** (`edit.php`)
   - Change username, email, age
   - Add/update bio
   - Upload profile picture (JPG, PNG, GIF • max 2MB)
   - Validate all inputs before saving
   - Check duplicates for username/email

3. **Change Password** (`change_password.php`)
   - Verify current password before allowing change
   - Hash new password securely
   - Confirm password match

## How to Use

1. Register at `/interview_ready/register.php`
2. Log in at `/interview_ready/login.php`
3. Visit `/interview_ready/01_profile_management/index.php`
4. Click "Edit Profile" to update your info
5. Click "Change Password" to update your password

## Database Tables

Uses the `users` table with these fields:
- `bio` (TEXT) - User biography
- `profile_image` (VARCHAR) - Filename of profile picture

## Code Concepts

- **Prepared Statements**: Prevents SQL injection
- **password_hash()**: Securely hashes passwords
- **password_verify()**: Checks password against hash
- **File Upload Validation**: MIME type checking, size limits
- **Session Management**: Uses `$_SESSION` to track logged-in users
- **htmlspecialchars()**: Prevents XSS attacks

## Tips for Beginners

- Check the comments in the code to understand each section
- Notice how validation happens in multiple stages
- See how we check for duplicate usernames/emails from other users
- Pay attention to error handling and user feedback

## Common Mistakes to Avoid

❌ Don't store passwords in plain text (always hash!)  
❌ Don't trust file uploads from users (always validate)  
❌ Don't directly use `$_POST` data (always sanitize with `htmlspecialchars()`)  
❌ Don't forget to close database statements  

## Next Steps

Once comfortable with this project, move to **Project 02: Todo App** to learn:
- CRUD operations (Create, Read, Update, Delete)
- Foreign keys and relationships
- More complex queries
