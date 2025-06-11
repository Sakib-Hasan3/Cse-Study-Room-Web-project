<?php
require_once '../db.php';
include '../includes/header.php';

$result = $conn->query("SELECT * FROM courses");
?>
<h2>Manage Courses</h2>
<table>
    <tr><th>Title</th><th>Action</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
        </tr>
    <?php endwhile; ?>
</table>
<?php include '../includes/footer.php'; ?>
