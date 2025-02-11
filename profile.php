<?php
session_start();
include "connection.php"; // Database connection

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['userid'];

// Prepare SQL query to fetch user data from the 'users' table
$stmt_user = $conn->prepare("SELECT 
    eu.name AS name, 
    eu.username AS username, 
    ec.number AS number,    
    eu.email AS email 
FROM 
    epicbooks_users eu
LEFT JOIN 
    epicbooks_contacts ec 
ON 
    eu.id = ec.fkUserId
WHERE 
    eu.id = ?"
);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    // Fetch user data
    $user = $result_user->fetch_assoc();
    $username = $user['username'];
    $name = $user['name'];
    $email = $user['email'];
    $number = $user['number'];
} else {
    // Handle case where user is not found
    echo "User data not found.";
    exit();
}

// Generate a random fun cartoon-style profile picture using the user ID
$profile_pic_url = "https://api.dicebear.com/6.x/bottts/svg?seed=" . urlencode($user_id); // Fun cartoon-style avatar

// Close prepared statements
$stmt_user->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .profile-container {
            margin-top: 80px;
        }
        .card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
       
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            object-fit: cover;
            transition: all 0.3s ease;
        }
        .profile-pic:hover {
            transform: scale(1.1);
        }
        .heading {
            font-size: 30px;
            font-weight: 600;
            color: #222;
        }
        .text-muted {
            color: #666;
        }
        .info-item {
            font-size: 18px;
            color: #444;
        }
        .info-title {
            font-size: 16px;
            font-weight: 500;
            color: #888;
        }
        .card-body {
            padding: 30px;
            text-align: center;
        }
        .info-section {
            text-align: left;
            margin-top: 20px;
        }
        /* Aligning icon and title horizontally */
        .info-item, .info-title {
            display: flex;
            align-items: center;  /* Vertically center items within flex container */
            margin-bottom: 10px;
        }
        .info-item i, .info-title i {
            margin-right: 10px;  /* Space between icon and text */
            font-size: 20px;  /* Slightly larger icon size for better visibility */
        }
        .icon {
            color: #2575fc;
        }

        /* Ensure data appears on next line */
        .info-title {
            margin-bottom: 3px;  /* Small margin to create space between title and data */
        }

        .data-item {
            font-size: 18px;
            color: #444;
        }

        /* Back button styling */
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: #2575fc;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Back Button -->
    <a href="javascript:history.back()" class="back-btn">
    <i class="bi bi-chevron-double-left"></i>    </a>

    <div class="container profile-container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Profile Picture with Hover Effect -->
                        <img src="<?php echo $profile_pic_url; ?>" alt="Profile Picture" class="profile-pic mb-4">
                        <!-- User Name and Username -->
                        <h3 class="heading"><?php echo htmlspecialchars($name); ?></h3>
                        <p class="text-muted mb-4">@<?php echo htmlspecialchars($username); ?></p>
                        
                        <!-- Information Section with Icons -->
                        <div class="info-section">
                            <div class="info-item">
                                <i class="bi bi-envelope-fill icon"></i>
                                <span class="info-title">Email:</span>
                            </div>
                            <div class="data-item mx-4 my-3"><?php echo htmlspecialchars($email); ?></div>

                            <div class="info-item">
                                <i class="bi bi-person-fill icon"></i>
                                <span class="info-title">Username:</span>
                            </div>
                            <div class="data-item mx-4 my-3"><?php echo htmlspecialchars($username); ?></div>

                            <div class="info-item">
                                <i class="bi bi-phone-fill icon"></i>
                                <span class="info-title">Phone:</span>
                            </div>
                            <div class="data-item mx-4 my-3"><?php echo htmlspecialchars($number); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Icon Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
