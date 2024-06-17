<?php
include('./helper/QueryHandler.php');
include('./helper/FunctionController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CLASSROOM MANAGEMENT SYSTEM</title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <style>
        #page-content-wrapper {
            background-image: url("./assets/bg.jpg"); /* The image used *//* Used if the image is unavailable */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover;
        }

        h5 {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 10px 15px;
            text-align: center;
        }

        thead {
      background-color: rgba(255, 255, 255, 0.7);
    }

        .table tbody tr:nth-child(odd) {
    background-color: #f2f2f2; /* Light grey color for odd rows */
}

.table tbody tr:nth-child(even) {
    background-color: #ffffff; /* White color for even rows */
}
    </style>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light" style="font-size:30px;">CMS</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Home</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="admin/">Admin Login</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="user/">User Login</a>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom blue">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active" style="font-size:30px;">CLASSROOM MANAGEMENT SYSTEM</li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid" style="padding-top:2%;">
                <p>
                <h5> Classroom Status</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Room </th>
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
                                    <td><?php echo htmlentities($row->capacity); ?></td>
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
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>i