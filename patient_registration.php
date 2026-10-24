<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $age = (int) $_POST["age"];
    $gender = $_POST["gender"];
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    if ($name == "" || $age < 1 || $phone == "" || $address == "") {
        $message = "Please fill all fields correctly.";
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO patients
            (name, age, gender, phone, address)
            VALUES (?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sisss",
            $name,
            $age,
            $gender,
            $phone,
            $address
        );

        if (mysqli_stmt_execute($stmt)) {
            header("Location: patient.php");
            exit;
        } else {
            $message = "Registration failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient Registration</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef3f8;
            padding: 25px 15px;
        }

        .form-box {
            max-width: 500px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px #00000015;
        }

        h2 {
            text-align: center;
            color: #07152d;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 14px;
            font-weight: bold;
            color: #26354b;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #ccd5df;
            border-radius: 7px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
            min-height: 85px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            background: #087f8c;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #066570;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #087f8c;
            text-decoration: none;
        }

        .message {
            color: #c62828;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="form-box">

    <h2>Patient Registration</h2>

    <?php if ($message != "") { ?>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php } ?>

    <form method="POST" action="">

        <label>Patient Name</label>
        <input type="text"
               name="name"
               placeholder="Enter patient name"
               maxlength="100"
               required>

        <label>Age</label>
        <input type="number"
               name="age"
               min="1"
               max="120"
               placeholder="Enter age"
               required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label>Phone Number</label>
        <input type="tel"
               name="phone"
               maxlength="20"
               placeholder="Enter phone number"
               required>

        <label>Address</label>
        <textarea name="address"
                  placeholder="Enter address"
                  required></textarea>

        <button type="submit">
            Register Patient
        </button>

    </form>

    <a href="dashboard.php" class="back">
        Back to Dashboard
    </a>

</div>

</body>
</html>