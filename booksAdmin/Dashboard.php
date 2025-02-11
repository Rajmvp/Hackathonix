<?php 
session_start();

if (!isset($_SESSION["uname"])) {
  header("location:Alogin.html");
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.3.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <style>
      body {
        background-color: #f8f9fa;
      }
      
      .card {
        margin-bottom: 20px;
        height: 620px;
      }

      .card-header {
        background-color: #28a745;
        color: #fff;
      }
      .management-image {
        width: 100%;
        cursor: pointer;
        transition: transform 0.2s;
        border-radius: 10px;
        border: solid #097969 4px;
      }
    </style>
    <link rel="stylesheet" href="../style.css" />
  </head>

  <body>
    <header>
      <!-- Navbar -->
    </header>

    <main>
      <div class="container my-4">
    <div class="row align-items-center">
        <div class="col-md-2">
            <img src="EpicBooks.jpeg" alt="Logo" class="img-fluid" style="max-height: 60px; border-radius:60%" > 
        </div>
        <div class="col-md-6">
            <h2 class="my-4 p-3 align-items-center text-center">Epic Books Management </h2>
        </div>
        <div class="col-md-4 text-end">
            <a class="btn btn-danger btn-lg" href="logout.php">Logout</a>
        </div>
    </div>

    <div class="row">
        <!-- User Management -->
        <div id="userManage" class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-primary text-white text-center">User Management</div>
                <div class="card-body text-center">
                    <img src="user.jpg" alt="User Management" class="management-image img-fluid" onclick="window.location.href='userManage.php'" />
                </div>
            </div>
        </div>
        <!-- Contact Management -->
        <div id="contactManage" class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-success text-white text-center">Contact Management</div>
                <div class="card-body text-center">
                    <img src="contact.jpg" alt="Contact Management" class="management-image img-fluid" onclick="window.location.href='contactManage.php'" />
                </div>
            </div>
        </div>
        <!-- Add Book -->
        <div id="addBook" class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-info text-white text-center">Add Book</div>
                <div class="card-body text-center">
                    <img src="books.jpg" alt="Add Book" class="management-image img-fluid" onclick="window.location.href='addBook.html'" />
                </div>
            </div>
        </div>
    </div>
</div>

          <!-- Book Management
                <div id="bookManage" class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Book Management
                        </div>
                        <div class="card-body text-center">
                            <p>View, edit, or delete books from the library collection.</p>
                            <button class="btn btn-primary">View Books</button>
                        </div>
                    </div>
                </div> -->
        </div>
      </div>
    </main>

    <footer>
      <!-- Place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
