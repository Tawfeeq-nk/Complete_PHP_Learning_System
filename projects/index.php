<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - PHP Learning System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .nav {
            background: white;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .nav a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .nav a:hover {
            background: #f0f2ff;
            color: #5568d3;
        }

        .nav .divider {
            color: #ddd;
        }

        .header {
            background: white;
            border-radius: 15px;
            padding: 50px 30px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .header h1 {
            color: #667eea;
            font-size: 2.8em;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .project-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            transition: all 0.3s;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        }

        .project-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .project-header h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .project-header .number {
            display: inline-block;
            background: rgba(255, 255, 255, 0.3);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .project-content {
            padding: 30px;
        }

        .project-content h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .project-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .project-features {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }

        .project-features strong {
            display: block;
            color: #667eea;
            margin-bottom: 10px;
        }

        .project-features ul {
            list-style: none;
            margin-left: 0;
        }

        .project-features li {
            padding: 5px 0;
            color: #555;
        }

        .project-features li:before {
            content: "✓ ";
            color: #667eea;
            font-weight: bold;
            margin-right: 8px;
        }

        .project-footer {
            display: flex;
            gap: 10px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            font-size: 0.9em;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5568d3;
        }

        .btn-secondary {
            background: #f0f2ff;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
        }

        .info-box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .info-box h2 {
            color: #667eea;
            margin-bottom: 15px;
        }

        .info-box p {
            color: #666;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: white;
            margin-top: 40px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 2em;
            }

            .nav {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Navigation -->
        <div class="nav">
            <a href="../index.php">← Back to Home</a>
            <span class="divider">|</span>
            <a href="../START_HERE.php">Dashboard</a>
            <a href="../modules/index.php">Modules</a>
            <a href="../LEARNING_PATH.php">Learning Path</a>
            <a href="../GETTING_STARTED.php">Getting Started</a>
        </div>

        <!-- Header -->
        <div class="header">
            <h1>🚀 Real-World Projects</h1>
            <p>Build practical applications while learning PHP backend development</p>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <h2>About These Projects</h2>
            <p>These four projects are designed to be built progressively as you advance through the modules. Each
                project teaches different concepts and best practices. Start with the Todo App (beginner-friendly) and
                progress through to the Social Network (advanced). All projects can be built from scratch, enhanced, or
                used as learning references.</p>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid">
            <!-- Project 1: Todo App -->
            <div class="project-card">
                <div class="project-header">
                    <div class="number">Project 1</div>
                    <h2>Todo App</h2>
                </div>
                <div class="project-content">
                    <h3>Beginner-Friendly Task Manager</h3>
                    <p>Learn the fundamentals by building a simple yet functional todo application. Perfect for
                        understanding forms, data storage, and basic CRUD operations.</p>
                    <div class="project-features">
                        <strong>Key Concepts:</strong>
                        <ul>
                            <li>HTML forms and GET/POST requests</li>
                            <li>File-based or basic database storage</li>
                            <li>Task creation, completion, and deletion</li>
                            <li>Session management for user tasks</li>
                        </ul>
                    </div>
                    <div class="project-footer">
                        <a href="01_todo_app/README.md" class="btn btn-primary">View Project</a>
                        <a href="../modules/index.php" class="btn btn-secondary">Suggested: Module 8+</a>
                    </div>
                </div>
            </div>

            <!-- Project 2: Blog System -->
            <div class="project-card">
                <div class="project-header">
                    <div class="number">Project 2</div>
                    <h2>Blog System</h2>
                </div>
                <div class="project-content">
                    <h3>Complete Content Management Platform</h3>
                    <p>Build a multi-user blogging platform with posts, comments, and categories. Learn database design,
                        relationships, and content management patterns.</p>
                    <div class="project-features">
                        <strong>Key Concepts:</strong>
                        <ul>
                            <li>Database design with tables and relationships</li>
                            <li>User authentication and authorization</li>
                            <li>SQL queries and data manipulation</li>
                            <li>Post creation, editing, and publishing</li>
                            <li>Comment system and moderation</li>
                        </ul>
                    </div>
                    <div class="project-footer">
                        <a href="02_blog_system/README.md" class="btn btn-primary">View Project</a>
                        <a href="../modules/index.php" class="btn btn-secondary">Suggested: Module 13+</a>
                    </div>
                </div>
            </div>

            <!-- Project 3: E-Commerce -->
            <div class="project-card">
                <div class="project-header">
                    <div class="number">Project 3</div>
                    <h2>E-Commerce Store</h2>
                </div>
                <div class="project-content">
                    <h3>Online Shopping Platform</h3>
                    <p>Create a full-featured e-commerce platform with products, shopping cart, orders, and payments.
                        Learn advanced OOP patterns, security, and scalability.</p>
                    <div class="project-features">
                        <strong>Key Concepts:</strong>
                        <ul>
                            <li>Product catalog with categories and search</li>
                            <li>Shopping cart and order management</li>
                            <li>User accounts and order history</li>
                            <li>Admin dashboard for management</li>
                            <li>Security and PCI compliance basics</li>
                        </ul>
                    </div>
                    <div class="project-footer">
                        <a href="03_ecommerce/README.md" class="btn btn-primary">View Project</a>
                        <a href="../modules/index.php" class="btn btn-secondary">Suggested: Module 18+</a>
                    </div>
                </div>
            </div>

            <!-- Project 4: Social Network -->
            <div class="project-card">
                <div class="project-header">
                    <div class="number">Project 4</div>
                    <h2>Social Network</h2>
                </div>
                <div class="project-content">
                    <h3>Advanced Social Platform</h3>
                    <p>The ultimate project: a social networking platform with user profiles, connections, messaging,
                        and feeds. Learn advanced architecture and system design.</p>
                    <div class="project-features">
                        <strong>Key Concepts:</strong>
                        <ul>
                            <li>User profiles and social connections</li>
                            <li>Real-time notifications and messaging</li>
                            <li>Feed generation and algorithms</li>
                            <li>Microservices architecture patterns</li>
                            <li>Performance optimization at scale</li>
                        </ul>
                    </div>
                    <div class="project-footer">
                        <a href="04_social_network/README.md" class="btn btn-primary">View Project</a>
                        <a href="../modules/index.php" class="btn btn-secondary">Suggested: Module 25+</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- How to Use -->
        <div class="info-box">
            <h2>How to Use These Projects</h2>
            <p><strong>Progressive Learning:</strong> Start with the Todo App after completing Module 8, then progress
                to more complex projects as you advance. Each project teaches real-world patterns and best practices.
            </p>
            <p style="margin-top: 15px;"><strong>Build as You Learn:</strong> You don't need to wait until you've
                completed all modules. Start a project when suggested and enhance it as you learn new concepts in later
                modules.</p>
            <p style="margin-top: 15px;"><strong>Use for Portfolio:</strong> These projects are great for your
                portfolio. Deploy them, share on GitHub, and demonstrate what you've learned!</p>
        </div>

        <!-- Footer Navigation -->
        <div class="footer">
            <a href="../index.php">← Home</a> |
            <a href="../START_HERE.php">Dashboard</a> |
            <a href="../modules/index.php">All Modules</a> |
            <a href="../LEARNING_PATH.php">Learning Path</a>
        </div>
    </div>
</body>

</html>