<?php
session_start();

// Ensure only admin can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}

require_once '../includes/header.php';
?>

<style>
.dashboard-container {
    padding: 40px;
}
.dashboard-header {
    text-align: center;
    margin-bottom: 30px;
}
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}
.dashboard-card {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
    transition: 0.3s;
}
.dashboard-card:hover {
    background-color: #e6f0ff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.dashboard-card a {
    text-decoration: none;
    font-weight: bold;
    color: #004080;
}
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin! Choose an action below.</p>
    </div>

    <div class="dashboard-grid">
        <div class="dashboard-card">
            <a href="manage_courses.php">📚 Manage Courses</a>
        </div>
        <div class="dashboard-card">
            <a href="manage_users.php">👥 Manage Users</a>
        </div>
        <div class="dashboard-card">
            <a href="upload_course.php">⬆️ Upload New Course</a>
        </div>
        <div class="dashboard-card">
            <a href="view_reports.php">📊 View Reports</a>
        </div>
        <div class="dashboard-card">
            <a href="../auth/logout.php">🚪 Logout</a>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
