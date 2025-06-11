<?php
require_once 'db.php';
require_once 'includes/header.php';

// Fetch featured courses (latest 6)
$result = $conn->query("SELECT * FROM courses ORDER BY created_at DESC LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CSE Study Room – Learn Online</title>
  <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

<!-- ✅ Modern Hero Section -->
<section class="hero-modern">
  <div class="hero-text">
    <h1>Learning that Gets You Hired</h1>
    <p>Master industry-relevant skills and prepare for the jobs of tomorrow.</p>
    <a href="pages/courses.php" class="btn-primary">Explore Courses</a>
  </div>
  <div class="hero-image">
    <img src="assets/images/hero-ai.jpg" alt="AI Learning">
  </div>
</section>

<!-- ✅ Career Accelerators -->
<section class="career-section">
  <h2>Ready to reimagine your career?</h2>
  <p>Get the skills and real-world experience employers want with Career Accelerators.</p>
  <div class="career-cards">
    <div class="career-card">
      <img src="assets/images/career-dev.png" alt="Dev">
      <h3>Full Stack Web Developer</h3>
      <p>$127,005 average salary • 16,500+ open roles</p>
    </div>
    <div class="career-card">
      <img src="assets/images/marketer.png" alt="Marketing">
      <h3>Digital Marketer</h3>
      <p>$61,126 average salary • 36,600+ open roles</p>
    </div>
    <div class="career-card">
      <img src="assets/images/data-scientist.png" alt="Data">
      <h3>Data Scientist</h3>
      <p>$126,629 average salary • 20,800+ open roles</p>
    </div>
  </div>
</section>

<!-- ✅ Skills You Need -->
<section class="skills-section">
  <h2>All the skills you need in one place</h2>
  <p>From core concepts to specialized topics, we support your growth.</p>
  <div class="skills-tabs">
    <span>Data Science</span>
    <span>Web Dev</span>
    <span>Machine Learning</span>
    <span>Python</span>
    <span>AI</span>
  </div>
</section>

<!-- ✅ Featured Courses -->
<section class="featured-courses">
  <h2>Featured Courses</h2>
  <div class="course-grid">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($course = $result->fetch_assoc()): ?>
        <div class="course-card">
          <img src="assets/images/<?= htmlspecialchars($course['image']) ?>" alt="<?= htmlspecialchars($course['title']) ?>">
          <div class="course-info">
            <h3><?= htmlspecialchars($course['title']) ?></h3>
            <p><?= htmlspecialchars(substr($course['description'], 0, 90)) ?>...</p>
            <a href="pages/courses.php?id=<?= $course['id'] ?>" class="btn-course">View Course</a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No courses available at the moment.</p>
    <?php endif; ?>
  </div>
</section>

<!-- ✅ Learning Goals Section -->
<section class="goals-section">
  <h2>Learning focused on your goals</h2>
  <div class="goals-grid">
    <div class="goal">
      <h4>🎯 Hands-on training</h4>
      <p>Upskill effectively with coding exercises, quizzes, and real projects.</p>
    </div>
    <div class="goal">
      <h4>📄 Certification Prep</h4>
      <p>Get ready for industry-recognized exams with step-by-step guidance.</p>
    </div>
    <div class="goal">
      <h4>📊 Analytics & Progress</h4>
      <p>Track your learning stats and see where you shine.</p>
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>
