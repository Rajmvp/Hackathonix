<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['userid'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized: User not logged in."]);
    exit;
}

// Get the theme preference from the AJAX request
if (isset($_POST['theme'])) {
    $theme = $_POST['theme']; // 'Y' for dark mode, 'N' for light mode
    $userId = $_SESSION['userid']; // Assuming userid is stored in the session

    // Validate input to ensure it is either 'Y' or 'N'
    if (!in_array($theme, ['Y', 'N'])) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid theme preference. Expected 'Y' or 'N'."]);
        exit;
    }

    // Include the database connection
    include "connection.php";

    // Prepare the SQL statement to update the theme preference
    $stmt = $conn->prepare("UPDATE epicbooks_users SET darkmode = ? WHERE id = ?");
    if ($stmt === false) {
        http_response_code(500);
        echo json_encode(["error" => "Failed to prepare statement."]);
        exit;
    }

    // Bind parameters and execute the query
    $stmt->bind_param("si", $theme, $userId);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Theme preference updated successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Error updating theme preference: " . $stmt->error]);
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    http_response_code(400);
    echo json_encode(["error" => "Theme preference not provided."]);
}
?>
