<?php
session_start();
include('../db.php');

// Ensure only admin can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $position = trim($_POST['position']);
    $company = trim($_POST['company']);
    $location = trim($_POST['location']);
    $description = trim($_POST['description']);
    $apply_link = trim($_POST['apply_link']);

    if ($position && $company && $description && $apply_link) {
        $stmt = $conn->prepare("INSERT INTO jobs (position, company, location, description, apply_link) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $position, $company, $location, $description, $apply_link);
        if ($stmt->execute()) {
            $success = "✅ Job uploaded successfully!";
        } else {
            $error = "🚫 Failed to upload job. Please try again.";
        }
    } else {
        $error = "🚫 Please fill in all required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Upload Job – Admin</title>
  <style>
    /* Navigation Bar */
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #121926;
      color: #ddd;
    }
    nav {
      background-color: #0c1222;
      padding: 15px 30px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.4);
    }
    nav ul {
      list-style: none;
      display: flex;
      align-items: center;
      margin: 0;
      padding: 0;
      gap: 25px;
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
    nav ul li a.nav__logout {
      margin-left: auto;
      color: #ed6a5a;
      font-weight: 700;
    }
    nav ul li a.nav__logout:hover {
      color: #ff4c4c;
    }
    /* Main content */
    main {
      max-width: 600px;
      margin: 40px auto;
      background: #1e2746;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 0 25px rgba(108, 99, 255, 0.4);
      color: #f0f0f0;
    }
    h2 {
      color: #6c63ff;
      text-align: center;
      margin-bottom: 25px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #cdd1d4;
    }
    input[type="text"],
    input[type="url"],
    textarea {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      background: #2c335f;
      color: #fff;
      resize: vertical;
    }
    button {
      width: 100%;
      background: #6c63ff;
      color: #fff;
      font-weight: 700;
      font-size: 1.1rem;
      padding: 15px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(108, 99, 255, 0.5);
      transition: background-color 0.3s ease;
    }
    button:hover {
      background: #5848c2;
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
  </style>
</head>
<body>

<nav>
  <ul>
    <li><a href="manage_users.php">Manage Users</a></li>
    <li><a href="manage_courses.php">Manage Courses</a></li>
    <li><a href="upload_course.php">Upload Course</a></li>
    <li><a href="upload_job.php">Upload Job</a></li>
    <li><a href="../auth/logout.php" class="nav__logout">Logout</a></li>
  </ul>
</nav>

<main>
  <h2>Upload New Job</h2>

  <?php if ($success): ?>
    <p class="success"><?= htmlspecialchars($success) ?></p>
  <?php elseif ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form method="POST" novalidate>
    <label for="position">Position*</label>
    <input type="text" id="position" name="position" required>

    <label for="company">Company*</label>
    <input type="text" id="company" name="company" required>

    <label for="location">Location</label>
    <input type="text" id="location" name="location">

    <label for="description">Description*</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="apply_link">Apply Link*</label>
    <input type="url" id="apply_link" name="apply_link" required>

    <button type="submit">Upload Job</button>
  </form>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>
