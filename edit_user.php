<?php
require_once "config.php";

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $conn->query("
    UPDATE users
    SET Name='$name',
        email='$email',
        Role='$role'
    WHERE id=$id
    ");

    header("Location: admin_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">

<input type="text" name="name"
value="<?php echo $user['Name']; ?>" required>

<br><br>

<input type="email" name="email"
value="<?php echo $user['email']; ?>" required>

<br><br>

<select name="role">

<option value="admin"
<?php if($user['Role']=="admin") echo "selected"; ?>>
Admin
</option>

<option value="user"
<?php if($user['Role']=="user") echo "selected"; ?>>
User
</option>

</select>

<br><br>

<button type="submit" name="update">
Update
</button>

</form>

</body>
</html>