<?php
/**
 * LEARNING PATH DASHBOARD
 * Complete 30-module PHP learning journey from beginner to expert
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Learning Path - PHP Backend Expert</title>
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
            max-width: 1400px;
            margin: 0 auto;
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

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .breadcrumb a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
            background: #f0f2ff;
            transition: all 0.3s;
        }

        .breadcrumb a:hover {
            background: #667eea;
            color: white;
        }

        .timeline-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .timeline-container h2 {
            color: #667eea;
            margin-bottom: 30px;
            font-size: 2em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 15px;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
        }

        .timeline-item {
            margin-bottom: 40px;
            margin-left: 80px;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -50px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #667eea;
            border: 4px solid white;
            box-shadow: 0 0 0 2px #667eea;
        }

        .timeline-item h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 1.3em;
        }

        .timeline-item .time {
            color: #999;
            font-size: 0.95em;
            margin-bottom: 10px;
        }

        .timeline-item .modules {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
            margin-bottom: 10px;
        }

        .timeline-item .modules p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .timeline-item .modules strong {
            color: #667eea;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .level-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .level-section h2 {
            font-size: 2em;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .level-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
            margin-bottom: 20px;
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

        .module-card {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        .module-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }

        .module-card h4 {
            color: #667eea;
            margin-bottom: 8px;
        }

        .module-card p {
            color: #666;
            font-size: 0.95em;
            line-height: 1.5;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-box .number {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .stat-box .label {
            font-size: 0.95em;
            opacity: 0.95;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 35px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .info-box strong {
            color: #1565c0;
        }

        .progress-bar {
            width: 100%;
            height: 40px;
            background: #e0e0e0;
            border-radius: 20px;
            overflow: hidden;
            margin: 20px 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 0.9em;
        }

        .footer {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            margin-top: 40px;
        }

        .footer p {
            color: #666;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .timeline::before {
                left: 15px;
            }

            .timeline-item {
                margin-left: 50px;
            }

            .timeline-item::before {
                left: -30px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Navigation -->
        <div
            style="background:white;border-radius:10px;padding:12px 20px;margin-bottom:20px;box-shadow:0 2px 10px rgba(0,0,0,0.1);display:flex;gap:15px;flex-wrap:wrap;">
            <a href="index.php" style="color:#667eea;text-decoration:none;font-weight:500;">← Home</a>
            <span style="color:#ddd;">|</span>
            <a href="START_HERE.php" style="color:#667eea;text-decoration:none;font-weight:500;">Dashboard</a>
            <a href="GETTING_STARTED.php" style="color:#667eea;text-decoration:none;font-weight:500;">Getting
                Started</a>
            <a href="README_ADVANCED.php" style="color:#667eea;text-decoration:none;font-weight:500;">Study
                Strategies</a>
            <a href="MASTERY_GUIDE.php" style="color:#667eea;text-decoration:none;font-weight:500;">Mastery Guide</a>
            <a href="modules/index.php" style="color:#667eea;text-decoration:none;font-weight:500;">All Modules</a>
            <a href="projects/index.php" style="color:#667eea;text-decoration:none;font-weight:500;">Projects</a>
        </div>
        <!-- Header -->
        <div class="header">
            <h1>📚 Complete Learning Path</h1>
            <p>30 Modules: Beginner → Intermediate → Advanced → Expert</p>
            <div class="breadcrumb">
                <a href="START_HERE.php">← Back to Dashboard</a>
                <a href="index.php">Home</a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats">
            <div class="stat-box">
                <div class="number">30</div>
                <div class="label">Comprehensive Modules</div>
            </div>
            <div class="stat-box">
                <div class="number">4-6</div>
                <div class="label">Months to Expert</div>
            </div>
            <div class="stat-box">
                <div class="number">1-2</div>
                <div class="label">Hours Daily</div>
            </div>
            <div class="stat-box">
                <div class="number">250+</div>
                <div class="label">Total Hours</div>
            </div>
        </div>

        <!-- Foundation: Modules 1-12 -->
        <div class="level-section">
            <h2>
                <span class="level-badge badge-beginner">✅ Your Foundation</span>
                Modules 1-12: PHP Fundamentals
            </h2>
            <p style="color: #666; margin-bottom: 20px;">You've built a solid foundation in PHP basics. These
                fundamental skills are the building blocks for everything ahead. Ready to level up? Let's continue.</p>

            <div class="module-card">
                <h4>What You Covered</h4>
                <p>
                    <strong>Basics (1-7):</strong> Syntax, variables, operators, control structures, loops, arrays,
                    functions<br>
                    <strong>Essentials (8-12):</strong> Forms, superglobals, file handling, sessions, cookies, OOP
                    intro<br>
                    <strong>Building on this:</strong> Real-world database applications and professional architecture
                </p>
            </div>
        </div>

        <!-- Timeline -->
        <div class="timeline-container">
            <h2>📅 Your Learning Journey</h2>

            <div class="timeline">
                <!-- Week 1-2 -->
                <div class="timeline-item">
                    <h3>🎯 Week 1-2: Start Intermediate</h3>
                    <div class="time">Daily: 1-2 hours | Total: 14-20 hours</div>
                    <div class="modules">
                        <p><strong>Modules 13-14:</strong></p>
                        <p>✓ Module 13: Database Basics (3-4 days)</p>
                        <p>✓ Module 14: SQL Queries (3-4 days)</p>
                        <p style="margin-top: 10px; color: #667eea;">Focus: Learn MySQL with PDO, understand database
                            fundamentals, practice CRUD operations</p>
                    </div>
                </div>

                <!-- Week 3-4 -->
                <div class="timeline-item">
                    <h3>📖 Week 3-4: Deepen Intermediate Knowledge</h3>
                    <div class="time">Daily: 1-2 hours | Total: 14-20 hours</div>
                    <div class="modules">
                        <p><strong>Modules 15-18:</strong></p>
                        <p>✓ Module 15: MySQL Functions (2 days)</p>
                        <p>✓ Module 16: Error Handling (2-3 days)</p>
                        <p>✓ Module 17: Security Basics (3 days)</p>
                        <p>✓ Module 18: MVC Pattern (4-5 days)</p>
                        <p style="margin-top: 10px; color: #667eea;">Focus: Security, architecture, professional error
                            handling</p>
                    </div>
                </div>

                <!-- Week 5 -->
                <div class="timeline-item">
                    <h3>🛠️ Week 5: Build Project 1</h3>
                    <div class="time">Daily: 2-3 hours | Total: 15-25 hours</div>
                    <div class="modules">
                        <p><strong>Project 1: Todo Application</strong></p>
                        <p>✓ Database design with users & todos tables</p>
                        <p>✓ User authentication system</p>
                        <p>✓ Full CRUD operations</p>
                        <p style="margin-top: 10px; color: #667eea;">Achievement: You're now an
                            <strong>Intermediate-level</strong> developer!
                        </p>
                    </div>
                </div>

                <!-- Weeks 6-9 -->
                <div class="timeline-item">
                    <h3>🚀 Weeks 6-9: Advanced Level (Modules 19-24)</h3>
                    <div class="time">Daily: 2-3 hours | Total: 56-75 hours</div>
                    <div class="modules">
                        <p><strong>6 Advanced Modules:</strong></p>
                        <p>✓ Design Patterns, RESTful APIs, Testing & Debugging</p>
                        <p>✓ Authentication & Authorization, Performance Optimization, Deployment & DevOps</p>
                        <p style="margin-top: 10px; color: #667eea;">Build Projects 2-3: Blog System & E-Commerce
                            Platform</p>
                    </div>
                </div>

                <!-- Weeks 10-13 -->
                <div class="timeline-item">
                    <h3>🏆 Weeks 10-13: Expert Level (Modules 25-30)</h3>
                    <div class="time">Daily: 3+ hours | Total: 70-100 hours</div>
                    <div class="modules">
                        <p><strong>6 Expert Modules:</strong></p>
                        <p>✓ Advanced OOP, Dependency Injection, Microservices, Docker, DevOps, System Design</p>
                        <p style="margin-top: 10px; color: #667eea;">Build Project 4: Social Network - You're now an
                            <strong>Expert-level</strong> developer!
                        </p>
                    </div>
                </div>

                <!-- Ongoing -->
                <div class="timeline-item">
                    <h3>♾️ Ongoing: Mastery & Specialization</h3>
                    <div class="time">Continuous learning</div>
                    <div class="modules">
                        <p><strong>Choose Your Specialization:</strong></p>
                        <p>✓ API Development, DevOps & Infrastructure</p>
                        <p>✓ System Architecture, Performance Optimization</p>
                        <p>✓ Framework Mastery (Laravel/Symfony)</p>
                        <p style="margin-top: 10px; color: #667eea;">Contribute to open source, write technical
                            articles, mentor others</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progressive Growth: Modules 13-18 -->
        <div class="level-section">
            <h2>
                <span class="level-badge badge-intermediate">🎯 Next Chapter</span>
                Modules 13-18: Real-World Applications
            </h2>
            <p style="color: #666; margin-bottom: 20px;">Apply your fundamentals to real-world applications. Master
                databases, security, and professional architecture. This is where you start building actual
                applications.</p>
            your first real-world application.</p>

            <div class="module-card">
                <h4>Module 13: Database Basics</h4>
                <p>Learn MySQL with PDO, CRUD operations, prepared statements, and database security.</p>
                <a href="modules/13_database_basics/lesson.php" class="cta-button"
                    style="display: inline-block; padding: 10px 20px; font-size: 0.9em; margin-top: 10px;">Start Lesson
                    →</a>
            </div>

            <div class="module-card">
                <h4>Module 14: SQL Queries</h4>
                <p>WHERE, JOINs, aggregation functions, pagination, and advanced query techniques.</p>
                <a href="modules/14_sql_queries/lesson.php" class="cta-button"
                    style="display: inline-block; padding: 10px 20px; font-size: 0.9em; margin-top: 10px;">Start Lesson
                    →</a>
            </div>

            <div class="module-card">
                <h4>Module 15: MySQL Functions</h4>
                <p>String/date functions, transactions, and advanced MySQL operations.</p>
            </div>

            <div class="module-card">
                <h4>Module 16: Error Handling</h4>
                <p>Exception handling, try-catch blocks, custom error handlers, and logging.</p>
            </div>

            <div class="module-card">
                <h4>Module 17: Security Basics</h4>
                <p>SQL injection prevention, XSS protection, password hashing, input validation.</p>
            </div>

            <div class="module-card">
                <h4>Module 18: MVC Pattern</h4>
                <p>Model-View-Controller architecture, separation of concerns, and code organization.</p>
            </div>

            <div class="info-box">
                <strong>⏱️ Time Investment:</strong> 3-4 weeks (42-56 hours)
                <br><strong>Daily Commitment:</strong> 1-2 hours
                <br><strong>Next Goal:</strong> Complete Modules 13-18, then build Project 1 (Todo App)
            </div>

            <a href="modules/13_database_basics/lesson.php" class="cta-button">↓ Start Module 13 Now!</a>
        </div>

        <!-- Professional Development: Modules 19-24 -->
        <div class="level-section">
            <h2>
                <span class="level-badge badge-advanced">🚀 Professional Grade</span>
                Modules 19-24: Advanced Development
            </h2>
            <p style="color: #666; margin-bottom: 20px;">Build systems like professional developers. Master design
                patterns, APIs, testing, authentication, performance, and deployment. You're now thinking like a senior
                engineer.</p>
            performance, and deployment.</p>

            <div class="module-card">
                <h4>Module 19: Design Patterns</h4>
                <p>Singleton, Factory, Observer, Strategy, Decorator patterns and their real-world applications.</p>
            </div>

            <div class="module-card">
                <h4>Module 20: RESTful APIs</h4>
                <p>HTTP methods, status codes, JSON responses, API versioning, and rate limiting.</p>
            </div>

            <div class="module-card">
                <h4>Module 21: Testing & Debugging</h4>
                <p>Unit testing with PHPUnit, integration testing, TDD, and performance profiling.</p>
            </div>

            <div class="module-card">
                <h4>Module 22: Authentication & Authorization</h4>
                <p>JWT tokens, OAuth 2.0, RBAC, user registration, and secure authentication systems.</p>
            </div>

            <div class="module-card">
                <h4>Module 23: Performance Optimization</h4>
                <p>Caching strategies, database optimization, code profiling, and load testing.</p>
            </div>

            <div class="module-card">
                <h4>Module 24: Deployment & DevOps</h4>
                <p>Server setup, CI/CD pipelines, monitoring, logging, and production deployment.</p>
            </div>

            <div class="info-box">
                <strong>⏱️ Time Investment:</strong> 4-5 weeks (56-75 hours)
                <br><strong>Projects:</strong> Blog System & E-Commerce Platform
                <br><strong>Achievement:</strong> Reach Advanced-level developer status
            </div>
        </div>

        <!-- Expert Systems: Modules 25-30 -->
        <div class="level-section">
            <h2>
                <span class="level-badge badge-expert">🏆 Expert Territory</span>
                Modules 25-30: System Architecture
            </h2>
            <p style="color: #666; margin-bottom: 20px;">Think like an architect. Design scalable systems, master
                microservices, containerization, and enterprise patterns. You're now designing systems that power real
                businesses.</p>
            enterprise-level architecture.</p>

            <div class="module-card">
                <h4>Module 25: Advanced OOP</h4>
                <p>Interfaces, abstract classes, traits, namespaces, and type hinting.</p>
            </div>

            <div class="module-card">
                <h4>Module 26: Dependency Injection</h4>
                <p>DI containers, service locators, IoC principles, and autowiring.</p>
            </div>

            <div class="module-card">
                <h4>Module 27: Microservices</h4>
                <p>Service-oriented architecture, API gateways, message queues, and service discovery.</p>
            </div>

            <div class="module-card">
                <h4>Module 28: Containerization</h4>
                <p>Docker basics, Dockerfile creation, Docker Compose, and container orchestration.</p>
            </div>

            <div class="module-card">
                <h4>Module 29: DevOps Basics</h4>
                <p>Infrastructure as Code, CI/CD, Kubernetes, monitoring, and log aggregation.</p>
            </div>

            <div class="module-card">
                <h4>Module 30: System Design</h4>
                <p>Designing scalable systems, database sharding, distributed systems, and load balancing.</p>
            </div>

            <div class="info-box">
                <strong>⏱️ Time Investment:</strong> 4-5 weeks (70-100 hours)
                <br><strong>Project:</strong> Social Network with Advanced Features
                <br><strong>Achievement:</strong> Expert-level PHP developer + Choose specialization
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Your Complete PHP Learning Path</strong></p>
            <p style="color: #999;">30 modules | 4 real projects | 4-6 months to expert</p>
            <div class="breadcrumb" style="justify-content: center;">
                <a href="START_HERE.php">← Back to Dashboard</a>
                <a href="README_ADVANCED.php">Learning Strategies →</a>
            </div>
        </div>
    </div>

</body>

</html>