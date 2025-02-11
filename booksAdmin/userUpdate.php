<?php 

include "connection.php";

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pass = $_POST["pass"]; 

// Hash the password before storing it in the database
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

// Prepare SQL query to update user details
$sql = "UPDATE `epicbooks_users` SET `name`=?, `email`=?, `username`=?, `password`=? WHERE `id`=?;";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $email, $uname, $hashed_pass, $id);

if ($stmt->execute()) {
    header("location:userManage.php");
    exit(); 
} else {
    echo "Something went wrong: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);

?>
