<?php
include "lib/lib.php";
$conn->query("DELETE FROM students WHERE id=".$_GET['id']);
header("Location: index.php");
