<?php
include "db.php";

$username = "Admin";
$email = "manojh@gmail.com";
$password = password_hash("manojh@384", PASSWORD_DEFAULT);
$role = "admin";

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO user (username, email, password, role)
     VALUES (?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $username,
    $email,
    $password,
    $role
);

if (mysqli_stmt_execute($stmt)) {
    echo "Admin account created successfully!";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>