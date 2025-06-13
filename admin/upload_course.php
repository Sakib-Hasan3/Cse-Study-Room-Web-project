<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $provider = trim($_POST['provider']);
    $description = trim($_POST['description']);
    $link = trim($_POST['link']);
    $visibility = $_POST['visibility'] ?? 'public';

    if ($title && $provider && $description && $link && in_array($visibility, ['public', 'admin-only'])) {
        $stmt = $conn->prepare("INSERT INTO courses (title, provider, description, link, visibility) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $provider, $description, $link, $visibility);
        if ($stmt->execute()) {
            $success = "✅ Course uploaded successfully!";
        } else {
            $error = "🚫 Failed to upload course. Please try again.";
        }
    } else {
        $error = "🚫 Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Upload Course - Admin</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #0c1222;
      color: #f0f0f0;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    nav {
      background: #1e2746;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.5);
    }
    nav .logo {
      font-weight: 700;
      font-size: 1.4rem;
      color: #6c63ff;
      text-decoration: none;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
      padding: 0;
    }
    nav ul li a {
      color: #cdd1d4;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    nav ul li a:hover {
      color: #6c63ff;
    }

    main {
      flex: 1;
      max-width: 600px;
      margin: 40px auto 60px;
      background: #1e2746;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(108, 99, 255, 0.4);
    }

    h2 {
      margin-bottom: 25px;
      color: #6c63ff;
      text-align: center;
    }

    form label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #cdd1d4;
    }

    input[type="text"],
    input[type="url"],
    textarea,
    select {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      background: #2c335f;
      color: #fff;
      transition: background-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="url"]:focus,
    textarea:focus,
    select:focus {
      outline: none;
      background: #3f46a0;
      box-shadow: 0 0 6px #6c63ff;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    button {
      width: 100%;
      background: #6c63ff;
      color: white;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 15px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 15px rgba(108, 99, 255, 0.5);
    }

    button:hover {
      background: #574edc;
      box-shadow: 0 6px 20px rgba(87, 78, 220, 0.7);
    }

    .success {
      color: #a0d468;
      font-weight: 700;
      margin-bottom: 20px;
      text-align: center;
    }

    .error {
      color: #ed6a5a;
      font-weight: 700;
      margin-bottom: 20px;
      text-align: center;
    }

    footer.footer {
      background-color: #0c1222;
      color: #fff;
      padding: 50px 20px 30px;
      font-family: 'Segoe UI', sans-serif;
      margin-top: auto;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 40px;
      max-width: 1300px;
      margin: auto;
      padding-bottom: 30px;
      border-bottom: 1px solid #333;
    }

    .footer-section {
      flex: 1 1 200px;
      min-width: 180px;
    }

    .footer h3,
    .footer h4 {
      color: #fff;
      font-weight: bold;
      margin-bottom: 14px;
      border-bottom: 2px solid #6c63ff;
      padding-bottom: 6px;
      display: inline-block;
    }

    .footer ul {
      list-style: none;
      padding: 0;
    }

    .footer ul li {
      margin-bottom: 10px;
    }

    .footer ul li a {
      color: #cdd1d4;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer ul li a:hover {
      color: #6c63ff;
    }

    .footer-bottom {
      text-align: center;
      padding-top: 20px;
      font-size: 0.95rem;
      color: #aaa;
    }
  </style>
</head>
<body>

<nav>
  <a href="../admin/dashboard.php" class="logo">CSE Study Room</a>
  <ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="manage_users.php">Manage Users</a></li>
    <li><a href="manage_courses.php">Manage Courses</a></li>
    <li><a href="upload_course.php">Upload Course</a></li>
    <li><a href="upload_job.php">Upload Job</a></li>
    <li><a href="../auth/logout.php" class="nav__logout">Logout</a></li>
  </ul>
</nav>

<main>
  <h2>Upload a New Course</h2>

  <?php if ($success): ?>
    <p class="success"><?= htmlspecialchars($success) ?></p>
  <?php elseif ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form method="POST" novalidate>
    <label for="title">Title*</label>
    <input type="text" id="title" name="title" required>

    <label for="provider">Provider*</label>
    <input type="text" id="provider" name="provider" required>

    <label for="description">Description*</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="link">Course Link*</label>
    <input type="url" id="link" name="link" required>

    <label for="visibility">Visibility*</label>
    <select id="visibility" name="visibility" required>
      <option value="public">Public</option>
      <option value="admin-only">Admin Only</option>
    </select>

    <button type="submit">Upload Course</button>
  </form>
</main>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h3>CSE Study Room</h3>
      <p>Empowering students with quality computer science education and practical skills.</p>
    </div>

    <div class="footer-section">
      <h4>Courses</h4>
      <ul>
        <li><a href="#">Web Development</a></li>
        <li><a href="#">Data Science</a></li>
        <li><a href="#">Machine Learning</a></li>
        <li><a href="#">Mobile Development</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>Support</h4>
      <ul>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4>Connect</h4>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">LinkedIn</a></li>
        <li><a href="#">YouTube</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 CSE Study Room. All rights reserved.</p>
  </div>
</footer>

</body>
</html>
