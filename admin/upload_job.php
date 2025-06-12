<?php
session_start();
include('../db.php');

// Ensure only admin can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $position = $_POST['position'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $apply_link = $_POST['apply_link'];

    $stmt = $conn->prepare("INSERT INTO jobs (position, company, location, description, apply_link) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $position, $company, $location, $description, $apply_link);
    $stmt->execute();

    header("Location: dashboard.php?success=job_uploaded");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Job – Admin</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
  <div class="dashboard-container">
    <h2>Upload New Job</h2>
    <form method="POST" style="max-width: 600px; margin-top: 20px;">
      <label>Position:</label><br>
      <input type="text" name="position" required><br><br>

      <label>Company:</label><br>
      <input type="text" name="company" required><br><br>

      <label>Location:</label><br>
      <input type="text" name="location"><br><br>

      <label>Description:</label><br>
      <textarea name="description" rows="4" required></textarea><br><br>

      <label>Apply Link:</label><br>
      <input type="url" name="apply_link" required><br><br>

      <button type="submit">Upload Job</button>
    </form>
  </div>
</body>
</html>
