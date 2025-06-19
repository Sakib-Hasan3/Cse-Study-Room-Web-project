
<?php
session_start();

// Ensure only admin can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit;
}

require_once '../includes/header.php';
include('../db.php');

// Fetch counts for animated stats
$totalUsers = $conn->query("SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];
$totalCourses = $conn->query("SELECT COUNT(*) AS count FROM courses")->fetch_assoc()['count'];
$totalJobs = $conn->query("SELECT COUNT(*) AS count FROM jobs")->fetch_assoc()['count'];
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #f9fbff, #eef4ff);
        margin: 0;
        padding: 0;
    }

    .dashboard-container {
        max-width: 1100px;
        margin: 100px auto;
        padding: 40px 20px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .dashboard-header h1 {
        font-size: 2.5rem;
        color: #003049;
        margin-bottom: 10px;
    }

    .dashboard-header p {
        color: #555;
        font-size: 1.1rem;
    }

    .stats {
        display: flex;
        justify-content: space-around;
        margin-bottom: 40px;
        text-align: center;
    }

    .stat-box {
        background: #d9e7ff;
        padding: 20px 30px;
        border-radius: 12px;
        width: 30%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .stat-box h3 {
        font-size: 2.2rem;
        color: #003049;
        margin-bottom: 5px;
    }

    .stat-box span {
        font-size: 1rem;
        color: #555;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 30px;
    }

    .dashboard-card {
        background: #f1f6ff;
        border-radius: 14px;
        padding: 30px 20px;
        text-align: center;
        border: 1px solid #d9e7ff;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        background: #d9e7ff;
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.1);
    }

    .dashboard-card::before {
        content: "";
        position: absolute;
        top: -40px;
        right: -40px;
        width: 100px;
        height: 100px;
        background: #00b894;
        opacity: 0.1;
        border-radius: 50%;
        transform: rotate(45deg);
    }

    .dashboard-card a {
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        color: #003049;
        display: inline-block;
        padding: 10px 18px;
        border-radius: 8px;
        background: #ffffff;
        transition: background 0.3s, color 0.3s;
    }

    .dashboard-card a:hover {
        background: #003049;
        color: #ffffff;
    }

    canvas {
        margin-top: 40px;
        max-width: 100%;
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin! Manage and explore everything related to the Study Room.</p>
    </div>

    <!-- Stats -->
    <div class="stats">
        <div class="stat-box">
            <h3 id="userCount">0</h3>
            <span>Total Users</span>
        </div>
        <div class="stat-box">
            <h3 id="courseCount">0</h3>
            <span>Total Courses</span>
        </div>
        <div class="stat-box">
            <h3 id="jobCount">0</h3>
            <span>Total Jobs</span>
        </div>
    </div>

    <!-- Chart -->
    <canvas id="chart" height="100"></canvas>

    <!-- Navigation Cards -->
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
            <a href="upload_job.php">📝 Upload New Job</a>
        </div>

        <div class="dashboard-card">
            <a href="view_reports.php">📊 View Reports</a>
        </div>
        <div class="dashboard-card">
            <a href="../auth/logout.php">🚪 Logout</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Animate count up
    function animateValue(id, start, end, duration) {
        const range = end - start;
        let startTime = null;

        const step = timestamp => {
            if (!startTime) startTime = timestamp;
            const progress = Math.min((timestamp - startTime) / duration, 1);
            document.getElementById(id).textContent = Math.floor(progress * range + start);
            if (progress < 1) requestAnimationFrame(step);
        };

        requestAnimationFrame(step);
    }

    animateValue("userCount", 0, <?= $totalUsers ?>, 1000);
    animateValue("courseCount", 0, <?= $totalCourses ?>, 1000);
    animateValue("jobCount", 0, <?= $totalJobs ?>, 1000);

    // Chart.js
    const ctx = document.getElementById('chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users', 'Courses', 'Jobs'],
            datasets: [{
                label: 'Database Summary',
                data: [<?= $totalUsers ?>, <?= $totalCourses ?>, <?= $totalJobs ?>],
                backgroundColor: ['#00b894', '#0984e3', '#fdcb6e']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php require_once '../includes/footer.php'; ?>
