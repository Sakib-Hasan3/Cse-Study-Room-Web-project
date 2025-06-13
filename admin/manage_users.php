<?php
session_start();
require_once '../db.php';

// Ensure only admins access this
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// DELETE User
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    header("Location: manage_users.php?deleted=1");
    exit();
}

// Search
$search = $_GET['search'] ?? '';
$search_query = "";
$params = [];
if (!empty($search)) {
    $search_query = "WHERE username LIKE ? OR role LIKE ?";
    $like = "%$search%";
    $params = [$like, $like];
}

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Count total users
$count_sql = "SELECT COUNT(*) FROM users $search_query";
$count_stmt = $conn->prepare($count_sql);
if (!empty($params)) {
    $count_stmt->bind_param(str_repeat("s", count($params)), ...$params);
}
$count_stmt->execute();
$count_stmt->bind_result($total_users);
$count_stmt->fetch();
$count_stmt->close();
$total_pages = ceil($total_users / $limit);

// Fetch users with pagination
$user_sql = "SELECT id, username, role FROM users $search_query ORDER BY id DESC LIMIT ?, ?";
$stmt = $conn->prepare($user_sql);
if (!empty($params)) {
    $types = str_repeat("s", count($params)) . "ii";
    $bindValues = array_merge($params, [$offset, $limit]);
    $stmt->bind_param($types, ...$bindValues);
} else {
    $stmt->bind_param("ii", $offset, $limit);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Users - CSE STUDY ROOM</title>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <style>
    .container {
      padding: 60px 20px;
      max-width: 1000px;
      margin: auto;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #003049;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #003049;
      color: #fff;
    }
    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      color: #fff;
      cursor: pointer;
    }
    .btn-delete {
      background-color: #e74c3c;
    }
    .btn-update {
      background-color: #3498db;
    }
    .pagination {
      margin-top: 20px;
      text-align: center;
    }
    .pagination a {
      margin: 0 6px;
      text-decoration: none;
      color: #003049;
      font-weight: bold;
    }
    .search-bar {
      margin-top: 20px;
      text-align: right;
    }
    .search-bar input {
      padding: 6px;
      width: 250px;
    }
    .nav {
      width: 100%;
      background: #003049;
      padding: 14px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: white;
      padding-left: 24px;
      padding-right: 24px;
    }
    .nav__brand {
      font-size: 1.3rem;
      font-weight: bold;
    }
    .nav__links {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    .nav__links a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }
    .nav__logout {
      background: #e74c3c;
      padding: 6px 12px;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <nav class="nav">
    <div class="nav__brand">CSE STUDY ROOM</div>
    <ul class="nav__links">
      <li><a href="../admin/dashboard.php">Dashboard</a></li>
      <li><a href="manage_users.php">Manage Users</a></li>
       <li><a href="../admin/manage_courses.php">Manage Course</a></li>
      <li><a href="../auth/logout.php" class="nav__logout">Logout</a></li>
    </ul>
  </nav>

  <div class="container">
    <h2>Manage Users</h2>

    <div class="search-bar">
      <form method="GET">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search username or role">
        <button type="submit">Search</button>
      </form>
    </div>

    <?php if (isset($_GET['deleted'])): ?>
      <p style="color: green;">User deleted successfully.</p>
    <?php endif; ?>

    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['username']) ?></td>
          <td><?= htmlspecialchars($row['role']) ?></td>
          <td>
            <a href="update_user.php?id=<?= $row['id'] ?>" class="btn btn-update">Update</a>
            <a href="manage_users.php?delete_id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>

    <!-- Pagination -->
    <div class="pagination">
      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
      <?php endfor; ?>
    </div>
  </div>

</body>
</html>
<?php require_once '../includes/footer.php'; ?>
