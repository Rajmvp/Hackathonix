<?php
session_start();
include "connection.php";
header("Content-Type: application/json"); // Return JSON response

$response = ["success" => false, "message" => ""];

if (isset($_SESSION['userid'])) {
    $response["message"] = "Already logged in.";
    echo json_encode($response);
    exit();
}

if (isset($_POST["uname"], $_POST["pass"])) {
    $uname = trim($_POST["uname"]);
    $password = $_POST["pass"];

    if (empty($uname) || empty($password)) {
        $response["message"] = "Both fields are required.";
        echo json_encode($response);
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM `epicbooks_users` WHERE `username` = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['userid'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin'] = true;
            $_SESSION['darkMode'] = $user['darkmode'];

            $response["success"] = true;
            $response["message"] = "Login successful.";
            echo json_encode($response);
            exit();
        } else {
            $response["message"] = "Incorrect password. Please try again.";
            echo json_encode($response);
            exit();
        }
    } else {
        $response["message"] = "Invalid username. Please try again.";
        echo json_encode($response);
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    $response["message"] = "Invalid request.";
    echo json_encode($response);
    exit();
}
