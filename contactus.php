<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="icon" href="EpicBooks.png" type="image/png" />
  <style>
    .dropdown-menu {
      max-height: 200px;
      /* Adjust this height as needed */
      overflow-y: auto;
      /* Enable vertical scrolling */
    }
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
    <?php include("navbar.php") ?>

  </header>

<main>
    <div class="info container my-2">
        <div class="responsive-map my-5 justify-content-center">
        <!-- You can add a map or other content here if needed -->
        </div>
    </div>

  <!-- Contact Form Section -->
  <div class="container border border-1 rounded-3 contact-border my-5 p-4">
    <h1 class="text-center">Leave us your info</h1>

    <form action="contact.php" method="post" onsubmit="return validateForm()">
      <!-- Name Input -->
      <div class="form-group">
        <label for="name" class="form-label my-3">Name</label>
        <input type="text" class="form-control" name="name" id="name" required />
        <small id="nameHelp" class="form-text text-muted"></small>
      </div>

      <!-- Email Input -->
      <div class="form-group">
        <label for="email" class="form-label my-3">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="abc@mail.com" required />
        <small id="emailHelp" class="form-text text-muted"></small>
      </div>

      <!-- Country Dropdown -->
      <div class="form-group">
        <label for="country" class="form-label my-3">Country</label>
        <div class="dropdown">
          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Country
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Country options with flag icons -->
            <a class="dropdown-item" href="#" onclick="selectCountry('+1', 'us'); event.preventDefault();">
              <span class="flag-icon flag-icon-us"></span> United States
            </a>
            <a class="dropdown-item" href="#" onclick="selectCountry('+44', 'gb'); event.preventDefault();">
              <span class="flag-icon flag-icon-gb"></span> United Kingdom
            </a>
            <a class="dropdown-item" href="#" onclick="selectCountry('+91', 'in'); event.preventDefault();">
              <span class="flag-icon flag-icon-in"></span> India
            </a>
            <a class="dropdown-item" href="#" onclick="selectCountry('+61', 'au'); event.preventDefault();">
              <span class="flag-icon flag-icon-au"></span> Australia
            </a>
            <!-- Add more countries as needed -->
          </div>
        </div>
        <input type="hidden" id="countryCode" name="countryCode" value="" />
        <small id="countryHelp" class="form-text text-muted"></small>
      </div>

      <!-- Phone Number Input -->
      <div class="form-group">
        <label for="number" class="form-label my-3">Number</label>
        <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number" required />
        <small id="numberHelp" class="form-text text-muted"></small>
      </div>

      <!-- Query Input -->
      <div class="mb-3">
        <label for="query" class="form-label my-3">Query</label>
        <input type="text" class="form-control" name="query" id="query" placeholder="" />
        <small id="queryHelp" class="form-text text-muted"></small>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary border-0 mx-auto my-sm-3">
        Submit
      </button>
    </form>
  </div>

  <!-- Our Information Section -->
  <div class="info container overflow-hidden">
  <h2 class="col-12 mb-4 p-3 fs-4 text-center">Our Information</h2>
  <div class="row justify-content-center align-items-center g-0">
    <!-- Address -->
    <div class="col-12 col-sm-6 col-md-4 mb-4 text-dark fs-4 text-center">
      <ul class="list-unstyled">
        <li class="m-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="50px" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
          </svg>
        </li>
        <li class="m-3">Address</li>
        <li class="m-3">Mumbai, India</li>
      </ul>
    </div>

    <!-- Email -->
    <div class="col-12 col-sm-6 col-md-4 mb-4 text-dark fs-4 text-center">
      <ul class="list-unstyled">
        <li class="m-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
          </svg>
        </li>
        <li class="m-3">Email</li>
        <li class="m-3">amandubeycollege@gmail.com</li>
      </ul>
    </div>

    <!-- Phone Number -->
    <div class="col-12 col-sm-6 col-md-4 mb-4 text-dark fs-4 text-center">
      <ul class="list-unstyled">
        <li class="m-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="50px" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
          </svg>
        </li>
        <li class="m-3">Phone No</li>
        <li class="m-3">916-712-0872</li>
      </ul>
    </div>
  </div>
</div>

</main>

<!-- JavaScript for Country Selection -->
<script>
  function selectCountry(code, flag) {
    document.getElementById("countryCode").value = code;
    document.getElementById("number").value = code + " ";
    document.querySelector(".dropdown-toggle").innerHTML = '<span class="flag-icon flag-icon-' + flag + '"></span> ' + code;
  }

  // Form validation
  function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var number = document.getElementById("number").value;

    if (name == "" || email == "" || number == "") {
      alert("All fields are required.");
      return false;
    }

    if (!/^[a-zA-Z ]+$/.test(name)) {
      alert("Name must contain only letters and spaces.");
      return false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email.");
      return false;
    }

    var numberPattern = /^[+\d ]+$/;
    if (!numberPattern.test(number)) {
      alert("Please enter a valid number.");
      return false;
    }

    return true;
  }
</script>


  <!-- place footer here -->
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