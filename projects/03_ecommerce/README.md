# 🛒 PROJECT 3: E-COMMERCE PLATFORM

## 🎯 Project Overview

A full-featured e-commerce platform with product catalog, shopping cart, orders, and payments.

## ✨ Features

- Product catalog with search and filtering
- Shopping cart functionality
- User accounts and profiles
- Order management
- Order history
- Admin product management
- Inventory tracking
- Basic payment integration
- Product reviews and ratings

## 📁 Project Structure

````
03_ecommerce/
├── config/
│   └── database.php
├── classes/
│   ├── User.php
│   ├── Product.php
│   ├── Cart.php
│   ├── Order.php
│   └── Payment.php
├── public/
│   ├── index.php              # Homepage
│   ├── products.php           # Product listing
│   ├── product.php            # Product detail
│   ├── cart.php               # Shopping cart
│   ├── checkout.php           # Checkout
│   ├── orders.php             # Order history
│   ├── admin/
│   │   ├── dashboard.php
│   │   ├── products.php       # Manage products
│   │   └── orders.php         # Manage orders
│   └── api/
│       ├── add-to-cart.php
│       ├── remove-from-cart.php
│       └── checkout.php
├── db_schema.sql
└── css/
    └── ecommerce.css

## 🗄️ Database Schema

### products table
- id, name, description, price, quantity, category_id, image_url

### categories table
- id, name, description

### orders table
- id, user_id, total_price, status, created_at

### order_items table
- id, order_id, product_id, quantity, price

### cart_items table
- id, user_id, product_id, quantity, created_at

### reviews table
- id, product_id, user_id, rating, comment, created_at

## 🚀 Key Features

### Product Search with Filters
```php
<?php
$category = $_GET['category'] ?? '';
$minPrice = $_GET['min_price'] ?? 0;
$maxPrice = $_GET['max_price'] ?? 10000;

$sql = "SELECT * FROM products
        WHERE category_id = :category
        AND price BETWEEN :min AND :max
        ORDER BY price ASC";
?>
````

### Shopping Cart Management

```php
<?php
class Cart {
    private $pdo;
    private $userId;

    public function __construct($pdo, $userId) {
        $this->pdo = $pdo;
        $this->userId = $userId;
    }

    // Add to cart
    // Remove from cart
    // Get cart items
    // Calculate total
}
?>
```

### Order Processing

```php
<?php
// Create order from cart items
$pdo->beginTransaction();
try {
    // Create order
    // Copy items from cart to order_items
    // Update inventory
    // Clear cart
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
}
?>
```

## 📚 Learning Outcomes

- Complex database relationships
- Inventory management
- Cart functionality
- Order processing
- Transaction handling
- Advanced queries with aggregation
- Session-based cart
- File uploads (product images)

## ✅ Completion Checklist

- [ ] Product catalog and search
- [ ] Shopping cart system
- [ ] User authentication
- [ ] Order management
- [ ] Inventory tracking
- [ ] Admin panel
- [ ] Product filtering
- [ ] Checkout process
- [ ] Order history
- [ ] Reviews and ratings
- [ ] Payment processing
