<nav class='navbar navbar-expand-lg mb-3 border-bottom '>
  <div class='container-fluid'>
    <!-- Logo -->
    <a class='navbar-brand' href="index.php">
  <img id='brandimg' src='EpicBooks.png' alt='Logo' height='80' width='80'>
</a>

    <!-- Toggle button -->
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <span></span> <!-- Top line -->
      <span></span> <!-- Middle line -->
      <span></span> <!-- Bottom line -->
    </span>
  </button>

    <!-- Sidebar -->
    <div class='sidebar offcanvas offcanvas-start' tabindex='-1' id='offcanvasNavbar'
      aria-labelledby='offcanvasNavbarLabel'>

      <!-- Sidebar Heading -->
      <div class='offcanvas-header border-bottom border-white m-3'>
        <h5 class='offcanvas-title justify-content-center align-items-center' id='offcanvasNavbarLabel'>
          EpicBooks
        </h5>
        <button type='button' class='btn-close ' data-bs-dismiss='offcanvas' aria-label='Close'></button>
      </div>

      <!-- Sidebar Body -->
      <div class='offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0'>
        <ul class='navbar-nav justify-content-center align-items-center fs-4 flex-grow-1 pe-3'>
          <li class='nav-item mx-3'>
            <a class='nav-link' href='index.php'>Home</a>
          </li>
          <li class='nav-item mx-3'>
            <a class='nav-link' href='about.php'>About</a>
          </li>
          <li class='nav-item mx-3'>
            <a class='nav-link' href='books.php'>Books</a>
          </li>
          <li class='nav-item mx-3'>
            <a class='nav-link' href='contactus.php'>Contact</a>
          </li>
        </ul>

        <!-- Login/Logout Buttons -->
        <div class='login-btn d-flex justify-content-center align-items-center'>
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <!-- Dropdown Button for Profile and Logout -->
            <div class="dropdown">
              <button class="btn btn-success px-3 py-2 mx-2 rounded-5 border-0" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><button class="dropdown-item toggle-theme-btn" id="toggle-light">Light Mode</button></li>
                <li><button class="dropdown-item toggle-theme-btn" id="toggle-dark">Dark Mode</button></li>
              </ul>
            </div>
          <?php else: ?>
            <a class='btn btn-success px-3 py-2 mx-2 rounded-5 border-0' href='login.html' role='button'>Login</a>
            <a class='btn btn-success px-3 py-2 mx-2 rounded-5 border-0' href='registration.html' role='button'>Register</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- JavaScript for Active Link and Theme Toggle -->
<script>
  // Highlight the current active link in the navbar
  const navLinks = document.querySelectorAll('.nav-link');
  const currentPath = window.location.pathname;

  navLinks.forEach(link => {
    if (currentPath.includes(link.getAttribute('href'))) {
      link.classList.add('active-link');
    }
  });
</script>
