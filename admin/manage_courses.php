
<?php
require_once '../db.php';
include '../includes/header.php';

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM courses WHERE id = $id");
    header("Location: manage_courses.php");
    exit;
}

$result = $conn->query("SELECT * FROM courses ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Courses</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f9fc;
      margin: 0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #003049;
    }
    .table-container {
      max-width: 1000px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 14px 16px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #003049;
      color: #fff;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .btn {
      padding: 6px 12px;
      margin-right: 6px;
      font-size: 0.9rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      color: white;
    }
    .btn-edit {
      background-color: #00b894;
    }
    .btn-delete {
      background-color: #e74c3c;
    }
    .btn-edit:hover {
      background-color: #019875;
    }
    .btn-delete:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

<div class="table-container">
  <h2>📚 Manage Courses</h2>
  <table>
    <tr>
      <th>Title</th>
      <th>Provider</th>
      <th>Created</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['provider']) ?></td>
        <td><?= date("M d, Y", strtotime($row['created_at'])) ?></td>
        <td>
          <a href="edit_course.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
          <a href="manage_courses.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this course?')" class="btn btn-delete">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</div>

</body>
</html>

<?php include '../includes/footer.php'; ?>
