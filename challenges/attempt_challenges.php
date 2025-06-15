<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$category = $_GET['category'] ?? null;
$difficulty = $_GET['difficulty'] ?? '';
$search = $_GET['search'] ?? '';

// Sidebar categories
$sidebar_categories = $conn->query("SELECT DISTINCT category FROM challenges ORDER BY category")
    ->fetch_all(MYSQLI_ASSOC);

$challenges = [];
if ($category) {
    if ($search) {
        $stmt = $conn->prepare("SELECT * FROM challenges WHERE category = ? AND title LIKE ?");
        $like = "%$search%";
        $stmt->bind_param("ss", $category, $like);
    } elseif ($difficulty) {
        $stmt = $conn->prepare("SELECT * FROM challenges WHERE category = ? AND difficulty = ?");
        $stmt->bind_param("ss", $category, $difficulty);
    } else {
        $stmt = $conn->prepare("SELECT * FROM challenges WHERE category = ?");
        $stmt->bind_param("s", $category);
    }
    $stmt->execute();
    $challenges = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenges – <?= $category ? htmlspecialchars($category) : 'Select Category' ?></title>
    <link rel="stylesheet" href="../assets/css/challenge.css">
</head>
<body>

<!-- Top Navigation -->
<nav class="nav">
  <div class="nav__brand">CSE Study Room</div>
  <ul class="nav__links">
    <li><a href="../pages/dashboard.php">Dashboard</a></li>
    <li><a href="../pages/courses.php">Courses</a></li>
    <li><a href="../pages/jobs.php">Jobs</a></li>
    <li><a href="../pages/mentorship.php">Mentorship</a></li>
    <li><a href="../auth/logout.php" class="nav__logout">Logout</a></li>
  </ul>
</nav>

<div class="main-container">
    <div class="sidebar">
        <h3>Categories</h3>
        <ul>
            <?php foreach ($sidebar_categories as $cat): ?>
                <li class="<?= ($cat['category'] === $category) ? 'active' : '' ?>">
                    <a href="attempt_challenges.php?category=<?= urlencode($cat['category']) ?>">
                        <?= htmlspecialchars($cat['category']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="content">
        <?php if ($category): ?>
            <h2><?= htmlspecialchars($category) ?></h2>

            <form method="GET" class="filter-form">
                <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">
                <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
                <select name="difficulty" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="Easy" <?= $difficulty === 'Easy' ? 'selected' : '' ?>>Easy</option>
                    <option value="Medium" <?= $difficulty === 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="Hard" <?= $difficulty === 'Hard' ? 'selected' : '' ?>>Hard</option>
                </select>
                <button type="submit">Search</button>
            </form>

            <div class="tabs">
                <span class="active-tab">PROBLEMS</span>
                <span class="inactive-tab">TUTORIAL</span>
                <span class="difficulty">Difficulty: <strong><?= $difficulty ?: 'ALL' ?></strong></span>
            </div>

            <div class="problem-list">
                <?php foreach ($challenges as $ch): ?>
                    <div class="problem-item">
                        <div class="problem-info">
                            <h4><?= htmlspecialchars($ch['title']) ?></h4>
                            <p>
                                ATTEMPTED BY: <?= $ch['attempted_by'] ?? 0 ?> |
                                LEVEL: <?= htmlspecialchars($ch['difficulty'] ?? 'Easy') ?>
                            </p>
                        </div>
                        <div class="solve-button">
                            <a href="attempt_single.php?id=<?= $ch['id'] ?>">SOLVE NOW</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (count($challenges) === 0): ?>
                    <p>No challenges found.</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <h2>Select a category to view challenges.</h2>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
