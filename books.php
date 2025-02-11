<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.html");
    exit();
}

include("connection.php");

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize search query
$searchQuery = '';
$books = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $stmt = $conn->prepare("SELECT id, title, cover_image FROM books WHERE title LIKE ?");
    $likeQuery = "%$searchQuery%";
    $stmt->bind_param("s", $likeQuery);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT id, title, cover_image FROM books");
}

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Book Library</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" href="EpicBooks.png" type="image/png">
    <link rel="stylesheet" href="style.css" id="light-mode-css">
    <link rel="stylesheet" href="dark-mode.css" id="dark-mode-css" disabled>
</head>

<body>
    <script src="theme-toggle.js"></script>
    <header>
        <?php include("navbar.php"); ?>
    </header>

    <main>
        <div class="container my-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search books by title...">
        </div>

        <div class="container py-4">
            <div class="row gx-4 gy-2">
                <?php if (!empty($books)) : ?>
                    <?php foreach ($books as $book) : ?>
                        <?php $imagePath = 'uploads/' . htmlspecialchars($book['cover_image']); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 book-item" data-title="<?= htmlspecialchars(strtolower($book['title'])) ?>">
                            <figure class="gallery-grid-item">
                                <div class="gallery-grid-item-wrapper">
                                    <a href="viewBooks.php?id=<?= htmlspecialchars($book['id']) ?>" class="gallery-grid-lightbox-link">
                                        <img src="<?= $imagePath ?>" alt="Book Cover" class="gallery-img img-fluid" loading="lazy" onerror="this.onerror=null;this.src='uploads/default-cover.jpg';">
                                    </a>
                                </div>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No books found.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <?php include("footer.php"); ?>
    </footer>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchQuery = this.value.toLowerCase().trim();
            const bookItems = document.querySelectorAll('.book-item');
            bookItems.forEach(item => {
                const title = item.getAttribute('data-title');
                item.style.display = title.includes(searchQuery) ? '' : 'none';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
