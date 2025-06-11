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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - CSE Study Room</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      margin: 0;
      background-color: #f9f9ff;
    }

    .container {
      display: flex;
      flex: 1;
      margin-top: 100px;
      min-height: calc(100vh - 100px);
    }

    .illustration {
      flex: 1;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .illustration img {
      max-width: 100%;
      height: auto;
    }

    .form-section {
      flex: 1;
      background: #ffffff;
      padding: 80px 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-section h2 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 30px;
      color: #1c1d1f;
    }

    form {
      width: 100%;
      max-width: 420px;
    }

    input, select {
      width: 100%;
      padding: 12px 16px;
      margin-bottom: 18px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    input:focus, select:focus {
      border-color: #805ad5;
      outline: none;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 6px;
      color: #333;
    }

    .checkbox {
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
      font-size: 14px;
      color: #444;
    }

    .checkbox input {
      margin-right: 8px;
      margin-top: 2px;
    }

    button {
      width: 100%;
      background-color: #805ad5;
      color: #fff;
      padding: 14px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #6b46c1;
    }

    .divider {
      text-align: center;
      margin: 30px 0;
      color: #999;
      font-size: 14px;
      position: relative;
    }

    .divider::before, .divider::after {
      content: "";
      height: 1px;
      background: #ddd;
      flex: 1;
      margin: 0 12px;
    }

    .divider {
      display: flex;
      align-items: center;
    }

    .social-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
    }

    .social-buttons a {
      border: 1px solid #ccc;
      padding: 10px 16px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      background: #fff;
    }

    .social-buttons a img {
      width: 24px;
      height: 24px;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .terms {
      font-size: 12px;
      color: #888;
      margin-top: 20px;
      text-align: center;
    }

    .terms a {
      color: #805ad5;
      text-decoration: none;
    }

    .terms a:hover {
      text-decoration: underline;
    }

    .login-link {
      text-align: center;
      font-size: 14px;
      margin-top: 30px;
    }

    .login-link a {
      color: #805ad5;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <?php include '../includes/nav.php'; ?>
  <div class="container">
    <div class="illustration">
      <img src="../assets/images/signup-illustration.png" alt="Register Illustration" />
    </div>
    <div class="form-section">
      <h2>Sign up with email</h2>
      <form method="POST">
        <label for="username">Full name</label>
        <input name="username" type="email" placeholder="Enter your email" required />

        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Enter your password" required />

        <label for="role">Select role</label>
        <select name="role" id="role" required>
          <option value="student">Student</option>
          <option value="admin">Admin</option>
        </select>

        <div class="checkbox">
          <input type="checkbox" checked>
          <label for="offers">Send me special offers, personalized recommendations, and learning tips.</label>
        </div>

        <button type="submit">📩 Register</button>

        <?php if (isset($error)): ?>
          <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <div class="divider">Other sign up options</div>
        <div class="social-buttons">
          <a href="#"><img src="../assets/images/google.png" alt="Google"></a>
          <a href="#"><img src="../assets/images/facebook.png" alt="Facebook"></a>
        
        </div>

        <div class="terms">
          By signing up, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
        </div>

        <div class="login-link">
          Already have an account? <a href="login.php">Login here</a>
        </div>
      </form>
    </div>
  </div>
  <?php include '../includes/footer.php'; ?>
</body>
</html>
