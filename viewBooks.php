<?php
include "connection.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the selected book and its genre
$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
    $genres = explode(',', $book['genre']); // Convert "Fantasy, Adventure" into ["Fantasy", "Adventure"]
    $related_books = [];

    // Build a dynamic SQL query to match any of the genres
    $sql_related = "SELECT * FROM books WHERE (";
    $conditions = [];
    $params = [];
    $types = "";

    foreach ($genres as $g) {
        $conditions[] = "genre LIKE ?";
        $params[] = "%" . trim($g) . "%"; // Trim spaces & allow partial matching
        $types .= "s"; // Bind string
    }

    $sql_related .= implode(" OR ", $conditions) . ") AND id <> ?";
    $params[] = $id;
    $types .= "i"; // Bind integer for book ID

    // Execute the query
    $stmt = $conn->prepare($sql_related);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $related_result = $stmt->get_result();

    while ($row = $related_result->fetch_assoc()) {
        $related_books[] = $row;
    }
} else {
    echo "Book not found.";
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
  <style>
     /* Ensure the card is a flex container */
.card {
    display: flex;
    flex-direction: column;  /* Makes the card content stack vertically */
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    transition: 0.3s ease-in-out;
    height: 100%;  /* Ensure the card occupies full height in the container */
    min-height: 380px; /* Set a minimum height to make cards consistent */
    padding: 40px;
}

.card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.card-img-top {
    height: 220px;  /* Fixed height for images */
    object-fit: cover;  /* Maintains aspect ratio without stretching */
}

/* Card body should stretch to fill available space */
.card-body {
    flex-grow: 1;  /* Takes up remaining space */
    display: flex;
    flex-direction: column;
    justify-content: space-between;  /* Ensures title, text, and button stay spaced properly */
    padding: 10px;
}

/* Title and text styling */
.card-title {
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 10px; /* Adds spacing between the title and text */
}

.card-text {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 10px; /* Adds spacing between the text and the button */
}

/* View Book Button */
.btn-outline-primary {
    width: 100%;  /* Ensures the button spans the width of the card */
    margin-top: auto; /* Pushes the button to the bottom */
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
    <nav class="navbar navbar-expand-lg bg-body-dark mb-3 border-bottom  ">
      <div class="container-fluid">
        <!-- logo -->
        <a class='navbar-brand' href="index.php">
  <img id='brandimg' src='EpicBooks.png' alt='Logo' height='80' width='80'>
</a>
        <!-- toggle btn -->
        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- sidebar -->
        <div class=" sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel">

          <!-- sidebar Heading -->
          <div class="offcanvas-header text-white border-bottom border-dark m-3">
            <h5 class="offcanvas-title justify-content-center align-items-center text-dark" id="offcanvasNavbarLabel">
              EpicBooks</h5>
            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>

          <!-- sidebar body -->
          <div class="offcanvas-body d-flex flex-column  flex-lg-row p-4 p-lg-0">
            <ul class="navbar-nav justify-content-center align-items-center fs-4 flex-grow-1 pe-3">
              <li class="nav-item  mx-3">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="books.php">Books</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="contactus.php">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
    <main>
    <div class="container">
    <div class="row book-section border-dark border-bottom py-3">
        <div class="col-md-4 mb-4">
            <?php if (!empty($book['cover_image'])): ?>
                <img src="<?php echo 'uploads/' . htmlspecialchars($book['cover_image']); ?>" class="img-fluid gallery-grid-item" alt="Book Cover">
            <?php else: ?>
                <p>No cover image available.</p>
            <?php endif; ?>
            <p class="additional-title my-2 text-center"><?php echo htmlspecialchars($book['title']); ?></p>
        </div>
        <div class="col-md-8 book-details">
            <h3><?php echo htmlspecialchars($book['title']); ?></h3>
            <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
            <p><strong>ISBN:</strong> <?php echo htmlspecialchars($book['isbn']); ?></p>
            <p><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></p>
            <p><strong>Publication Date:</strong> <?php echo htmlspecialchars($book['pub_date']); ?></p>
            <p><strong>Publisher:</strong> <?php echo htmlspecialchars($book['publisher']); ?></p>
            <p><strong>Pages:</strong> <?php echo htmlspecialchars($book['pages']); ?></p>
            <p><strong>Language:</strong> <?php echo htmlspecialchars($book['language']); ?></p>
            <p><strong>Edition:</strong> <?php echo htmlspecialchars($book['edition']); ?></p>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars($book['price']); ?></p>
            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($book['description'])); ?></p>
            <!-- View the PDF -->
            <!-- <a href="view_pdf.php?id=<?php echo $book['id']; ?>" class="btn btn-primary mt-3">Start Reading</a> -->
            <!-- Payment Integration -->
<a href="payment.html" class="btn btn-success mt-3">Buy & Read</a>

        </div>
    </div>

    <!-- Recommended Books Section -->
    <h2 class="  text-center my-3"> Books You May Liked</h2>
    <div class="row gx-4 gy-4 border-dark border-bottom py-3">
    <?php if (!empty($related_books)): ?>
        <?php foreach ($related_books as $related): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 p-3">
                <div class="card">
                    <!-- Book Cover Image -->
                    <a href="viewBooks.php?id=<?php echo $related['id']; ?>">
                        <img src="uploads/<?php echo htmlspecialchars($related['cover_image']); ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($related['title']); ?>">
                    </a>

                    <div class="card-body">
                        <!-- Book Title -->
                        <h5 class="card-title"><?php echo htmlspecialchars($related['title']); ?></h5>
                        
                        <!-- Book Author -->
                        <p class="card-text"><strong>Author:</strong> <?php echo htmlspecialchars($related['author']); ?></p>
                        
                        <!-- View Book Button -->
                        <a href="viewBooks.php?id=<?php echo $related['id']; ?>" class="btn btn-outline-primary btn-sm text-dark">View Book</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-muted">No recommendations available for this genre.</p>
    <?php endif; ?>
</div>



</div>
  </main>
  <footer class=" footertext-center text-lg-start text-white p-0">
    <div class="container-fluid py-2 pb-0">
      <section>
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
            <h5 class=" mb-4 font-weight-bold ">EpicBooks </h5>
            <p>
              <strong> EpicBooks </strong>is your go-to destination for discovering the latest and greatest in books.
              From bestselling novels to hidden gems, we bring you a curated selection of reads to inspire and
              entertain.
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-0 px-2 ">
            <h5 class="mb-4 font-weight-bold px-2">LINKS</h5>
            <p><a href="books.html" style="text-decoration: none;">Books</a></p>
            <p><a href="FAQ.html" style="text-decoration: none;">FAQ</a></p>
            <p><a href="books.html" style="text-decoration: none;">privacy</a></p>
            <p><a href="books.html" style="text-decoration: none;">Help</a></p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3  mt-0 px-2 ">
            <h5 class=" mb-4 font-weight-bold  ">CONTACT</h5>
            <p>Maple Avenue Dogwood City, US</p>
            <p>mailexamples@gmail.com</p>
            <p> + 91 913-655-4183</p>
            <p>+ 91 91671 20872</p>
          </div>
        </div>
      </section>

      <hr class="hr mx-3">

      <section class="section pt-0">
        <div class="row d-flex align-items-center">
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <div class="license p-3  ">
              © 2024 Copyright: all right reserved by
              <a href="admin.html" class="no-underline" style="text-decoration: none;">EpicBooks</a>
            </div>
          </div>

          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- Twitter -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://twitter.com" role="button"
              aria-label="Twitter">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x"
                viewBox="0 0 16 16">
                <path
                  d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
              </svg>
            </a>

            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://facebook.com" role="button"
              aria-label="Facebook">
              <svg width="30px" height="20px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M512,256c0,-141.385 -114.615,-256 -256,-256c-141.385,0 -256,114.615 -256,256c0,127.777 93.616,233.685 216,252.89l0,-178.89l-65,0l0,-74l65,0l0,-56.4c0,-64.16 38.219,-99.6 96.695,-99.6c28.009,0 57.305,5 57.305,5l0,63l-32.281,0c-31.801,0 -41.719,19.733 -41.719,39.978l0,48.022l71,0l-11.35,74l-59.65,0l0,178.89c122.385,-19.205 216,-125.113 216,-252.89Z"
                  style="fill:#1877f2;" />
                <path
                  d="M355.65,330l11.35,-74l-71,0l0,-48.022c0,-20.245 9.917,-39.978 41.719,-39.978l32.281,0l0,-63c0,0 -29.297,-5 -57.305,-5c-58.476,0 -96.695,35.44 -96.695,99.6l0,56.4l-65,0l0,74l65,0l0,178.89c13.033,2.045 26.392,3.11 40,3.11c13.608,0 26.966,-1.065 40,-3.11l0,-178.89l59.65,0Z"
                  style="fill:#fff;" />
              </svg>
            </a>

            <!-- Google -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://google.com" role="button"
              aria-label="Google">
              <svg width="30px" height="20px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <path
                    d="M27.585,64c0-4.157,0.69-8.143,1.923-11.881L7.938,35.648C3.734,44.183,1.366,53.801,1.366,64c0,10.191,2.366,19.802,6.563,28.332l21.558-16.503C28.266,72.108,27.585,68.137,27.585,64"
                    fill="#FBBC05" />
                  <path
                    d="M65.457,26.182c9.031,0,17.188,3.2,23.597,8.436L107.698,16C96.337,6.109,81.771,0,65.457,0C40.129,0,18.361,14.484,7.938,35.648l21.569,16.471C34.477,37.033,48.644,26.182,65.457,26.182"
                    fill="#EA4335" />
                  <path
                    d="M65.457,101.818c-16.812,0-30.979-10.851-35.949-25.937L7.938,92.349C18.361,113.516,40.129,128,65.457,128c15.632,0,30.557-5.551,41.758-15.951L86.741,96.221C80.964,99.86,73.689,101.818,65.457,101.818"
                    fill="#34A853" />
                  <path
                    d="M126.634,64c0-3.782-0.583-7.855-1.457-11.636H65.457v24.727h34.376c-1.719,8.431-6.397,14.912-13.092,19.13l20.474,15.828C118.981,101.129,126.634,84.861,126.634,64"
                    fill="#4285F4" />
                </g>
              </svg>
            </a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!" role="button" href="" >
                <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg  width="30px" height="20px" enable-background="new 0 0 128 128" id="Social_Icons" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x37__stroke"><g id="Instagram_1_"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128" width="128"/><radialGradient cx="19.1111" cy="128.4444" gradientUnits="userSpaceOnUse" id="Instagram_2_" r="163.5519"><stop offset="0" style="stop-color:#FFB140"/><stop offset="0.2559" style="stop-color:#FF5445"/><stop offset="0.599" style="stop-color:#FC2B82"/><stop offset="1" style="stop-color:#8E40B7"/></radialGradient><path clip-rule="evenodd" d="M105.843,29.837    c0,4.242-3.439,7.68-7.68,7.68c-4.241,0-7.68-3.438-7.68-7.68c0-4.242,3.439-7.68,7.68-7.68    C102.405,22.157,105.843,25.595,105.843,29.837z M64,85.333c-11.782,0-21.333-9.551-21.333-21.333    c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333C85.333,75.782,75.782,85.333,64,85.333z M64,31.135    c-18.151,0-32.865,14.714-32.865,32.865c0,18.151,14.714,32.865,32.865,32.865c18.151,0,32.865-14.714,32.865-32.865    C96.865,45.849,82.151,31.135,64,31.135z M64,11.532c17.089,0,19.113,0.065,25.861,0.373c6.24,0.285,9.629,1.327,11.884,2.204    c2.987,1.161,5.119,2.548,7.359,4.788c2.24,2.239,3.627,4.371,4.788,7.359c0.876,2.255,1.919,5.644,2.204,11.884    c0.308,6.749,0.373,8.773,0.373,25.862c0,17.089-0.065,19.113-0.373,25.861c-0.285,6.24-1.327,9.629-2.204,11.884    c-1.161,2.987-2.548,5.119-4.788,7.359c-2.239,2.24-4.371,3.627-7.359,4.788c-2.255,0.876-5.644,1.919-11.884,2.204    c-6.748,0.308-8.772,0.373-25.861,0.373c-17.09,0-19.114-0.065-25.862-0.373c-6.24-0.285-9.629-1.327-11.884-2.204    c-2.987-1.161-5.119-2.548-7.359-4.788c-2.239-2.239-3.627-4.371-4.788-7.359c-0.876-2.255-1.919-5.644-2.204-11.884    c-0.308-6.749-0.373-8.773-0.373-25.861c0-17.089,0.065-19.113,0.373-25.862c0.285-6.24,1.327-9.629,2.204-11.884    c1.161-2.987,2.548-5.119,4.788-7.359c2.239-2.24,4.371-3.627,7.359-4.788c2.255-0.876,5.644-1.919,11.884-2.204    C44.887,11.597,46.911,11.532,64,11.532z M64,0C46.619,0,44.439,0.074,37.613,0.385C30.801,0.696,26.148,1.778,22.078,3.36    c-4.209,1.635-7.778,3.824-11.336,7.382C7.184,14.3,4.995,17.869,3.36,22.078c-1.582,4.071-2.664,8.723-2.975,15.535    C0.074,44.439,0,46.619,0,64c0,17.381,0.074,19.561,0.385,26.387c0.311,6.812,1.393,11.464,2.975,15.535    c1.635,4.209,3.824,7.778,7.382,11.336c3.558,3.558,7.127,5.746,11.336,7.382c4.071,1.582,8.723,2.664,15.535,2.975    C44.439,127.926,46.619,128,64,128c17.381,0,19.561-0.074,26.387-0.385c6.812-0.311,11.464-1.393,15.535-2.975    c4.209-1.636,7.778-3.824,11.336-7.382c3.558-3.558,5.746-7.127,7.382-11.336c1.582-4.071,2.664-8.723,2.975-15.535    C127.926,83.561,128,81.381,128,64c0-17.381-0.074-19.561-0.385-26.387c-0.311-6.812-1.393-11.464-2.975-15.535    c-1.636-4.209-3.824-7.778-7.382-11.336c-3.558-3.558-7.127-5.746-11.336-7.382c-4.071-1.582-8.723-2.664-15.535-2.975    C83.561,0.074,81.381,0,64,0z" fill="url(#Instagram_2_)" fill-rule="evenodd" id="Instagram"/></g></g></svg>
             </a>
          </div>
        </div>
      </section>
    </div>
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

<?php
$conn->close();
?>