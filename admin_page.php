<?php
session_start();
require_once "config.php";

$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        table{
            width:100%;
            border-collapse: collapse;
        }
        table, th, td{
            border:1px solid black;
            padding:10px;
        }
    </style>
</head>
<body>

<h2>Welcome Admin: <?php echo $_SESSION['name']; ?></h2>

<a href="logout.php">Logout</a>

<h3>User Management</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
    <td><?php echo $row['Id']; ?></td>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['Role']; ?></td>

    <td>
        <a href="edit_user.php?id=<?php echo $row['Id']; ?>">Edit</a>

        <a href="delete_user.php?id=<?php echo $row['Id']; ?>"
        onclick="return confirm('Delete this user?')">
        Delete
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>