<?php
/**
 * ADVANCED LEARNING STRATEGIES DASHBOARD
 * Your roadmap to mastering PHP backend development
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Learning Strategies - PHP Backend</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
            color: #f5576c;
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
            color: #f5576c;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
            background: #ffe0e6;
            transition: all 0.3s;
        }

        .breadcrumb a:hover {
            background: #f5576c;
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
            color: #f5576c;
            margin-bottom: 30px;
            font-size: 2em;
            border-bottom: 3px solid #f5576c;
            padding-bottom: 15px;
        }

        .content-section h3 {
            color: #f5576c;
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 1.3em;
        }

        .strategy-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .strategy-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(245, 87, 108, 0.3);
            transition: all 0.3s;
        }

        .strategy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(245, 87, 108, 0.4);
        }

        .strategy-card h3 {
            color: white;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .strategy-card p {
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .skill-matrix {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 8px;
            overflow: hidden;
        }

        .skill-matrix th {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }

        .skill-matrix td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .skill-matrix tr:nth-child(even) {
            background: #f9f9f9;
        }

        .skill-level {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
        }

        .level-beginner {
            background: #d1fae5;
            color: #065f46;
        }

        .level-intermediate {
            background: #fef3c7;
            color: #92400e;
        }

        .level-advanced {
            background: #fee2e2;
            color: #7c2d12;
        }

        .level-expert {
            background: #ede9fe;
            color: #5b21b6;
        }

        .study-tips {
            background: #fff7ed;
            border-left: 4px solid #f5576c;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .study-tips strong {
            color: #f5576c;
        }

        .study-tips ol,
        .study-tips ul {
            margin-left: 20px;
            margin-top: 10px;
            line-height: 1.8;
        }

        .study-tips li {
            margin-bottom: 8px;
            color: #555;
        }

        .info-box {
            background: #fce7f3;
            border-left: 4px solid #f5576c;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .info-box strong {
            color: #f5576c;
        }

        .progression {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .progression h4 {
            color: #f5576c;
            margin-bottom: 15px;
        }

        .progression-item {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .progression-item:last-child {
            border-bottom: none;
        }

        .progression-icon {
            font-size: 2em;
            min-width: 40px;
        }

        .progression-content h5 {
            color: #333;
            margin-bottom: 5px;
        }

        .progression-content p {
            color: #666;
            font-size: 0.95em;
            line-height: 1.5;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
            box-shadow: 0 10px 25px rgba(245, 87, 108, 0.4);
        }

        .checklist {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .checklist-item:last-child {
            border-bottom: none;
        }

        .checklist-item input[type="checkbox"] {
            margin-right: 15px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .checklist-item label {
            flex: 1;
            cursor: pointer;
            color: #555;
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

            .strategy-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Navigation -->
        <div
            style="background:white;border-radius:10px;padding:12px 20px;margin-bottom:20px;box-shadow:0 2px 10px rgba(0,0,0,0.1);display:flex;gap:15px;flex-wrap:wrap;">
            <a href="index.php" style="color:#f5576c;text-decoration:none;font-weight:500;">← Home</a>
            <span style="color:#ddd;">|</span>
            <a href="START_HERE.php" style="color:#f5576c;text-decoration:none;font-weight:500;">Dashboard</a>
            <a href="LEARNING_PATH.php" style="color:#f5576c;text-decoration:none;font-weight:500;">Learning Path</a>
            <a href="GETTING_STARTED.php" style="color:#f5576c;text-decoration:none;font-weight:500;">Getting
                Started</a>
            <a href="MASTERY_GUIDE.php" style="color:#f5576c;text-decoration:none;font-weight:500;">Mastery Guide</a>
            <a href="modules/index.php" style="color:#f5576c;text-decoration:none;font-weight:500;">All Modules</a>
            <a href="projects/index.php" style="color:#f5576c;text-decoration:none;font-weight:500;">Projects</a>
        </div>
        <!-- Header -->
        <div class="header">
            <h1>🚀 How to Learn Effectively</h1>
            <p>Techniques and mindset to accelerate your growth from intermediate to expert level</p>
            <div class="breadcrumb">
                <a href="START_HERE.php">← Back to Dashboard</a>
                <a href="LEARNING_PATH.php">Learning Path</a>
            </div>
        </div>

        <!-- Section 1: The Right Mindset -->
        <div class="content-section">
            <h2>🧠 The Right Mindset</h2>

            <p style="color: #666; margin-bottom: 20px; font-size: 1.05em;">
                Your mindset determines your success more than any course or tutorial. Here are the mental frameworks
                that separate expert developers from the rest.
            </p>

            <div class="strategy-grid">
                <div class="strategy-card">
                    <h3>🎯 Focus on Fundamentals</h3>
                    <p>Master the core concepts deeply. Don't skip basic topics to jump to fancy frameworks. Strong
                        fundamentals are your foundation for everything else.</p>
                </div>

                <div class="strategy-card">
                    <h3>💪 Embrace Struggle</h3>
                    <p>Difficulty is a sign of learning. When you're stuck, you're growing. Debug your own code. Don't
                        immediately look for answers. Problem-solving is the superpower.</p>
                </div>

                <div class="strategy-card">
                    <h3>🔍 Read & Study Code</h3>
                    <p>Read other people's code constantly. Understand design patterns in real projects. GitHub is your
                        textbook. Study frameworks, not just tutorials.</p>
                </div>

                <div class="strategy-card">
                    <h3>⚙️ Build Things</h3>
                    <p>The only way to truly learn is by building. Complete small projects. Build variations. Refactor.
                        The act of building reveals gaps in your knowledge.</p>
                </div>

                <div class="strategy-card">
                    <h3>📚 Stay Curious</h3>
                    <p>Technology evolves constantly. Read blogs, follow developers, stay updated. Curiosity compounds
                        over years into expertise.</p>
                </div>

                <div class="strategy-card">
                    <h3>🤝 Teach Others</h3>
                    <p>Teaching forces clarity. Explain concepts to others. Write blog posts. Answer questions. You'll
                        discover what you truly understand.</p>
                </div>
            </div>
        </div>

        <!-- Section 2: Skill Progression -->
        <div class="content-section">
            <h2>📈 Your Skill Progression Matrix</h2>

            <p style="color: #666; margin-bottom: 20px;">
                This matrix shows what you'll master at each level. Use it to track your progress and identify gaps.
            </p>

            <table class="skill-matrix">
                <thead>
                    <tr>
                        <th>Core Skills</th>
                        <th style="width: 120px;">Beginner</th>
                        <th style="width: 120px;">Intermediate</th>
                        <th style="width: 120px;">Advanced</th>
                        <th style="width: 120px;">Expert</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>PHP Syntax & Basics</strong></td>
                        <td><span class="skill-level level-beginner">Master</span></td>
                        <td><span class="skill-level level-intermediate">Fluent</span></td>
                        <td><span class="skill-level level-advanced">Expert</span></td>
                        <td><span class="skill-level level-expert">Master</span></td>
                    </tr>
                    <tr>
                        <td><strong>Databases & SQL</strong></td>
                        <td><span class="skill-level level-beginner">Basic</span></td>
                        <td><span class="skill-level level-intermediate">Proficient</span></td>
                        <td><span class="skill-level level-advanced">Expert</span></td>
                        <td><span class="skill-level level-expert">Master</span></td>
                    </tr>
                    <tr>
                        <td><strong>OOP & Design Patterns</strong></td>
                        <td><span class="skill-level level-beginner">Basic</span></td>
                        <td><span class="skill-level level-intermediate">Intermediate</span></td>
                        <td><span class="skill-level level-advanced">Proficient</span></td>
                        <td><span class="skill-level level-expert">Master</span></td>
                    </tr>
                    <tr>
                        <td><strong>Security & Authentication</strong></td>
                        <td><span class="skill-level level-beginner">Aware</span></td>
                        <td><span class="skill-level level-intermediate">Basic</span></td>
                        <td><span class="skill-level level-advanced">Proficient</span></td>
                        <td><span class="skill-level level-expert">Master</span></td>
                    </tr>
                    <tr>
                        <td><strong>API Development</strong></td>
                        <td><span class="skill-level level-beginner">None</span></td>
                        <td><span class="skill-level level-intermediate">Basic</span></td>
                        <td><span class="skill-level level-advanced">Proficient</span></td>
                        <td><span class="skill-level level-expert">Expert</span></td>
                    </tr>
                    <tr>
                        <td><strong>Testing & Debugging</strong></td>
                        <td><span class="skill-level level-beginner">Basic</span></td>
                        <td><span class="skill-level level-intermediate">Intermediate</span></td>
                        <td><span class="skill-level level-advanced">Proficient</span></td>
                        <td><span class="skill-level level-expert">Master</span></td>
                    </tr>
                    <tr>
                        <td><strong>Deployment & DevOps</strong></td>
                        <td><span class="skill-level level-beginner">None</span></td>
                        <td><span class="skill-level level-intermediate">Aware</span></td>
                        <td><span class="skill-level level-advanced">Intermediate</span></td>
                        <td><span class="skill-level level-expert">Proficient</span></td>
                    </tr>
                    <tr>
                        <td><strong>System Design</strong></td>
                        <td><span class="skill-level level-beginner">None</span></td>
                        <td><span class="skill-level level-intermediate">None</span></td>
                        <td><span class="skill-level level-advanced">Basic</span></td>
                        <td><span class="skill-level level-expert">Proficient</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Section 3: Study Techniques -->
        <div class="content-section">
            <h2>📖 Effective Study Techniques</h2>

            <div class="study-tips">
                <strong>🎬 The SQ3R Method (Survey, Question, Read, Recite, Review)</strong>
                <ol>
                    <li><strong>Survey:</strong> Skim through the module overview to understand the big picture</li>
                    <li><strong>Question:</strong> Ask yourself what you want to learn from this module</li>
                    <li><strong>Read:</strong> Actively read the lessons with those questions in mind</li>
                    <li><strong>Recite:</strong> Explain what you learned in your own words (or write notes)</li>
                    <li><strong>Review:</strong> Go back and reinforce the key concepts</li>
                </ol>
            </div>

            <div class="study-tips">
                <strong>💻 The Feynman Technique for Learning Code</strong>
                <ol>
                    <li>Read a concept or tutorial carefully</li>
                    <li>Explain it out loud in simple terms, as if teaching a beginner</li>
                    <li>Identify gaps when you struggle to explain</li>
                    <li>Return to the source and fill those gaps</li>
                    <li>Code it yourself without looking at examples</li>
                </ol>
            </div>

            <div class="study-tips">
                <strong>🔄 Spaced Repetition & Interleaving</strong>
                <ul>
                    <li><strong>Spaced Repetition:</strong> Review topics again after 1 day, 3 days, 1 week. This fights
                        the forgetting curve.</li>
                    <li><strong>Interleaving:</strong> Mix different topics in one study session instead of blocking
                        (doing one topic for hours). It's harder but more effective.</li>
                    <li>Use flashcards or a simple spreadsheet to track which concepts need review</li>
                </ul>
            </div>

            <div class="study-tips">
                <strong>🛠️ Deliberate Practice</strong>
                <ul>
                    <li>Practice at the edge of your ability—challenging but not overwhelming</li>
                    <li>Focus on your weaknesses, not just comfortable tasks</li>
                    <li>Get feedback: use debugging, test your code, compare with solutions</li>
                    <li>Repeat and refine: Do the exercise multiple times until it's second nature</li>
                </ul>
            </div>
        </div>

        <!-- Section 4: Daily Habits -->
        <div class="content-section">
            <h2>⚡ Daily Habits of Expert Developers</h2>

            <div class="progression">
                <h4>Your Daily Routine</h4>

                <div class="progression-item">
                    <div class="progression-icon">🌅</div>
                    <div class="progression-content">
                        <h5>Morning: Refresh & Plan (15 min)</h5>
                        <p>Review yesterday's notes. Identify today's learning goal. What ONE concept will you master?
                        </p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">🧠</div>
                    <div class="progression-content">
                        <h5>Deep Work: Study & Code (90 min)</h5>
                        <p>No distractions. Silence. Close Slack/email. Read the lesson twice. Type the examples. Run
                            them. Modify them.</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">🎯</div>
                    <div class="progression-content">
                        <h5>Practice: Exercise & Debug (60 min)</h5>
                        <p>Complete the exercises. Fight through the struggle. Debug errors yourself first. THEN check
                            solutions. Why did you miss it?</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">📝</div>
                    <div class="progression-content">
                        <h5>Reflection: Document & Review (15 min)</h5>
                        <p>Write 3-5 key takeaways. What was hard? What will you review tomorrow? Update your spaced
                            repetition list.</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">🔥</div>
                    <div class="progression-content">
                        <h5>Evening: Curiosity & Growth (30 min optional)</h5>
                        <p>Read a blog post from a senior developer. Watch a GitHub repo. Check trending projects. Stay
                            inspired and informed.</p>
                    </div>
                </div>
            </div>

            <div class="info-box">
                <strong>💡 Pro Tip:</strong> Consistency beats intensity. 2 hours daily for 4 months beats 10 hours
                daily for 2 weeks. Your brain needs time to consolidate learning.
            </div>
        </div>

        <!-- Section 5: Resources by Level -->
        <div class="content-section">
            <h2>📚 Recommended Resources by Level</h2>

            <h3>Intermediate (Modules 13-18)</h3>
            <ul style="margin-left: 20px; color: #555; line-height: 1.8;">
                <li><strong>Databases:</strong> Official MySQL docs, "Database Design Manual" patterns</li>
                <li><strong>Security:</strong> OWASP Top 10, "PHP Security" by O'Reilly</li>
                <li><strong>Architecture:</strong> MVC tutorials, "Clean Code" PHP examples</li>
                <li><strong>Practice:</strong> Build a Todo app, Blog system, Real-world projects</li>
            </ul>

            <h3 style="margin-top: 20px;">Advanced (Modules 19-24)</h3>
            <ul style="margin-left: 20px; color: #555; line-height: 1.8;">
                <li><strong>Design Patterns:</strong> "Head First Design Patterns", PHP examples</li>
                <li><strong>APIs:</strong> RESTful Web Services tutorials, real API documentation</li>
                <li><strong>Testing:</strong> PHPUnit docs, TDD tutorials</li>
                <li><strong>Performance:</strong> Profiling tools, caching strategies documentation</li>
                <li><strong>DevOps:</strong> Docker documentation, CI/CD tutorials</li>
            </ul>

            <h3 style="margin-top: 20px;">Expert (Modules 25-30)</h3>
            <ul style="margin-left: 20px; color: #555; line-height: 1.8;">
                <li><strong>System Design:</strong> "Designing Data-Intensive Applications" by Martin Kleppmann</li>
                <li><strong>Microservices:</strong> "Building Microservices" by Sam Newman</li>
                <li><strong>Architecture:</strong> Domain-Driven Design, CQRS patterns</li>
                <li><strong>Learning from Code:</strong> Laravel, Symfony source code, open source projects</li>
            </ul>
        </div>

        <!-- Section 6: Common Mistakes to Avoid -->
        <div class="content-section">
            <h2>⚠️ Common Mistakes to Avoid</h2>

            <div class="progression">
                <div class="progression-item">
                    <div class="progression-icon">❌</div>
                    <div class="progression-content">
                        <h5>Tutorial Hell</h5>
                        <p>Watching tutorials without coding. You need to BUILD. Watch 5 min, code for 30 min. Ratio
                            matters.</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">❌</div>
                    <div class="progression-content">
                        <h5>Rushing Through Basics</h5>
                        <p>Skipping fundamental concepts to learn frameworks. Strong fundamentals = fast framework
                            learning later.</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">❌</div>
                    <div class="progression-content">
                        <h5>Copy-Paste without Understanding</h5>
                        <p>Copying code without understanding it. Always ask: WHY does this work? WHAT would break it?
                            How would I write it differently?</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">❌</div>
                    <div class="progression-content">
                        <h5>Not Reading Error Messages</h5>
                        <p>PHP/database errors contain clues. Read them fully. Google the exact error. This is
                            debugging—a critical skill.</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">❌</div>
                    <div class="progression-content">
                        <h5>Inconsistent Practice</h5>
                        <p>Learning for 6 hours one day, then 0 hours for a week. Your brain needs regular
                            reinforcement. 2 hours daily beats 12 hours weekly.</p>
                    </div>
                </div>

                <div class="progression-item">
                    <div class="progression-icon">❌</div>
                    <div class="progression-content">
                        <h5>Never Reviewing Old Code</h5>
                        <p>Look back at code you wrote weeks ago. You'll see how much you've improved. That's
                            motivation. Also practice refactoring.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 7: Tracking Progress -->
        <div class="content-section">
            <h2>✅ Track Your Progress</h2>

            <p style="color: #666; margin-bottom: 20px;">
                Use this checklist to track your mastery at each level. Mark items as you complete them.
            </p>

            <h3>Intermediate Level Checklist</h3>
            <div class="checklist">
                <div class="checklist-item">
                    <input type="checkbox" id="check1">
                    <label for="check1">✓ Write complex SQL queries with JOINs and subqueries</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check2">
                    <label for="check2">✓ Understand and implement MVC architecture</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check3">
                    <label for="check3">✓ Implement prepared statements and prevent SQL injection</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check4">
                    <label for="check4">✓ Handle errors gracefully with try-catch blocks</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check5">
                    <label for="check5">✓ Build a complete CRUD application from scratch</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check6">
                    <label for="check6">✓ Implement user authentication and sessions properly</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check7">
                    <label for="check7">✓ Understand PDO and database connections</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" id="check8">
                    <label for="check8">✓ Validate and sanitize user input</label>
                </div>
            </div>

            <div class="info-box">
                <strong>📌 Milestone:</strong> When you can build a Todo app with authentication and database without
                tutorial help, you've reached Intermediate level!
            </div>
        </div>

        <!-- Section 8: Next Steps -->
        <div class="content-section">
            <h2>🎯 Your Next Steps</h2>

            <div
                style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 30px; border-radius: 12px; margin: 20px 0;">
                <h3 style="color: white; margin-bottom: 15px;">Start Today</h3>
                <ol style="color: white; margin-left: 20px; line-height: 1.8;">
                    <li><strong>Set a daily study time:</strong> 2 hours minimum (morning is best)</li>
                    <li><strong>Remove distractions:</strong> Phone away, email closed, single window</li>
                    <li><strong>Pick Module 13:</strong> Database Basics - your foundation</li>
                    <li><strong>Follow the SQ3R method:</strong> Survey → Question → Read → Recite → Review</li>
                    <li><strong>Write code:</strong> Type every example. Run it. Modify it. Break it. Fix it.</li>
                    <li><strong>Complete exercises:</strong> Don't skip. Struggle is learning.</li>
                    <li><strong>Build Project 1:</strong> Todo app - consolidate everything learned</li>
                </ol>
            </div>

            <a href="LEARNING_PATH.php" class="cta-button">← Back to Learning Path</a>
            <a href="START_HERE.php" class="cta-button">Back to Dashboard →</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Remember:</strong> Expertise is not a destination, it's a journey of continuous learning and
                growth.</p>
            <p style="color: #999;">You've got this! 💪</p>
        </div>
    </div>

</body>

</html>