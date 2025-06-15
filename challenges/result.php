<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$challenge_id = $_POST['challenge_id'] ?? null;
$user_answer = trim($_POST['user_answer'] ?? '');

if (!$challenge_id || !is_numeric($challenge_id)) {
    echo "❌ Challenge ID is missing or invalid.";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM challenges WHERE id = ?");
$stmt->bind_param("i", $challenge_id);
$stmt->execute();
$challenge = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$challenge) {
    echo "❌ Challenge not found.";
    exit();
}

$correct_answer = trim($challenge['correct_answer']);
$is_correct = (strcasecmp($correct_answer, $user_answer) === 0);

// Record user attempt
$log_stmt = $conn->prepare("INSERT INTO user_attempts (user_id, challenge_id, user_answer, is_correct) VALUES (?, ?, ?, ?)");
$log_stmt->bind_param("iisi", $user_id, $challenge_id, $user_answer, $is_correct);
$log_stmt->execute();
$log_stmt->close();

// Increment attempt count
$conn->query("UPDATE challenges SET attempted_by = attempted_by + 1 WHERE id = $challenge_id");

// Update user score if correct
if ($is_correct) {
    $conn->query("INSERT INTO user_scores (user_id, total_score) VALUES ($user_id, 1) ON DUPLICATE KEY UPDATE total_score = total_score + 1");
}

// Track answer reveal count
if (!$is_correct && isset($_POST['reveal_answer'])) {
    $conn->query("UPDATE challenges SET revealed_count = IFNULL(revealed_count, 0) + 1 WHERE id = $challenge_id");
}

$h2_color = $is_correct ? '#28a745' : '#dc3545';
$reveal_answer = isset($_POST['reveal_answer']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Result</title>
    <link rel="stylesheet" href="../assets/css/challenge-single.css">
    <style>
        .result-container {
            max-width: 600px;
            margin: 80px auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .result-container h2 {
            color: <?= $h2_color ?>;
        }
        .result-container p {
            font-size: 16px;
            color: #333;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
        .back-btn:hover {
            background: #0056b3;
        }
        .explanation {
            background: #f8f9fa;
            border-left: 5px solid #ffc107;
            padding: 15px;
            margin-top: 20px;
            text-align: left;
        }
        .explanation h3 {
            margin-top: 0;
            color: #333;
        }
        .reveal-answer-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background-color: #ffc107;
            color: #333;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .reveal-answer-btn:hover {
            background-color: #e0a800;
        }
        .hidden-answer {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
            margin-top: 15px;
            font-size: 15px;
            color: #444;
        }
        .hidden-answer.show {
            display: block;
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="result-container">
    <h2><?= $is_correct ? '✅ Correct!' : '❌ Incorrect' ?></h2>
    <p><strong>Your Answer:</strong> <?= htmlspecialchars($user_answer) ?></p>

    <?php if (!$is_correct): ?>
        <?php if (!$reveal_answer): ?>
            <button id="reveal-btn" class="reveal-answer-btn" onclick="revealAnswer()">Show Correct Answer</button>
            <form id="track-reveal" method="post" style="display: none;">
                <input type="hidden" name="challenge_id" value="<?= $challenge_id ?>">
                <input type="hidden" name="user_answer" value="<?= htmlspecialchars($user_answer) ?>">
                <input type="hidden" name="reveal_answer" value="1">
            </form>
        <?php endif; ?>
        <div id="hidden-answer" class="hidden-answer<?= $reveal_answer ? ' show' : '' ?>">
            <p><strong>Correct Answer:</strong> <?= htmlspecialchars($correct_answer) ?></p>
        </div>
    <?php else: ?>
        <p><strong>Correct Answer:</strong> <?= htmlspecialchars($correct_answer) ?></p>
    <?php endif; ?>

    <?php if (!$is_correct && !empty($challenge['explanation'])): ?>
        <div class="explanation">
            <h3>Explanation</h3>
            <p><?= nl2br(htmlspecialchars($challenge['explanation'])) ?></p>
        </div>
    <?php endif; ?>

    <a href="attempt_single.php?id=<?= $challenge_id ?>" class="back-btn">Try Again</a>
    <a href="attempt_challenges.php?category=<?= urlencode($challenge['category']) ?>" class="back-btn">Back to Challenges</a>
</div>

<script>
function revealAnswer() {
    const hidden = document.getElementById('hidden-answer');
    hidden.classList.add('show');
    document.getElementById('reveal-btn').style.display = 'none';
    document.getElementById('track-reveal').submit();
}
</script>

</body>
</html>
