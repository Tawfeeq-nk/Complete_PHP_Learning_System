# 👥 PROJECT 4: SOCIAL NETWORK

## 🎯 Project Overview

A social networking platform with user profiles, connections, posts, messages, and notifications.

## ✨ Features

- User profiles with bios
- Friend/Connection requests
- Follow system
- Create and share posts
- Like and comment on posts
- Direct messaging
- Notifications
- User search
- Activity feed
- Real-time updates

## 📁 Project Structure

````
04_social_network/
├── config/
│   └── database.php
├── classes/
│   ├── User.php
│   ├── Post.php
│   ├── Connection.php
│   ├── Message.php
│   ├── Notification.php
│   └── Feed.php
├── public/
│   ├── index.php              # Homepage/Feed
│   ├── profile.php            # User profile
│   ├── connections.php        # Friends list
│   ├── messages.php           # Messaging
│   ├── search.php             # Search users
│   └── settings.php           # User settings
├── api/
│   ├── create-post.php
│   ├── like-post.php
│   ├── send-message.php
│   ├── add-connection.php
│   └── get-notifications.php
├── websocket/
│   └── notification-server.php (Real-time)
└── db_schema.sql

## 🗄️ Database Schema

### users table
- id, username, email, password, bio, profile_pic, created_at

### posts table
- id, user_id, content, image, created_at

### likes table
- id, post_id, user_id, created_at

### comments table
- id, post_id, user_id, content, created_at

### connections table
- id, user_id_1, user_id_2, status, created_at
- status: pending, accepted, blocked

### messages table
- id, sender_id, receiver_id, content, read, created_at

### notifications table
- id, user_id, type, actor_id, post_id, read, created_at

## 🚀 Key Features

### Activity Feed
```php
<?php
// Get user's feed (posts from connections)
$sql = "SELECT p.*, u.username, u.profile_pic,
        COUNT(l.id) as likes,
        COUNT(c.id) as comments
        FROM posts p
        JOIN users u ON p.user_id = u.id
        LEFT JOIN likes l ON p.id = l.post_id
        LEFT JOIN comments c ON p.id = c.post_id
        WHERE p.user_id IN (
            SELECT user_id_2 FROM connections
            WHERE user_id_1 = :user_id AND status = 'accepted'
        )
        GROUP BY p.id
        ORDER BY p.created_at DESC";
?>
````

### Connection System

```php
<?php
// Send connection request
// Accept connection
// View connections
// Suggest connections based on mutual friends
?>
```

### Notification System

```php
<?php
class Notification {
    public function notify($userId, $type, $actorId, $postId = null) {
        // When someone likes, comments, or sends message
        // Create notification record
        // Emit real-time notification (WebSocket)
    }
}
?>
```

### Real-Time Notifications (Optional)

```php
<?php
// Using Ratchet WebSocket library
// For real-time notification updates
// Message delivery
// Presence indication
?>
```

## 📚 Learning Outcomes

- Complex relationships (many-to-many, self-referencing)
- Feed algorithms
- Notification systems
- Real-time updates
- Message queues (optional)
- Caching for performance
- Advanced SQL queries
- Privacy and permissions
- Full-text search

## ✅ Completion Checklist

- [ ] User authentication and profiles
- [ ] Connection/Friend system
- [ ] Post creation and display
- [ ] Like and comment functionality
- [ ] Direct messaging system
- [ ] Notification system
- [ ] Activity feed
- [ ] User search
- [ ] Privacy settings
- [ ] Real-time notifications
- [ ] Mobile-responsive design
- [ ] Performance optimization

## 🚀 Advanced Features (After Basics)

- Real-time chat with WebSockets
- Message queues (RabbitMQ)
- Caching with Redis
- Full-text search
- Recommendation system
- Media streaming
- File uploads (photos, videos)
