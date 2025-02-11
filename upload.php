<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $genre = $_POST['genre'];
    $pub_date = $_POST['pub_date'];
    $publisher = $_POST['publisher'];
    $pages = $_POST['pages'];
    $language = $_POST['language'];
    $edition = $_POST['edition'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle PDF file upload
    $pdf_file = '';
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['pdf_file']['tmp_name'];
        $fileName = $_FILES['pdf_file']['name'];
        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $fileName;

        // Rename if file already exists
        if (file_exists($dest_path)) {
            $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $dest_path = $uploadFileDir . $fileName;
        }

        // Move uploaded file
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $pdf_file = $fileName;
        } else {
            echo "Error moving the uploaded PDF file. Error Code: " . $_FILES['pdf_file']['error'];
        }
    }

    // Handle cover image upload
    $cover_image = '';
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = 'uploads/';
        $cover_image = basename($_FILES['cover_image']['name']);
        $target_file = $target_dir . $cover_image;

        if (file_exists($target_file)) {
            $cover_image = pathinfo($cover_image, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($cover_image, PATHINFO_EXTENSION);
            $target_file = $target_dir . $cover_image;
        }

        if (!move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file)) {
            echo "Error uploading the cover image.";
        }
    }

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO books (title, author, isbn, genre, pub_date, publisher, pages, language, edition, price, description, pdf_file, cover_image) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("ssssssissdsss", $title, $author, $isbn, $genre, $pub_date, $publisher, $pages, $language, $edition, $price, $description, $pdf_file, $cover_image);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to success or book list page
        header("Location: books.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
