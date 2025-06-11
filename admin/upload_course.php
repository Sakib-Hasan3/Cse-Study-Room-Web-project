<?php
require_once '../db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc  = $_POST['description'];
    $image = $_POST['image']; // or handle file uploads

    $stmt = $conn->prepare("INSERT INTO courses (title, description, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $desc, $image);
    $stmt->execute();
    header("Location: manage_courses.php");
    exit;
}
?>

<form method="POST">
    <h2>Upload Course</h2>
    <input name="title" placeholder="Course Title" required>
    <textarea name="description" placeholder="Course Description" required></textarea>
    <input name="image" placeholder="Image filename (e.g. course1.jpg)">
    <button type="submit">Add Course</button>
</form>
