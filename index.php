<?php
include('./helper/QueryHandler.php');
include('./helper/FunctionController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Classroom Inventory Management System</title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
        }
        #wrapper {
            min-height: 100vh;
        }
        #sidebar-wrapper {
            min-width: 250px;
            background: #343a40;
            color: #fff;
        }
        .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            background-color: #0062cc;
        }
        .list-group-item {
            border: none;
            background-color: #343a40;
            color: #fff;
        }
        .list-group-item:hover, .list-group-item:focus {
            background-color: #495057;
        }
        .navbar {
            background-color: #007bff;
            padding: 0.5rem 1rem;
        }
        .navbar-nav {
            font-size: 1.1rem;
        }
        .container-fluid {
            padding: 2rem;
        }
        .table {
            background-color: #000;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
        }
        th {
            background-color: #007bff;
            /* color: #ffffff; */
        }
        .btn-primary {
            background-color: #0062cc;
            border-color: #005cbf;
        }
        .btn-primary:hover {
            background-color: #005cbf;
            border-color: #0056b3;
        }
        .footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .table {
            background-color: transparent; /* Clear background */
            border: 1px solid #fff; /* White borders for contrast */
        }
        th, td {
            border-color: #fff; /* White borders inside the table */

        }
        .table > thead{
            color: #000;
        }

        td {
           border-right-width: 1px;
            border-right-color: black;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end" id="sidebar-wrapper">
            <div class="sidebar-heading">CIMS</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                <a class="list-group-item list-group-item-action" href="admin/">Admin Login</a>
                <a class="list-group-item list-group-item-action" href="user/">User Login</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">&#9776;</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active">CLASSROOM INVENTORY MANAGEMENT SYSTEM</li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <p>This is a web-based application developed using PHP and MySQL.</p>
                <h5>Classroom Status</h5>
                <table class="table" >
                    <thead >
                        <tr >
                            <th>#</th>
                            <th>Room</th>
                            <th>Capacity</th>
                            <th>Description</th>
                            <th>Usable?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = RoomController::getAllRooms();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) { ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo htmlentities($row->id); ?></td>
                                    <td ><?php echo htmlentities($row->capacity); ?></td>
                                    <td><?php echo htmlentities($row->description); ?></td>
                                    <td><?php $room_usability = $row->usability;
                                        if ($room_usability == 0) : echo "<span style='color:red'>Unusable</span>";
                                        else : echo "<span style='color:green'>Usable</span>";
                                        endif; ?></td>
                                </tr>
                        <?php $cnt++;
                            }
                        } ?>
                    </tbody>
                </table>
                </div>
            <!-- Footer -->
            <div class="footer">
                © 2024 Classroom Inventory Management System. All Rights Reserved.
            </div>
            
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
