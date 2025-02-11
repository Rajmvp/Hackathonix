<?php
include "connection.php";

// Check if 'id' parameter is present in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Convert the id to an integer

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("No book found with ID: " . htmlspecialchars($id));
    }

    $book = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Book ID not provided.");
}

// Check if the PDF file exists
$file_path = 'uploaded_files/' . $book['pdf_file'];
if (!file_exists($file_path)) {
    die("PDF file does not exist at path: " . htmlspecialchars($file_path));
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php echo htmlspecialchars($book['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body {
            background-color: #f0f2f5;
        }

        #canvas-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        canvas {
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
        }

        #pdf-viewer {
            padding: 2rem;
        }

        /* Responsive layout adjustments */
        @media (max-width: 767px) {
            #pdf-viewer {
                padding: 1rem;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            #pdf-viewer {
                padding: 1.5rem;
            }
        }

        @media (min-width: 992px) {
            #pdf-viewer {
                padding: 2rem;
            }
        }
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: #ffff;
            cursor: pointer;
        }
        .green-icon {
    color: green;
  }
    </style>

<link rel="icon" href="EpicBooks.png" type="image/png">
  <!-- light mode  -->
  <link rel="stylesheet" href="style.css" id="light-mode-css">
  <!-- dark mode -->
  <link rel="stylesheet" href="dark-mode.css" id="dark-mode-css" disabled>
</head>

<body>
<script src="theme-toggle.js"></script>

<a href="javascript:history.back()" class="back-btn ml-auto">
<i class="bi bi-chevron-double-left green-icon"></i>   </a>

    <div class="container mt-5">
        <h2 class="text-center">Viewing: <?php echo htmlspecialchars($book['title']); ?></h2>
        <div id="pdf-viewer">
            <div id="canvas-container"></div>
            <div id="page-info" class="text-center mt-2"></div>
            <div class="row text-center mt-3">
                <div class="col-4">
                    <button class="btn btn-primary w-100" onclick="bookmarkPage()">Bookmark</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary w-100" onclick="goToBookmark()">Go to Bookmark</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-danger w-100" onclick="removeBookmark()">Remove Bookmark</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        const url = '<?php echo htmlspecialchars($file_path); ?>';
        let pdfDoc = null,
            pageNum = 1,
            canvas = document.createElement('canvas'),
            ctx = canvas.getContext('2d'),
            canvasContainer = document.getElementById('canvas-container'),
            pageInfo = document.getElementById('page-info');

        canvasContainer.appendChild(canvas);

        const baseScale = 1.5;

        function renderPage(num) {
            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({ scale: baseScale });
                const scale = (canvasContainer.clientWidth / viewport.width) * baseScale;
                const scaledViewport = page.getViewport({ scale: scale });

                canvas.height = scaledViewport.height;
                canvas.width = scaledViewport.width;

                const renderContext = {
                    canvasContext: ctx,
                    viewport: scaledViewport
                };
                page.render(renderContext).promise.then(() => {
                    pageInfo.textContent = `Page ${pageNum} of ${pdfDoc.numPages}`;
                });
            });
        }

        pdfjsLib.getDocument(url).promise.then(pdf => {
            pdfDoc = pdf;
            const savedPage = localStorage.getItem(`bookmark_${url}`);
            pageNum = savedPage ? parseInt(savedPage) : 1;
            renderPage(pageNum);
        });

        canvas.addEventListener('click', (event) => {
            const rect = canvas.getBoundingClientRect();
            const clickX = event.clientX - rect.left;

            if (clickX < canvas.width / 2 && pageNum > 1) {
                // Clicked on left side, go to previous page
                pageNum--;
                renderPage(pageNum);
                window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll to top
            } else if (clickX >= canvas.width / 2 && pageNum < pdfDoc.numPages) {
                // Clicked on right side, go to next page
                pageNum++;
                renderPage(pageNum);
                window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll to top
            }
        });

        function bookmarkPage() {
            localStorage.setItem(`bookmark_${url}`, pageNum);
            alert("Page bookmarked!");
        }

        function goToBookmark() {
            const savedPage = localStorage.getItem(`bookmark_${url}`);
            if (savedPage) {
                pageNum = parseInt(savedPage);
                renderPage(pageNum);
                window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll to top
            } else {
                alert("No bookmark found for this book.");
            }
        }

        function removeBookmark() {
            localStorage.removeItem(`bookmark_${url}`);
            alert("Bookmark removed!");
        }

        window.addEventListener('resize', () => {
            renderPage(pageNum);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
