<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.html");
  exit();
}

// Load theme from database or session
include "connection.php";
$userId = $_SESSION['userid'];
$stmt = $conn->prepare("SELECT `darkmode` FROM `epicbooks_users` WHERE `id` = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($darkMode);
$stmt->fetch();
$stmt->close();

// Store theme in session
$_SESSION['darkMode'] = $darkMode;

?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="icon" href="EpicBooks.png" type="image/png">
  
  <!-- light mode  -->
<link rel="stylesheet" href="style.css" id="light-mode-css"> 
  <!-- dark mode -->
  <link rel="stylesheet" href="dark-mode.css" id="dark-mode-css" disabled>
</head>

<body>
  <script src="theme-toggle.js"></script>

  <header>
    <!-- place navbar here -->
    <?php include("navbar.php") ?>
    
    <script>
    // Ensure the theme is loaded correctly
    const userTheme = "<?php echo ($_SESSION['darkMode'] == 'Y' ? 'dark' : 'light'); ?>";
    localStorage.setItem("theme", userTheme);
    </script>
  </header>

  <main>

    <div class="container p-5">
      <h2 class="justify-content-center align-items-center text-center font-weight-bold py-3">Welcome </h2>
      <h1 class=" welcome-content text-center py-3">EpicBooks </h1>
      <p class=" font-weight-bold" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Welcome to EpicBooks A
        Digital Library, a sanctuary for book lovers and knowledge seekers alike.
        Dive into our expansive collection where every page turned and every story shared is a step into a new
        adventure. Whether you're seeking the wisdom of timeless classics, the thrill of contemporary novels,
        or the joy of discovering hidden gems, our library is here to ignite your imagination and nourish your love for
        reading. Join us on a journey through the endless realms of literature, where each visit promises
        a new discovery and a deeper connection to the world of books.</p>
    </div>

    <!-- carousel -->
    <div id="carouselExampleAutoplaying" class="carousel slide w-75 mx-auto" data-bs-ride="carousel"
      data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images slider/oscar wilde.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images slider/Charles Dickens.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images slider/george orwell.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images slider/Hamlet Quote.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images slider/Leo Tolstoy.jpeg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>




    <div class="container">
      <iframe src="" frameborder="0"></iframe>
    </div>


  </main>

  <footer>
  <?php include("footer.php") ?>
  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>