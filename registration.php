<?php 

include "connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $uname = htmlspecialchars(strip_tags(trim($_POST["uname"])));
    $password = $_POST["pass"];

    // Validate email format
    if (!$email) {
        echo "Invalid email format";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO epicbooks_users (name, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $uname, $hashed_password);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        header("Location: login.html");
        exit;
    } else {
        // Log the actual error internally
        error_log("Database error: " . $stmt->error);
        echo "Failed to register. Please try again later.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}

?>
