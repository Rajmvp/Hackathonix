<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: black;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 30px;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table {
            margin-top: 20px;
            border-collapse: collapse;
        }

        .dataTables_filter input {
            background-color: #ffffff;
            color: #495057;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
            width: 100%;
            max-width: 200px;
            margin-left: 10px;
        }

        .dataTables_filter input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .dataTables_length select {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
            width: 100%;
            max-width: 200px;
        }

        .btn {
            margin: 5px;
        }

        .btn-warning, .btn-danger {
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .text-center {
            margin-top: 20px;
        }

        /* Table responsiveness */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <?php 
        include "connection.php";

        $sql = "SELECT * FROM `epicbooks_users`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='container'>
                    <h1 class='text-center m-5 text-primary'>User Management</h1>
                    <div class='table-responsive'>
                        <table id='userTable' class='table table-striped'>
                            <thead>
                                <tr>
                                    <th scope='col'>Id</th>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Username</th>
                                    <th scope='col'>Password</th>
                                    <th scope='col'>Action</th>
                                </tr>
                            </thead>
                            <tbody>";

            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$rows['id']}</td>
                    <td>{$rows['name']}</td>
                    <td>{$rows['email']}</td>
                    <td>{$rows['username']}</td>
                    <td>{$rows['password']}</td>
                    <td>
                        <a class='btn btn-warning' href='userEdit.php?id={$rows['id']}' role='button'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
                                <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001'/>
                            </svg>
                        </a>
                        <a class='btn btn-danger' href='userDelete.php?id={$rows['id']}' role='button'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                            </svg>
                        </a>
                    </td>
                </tr>";
            }

            echo "</tbody>
                </table>
            </div>
        </div>
        <!-- Button to go to the dashboard -->
        <div class='text-center mb-4'>
            <a href='dashboard.php' class='btn btn-primary'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M8 3.293l6 6V14.5a.5.5 0 0 1-.5.5H10.5a.5.5 0 0 1-.5-.5v-4H6v4a.5.5 0 0 1-.5.5H2.5a.5.5 0 0 1-.5-.5V9.293l6-6zm0-1.414L1.5 7.293v7.207A1.5 1.5 0 0 0 3 16h4a1.5 1.5 0 0 0 1.5-1.5v-4h2v4A1.5 1.5 0 0 0 13 16h2A1.5 1.5 0 0 0 16 14.5V7.293l-6.5-6.414a1.5 1.5 0 0 0-2.035-.06z'/>
                </svg>
                Go to Dashboard
            </a>
        </div>";
        } else {
            echo "Zero records found";
        }
        ?>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
