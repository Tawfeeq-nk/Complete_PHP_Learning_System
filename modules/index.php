<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning Modules - Navigation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            font-size: 2.5em;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
            font-size: 1.1em;
        }

        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .module-card {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .module-card:hover {
            transform: translateY(-20px);
            box-shadow: 0 20px 2px rgba(0, 0, 0, 0.1);
            border-color: #667eea;
        }

        .module-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .module-title {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .module-description {
            color: #666;
            font-size: 0.95em;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .module-links {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9em;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5568d3;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .progress-bar {
            background: #e9ecef;
            height: 8px;
            border-radius: 4px;
            margin-top: 20px;
            overflow: hidden;
        }

        .progress-fill {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🚀 PHP Backend Learning Path</h1>
        <p class="subtitle">Master PHP fundamentals from zero to advanced level</p>
        <div style="display:flex;justify-content:center;gap:12px;margin-bottom:18px;flex-wrap:wrap">
            <a href="search.php" class="btn btn-primary">Search Modules</a>
            <a href="../index.php" class="btn btn-secondary">Back to Home</a>
        </div>

        <div class="modules-grid">
            <div class="module-card">
                <div class="module-number">01</div>
                <div class="module-title">Variables & Data Types</div>
                <div class="module-description">
                    Learn about variables, constants, and PHP's 8 data types including strings, integers, floats,
                    booleans, arrays, objects, NULL, and resources.
                </div>
                <div class="module-links">
                    <a href="01_variables_and_datatypes/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="01_variables_and_datatypes/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">02</div>
                <div class="module-title">Operators</div>
                <div class="module-description">
                    Master arithmetic, assignment, comparison, logical, and string operators. Understand operator
                    precedence and type juggling.
                </div>
                <div class="module-links">
                    <a href="02_operators/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="02_operators/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">03</div>
                <div class="module-title">Control Structures</div>
                <div class="module-description">
                    Learn if/else statements, switch cases, ternary operators, and the modern match expression for
                    decision making in PHP.
                </div>
                <div class="module-links">
                    <a href="03_control_structures/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="03_control_structures/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">04</div>
                <div class="module-title">Loops</div>
                <div class="module-description">
                    Understand for, while, do-while, and foreach loops. Learn loop control with break and continue
                    statements.
                </div>
                <div class="module-links">
                    <a href="04_loops/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="04_loops/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">05</div>
                <div class="module-title">Arrays</div>
                <div class="module-description">
                    Master indexed arrays, associative arrays, multidimensional arrays, and essential array functions
                    for data manipulation.
                </div>
                <div class="module-links">
                    <a href="05_arrays/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="05_arrays/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">06</div>
                <div class="module-title">Functions</div>
                <div class="module-description">
                    Create reusable code with functions. Learn parameters, return values, scope, anonymous functions,
                    and recursion.
                </div>
                <div class="module-links">
                    <a href="06_functions/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="06_functions/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">07</div>
                <div class="module-title">Strings</div>
                <div class="module-description">
                    Master string manipulation with built-in functions for concatenation, searching, replacing,
                    formatting, and parsing.
                </div>
                <div class="module-links">
                    <a href="07_strings/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="07_strings/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">08</div>
                <div class="module-title">Forms & User Input</div>
                <div class="module-description">
                    Handle form submissions with GET and POST methods. Learn input validation, sanitization, and
                    security best practices.
                </div>
                <div class="module-links">
                    <a href="08_forms_and_input/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="08_forms_and_input/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">09</div>
                <div class="module-title">Superglobals</div>
                <div class="module-description">
                    Understand $_GET, $_POST, $_SERVER, $_SESSION, $_COOKIE, $_FILES, and other superglobal variables in
                    PHP.
                </div>
                <div class="module-links">
                    <a href="09_superglobals/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="09_superglobals/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">10</div>
                <div class="module-title">File Handling</div>
                <div class="module-description">
                    Read and write files, work with directories, handle file uploads, and manage file permissions in
                    PHP.
                </div>
                <div class="module-links">
                    <a href="10_file_handling/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="10_file_handling/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">11</div>
                <div class="module-title">Sessions & Cookies</div>
                <div class="module-description">
                    Implement user sessions and cookies for state management. Learn security best practices for
                    authentication.
                </div>
                <div class="module-links">
                    <a href="11_sessions_cookies/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="11_sessions_cookies/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">12</div>
                <div class="module-title">OOP Basics</div>
                <div class="module-description">
                    Introduction to Object-Oriented Programming: classes, objects, inheritance, encapsulation, and
                    polymorphism.
                </div>
                <div class="module-links">
                    <a href="12_oop_basics/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="12_oop_basics/exercises.php" class="btn btn-secondary">Exercises</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">13</div>
                <div class="module-title">Database Basics</div>
                <div class="module-description">Intro to relational databases, connections using PDO, and basic CRUD
                    operations.</div>
                <div class="module-links">
                    <a href="13_database_basics/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="13_database_basics/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">14</div>
                <div class="module-title">SQL Queries</div>
                <div class="module-description">SELECT, JOIN, GROUP BY, HAVING, and subqueries for effective data
                    retrieval.</div>
                <div class="module-links">
                    <a href="14_sql_queries/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="14_sql_queries/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">15</div>
                <div class="module-title">MySQL Functions</div>
                <div class="module-description">Common MySQL functions and PHP integration patterns for practical tasks.
                </div>
                <div class="module-links">
                    <a href="15_mysql_functions/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="15_mysql_functions/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">16</div>
                <div class="module-title">Error Handling</div>
                <div class="module-description">Exceptions, try/catch, error reporting, and logging strategies for
                    robust apps.</div>
                <div class="module-links">
                    <a href="16_error_handling/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="16_error_handling/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">17</div>
                <div class="module-title">Security Basics</div>
                <div class="module-description">Input validation, prepared statements, XSS and CSRF defenses, and safe
                    session handling.</div>
                <div class="module-links">
                    <a href="17_security_basics/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="17_security_basics/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">18</div>
                <div class="module-title">Intro to MVC</div>
                <div class="module-description">Model–View–Controller fundamentals, simple routing, and organizing app
                    structure.</div>
                <div class="module-links">
                    <a href="18_intro_mvc/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="18_intro_mvc/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">19</div>
                <div class="module-title">Design Patterns</div>
                <div class="module-description">Common patterns: Singleton, Factory, Strategy, Repository, and when to
                    use them.</div>
                <div class="module-links">
                    <a href="19_design_patterns/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="19_design_patterns/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">20</div>
                <div class="module-title">RESTful APIs</div>
                <div class="module-description">Build REST APIs with routing, JSON responses, status codes, and simple
                    authentication.</div>
                <div class="module-links">
                    <a href="20_restful_apis/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="20_restful_apis/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">21</div>
                <div class="module-title">Testing & Debugging</div>
                <div class="module-description">Using Xdebug, PHPUnit, and practical debugging techniques for reliable
                    code.</div>
                <div class="module-links">
                    <a href="21_testing_debugging/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="21_testing_debugging/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">22</div>
                <div class="module-title">Authentication & Authorization</div>
                <div class="module-description">Secure login flows, password hashing, role-based access, and session
                    protection.</div>
                <div class="module-links">
                    <a href="22_authentication_authorization/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="22_authentication_authorization/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">23</div>
                <div class="module-title">Performance Optimization</div>
                <div class="module-description">Profiling, caching, opcode cache, query tuning, and common bottleneck
                    fixes.</div>
                <div class="module-links">
                    <a href="23_performance_optimization/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="23_performance_optimization/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">24</div>
                <div class="module-title">Deployment</div>
                <div class="module-description">Deploying PHP apps to Apache/Nginx, basic CI workflows, and environment
                    configuration.</div>
                <div class="module-links">
                    <a href="24_deployment/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="24_deployment/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">25</div>
                <div class="module-title">Advanced OOP</div>
                <div class="module-description">Traits, interfaces, namespaces, late static binding, and advanced object
                    techniques.</div>
                <div class="module-links">
                    <a href="25_advanced_oop/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="25_advanced_oop/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">26</div>
                <div class="module-title">Dependency Injection</div>
                <div class="module-description">DI containers, service wiring, and inversion of control for cleaner
                    architecture.</div>
                <div class="module-links">
                    <a href="26_dependency_injection/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="26_dependency_injection/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">27</div>
                <div class="module-title">Microservices</div>
                <div class="module-description">Service boundaries, communication patterns, and deploying shrink-wrapped
                    services.</div>
                <div class="module-links">
                    <a href="27_microservices/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="27_microservices/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">28</div>
                <div class="module-title">Containerization</div>
                <div class="module-description">Docker basics: images, containers, Dockerfile, and using containers for
                    development.</div>
                <div class="module-links">
                    <a href="28_containerization/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="28_containerization/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">29</div>
                <div class="module-title">DevOps Basics</div>
                <div class="module-description">CI/CD fundamentals, monitoring, and basic infrastructure automation
                    concepts.</div>
                <div class="module-links">
                    <a href="29_devops_basics/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="29_devops_basics/" class="btn btn-secondary">Folder</a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-number">30</div>
                <div class="module-title">System Design</div>
                <div class="module-description">High-level system design, scaling strategies, and designing for
                    resilience and performance.</div>
                <div class="module-links">
                    <a href="30_system_design/lesson.php" class="btn btn-primary">Lesson</a>
                    <a href="30_system_design/" class="btn btn-secondary">Folder</a>
                </div>
            </div>
        </div>

        <div class="footer">
            <p><strong>Learning Path:</strong> Start with Module 1 and progress sequentially</p>
            <p>Each module includes detailed lessons with examples and practical exercises</p>
            <p style="margin-top: 20px;"><a href="../index.php" style="color: #667eea;">← Back to Home</a> | <a
                    href="../START_HERE.php" style="color: #667eea;">Dashboard</a> | <a href="../projects/index.php"
                    style="color: #667eea;">Projects</a> | <a href="../LEARNING_PATH.php"
                    style="color: #667eea;">Learning Path</a></p>
        </div>
    </div>
</body>

</html>