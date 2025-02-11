<?php  
session_start();

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Abhinav\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Abhinav\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Abhinav\PHPMailer\src\SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $number = htmlspecialchars($_POST["number"]);
    $query = htmlspecialchars($_POST["query"]);
    $fkUserID = htmlspecialchars( string: $_SESSION['userid']);

    $sql = "INSERT INTO `epicbooks_contacts` (`fkUserId`, `name`, `email`, `number`, `query`) VALUES ( $fkUserID, '$name', ' $email', '$number', '$query');";

    if (mysqli_query($conn, $sql)) {
        $mail = new PHPMailer(true);
        
        try {
            $senderemail = 'diablothedemon12@gmail.com';
            $emailpass = 'zbph fuoa vyxq pukp'; 

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $senderemail;
            $mail->Password = $emailpass;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            // Recipient information
            $mail->setFrom($senderemail, 'Epic Books');
            $mail->addAddress($email, $name);
            $mail->addReplyTo($senderemail, 'Epic Books');
            
            // Email content
            $mail->isHTML(true); 
            $mail->Subject = 'Thank You for Visiting EpicBooks!';

// HTML email body content
            $mail->Body = '
                <div style="font-family: Arial, sans-serif; color: #333;">
                    <h2>The EpicBooks!</h2>
                    <p>We truly appreciate your time spent exploring our digital library. At EpicBooks, we are dedicated to offering you the best selection of books, resources, and tools for an exceptional reading experience. Whether you\'re here to discover a new favorite or browse our vast collection, we hope you found something inspiring.</p>
                    <p>Feel free to visit us anytime, and don’t hesitate to reach out if you have any questions or need assistance. Happy reading!</p>
                    <p>Warm regards,<br>The EpicBooks Team</p>
                </div>
            ';

            $mail->send();
            header("Location:Thankyou.html");  
            exit();
        } 
        catch (Exception $e) {
            echo 'Failed to send email: ', $mail->ErrorInfo;
        }
    } else {
        echo "Failed: ". mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    http_response_code(405); // Method Not Allowed
    echo "This method is not allowed.";
}

?>
