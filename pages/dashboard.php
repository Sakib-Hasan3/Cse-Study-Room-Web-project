<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$username = isset($_SESSION['username']) 
          ? htmlspecialchars($_SESSION['username']) 
          : "User";

$sections = [
    ['bg'=>'Career.png',    'title'=>'Career Roadmap',                'link'=>'career.php',         'desc'=>'Plan your career path with milestones and skills guidance.'],
    ['bg'=>'Online.png',    'title'=>'Online Courses',                'link'=>'courses.php',        'desc'=>'Browse recommended online courses for CSE topics.'],
    ['bg'=>'Jobs.png',      'title'=>'Internship & Job Opportunities','link'=>'jobs.php',           'desc'=>'Find and apply for CSE internships and jobs.'],
    ['bg'=>'news.jpg',      'title'=>'CSE News & Updates',            'link'=>'news.php',           'desc'=>'Stay informed with the latest CSE news.'],
    ['bg'=>'resources.jpg', 'title'=>'Resources & Study Material',    'link'=>'resources.php',      'desc'=>'Access tutorials, notes, and study guides.'],
    ['bg'=>'mentorship.jpg','title'=>'Mentorship',                    'link'=>'mentorship.php',     'desc'=>'Connect with mentors for guidance and advice.'],
    ['bg'=>'projects.jpg',  'title'=>'Projects & Portfolios',         'link'=>'projects.php',       'desc'=>'Showcase your projects and explore others\'.'],
    ['bg'=>'Study_groups.png',    'title'=>'Study Groups',                  'link'=>'study_groups.php',   'desc'=>'Join groups to collaborate on subjects and projects.'],
    ['bg'=>'questions.jpg', 'title'=>'Ask Questions',                 'link'=>'../questions/ask_questions.php',  'desc'=>'Post your questions and get answers from the community.'],
    ['bg'=>'forum.jpg',     'title'=>'Forum',                         'link'=>'questions/forum.php',          'desc'=>'Participate in discussions on various topics with peers.'],
    ['bg'=>'tips.png',      'title'=>'Study Tips & Quotes',           'link'=>'tips.php',           'desc'=>'Read tips and quotes to stay motivated.'],
    ['bg'=>'cv.png', 'title'=>'Generate CV', 'link'=>'../cv/cv_form.php', 'desc'=>'Build your resume with professional templates.'],
 ['bg'=>'attempt.png', 'title'=>'Attempt_Challenges', 'link'=>'../challenges/attempt_challenges.php', 'desc'=>'Build your resume with professional templates.'],
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard – CSE Study Room</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
  
  <!-- Top Navigation -->
  <nav class="nav">
    <div class="nav__brand">CSE Study Room</div>
    <ul class="nav__links">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="courses.php">Courses</a></li>
      <li><a href="jobs.php">Jobs</a></li>
      <li><a href="mentorship.php">Mentorship</a></li>
      <li><a href="../auth/logout.php" class="nav__logout">Logout</a></li>
    </ul>
  </nav> 

  <div class="dashboard-container">
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p class="intro">
      This is your personalized dashboard where you can access all study room features at a glance.
    </p>

    <div class="dashboard-grid">
      <?php foreach($sections as $s): ?>
      <div class="card" style="background-image: url('../assets/images/<?php echo $s['bg']; ?>');">
        <div class="card-content">
          <a href="<?php echo $s['link']; ?>"
             class="card-btn <?php echo $s['btnClass'] ?? ''; ?>">
             <?php echo htmlspecialchars($s['title']); ?>
          </a>
          <p class="desc"><?php echo htmlspecialchars($s['desc']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
