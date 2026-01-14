<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "lib/lib.php";

if (isset($_POST['save'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course)
            VALUES ('$name', '$email', '$course')";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "DB Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">
<h4>Add Student</h4>

<form method="post">
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="text" name="course" class="form-control mb-2" placeholder="Course" required>

    <button type="submit" name="save" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>
</body>
</html>
