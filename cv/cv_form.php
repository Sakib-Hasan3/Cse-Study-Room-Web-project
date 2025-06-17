
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['cv_data'] = $_POST;
    header("Location: preview_cv.php");
    exit();
}

include('../includes/nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Generate Your CV | CSE Study Room</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f8fbff;
      color: #1e1e2f;
    }

    .form-container {
      max-width: 800px;
      margin: 80px auto;
      background: white;
      padding: 40px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      border-radius: 10px;
    }

    .form-container h2 {
      text-align: center;
      color: #003049;
      margin-bottom: 30px;
      font-size: 2.5rem;
    }

    form h3 {
      color: #0077cc;
      margin-top: 30px;
      font-size: 1.2rem;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      font-family: inherit;
    }

    button {
      margin-top: 30px;
      width: 100%;
      background: #0077cc;
      color: white;
      padding: 14px;
      font-size: 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #005fa3;
    }

    @media (max-width: 768px) {
      .form-container {
        padding: 20px;
        margin: 40px 20px;
      }
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>📄 Create Your CV</h2>
  <form method="POST">
    <h3>📍 Contact Info</h3>
    <input name="full_name" placeholder="Full Name" required>
    <input name="email" placeholder="Email" type="email" required>
    <input name="phone" placeholder="Phone Number" required>
    <input name="linkedin" placeholder="LinkedIn (optional)">
    <input name="address" placeholder="City, Country (optional)">

    <h3>🧠 Professional Summary</h3>
    <textarea name="summary" required></textarea>

    <h3>💼 Work Experience</h3>
    <textarea name="experience" required></textarea>

    <h3>🎓 Education</h3>
    <textarea name="education" required></textarea>

    <h3>⚙️ Skills</h3>
    <textarea name="skills" required></textarea>

    <h3>📜 Certifications (optional)</h3>
    <textarea name="certifications"></textarea>

    <h3>🧪 Projects (optional)</h3>
    <textarea name="projects"></textarea>

    <h3>🌍 Languages (optional)</h3>
    <textarea name="languages"></textarea>

    <h3>🎖 Additional (optional)</h3>
    <textarea name="other"></textarea>

    <button type="submit">🚀 Generate Preview</button>
  </form>
</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
