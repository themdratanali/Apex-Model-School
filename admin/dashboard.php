<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <ul>
        <li><a href="upload_routine.php">Upload Routine</a></li>
        <li><a href="#">Upload Admission Info</a></li>
        <li><a href="#">Upload Syllabus</a></li>
        <li><a href="#">Upload Results</a></li>
        <li><a href="#">Upload Exam Routine</a></li>
        <li><a href="#">Add Teachers</a></li>
        <li><a href="#">Add Employee</a></li>
    </ul>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
