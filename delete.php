<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request");
}

if (!isset($_POST['id']) ||
    !ctype_digit($_POST['id'])) {
    exit("Invalid patient ID");
}

$id = (int) $_POST['id'];

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM patients WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: patient.php");
    exit;
}

echo "Delete failed. Please check related appointment records.";
?>