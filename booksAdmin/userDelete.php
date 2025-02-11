<?php 

include "connection.php";

$id= $_GET["id"];

$sql = "DELETE FROM epicbooks_users WHERE `epicbooks_users`.`id`= $id";

if (mysqli_query($conn,$sql)) {
 header("location:usermanage.php");
} else {
    echo"something went wrong";
}

 mysqli_close($conn);
?>