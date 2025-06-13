<?php
session_start();
include '../db.php';       // Make sure this uses mysqli connection like $conn = new mysqli(...);
include '../includes/header.php';

// Redirect if not admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

// mysqli version - get total users
$totalUsersResult = $conn->query("SELECT COUNT(*) AS total FROM users");
$totalUsersRow = $totalUsersResult->fetch_assoc();
$totalUsers = $totalUsersRow['total'];

// total courses
$totalCoursesResult = $conn->query("SELECT COUNT(*) AS total FROM courses");
$totalCoursesRow = $totalCoursesResult->fetch_assoc();
$totalCourses = $totalCoursesRow['total'];

// total study groups
$totalStudyGroupsResult = $conn->query("SELECT COUNT(*) AS total FROM study_groups");
$totalStudyGroupsRow = $totalStudyGroupsResult->fetch_assoc();
$totalStudyGroups = $totalStudyGroupsRow['total'];

// recent mentorship requests
$recentRequestsResult = $conn->query("
    SELECT r.id, u.username AS student, m.username AS mentor, r.status, r.created_at
    FROM mentorship_requests r
    JOIN users u ON r.user_id = u.id
    JOIN users m ON r.mentor_id = m.id
    ORDER BY r.created_at DESC
    LIMIT 10
");

?>

<style>
/* Same CSS as before */
.reports-container {
    padding: 40px;
    font-family: 'Segoe UI', sans-serif;
}
.stats-boxes {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}
.stat-box {
    background-color: #1e2746;
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    flex: 1 1 200px;
    text-align: center;
    box-shadow: 0 0 10px rgba(108, 99, 255, 0.3);
}
.stat-box h3 {
    margin-bottom: 10px;
    font-size: 1.1rem;
    color: #6c63ff;
}
.stat-box p {
    font-size: 1.8rem;
    font-weight: bold;
}
.reports-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #f7f9fc;
}
.reports-table th, .reports-table td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: left;
}
.reports-table th {
    background-color: #6c63ff;
    color: #fff;
}
.reports-table tr:nth-child(even) {
    background-color: #eef1f5;
}
</style>

<div class="reports-container">
    <h2>📊 Admin Reports Dashboard</h2>

    <div class="stats-boxes">
        <div class="stat-box">
            <h3>Total Users</h3>
            <p><?= htmlspecialchars($totalUsers) ?></p>
        </div>
        <div class="stat-box">
            <h3>Total Courses</h3>
            <p><?= htmlspecialchars($totalCourses) ?></p>
        </div>
        <div class="stat-box">
            <h3>Study Groups</h3>
            <p><?= htmlspecialchars($totalStudyGroups) ?></p>
        </div>
    </div>

    <h3>📋 Recent Mentorship Requests</h3>
    <table class="reports-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Mentor</th>
                <th>Status</th>
                <th>Requested At</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $recentRequestsResult->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['student']) ?></td>
                    <td><?= htmlspecialchars($row['mentor']) ?></td>
                    <td><?= ucfirst(htmlspecialchars($row['status'])) ?></td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
