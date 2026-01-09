<?php
/**
 * PHP BACKEND LEARNING HUB - COMPLETE GUIDE
 * From Zero to Expert Level
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Backend Learning Hub - Complete Path</title>
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
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2em;
            opacity: 0.95;
        }

        .content {
            padding: 40px 20px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            color: #667eea;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            line-height: 1.6;
        }

        .card ul {
            margin: 10px 0 0 20px;
            color: #666;
        }

        .card li {
            margin-bottom: 5px;
        }

        .button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .button:hover {
            background: #5568d3;
        }

        .level-beginner {
            border-left-color: #10b981;
        }

        .level-intermediate {
            border-left-color: #f59e0b;
        }

        .level-advanced {
            border-left-color: #ef4444;
        }

        .level-expert {
            border-left-color: #8b5cf6;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline-item {
            padding: 20px;
            margin-bottom: 20px;
            border-left: 3px solid #667eea;
            background: #f8f9fa;
            border-radius: 5px;
        }

        .timeline-item h4 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .badge-beginner {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-intermediate {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-advanced {
            background: #fee2e2;
            color: #7c2d12;
        }

        .badge-expert {
            background: #ede9fe;
            color: #5b21b6;
        }

        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            color: #666;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .stat .number {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat .label {
            font-size: 0.9em;
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>🚀 PHP BACKEND LEARNING HUB</h1>
            <p>Complete Learning Path: From Zero to Expert Level</p>
        </div>

        <div class="content">
            <!-- Quick Stats -->
            <div class="stats">
                <div class="stat">
                    <div class="number">30</div>
                    <div class="label">Comprehensive Modules</div>
                </div>
                <div class="stat">
                    <div class="number">4</div>
                    <div class="label">Real Projects</div>
                </div>
                <div class="stat">
                    <div class="number">100+</div>
                    <div class="label">Code Examples</div>
                </div>
                <div class="stat">
                    <div class="number">4 Levels</div>
                    <div class="label">Beginner → Expert</div>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="section">
                <h2>📖 Quick Navigation</h2>
                <div class="info-box">
                    <strong>Just finished modules 1-12? Start here:</strong>
                    <a href="modules/13_database_basics/lesson.php" class="button">Start Module 13: Database Basics
                        →</a>
                </div>
                <p style="margin-top: 20px;">
                    <a href="LEARNING_PATH.md" style="color: #667eea; text-decoration: none; font-weight: bold;">📍 View
                        Complete Learning Path</a> |
                    <a href="README_ADVANCED.md" style="color: #667eea; text-decoration: none; font-weight: bold;">📖
                        View Learning Guide</a> |
                    <a href="MASTERY_GUIDE.md" style="color: #667eea; text-decoration: none; font-weight: bold;">🏆 View
                        Mastery Guide</a>
                </p>
            </div>

            <!-- Level 1: Beginner -->
            <div class="section">
                <h2>Level 1: BEGINNER ✅ (Modules 1-12) COMPLETED</h2>
                <p style="margin-bottom: 20px; color: #666;">
                    You've mastered PHP fundamentals! You can write basic scripts with variables, loops, functions, and
                    OOP.
                </p>
                <div class="grid">
                    <div class="card level-beginner">
                        <h3>✅ What You Know</h3>
                        <ul>
                            <li>PHP syntax & variables</li>
                            <li>Control structures</li>
                            <li>Functions & arrays</li>
                            <li>Basic OOP</li>
                            <li>Form handling</li>
                            <li>File I/O</li>
                        </ul>
                    </div>
                    <div class="card level-beginner">
                        <h3>🎯 Next Step</h3>
                        <p>Start Level 2: Intermediate (Modules 13-18)</p>
                        <p>Learn databases, SQL, security, and MVC architecture.</p>
                        <a href="modules/13_database_basics/lesson.php" class="button">Begin Module 13</a>
                    </div>
                </div>
            </div>

            <!-- Level 2: Intermediate -->
            <div class="section">
                <h2>Level 2: INTERMEDIATE 🎯 (Modules 13-18) CURRENT FOCUS</h2>
                <p style="margin-bottom: 20px; color: #666;">
                    Master databases, SQL, security, and architecture patterns. Build real applications.
                </p>
                <div class="grid">
                    <div class="card level-intermediate">
                        <span class="badge badge-intermediate">Intermediate</span>
                        <h3>Module 13: Database Basics</h3>
                        <p>Learn MySQL, PDO, CRUD operations, and prepared statements.</p>
                        <a href="modules/13_database_basics/lesson.php" class="button">Start Lesson</a>
                    </div>
                    <div class="card level-intermediate">
                        <span class="badge badge-intermediate">Intermediate</span>
                        <h3>Module 14: SQL Queries</h3>
                        <p>Master WHERE, JOINs, aggregation, and pagination.</p>
                        <a href="modules/14_sql_queries/lesson.php" class="button">Start Lesson</a>
                    </div>
                    <div class="card level-intermediate">
                        <span class="badge badge-intermediate">Intermediate</span>
                        <h3>Module 15: MySQL Functions</h3>
                        <p>String/date functions, transactions, and advanced operations.</p>
                        <a href="modules/15_mysql_functions/lesson.php" class="button">Start Lesson</a>
                    </div>
                    <div class="card level-intermediate">
                        <span class="badge badge-intermediate">Intermediate</span>
                        <h3>Module 16: Error Handling</h3>
                        <p>Exception handling, custom handlers, and logging.</p>
                        <a href="modules/16_error_handling/lesson.php" class="button">Start Lesson</a>
                    </div>
                    <div class="card level-intermediate">
                        <span class="badge badge-intermediate">Intermediate</span>
                        <h3>Module 17: Security Basics</h3>
                        <p>SQL injection, XSS, password security, input validation.</p>
                        <a href="modules/17_security_basics/lesson.php" class="button">Start Lesson</a>
                    </div>
                    <div class="card level-intermediate">
                        <span class="badge badge-intermediate">Intermediate</span>
                        <h3>Module 18: MVC Pattern</h3>
                        <p>Model-View-Controller architecture and separation of concerns.</p>
                        <a href="modules/18_intro_mvc/lesson.php" class="button">Start Lesson</a>
                    </div>
                </div>

                <div class="info-box" style="margin-top: 20px;">
                    <strong>💡 At this level you'll:</strong>
                    <ul style="margin: 10px 0 0 20px; color: #1565c0;">
                        <li>Build database-driven applications</li>
                        <li>Write secure code</li>
                        <li>Understand architecture patterns</li>
                        <li>Handle errors professionally</li>
                    </ul>
                </div>
            </div>

            <!-- Level 3: Advanced -->
            <div class="section">
                <h2>Level 3: ADVANCED (Modules 19-24) Coming Next</h2>
                <p style="margin-bottom: 20px; color: #666;">
                    Master design patterns, APIs, testing, performance, and deployment.
                </p>
                <div class="grid">
                    <div class="card level-advanced">
                        <span class="badge badge-advanced">Advanced</span>
                        <h3>Module 19: Design Patterns</h3>
                        <p>Singleton, Factory, Observer, Strategy, Decorator patterns.</p>
                    </div>
                    <div class="card level-advanced">
                        <span class="badge badge-advanced">Advanced</span>
                        <h3>Module 20: RESTful APIs</h3>
                        <p>HTTP methods, status codes, JSON responses, versioning.</p>
                    </div>
                    <div class="card level-advanced">
                        <span class="badge badge-advanced">Advanced</span>
                        <h3>Module 21: Testing & Debugging</h3>
                        <p>PHPUnit, integration testing, TDD, performance profiling.</p>
                    </div>
                    <div class="card level-advanced">
                        <span class="badge badge-advanced">Advanced</span>
                        <h3>Module 22: Auth & Authorization</h3>
                        <p>JWT tokens, OAuth, RBAC, secure authentication systems.</p>
                    </div>
                    <div class="card level-advanced">
                        <span class="badge badge-advanced">Advanced</span>
                        <h3>Module 23: Performance Optimization</h3>
                        <p>Caching strategies, query optimization, load testing.</p>
                    </div>
                    <div class="card level-advanced">
                        <span class="badge badge-advanced">Advanced</span>
                        <h3>Module 24: Deployment & DevOps</h3>
                        <p>Server setup, CI/CD pipelines, monitoring, logging.</p>
                    </div>
                </div>
            </div>

            <!-- Level 4: Expert -->
            <div class="section">
                <h2>Level 4: EXPERT (Modules 25-30) Mastery Level</h2>
                <p style="margin-bottom: 20px; color: #666;">
                    System design, microservices, containerization, and distributed systems.
                </p>
                <div class="grid">
                    <div class="card level-expert">
                        <span class="badge badge-expert">Expert</span>
                        <h3>Module 25: Advanced OOP</h3>
                        <p>Interfaces, traits, namespaces, type hinting.</p>
                    </div>
                    <div class="card level-expert">
                        <span class="badge badge-expert">Expert</span>
                        <h3>Module 26: Dependency Injection</h3>
                        <p>DI containers, service locators, IoC principles.</p>
                    </div>
                    <div class="card level-expert">
                        <span class="badge badge-expert">Expert</span>
                        <h3>Module 27: Microservices</h3>
                        <p>Service-oriented architecture, API gateways.</p>
                    </div>
                    <div class="card level-expert">
                        <span class="badge badge-expert">Expert</span>
                        <h3>Module 28: Docker & Containers</h3>
                        <p>Containerization, Docker Compose, orchestration.</p>
                    </div>
                    <div class="card level-expert">
                        <span class="badge badge-expert">Expert</span>
                        <h3>Module 29: DevOps</h3>
                        <p>Infrastructure as Code, Kubernetes, monitoring.</p>
                    </div>
                    <div class="card level-expert">
                        <span class="badge badge-expert">Expert</span>
                        <h3>Module 30: System Design</h3>
                        <p>Scaling systems, distributed systems, architecture.</p>
                    </div>
                </div>
            </div>

            <!-- Projects -->
            <div class="section">
                <h2>💼 Real-World Projects</h2>
                <p style="margin-bottom: 20px; color: #666;">
                    Build these projects to reinforce your learning and create a portfolio.
                </p>
                <div class="grid">
                    <div class="card">
                        <h3>📋 Project 1: Todo App</h3>
                        <p>Database + User Auth + CRUD</p>
                        <p style="font-size: 0.9em; color: #999; margin-top: 10px;">Intermediate Level</p>
                        <a href="projects/01_todo_app/README.md" class="button">View Project</a>
                    </div>
                    <div class="card">
                        <h3>📰 Project 2: Blog System</h3>
                        <p>Posts + Comments + Search</p>
                        <p style="font-size: 0.9em; color: #999; margin-top: 10px;">Intermediate-Advanced</p>
                        <a href="projects/02_blog_system/README.md" class="button">View Project</a>
                    </div>
                    <div class="card">
                        <h3>🛒 Project 3: E-Commerce</h3>
                        <p>Products + Cart + Orders</p>
                        <p style="font-size: 0.9em; color: #999; margin-top: 10px;">Advanced Level</p>
                        <a href="projects/03_ecommerce/README.md" class="button">View Project</a>
                    </div>
                    <div class="card">
                        <h3>👥 Project 4: Social Network</h3>
                        <p>Profiles + Posts + Messaging</p>
                        <p style="font-size: 0.9em; color: #999; margin-top: 10px;">Advanced-Expert</p>
                        <a href="projects/04_social_network/README.md" class="button">View Project</a>
                    </div>
                </div>
            </div>

            <!-- Study Timeline -->
            <div class="section">
                <h2>📅 Recommended Study Timeline</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4>🎯 This Week: Start Intermediate</h4>
                        <p>Weeks 1-3: Modules 13-18 (Databases, SQL, Security, MVC)</p>
                        <p><strong>Time:</strong> 1-2 hours daily | <strong>Goal:</strong> Complete Modules 13-18</p>
                    </div>
                    <div class="timeline-item">
                        <h4>🎯 This Month: Build Your First Project</h4>
                        <p>Week 4: Build Project 1 (Todo App) using learned concepts</p>
                        <p><strong>Time:</strong> 2-3 hours daily | <strong>Goal:</strong> Working application</p>
                    </div>
                    <div class="timeline-item">
                        <h4>🎯 Next 2 Months: Advanced Level</h4>
                        <p>Modules 19-24 + Projects 2-3 (Blog, E-commerce)</p>
                        <p><strong>Time:</strong> 2-3 hours daily | <strong>Goal:</strong> Advanced developer skills</p>
                    </div>
                    <div class="timeline-item">
                        <h4>🎯 Months 4-5: Expert Level</h4>
                        <p>Modules 25-30 + Project 4 (Social Network)</p>
                        <p><strong>Time:</strong> 3+ hours daily | <strong>Goal:</strong> Expert-level architecture</p>
                    </div>
                    <div class="timeline-item">
                        <h4>🎯 Ongoing: Mastery & Specialization</h4>
                        <p>Choose specialization (API, DevOps, Architecture, Performance)</p>
                        <p><strong>Goal:</strong> Industry-leading expertise</p>
                    </div>
                </div>
            </div>

            <!-- Key Resources -->
            <div class="section">
                <h2>📚 Key Resources</h2>
                <div class="grid">
                    <div class="card">
                        <h3>📖 Learning Guides</h3>
                        <ul>
                            <li><a href="LEARNING_PATH.md">Complete Learning Path</a></li>
                            <li><a href="README_ADVANCED.md">Advanced Learning Guide</a></li>
                            <li><a href="MASTERY_GUIDE.md">Expert Mastery Guide</a></li>
                        </ul>
                    </div>
                    <div class="card">
                        <h3>🎓 Documentation</h3>
                        <ul>
                            <li><a href="modules/index.php">All Modules</a></li>
                            <li>PHP Manual: php.net</li>
                            <li>MySQL Documentation</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="section"
                style="text-align: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 40px; border-radius: 10px;">
                <h2 style="color: white; border-bottom: none; margin-bottom: 20px;">Ready to Level Up? 🚀</h2>
                <p style="font-size: 1.1em; margin-bottom: 20px;">Start your journey from beginner to expert PHP
                    developer today!</p>
                <a href="modules/13_database_basics/lesson.php" class="button"
                    style="background: white; color: #667eea; font-weight: bold;">Start Module 13: Database Basics →</a>
            </div>
        </div>

        <div class="footer">
            <p><strong>PHP Backend Learning Hub v2.0</strong></p>
            <p>30 Comprehensive Modules | 4 Real Projects | Beginner to Expert</p>
            <p style="margin-top: 10px; font-size: 0.9em;">
                "The best time to learn was yesterday. The second best time is now." - Chinese Proverb
            </p>
        </div>
    </div>

</body>

</html>