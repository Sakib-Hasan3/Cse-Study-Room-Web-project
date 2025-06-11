<?php
require_once '../db.php';
include '../includes/header.php';

$result = $conn->query("SELECT id, username FROM users");
?>
<h2>Manage Users</h2>
<ul>
    <?php while ($user = $result->fetch_assoc()): ?>
        <li><?= $user['username'] ?> (ID: <?= $user['id'] ?>)</li>
    <?php endwhile; ?>
</ul>
<?php include '../includes/footer.php'; ?>
