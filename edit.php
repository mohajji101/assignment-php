<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "lib/lib.php";

if (!isset($_GET['id'])) {
    die("No ID Found");
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM students WHERE id=$id");

if ($result->num_rows == 0) {
    die("Student not found");
}

$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("UPDATE students SET
        name='$name',
        email='$email',
        course='$course'
        WHERE id=$id");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">
<h4>Edit Student</h4>

<form method="post">
    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control mb-2" required>
    <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control mb-2" required>
    <input type="text" name="course" value="<?= $row['course'] ?>" class="form-control mb-2" required>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>
</body>
</html>
