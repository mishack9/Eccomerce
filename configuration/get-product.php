<?php
include("./configuration/database.php");

$stmt = $conn->prepare("SELECT * FROM products LIMIT 4");
$stmt->execute();
$product = $stmt->get_result();