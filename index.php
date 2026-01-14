<?php
include "lib/lib.php";
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Students</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">
<h4>Students</h4>
<a href="add.php" class="btn btn-success mb-2">+ Add</a>

<table class="table table-bordered">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th>
</tr>

<?php while($s = $result->fetch_assoc()) { ?>
<tr>
<td><?= $s['id'] ?></td>
<td><?= $s['name'] ?></td>
<td><?= $s['email'] ?></td>
<td><?= $s['course'] ?></td>
<td>
<a href="edit.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $s['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Delete?')">Delete</a>
</td>
</tr>
<?php } ?>

</table>
</body>
</html>
