<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSE Study Room</title>
  <link rel="stylesheet" href="assets/css/home.css" />
  <style>
    a {
      text-decoration: none;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <header class="navbar">
    <div class="nav-left">
      <div class="logo"><strong>CSE</strong> Study Room</div>
      <nav>
        <a href="pages/courses.php">Courses</a>
        <a href="pages/mentorship.php">Programs</a>
        <a href="pages/news.php">About</a>
      </nav>
    </div>
    <div class="nav-right">
      <div class="search-box">
        <input type="text" placeholder="Search courses..." />
      </div>
      <a href="auth/login.php" class="login-btn">Log In</a>
      <a href="auth/register.php" class="signup-btn">Sign Up</a>
    </div>
  </header>

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero-left">
      <h1>Learning that gets you <br /><span class="highlight">skills for today</span></h1>
      <p>Skills for your present (and your future). Get started<br />with us and transform your career in Computer<br />Science and Engineering.</p>
      <div class="buttons">
        <a href="pages/courses.php" class="explore">Explore Courses</a>
      </div>
      <div class="stats">
        <div class="stat"><strong>10,000+</strong><br />Students</div>
        <div class="stat"><strong>50+</strong><br />Courses</div>
        <div class="stat"><strong>95%</strong><br />Success Rate</div>
      </div>
    </div>
    <div class="hero-right">
      <div class="image-container">
        <img src="assets/images/hero-placeholder.png" alt="Students learning" />
      </div>
    </div>
  </div>

  <!-- Skills Section -->
  <section class="skills-section">
    <h2>All the skills you need in one place</h2>
    <p>From core concepts to specialized topics, we support your professional growth</p>
    <div class="skills-grid">
      <a href="pages/career.php?track=web" class="skill-card"><img src="assets/images/web-icon (2).png" alt="Web Dev"><h3>Web Development</h3><p>Build modern, responsive websites and web applications</p><span>120+ courses</span></a>
      <a href="pages/career.php?track=data-science" class="skill-card"><img src="assets/images/data-science.png" alt="Data"><h3>Data Science</h3><p>Analyze data and build predictive models</p><span>85+ courses</span></a>
      <a href="pages/career.php?track=ml" class="skill-card"><img src="assets/images/machine-icon.png" alt="ML"><h3>Machine Learning</h3><p>Create intelligent systems and AI solutions</p><span>67+ courses</span></a>
      <a href="pages/career.php?track=mobile" class="skill-card"><img src="assets/images/mobile-icon.png" alt="Mobile"><h3>Mobile Development</h3><p>Build iOS and Android applications</p><span>45+ courses</span></a>
    </div>
  </section>

  <!-- Featured Courses -->
  <section class="featured-section">
    <h2>Featured Courses</h2>
    <p>Hand-picked courses to accelerate your learning journey</p>
    <div class="course-grid">
      <a href="pages/courses.php?course=web-dev" class="course-card">
        <div class="course-image">
          <img src="assets/images/web-course.jpg" alt="Web Dev Course">
          <span class="badge-new">New</span>
        </div>
        <div class="course-content">
          <h3>Complete Web Development Bootcamp</h3>
          <p>Learn HTML, CSS, JavaScript, React, Node.js and more in this comprehensive course</p>
          <div class="course-meta"><span>👤 John Smith</span><span>⭐ 4.8 (12,345)</span></div>
          <div class="course-footer"><strong>$49.99</strong><span class="level">Beginner</span></div>
        </div>
      </a>
      <a href="pages/courses.php?course=data-science" class="course-card">
        <div class="course-image">
          <img src="assets/images/data-icon.png" alt="Python Course">
          <span class="badge-new">New</span>
        </div>
        <div class="course-content">
          <h3>Python for Data Science</h3>
          <p>Master Python programming and data analysis with pandas, numpy, and...</p>
          <div class="course-meta"><span>👤 Sarah Johnson</span><span>⭐ 4.9 (8,567)</span></div>
          <div class="course-footer"><strong>$39.99</strong><span class="level">Intermediate</span></div>
        </div>
      </a>
      <a href="pages/courses.php?course=ml" class="course-card">
        <div class="course-image">
          <img src="assets/images/ml-course.jpg" alt="ML Course">
          <span class="badge-new">New</span>
        </div>
        <div class="course-content">
          <h3>Machine Learning Fundamentals</h3>
          <p>Introduction to ML algorithms, supervised and unsupervised learning</p>
          <div class="course-meta"><span>👤 Dr. Michael Chen</span><span>⭐ 4.7 (6,789)</span></div>
          <div class="course-footer"><strong>$59.99</strong><span class="level">Advanced</span></div>
        </div>
      </a>
    </div>
  </section>

  <!-- Careers Section -->
  <section class="careers-section">
    <h2>Ready to reimagine your career?</h2>
    <p>Get the skills and real-world experience employers want</p>
    <div class="career-cards">
      <div class="career-card">
        <h3>Full Stack Developer</h3>
        <div class="salary">$127,005</div>
        <p>average salary</p>
        <span>16,500+ open roles</span>
        <div class="career-tags">
          <span>React</span><span>Node.js</span><span>MongoDB</span><span>JavaScript</span>
        </div>
      </div>
      <div class="career-card">
        <h3>Data Scientist</h3>
        <div class="salary">$126,629</div>
        <p>average salary</p>
        <span>20,800+ open roles</span>
        <div class="career-tags">
          <span>Python</span><span>Machine Learning</span><span>SQL</span><span>Statistics</span>
        </div>
      </div>
      <div class="career-card">
        <h3>Mobile Developer</h3>
        <div class="salary">$98,456</div>
        <p>average salary</p>
        <span>12,300+ open roles</span>
        <div class="career-tags">
          <span>React Native</span><span>Flutter</span><span>Swift</span><span>Kotlin</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Learning Goals Section -->
  <section class="focus-section">
    <h2>Learning focused on your goals</h2>
    <p>Achieve your objectives with our comprehensive learning approach</p>
    <div class="focus-grid">
      <div class="focus-box">
        <img src="assets/images/focus1.png" alt="Hands-on">
        <h3>Hands-on Training</h3>
        <p>Upskill effectively with coding exercises, quizzes, and real-world projects that matter.</p>
      </div>
      <div class="focus-box">
        <img src="assets/images/focus2.png" alt="Certification">
        <h3>Certification Prep</h3>
        <p>Get ready for industry-recognized exams with step-by-step guidance and practice tests.</p>
      </div>
      <div class="focus-box">
        <img src="assets/images/focus3.png" alt="Analytics">
        <h3>Analytics & Progress</h3>
        <p>Track your learning stats, monitor progress, and see where you shine with detailed insights.</p>
      </div>
    </div>
  </section>

  <!-- Call to Action & Footer -->
  <section class="cta-footer">
    <div class="cta">
      <h2>Start your learning journey today</h2>
      <p>Join thousands of students who have transformed their careers with CSE Study Room</p>
      <a href="auth/register.php" class="cta-btn">Get Started Free</a>
    </div>
    <footer class="footer">
      <div class="footer-cols">
        <div>
          <h3>CSE Study Room</h3>
          <p>Empowering students with quality computer science education and practical skills.</p>
        </div>
        <div>
          <h4>Courses</h4>
          <ul>
            <li><a href="pages/courses.php?category=web">Web Development</a></li>
            <li><a href="pages/courses.php?category=data">Data Science</a></li>
            <li><a href="pages/courses.php?category=ml">Machine Learning</a></li>
            <li><a href="pages/courses.php?category=mobile">Mobile Development</a></li>
          </ul>
        </div>
        <div>
          <h4>Support</h4>
          <ul>
            <li><a href="pages/help.php">Help Center</a></li>
            <li><a href="pages/contact.php">Contact Us</a></li>
            <li><a href="pages/privacy.php">Privacy Policy</a></li>
            <li><a href="pages/terms.php">Terms of Service</a></li>
          </ul>
        </div>
        <div>
          <h4>Connect</h4>
          <ul>
            <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
            <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
            <li><a href="https://linkedin.com" target="_blank">LinkedIn</a></li>
            <li><a href="https://youtube.com" target="_blank">YouTube</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </section>
</body>
</html>
