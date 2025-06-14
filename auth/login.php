
<?php
require_once '../db.php';
session_start();
session_regenerate_id(true); // Security measure

$selectedRole = $_GET['role'] ?? 'student'; // Default role
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['role'] = $result['role'];

        // Redirect based on role
        if ($result['role'] === 'admin') {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: ../pages/dashboard.php');
        }
        exit;
    } else {
        $error = "Invalid username, password, or role.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - CSE Study Room</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
</head>
<body>
<div class="login-wrapper">
    <!-- Left Section -->
    <div class="login-left">
        <div class="login-content">
            <img src="../assets/images/login.png" alt="CSE Study Room" class="animated-img">
            <div class="login-text">
                <h2>Welcome to <span class="highlight">CSE Study Room</span></h2>
                <p>Explore, Learn, and Build. This platform is your all-in-one portal for CSE learning, mentorship, and collaboration. Start your academic journey with confidence.</p>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="login-right">
        <div class="form-box">
            <h2>🔐 Login</h2>

            <form method="POST" novalidate>
                <input name="username" type="email" placeholder="Email" required>
                <input name="password" type="password" placeholder="Password" required>

                <label>Select Role:</label>
                <select name="role" required>
                    <option value="student" <?= ($selectedRole === 'student') ? 'selected' : '' ?>>Student</option>
                    <option value="admin" <?= ($selectedRole === 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>

                <button type="submit">Login</button>

                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>
