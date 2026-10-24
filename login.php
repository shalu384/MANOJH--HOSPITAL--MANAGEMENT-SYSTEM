<?php
session_start();
include "db.php";
$error = "";
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $stmt = mysqli_prepare($conn, "SELECT id, username, password, role FROM user WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    if($user && password_verify($password, $user["password"])){
        session_regenerate_id(true);
        $_SESSION["user_id"]=$user["id"];
        $_SESSION["username"]=$user["username"];
        $_SESSION["role"]=$user["role"];
        header("location:admin.php");
        exit;
    } else {
        $error = "invalid email or password";
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="login-box">
    <h1>🏥 MANOJH Hospital Management</h1>
    <h2>Welcome Back manojh hospital!</h2>
    <p>Login to your account</p>

    <?php if ($error != "") { ?>
        <p class="error">
            <?php echo htmlspecialchars($error); ?>
        </p>
    <?php } ?>

    <form method="POST" action="login.php">
        <label>Email Address</label>
        <input type="email" name="email"
               placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password"
               placeholder="Enter your password" required>

        <button type="submit" name="login">Sign In</button>
        
    </form>
</div>

</body>
</html>