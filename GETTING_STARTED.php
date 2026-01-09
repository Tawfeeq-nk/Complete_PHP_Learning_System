<?php
/**
 * GETTING STARTED DASHBOARD
 * Quick start guide and action plan
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting Started - PHP Learning System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, sans-serif;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
            color: #4facfe;
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
            color: #4facfe;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
            background: #e0f7ff;
            transition: all 0.3s;
        }

        .breadcrumb a:hover {
            background: #4facfe;
            color: white;
        }

        .content-section {
            background: white;
            border-radius: 15px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .content-section h2 {
            color: #4facfe;
            margin-bottom: 30px;
            font-size: 2em;
            border-bottom: 3px solid #4facfe;
            padding-bottom: 15px;
        }

        .content-section h3 {
            color: #4facfe;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 1.3em;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .action-card {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(79, 172, 254, 0.3);
            transition: all 0.3s;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.4);
        }

        .action-card h3 {
            color: white;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .action-card .time {
            display: inline-block;
            background: rgba(255, 255, 255, 0.3);
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 0.85em;
            margin-bottom: 15px;
        }

        .action-card p {
            line-height: 1.6;
            margin-bottom: 10px;
            font-size: 0.95em;
        }

        .action-card ul {
            margin-left: 20px;
            margin-top: 10px;
        }

        .action-card li {
            margin-bottom: 6px;
            font-size: 0.95em;
        }

        .checklist {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .checklist-item:last-child {
            border-bottom: none;
        }

        .checklist-item input[type="checkbox"] {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #4facfe;
        }

        .checklist-item label {
            flex: 1;
            cursor: pointer;
            color: #555;
            font-size: 0.95em;
        }

        .checklist-item .desc {
            display: block;
            margin-left: 35px;
            margin-top: 5px;
            color: #999;
            font-size: 0.85em;
        }

        .info-box {
            background: #e0f7ff;
            border-left: 4px solid #4facfe;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .info-box strong {
            color: #4facfe;
        }

        .timeline-setup {
            position: relative;
            padding: 20px 0;
            margin: 30px 0;
        }

        .timeline-setup::before {
            content: '';
            position: absolute;
            left: 30px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, #4facfe 0%, #00f2fe 100%);
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
            background: #4facfe;
            border: 4px solid white;
            box-shadow: 0 0 0 2px #4facfe;
        }

        .timeline-item h4 {
            color: #4facfe;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .timeline-item .duration {
            color: #999;
            font-size: 0.95em;
            margin-bottom: 10px;
        }

        .timeline-item .content {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #4facfe;
        }

        .timeline-item p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 8px;
            font-size: 0.95em;
        }

        .calculator {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .calculator-input {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            color: #4facfe;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .input-group input {
            padding: 10px;
            border: 2px solid #4facfe;
            border-radius: 6px;
            font-size: 1em;
        }

        .input-group input:focus {
            outline: none;
            border-color: #00f2fe;
            box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.1);
        }

        .result {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }

        .result .number {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .result p {
            font-size: 0.95em;
            opacity: 0.95;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 15px 35px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(79, 172, 254, 0.4);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .stat {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
        }

        .stat .value {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat .label {
            font-size: 0.9em;
            opacity: 0.95;
        }

        .footer {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2em;
            }

            .action-grid {
                grid-template-columns: 1fr;
            }

            .timeline-setup::before {
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
        <!-- Header -->
        <div class="header">
            <h1>🎯 Your Action Plan</h1>
            <p>Continue your learning journey: From modules 13 all the way to expert level in 4-6 months</p>
            <div class="breadcrumb">
                <a href="START_HERE.php">← Back to Dashboard</a>
                <a href="LEARNING_PATH.php">Full Learning Path</a>
            </div>
        </div>

        <!-- Readiness Checklist -->
        <div class="content-section">
            <h2>✅ Everything Already Set? Great!</h2>
            <p style="color: #666; margin-bottom: 20px;">
                You've already completed modules 1-12. Your environment is ready. Let's make sure you're positioned for success:
            </p>

            <div class="checklist">
                <div class="checklist-item">
                    <input type="checkbox" id="setup1" checked>
                    <label for="setup1">
                        <strong>✓ XAMPP running</strong>
                        <span class="desc">Your local server is set up and accessible</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="setup2" checked>
                    <label for="setup2">
                        <strong>✓ VS Code configured</strong>
                        <span class="desc">PHP extensions and tools installed</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="setup3" checked>
                    <label for="setup3">
                        <strong>✓ Workspace folder ready</strong>
                        <span class="desc">d:\xampp\htdocs\php_from_zero (your learning home)</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="setup4" checked>
                    <label for="setup4">
                        <strong>✓ Git initialized</strong>
                        <span class="desc">Tracking progress with version control</span>
                    </label>
                </div>
                        <strong>Initialize Git repository</strong>
                        <span class="desc">Track your progress: git init, then git add ., git commit</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="setup5">
                    <label for="setup5">
                        <strong>Create GitHub account</strong>
                        <span class="desc">Push your code to GitHub. Show your work to the world!</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="setup6">
                    <label for="setup6">
                        <strong>Set daily study time</strong>
                        <span class="desc">Block 2 hours. Morning is best. Protect this time.</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Time Investment -->
        <div class="content-section">
            <h2>⏱️ Time Investment Calculator</h2>
            <p style="color: #666; margin-bottom: 20px;">
                Let's calculate your learning timeline based on your daily commitment:
            </p>

            <div class="calculator">
                <div class="calculator-input">
                    <div class="input-group">
                        <label for="hoursDaily">Hours per day:</label>
                        <input type="number" id="hoursDaily" value="2" min="1" max="8">
                    </div>
                    <div class="input-group">
                        <label for="daysPerWeek">Days per week:</label>
                        <input type="number" id="daysPerWeek" value="5" min="1" max="7">
                    </div>
                </div>

                <button class="cta-button" onclick="calculateTimeline()">Calculate Timeline</button>

                <div id="result" style="display: none;">
                    <div class="result">
                        <div class="number" id="resultText"></div>
                        <p id="resultDetail"></p>
                    </div>
                </div>
            </div>

            <div class="info-box">
                <strong>📌 Recommendation:</strong> 2 hours daily, 5-6 days per week gives you the best balance of
                intensity and consistency. This puts you at Expert level in 4-5 months.
            </div>
        </div>

        <!-- This Week Action Plan -->
        <div class="content-section">
            <h2>📅 Your First Week - Action by Action</h2>

            <div class="action-grid">
                <div class="action-card">
                    <h3>🔧 Day 1: Setup</h3>
                    <div class="time">2 hours</div>
                    <ul>
                        <li>Install XAMPP</li>
                        <li>Set up VS Code</li>
                        <li>Create workspace</li>
                        <li>Test local server</li>
                    </ul>
                </div>

                <div class="action-card">
                    <h3>📖 Day 2: Review Basics</h3>
                    <div class="time">2 hours</div>
                    <ul>
                        <li>Review Modules 1-5</li>
                        <li>Re-read core concepts</li>
                        <li>Type out examples</li>
                        <li>Take notes</li>
                    </ul>
                </div>

                <div class="action-card">
                    <h3>💻 Day 3: Refresh Skills</h3>
                    <div class="time">2 hours</div>
                    <ul>
                        <li>Review Modules 6-12</li>
                        <li>Do practice exercises</li>
                        <li>Build small scripts</li>
                        <li>Push to GitHub</li>
                    </ul>
                </div>

                <div class="action-card">
                    <h3>🗄️ Day 4: Start Module 13</h3>
                    <div class="time">2 hours</div>
                    <ul>
                        <li>Read lesson carefully</li>
                        <li>Type examples</li>
                        <li>Create test database</li>
                        <li>Run simple queries</li>
                    </ul>
                </div>

                <div class="action-card">
                    <h3>🎯 Day 5: Deep Dive Module 13</h3>
                    <div class="time">2 hours</div>
                    <ul>
                        <li>Complete exercises</li>
                        <li>Debug errors</li>
                        <li>Understand concepts</li>
                        <li>Make notes</li>
                    </ul>
                </div>

                <div class="action-card">
                    <h3>📝 Day 6: Consolidate</h3>
                    <div class="time">2 hours</div>
                    <ul>
                        <li>Review Module 13</li>
                        <li>Practice more</li>
                        <li>Commit to GitHub</li>
                        <li>Rest & reflect</li>
                    </ul>
                </div>

                <div class="action-card">
                    <h3>🔄 Day 7: Review & Plan</h3>
                    <div class="time">1 hour</div>
                    <ul>
                        <li>Review the week</li>
                        <li>What stuck?</li>
                        <li>What needs review?</li>
                        <li>Plan next week</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Learning Timeline -->
        <div class="content-section">
            <h2>📈 4-6 Month Learning Timeline</h2>

            <div class="timeline-setup">
                <div class="timeline-item">
                    <h4>📍 Month 1: Intermediate Foundation</h4>
                    <div class="duration">Weeks 1-4 | 40-56 hours | Modules 13-18</div>
                    <div class="content">
                        <p><strong>Goal:</strong> Master databases, SQL, security basics, and MVC architecture</p>
                        <p><strong>Modules:</strong> Database Basics, SQL Queries, MySQL Functions, Error Handling,
                            Security, MVC</p>
                        <p><strong>Project:</strong> Build Todo Application with authentication</p>
                        <p><strong>Milestone:</strong> You can build a complete CRUD app with user authentication!</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>📍 Month 2: Advanced Skills</h4>
                    <div class="duration">Weeks 5-8 | 56-75 hours | Modules 19-21</div>
                    <div class="content">
                        <p><strong>Goal:</strong> Learn design patterns, APIs, testing, and professional development
                            practices</p>
                        <p><strong>Modules:</strong> Design Patterns, RESTful APIs, Testing & Debugging</p>
                        <p><strong>Project:</strong> Build Blog System (intermediate-advanced)</p>
                        <p><strong>Milestone:</strong> You understand professional PHP architecture!</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>📍 Month 3: Advanced Level</h4>
                    <div class="duration">Weeks 9-12 | 42-56 hours | Modules 22-24</div>
                    <div class="content">
                        <p><strong>Goal:</strong> Master authentication, performance, and deployment</p>
                        <p><strong>Modules:</strong> Authentication & Authorization, Performance Optimization,
                            Deployment</p>
                        <p><strong>Project:</strong> Build E-Commerce Platform (advanced)</p>
                        <p><strong>Milestone:</strong> You've reached Advanced-level developer status!</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>📍 Month 4-5: Expert Level</h4>
                    <div class="duration">Weeks 13-20 | 84-120 hours | Modules 25-30</div>
                    <div class="content">
                        <p><strong>Goal:</strong> Master expert-level concepts: OOP, Dependency Injection,
                            Microservices, Docker, DevOps, System Design</p>
                        <p><strong>Modules:</strong> Advanced OOP, DI, Microservices, Containerization, DevOps, System
                            Design</p>
                        <p><strong>Project:</strong> Build Social Network with advanced features (expert)</p>
                        <p><strong>Milestone:</strong> You've reached Expert-level developer status!</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>📍 Month 6: Specialization</h4>
                    <div class="duration">Weeks 21-26 | 42-70 hours | Deep Specialization</div>
                    <div class="content">
                        <p><strong>Goal:</strong> Deep-dive into your chosen specialization</p>
                        <p><strong>Options:</strong> API/Backend Architecture, DevOps, Database Engineering, Security,
                            Framework Mastery, Technical Leadership</p>
                        <p><strong>Project:</strong> Build ambitious project in your specialization</p>
                        <p><strong>Milestone:</strong> You're ready for senior-level roles!</p>
                    </div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat">
                    <div class="value">30</div>
                    <div class="label">Modules Total</div>
                </div>
                <div class="stat">
                    <div class="value">4-6</div>
                    <div class="label">Months to Expert</div>
                </div>
                <div class="stat">
                    <div class="value">250+</div>
                    <div class="label">Total Hours</div>
                </div>
                <div class="stat">
                    <div class="value">4</div>
                    <div class="label">Real Projects</div>
                </div>
            </div>
        </div>

        <!-- Daily Routine -->
        <div class="content-section">
            <h2>⏰ Your Daily Routine (2 Hours)</h2>

            <div class="timeline-setup">
                <div class="timeline-item">
                    <h4>Minutes 0-5: Warm Up</h4>
                    <div class="content">
                        <p>Review yesterday's notes. Identify today's goal. What ONE concept will you master?</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>Minutes 5-50: Read & Understand (45 min)</h4>
                    <div class="content">
                        <p>
                            <strong>Step 1:</strong> Read the lesson carefully (15 min)<br>
                            <strong>Step 2:</strong> Type out all examples (20 min)<br>
                            <strong>Step 3:</strong> Run them. Play with them. Break them intentionally (10 min)
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>Minutes 50-110: Practice & Code (60 min)</h4>
                    <div class="content">
                        <p>
                            <strong>Step 1:</strong> Complete the exercises without looking at solutions (30 min)<br>
                            <strong>Step 2:</strong> Debug your own errors (15 min)<br>
                            <strong>Step 3:</strong> Compare with solutions and understand differences (15 min)
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <h4>Minutes 110-120: Reflect & Document (10 min)</h4>
                    <div class="content">
                        <p>
                            Write 3-5 key takeaways.<br>
                            What was hard? Why?<br>
                            Commit your work to GitHub.<br>
                            Mark progress.
                        </p>
                    </div>
                </div>
            </div>

            <div class="info-box">
                <strong>💡 Pro Tips:</strong>
                <ul style="margin-left: 20px; margin-top: 10px; line-height: 1.8;">
                    <li>No distractions. Phone away. Email closed.</li>
                    <li>Dark mode in VS Code. Comfortable chair. Good lighting.</li>
                    <li>Breaks every 25 min if you prefer Pomodoro technique.</li>
                    <li>Same time every day builds the habit.</li>
                    <li>If stuck for 15 minutes, take a break. Fresh eyes help.</li>
                </ul>
            </div>
        </div>

        <!-- Week by Week Milestones -->
        <div class="content-section">
            <h2>🎯 Week-by-Week Milestones (First 4 Weeks)</h2>

            <div class="checklist">
                <div class="checklist-item">
                    <input type="checkbox" id="week1">
                    <label for="week1">
                        <strong>Week 1: Environment & Basics Review</strong>
                        <span class="desc">Setup XAMPP, VS Code. Review Modules 1-7. Feeling refreshed.</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="week2">
                    <label for="week2">
                        <strong>Week 2: OOP & Advanced Basics</strong>
                        <span class="desc">Complete Modules 8-12. Feel comfortable with OOP. Push to GitHub
                            weekly.</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="week3">
                    <label for="week3">
                        <strong>Week 3: Database Master</strong>
                        <span class="desc">Complete Modules 13-14. Write complex SQL queries. Create databases from
                            scratch.</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="week4">
                    <label for="week4">
                        <strong>Week 4: Security & Architecture</strong>
                        <span class="desc">Complete Modules 15-18. Understand MVC. Implement secure authentication.
                            Ready to build Project 1!</span>
                    </label>
                </div>
            </div>

            <div class="info-box">
                <strong>✨ Week 4 Achievement:</strong> You'll have completed your first month and mastered
                Intermediate-level PHP development! You can build a full CRUD application with user authentication.
                That's significant progress!
            </div>
        </div>

        <!-- Success Formula -->
        <div class="content-section"
            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
            <h2 style="color: white; border-bottom-color: white;">🔥 Your Success Formula</h2>

            <div
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 30px 0;">
                <div style="text-align: center;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">1️⃣</div>
                    <h4 style="color: white; margin-bottom: 10px;">Consistency</h4>
                    <p>2 hours daily beats 14 hours weekly. Build the habit.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">2️⃣</div>
                    <h4 style="color: white; margin-bottom: 10px;">Building</h4>
                    <p>Don't just watch. CODE. The struggle is where learning happens.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">3️⃣</div>
                    <h4 style="color: white; margin-bottom: 10px;">Debugging</h4>
                    <p>Errors teach you more than working code. Embrace the struggle.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">4️⃣</div>
                    <h4 style="color: white; margin-bottom: 10px;">Projects</h4>
                    <p>Projects consolidate everything. Build 4 real applications.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">5️⃣</div>
                    <h4 style="color: white; margin-bottom: 10px;">Review</h4>
                    <p>Revisit old code. Refactor. Understand your own growth.</p>
                </div>

                <div style="text-align: center;">
                    <div style="font-size: 2.5em; font-weight: bold; margin-bottom: 10px;">6️⃣</div>
                    <h4 style="color: white; margin-bottom: 10px;">Sharing</h4>
                    <p>Teach others. Write about what you learn. Solidify understanding.</p>
                </div>
            </div>
        </div>

        <!-- Final Checklist Before Starting -->
        <div class="content-section">
            <h2>✅ Final Checklist - Ready to Start?</h2>

            <div class="checklist">
                <div class="checklist-item">
                    <input type="checkbox" id="final1">
                    <label for="final1">
                        <strong>XAMPP installed and running</strong>
                        <span class="desc">Can access http://localhost in browser</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="final2">
                    <label for="final2">
                        <strong>VS Code configured with PHP extensions</strong>
                        <span class="desc">PHP Intelephense, Code Runner, GitLens installed</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="final3">
                    <label for="final3">
                        <strong>Workspace folder created</strong>
                        <span class="desc">d:\xampp\htdocs\php_from_zero (your learning home)</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="final4">
                    <label for="final4">
                        <strong>Git initialized and first commit made</strong>
                        <span class="desc">git init, .gitignore created, first commit done</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="final5">
                    <label for="final5">
                        <strong>GitHub repository created</strong>
                        <span class="desc">Public repo, README.md pushed, ready to share</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="final6">
                    <label for="final6">
                        <strong>Daily study time blocked in calendar</strong>
                        <span class="desc">Same time every day. Protected. No exceptions.</span>
                    </label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="final7">
                    <label for="final7">
                        <strong>Motivation set</strong>
                        <span class="desc">Why are you learning PHP? Keep that vision in front of you.</span>
                    </label>
                </div>
            </div>

            <div class="info-box" style="margin-top: 30px;">
                <strong>🎯 You're ready! Start with Module 13: Database Basics today.</strong> Don't wait for tomorrow.
                Don't wait for Monday. Now is the time. You've got everything you need. Let's go! 🚀
            </div>
        </div>

        <!-- Call to Action -->
        <div class="content-section"
            style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; text-align: center;">
            <h2 style="color: white; border-bottom-color: white;">Ready to Transform?</h2>
            <p style="font-size: 1.1em; color: white; margin-bottom: 20px;">
                You're 4-6 months away from becoming an expert PHP developer. Every great developer started exactly
                where you are.
            </p>
            <a href="../modules/13_database_basics/lesson.php" class="cta-button">Start Module 13 Now →</a>
        </div>

        <!-- Navigation Footer -->
        <div class="footer">
            <p><strong>Your learning journey starts now</strong></p>
            <p style="color: #999; margin-bottom: 20px;">One line of code at a time. One concept at a time. One day at a
                time.</p>
            <div class="breadcrumb" style="justify-content: center;">
                <a href="LEARNING_PATH.php">← Learning Path</a>
                <a href="README_ADVANCED.php">Strategies</a>
                <a href="MASTERY_GUIDE.php">Mastery</a>
                <a href="START_HERE.php">Dashboard</a>
            </div>
        </div>
    </div>

    <script>
        function calculateTimeline() {
            const hoursDaily = parseFloat(document.getElementById('hoursDaily').value);
            const daysPerWeek = parseFloat(document.getElementById('daysPerWeek').value);

            const totalHours = 250;
            const hoursPerWeek = hoursDaily * daysPerWeek;
            const weeksNeeded = totalHours / hoursPerWeek;
            const monthsNeeded = Math.round(weeksNeeded / 4.33 * 10) / 10;

            const resultDiv = document.getElementById('result');
            const resultText = document.getElementById('resultText');
            const resultDetail = document.getElementById('resultDetail');

            resultText.textContent = monthsNeeded + ' Months';
            resultDetail.textContent = 'At ' + hoursDaily + ' hours/day, ' + daysPerWeek + ' days/week, you\'ll reach Expert level in approximately ' + monthsNeeded + ' months!';

            resultDiv.style.display = 'block';
        }

        // Calculate on load if needed
        document.addEventListener('DOMContentLoaded', function () {
            // Pre-calculate with defaults
            calculateTimeline();
        });
    </script>

</body>

</html>