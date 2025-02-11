<?php 

include "connection.php";

$id= $_GET["id"];

$sql =  "DELETE FROM epicbooks_contacts WHERE `epicbooks_contacts`.`id`= $id";

if (mysqli_query($conn,$sql)) {
 header("location:contactManage.php");
} else {
    echo"something went wrong";
}

 mysqli_close($conn);
?>