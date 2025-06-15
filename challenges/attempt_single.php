<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo "Invalid challenge ID.";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM challenges WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$challenge = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$challenge) {
    echo "Challenge not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attempt - <?= htmlspecialchars($challenge['title']) ?></title>
    <link rel="stylesheet" href="../assets/css/challenge-single.css">
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

<div class="container">
    <div class="challenge-card">
        <h1><?= htmlspecialchars($challenge['title']) ?></h1>
        <div class="meta">
            <span class="badge">Category: <?= htmlspecialchars($challenge['category']) ?></span>
            <span class="badge">Level: <?= htmlspecialchars($challenge['difficulty'] ?? 'Easy') ?></span>
            <span class="badge">Attempts: <?= $challenge['attempted_by'] ?? 0 ?></span>
        </div>

        <div class="question">
            <p><?= nl2br(htmlspecialchars($challenge['question'])) ?></p>
        </div>

        <form action="result.php" method="POST" class="answer-form">
            <input type="hidden" name="challenge_id" value="<?= $challenge['id'] ?>">
            <label for="user_answer">Your Answer:</label>
            <textarea name="user_answer" id="user_answer" required placeholder="Write your answer here..."></textarea>
            <button type="submit">Submit Answer</button>
        </form>

       <a href="attempt_challenges.php?category=<?= urlencode($challenge['category']) ?>" class="back-link">

    </div>
</div>

</body>
</html>
