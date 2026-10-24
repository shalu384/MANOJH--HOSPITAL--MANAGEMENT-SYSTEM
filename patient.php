
<?php
include "db.php";

$sql = "SELECT * FROM patients ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef3f8;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #07152d;
        }

        .table-box {
            overflow-x: auto;
            background: white;
            padding: 15px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #07152d;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f7ff;
        }

        .edit {
            background: #087f8c;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            background: #07152d;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<h2>Patient Details</h2>

<div class="table-box">

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
    </tr>

    <?php if ($result && mysqli_num_rows($result) > 0) { ?>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td>
                <?php echo (int)$row['id']; ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['name']); ?>
            </td>

            <td>
                <?php echo (int)$row['age']; ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['gender']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['phone']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['address']); ?>
            </td>

            <td>
                <a class="edit"
                   href="edit.php?id=<?php echo (int)$row['id']; ?>">
                    Edit
                </a>

                <form action="delete.php"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('Delete this patient?');">

                    <input type="hidden"
                           name="id"
                           value="<?php echo (int)$row['id']; ?>">

                    <button type="submit" class="delete">
                        Delete
                    </button>
                </form>
            </td>
        </tr>

        <?php } ?>

    <?php } else { ?>

        <tr>
            <td colspan="7">No patients found</td>
        </tr>

    <?php } ?>

</table>

</div>

<a href="admin.php" class="back">Back to Dashboard</a>

</body>
</html>