<?php
require_once '../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "🚫 This email is already registered.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $role);
        $stmt->execute();

        header("Location: login.php?registered=1&role=$role");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - CSE Study Room</title>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Hind Siliguri', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #0f0f0f, #1b1b1b);
            background-image: radial-gradient(rgba(0, 255, 255, 0.1) 1px, transparent 1px),
                              radial-gradient(rgba(0, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: 0 0, 20px 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .register-box {
            background: rgba(20, 20, 20, 0.9);
            padding: 40px 30px;
            border-radius: 14px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
            width: 100%;
            max-width: 420px;
            border: 1px solid #00ffff33;
        }

        h2 {
            font-family: 'Share Tech Mono', monospace;
            text-align: center;
            color: #00ffff;
            margin-bottom: 24px;
            font-size: 28px;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 1px solid #00ffff55;
            border-radius: 8px;
            background-color: #1a1a1a;
            color: #fff;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #00ffff;
            box-shadow: 0 0 8px #00ffff88;
        }

        label {
            font-size: 14px;
            margin-bottom: 8px;
            display: inline-block;
            color: #cccccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #00ffff, #008080);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            color: #121212;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #00cccc, #005f5f);
        }

        .error {
            color: #ff4d4d;
            text-align: center;
            margin-top: 10px;
            font-size: 15px;
        }

        .tech-tag {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 14px;
            font-family: 'Share Tech Mono', monospace;
        }

        .login-link {
            margin-top: 18px;
            text-align: center;
            font-size: 14px;
            color: #aaa;
        }

        .login-link a {
            color: #00ffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #00cccc;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <form method="POST">
            <h2>🔧 Register (CSE Study Room)</h2>

            <input name="username" type="email" placeholder="👨‍💻 Your CSE Email" required>
            <input name="password" type="password" placeholder="🔐 Create Password" required>

            <label for="role">🎓 Select Role:</label>
            <select name="role" id="role" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">🚀 Create Account</button>

            <?php if (isset($error)): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <div class="login-link">
                Already have an account? <a href="login.php">Login here</a>
            </div>

            <div class="tech-tag">Crafted for curious coders 🧠</div>
        </form>
    </div>
</body>
</html>
