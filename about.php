<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.html");
  exit();
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="icon" href="EpicBooks.png" type="image/png">

        </style>
  <!-- light mode  -->
  <link rel="stylesheet" href="style.css" id="light-mode-css">
  <!-- dark mode -->
  <link rel="stylesheet" href="dark-mode.css" id="dark-mode-css" disabled>
</head>

<body>
<script src="theme-toggle.js"></script>
    <header>
    <!-- place navbar here -->
  <?php  include("navbar.php")  ?>

  </header>
        
        <main>
          <div class="container pb-5 mb-5">
            <!-- About Us Section -->
<div class="row">
  <div class="col-md-6">
      <h1 class="py-3">About Us</h1>
      <p>Welcome to EpicBooks, your go-to digital library where literature meets accessibility. Our mission is to revolutionize the way you interact with books and written content, providing an immersive experience that caters to diverse needs. We believe that everyone should have access to knowledge and storytelling, regardless of their circumstances.</p>
  </div>
  <div class="col-md-6 text-right">
      <img src="Its A Good Day To Read Teacher School Librarian Book Lover T-Shirt.jpeg" alt="About Us Image" class="img-fluid my-3" style="max-width: 50%;">
  </div>
</div>

<!-- Our Mission Section -->
<div class="row">
  <div class="col-md-6 order-md-2">
      <h1 class="py-3">Our Mission</h1>
      <p>At EpicBooks, we envision a world where all individuals can explore and enjoy literature effortlessly. We strive to bridge the gap between traditional reading and modern technology, making every book an engaging and accessible journey. Our platform offers a wide array of features designed to enhance your reading experience, from customizable text displays to intuitive navigation.</p>
  </div>
  <div class="col-md-6 order-md-1 text-left">
      <img src="mysticalwitch.jpeg" alt="Our Mission Image" class="img-fluid my-3" style="max-width: 50%;">
  </div>
</div>

<!-- Who We Are Section -->
<div class="row">
  <div class="col-md-6">
      <h1 class="py-3">Who We Are</h1>
      <p>Our dedicated team consists of designers, developers, and accessibility experts who are passionate about transforming the digital reading landscape. With a deep understanding of user needs, we craft solutions that prioritize inclusivity, ensuring that everyone can enjoy the magic of books.
       \n Our Names are : Aman Dubey and Sagar Verma
      </p>
  </div>
  <div class="col-md-6 text-right">
      <img src="Skeleton Phone Wallpaper.jpeg" alt="Who We Are Image" class="img-fluid my-3" style="max-width: 50%;">
  </div>
</div>

<!-- What We Offer Section -->
<div class="row">
  <div class="col-md-6 order-md-2">
      <h1 class="py-3">What We Offer</h1>
      <p>EpicBooks boasts an extensive library of digital content, allowing you to explore genres from fiction to non-fiction.</p>
  </div>
  <div class="col-md-6 order-md-1 text-left">
      <img src="one more.jpeg" alt="What We Offer Image" class="img-fluid my-3" style="max-width: 50%;">
  </div>
</div>

<!-- Join Us Section -->
<div class="row">
  <div class="col-md-6">
      <h1 class="py-3">Join Us</h1>
      <p>Dive into the world of EpicBooks and discover a new dimension of reading. For inquiries or more information, please visit our Contact Us page. Together, let’s make digital literature accessible and enjoyable for all!</p>
  </div>
  <div class="col-md-6 text-right">
      <img src="join_us-transformed.jpeg" alt="Join Us Image" class="img-fluid my-3" style="max-width: 50%;">
  </div>
</div>
        
        </main>
       
       <!-- place footer here -->
       <footer>
  <?php include("footer.php") ?>
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
