<?php
session_start();

// Fallback dummy data for testing
$full_name = $_POST['full_name'] ?? 'Lila Adams';
$phone = $_POST['phone'] ?? '+1-555-555-5555';
$email = $_POST['email'] ?? 'lila.adams@example.com';
$location = $_POST['location'] ?? 'Austin, TX, USA';
$summary = $_POST['summary'] ?? 'Creative and detail-oriented Content Writer...';
$experience = $_POST['experience'] ?? 'Content Writer at Bright Ideas Marketing...';
$skills = $_POST['skills'] ?? 'SEO, Copywriting, Editing, WordPress';
$languages = $_POST['languages'] ?? 'English, Spanish';
$strengths = $_POST['strengths'] ?? 'Creativity, Research';
$education = $_POST['education'] ?? 'Bachelor of Arts, UT Austin';
$projects = $_POST['projects'] ?? 'Content Strategy for SaaS';
$certifications = $_POST['certifications'] ?? 'SEO Certification from HubSpot';
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= htmlspecialchars($full_name) ?> - CV</title>
  <link rel="stylesheet" href="assets/css/cv_template.css">
</head>
<body>

<div class="cv-container">
  <aside class="left-column">
    <div class="photo">
      <img src="assets/images/default-photo.jpg" alt="Profile">
    </div>
    <h1><?= htmlspecialchars($full_name) ?></h1>
    <p class="position">Content Writer</p>
    <p class="contact"><?= htmlspecialchars($email) ?><br><?= htmlspecialchars($phone) ?><br><?= htmlspecialchars($location) ?></p>

    <div class="section">
      <h2>Skills</h2>
      <ul><?php foreach (explode(',', $skills) as $s) echo "<li>" . trim($s) . "</li>"; ?></ul>
    </div>

    <div class="section">
      <h2>Languages</h2>
      <p><?= nl2br(htmlspecialchars($languages)) ?></p>
    </div>

    <div class="section">
      <h2>Strengths</h2>
      <p><?= nl2br(htmlspecialchars($strengths)) ?></p>
    </div>
  </aside>

  <main class="right-column">
    <div class="section">
      <h2>Summary</h2>
      <p><?= nl2br(htmlspecialchars($summary)) ?></p>
    </div>

    <div class="section">
      <h2>Experience</h2>
      <p><?= nl2br(htmlspecialchars($experience)) ?></p>
    </div>

    <div class="section">
      <h2>Education</h2>
      <p><?= nl2br(htmlspecialchars($education)) ?></p>
    </div>

    <div class="section">
      <h2>Projects</h2>
      <p><?= nl2br(htmlspecialchars($projects)) ?></p>
    </div>

    <div class="section">
      <h2>Certifications</h2>
      <p><?= nl2br(htmlspecialchars($certifications)) ?></p>
    </div>
  </main>
</div>

</body>
</html>
