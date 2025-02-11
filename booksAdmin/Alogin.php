<?php 
session_start();

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($conn, trim($_POST["uname"]));
    $pass = trim($_POST["pass"]);

    $sql = "SELECT * FROM `admin` WHERE `username` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    mysqli_stmt_bind_param($stmt, "s", $uname);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($pass === $row['password']) {
            $_SESSION["uname"] = $uname;
            header("location:Dashboard.php");
            exit;
        } else {
            echo "Invalid credentials <a href='Alogin.html'>Try Again</a>";
        }
    } else {
        echo "Invalid credentials <a href='Alogin.html'>Try Again</a>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
