<?php
session_start();
if (!isset($_SESSION['cv_data'])) {
    header("Location: generate_cv.php");
    exit();
}
$data = $_SESSION['cv_data'];
include('../includes/nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CV Preview - CSE Study Room</title>
  <link rel="stylesheet" href="../assets/css/preview_cv.css">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
    }
    .cv-preview {
      max-width: 900px;
      margin: 50px auto;
      background: #fff;
      padding: 40px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      border-radius: 8px;
      color: #333;
    }
    .cv-preview h1 {
      font-size: 2.5rem;
      color: #003049;
      margin-bottom: 5px;
    }
    .cv-preview h2 {
      color: #005f73;
      margin-top: 30px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 6px;
    }
    .cv-preview p {
      line-height: 1.6;
      margin: 10px 0;
    }
    .cv-actions {
      margin-top: 40px;
      display: flex;
      justify-content: space-between;
    }
    .cv-actions a {
      background: #003049;
      color: #fff;
      padding: 10px 18px;
      border-radius: 5px;
      text-decoration: none;
      transition: background 0.3s ease;
    }
    .cv-actions a:hover {
      background: #005f73;
    }
  </style>
</head>
<body>

<div class="cv-preview">
  <h1><?= htmlspecialchars($data['full_name']) ?></h1>
  <p><?= htmlspecialchars($data['email']) ?> | <?= htmlspecialchars($data['phone']) ?>
     <?= $data['linkedin'] ? "| " . htmlspecialchars($data['linkedin']) : '' ?>
     <?= $data['address'] ? "| " . htmlspecialchars($data['address']) : '' ?></p>

  <h2>Professional Summary</h2>
  <p><?= nl2br(htmlspecialchars($data['summary'])) ?></p>

  <h2>Work Experience</h2>
  <p><?= nl2br(htmlspecialchars($data['experience'])) ?></p>

  <h2>Education</h2>
  <p><?= nl2br(htmlspecialchars($data['education'])) ?></p>

  <h2>Skills</h2>
  <p><?= nl2br(htmlspecialchars($data['skills'])) ?></p>

  <?php if (!empty($data['certifications'])): ?>
    <h2>Certifications</h2>
    <p><?= nl2br(htmlspecialchars($data['certifications'])) ?></p>
  <?php endif; ?>

  <?php if (!empty($data['projects'])): ?>
    <h2>Projects</h2>
    <p><?= nl2br(htmlspecialchars($data['projects'])) ?></p>
  <?php endif; ?>

  <?php if (!empty($data['languages'])): ?>
    <h2>Languages</h2>
    <p><?= nl2br(htmlspecialchars($data['languages'])) ?></p>
  <?php endif; ?>

  <?php if (!empty($data['other'])): ?>
    <h2>Additional</h2>
    <p><?= nl2br(htmlspecialchars($data['other'])) ?></p>
  <?php endif; ?>

  <div class="cv-actions">
    <a href="cv_form.php">← Edit Info</a>
    <a href="#" onclick="window.print()">🖨 Print / Save PDF</a>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
