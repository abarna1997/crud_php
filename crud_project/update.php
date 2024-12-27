<?php
include 'includes/db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
