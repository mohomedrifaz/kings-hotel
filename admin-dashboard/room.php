<?php


include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST['name'])
        && isset($_POST['beds'])
        && isset($_POST['price'])
    ) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $name = validate($_POST['name']);
        $beds = validate($_POST['beds']);
        $price = validate($_POST['price']);

        if (empty($name)) {
            header("Location: room.php?error= Room Name is required");
            exit();
        } else if (empty($beds)) {
            header("Location: room.php?error= No of beds are required");
            exit();
        } else if (empty($price)) {
            header("Location: room.php?error= Price is required");
            exit();
        } else {
            //Hashing the password

            $sql2 = "insert into roomtype(name,beds,price) values('$name','$beds','$price')";
            $result2 = mysqli_query($con, $sql2);
            if ($result2) {
                header("Location: room.php?success=New Room Type was added");
                exit();
            } else {
                header("Location: room.php?error=Unknown error occured");
                exit();
            }
        }
    } else {
        header("Location: room.php");
        exit();
    }
}
?>

<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KINGS HOTEL</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.css">

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.12.5/dist/sweetalert2.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>

                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="settings.php"><i class="fa fa-dashboard"></i>Rooms Status</a>
                    </li>
                    <li>
                        <a class="active-menu" href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>


            </div>

        </nav>
        <!-- /. NAV SIDE  -->



        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            NEW ROOM <small></small>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-12 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                ADD NEW ROOM
                            </div>
                            <div class="panel-body">
                                <form action="" method="post">
                                    <?php if (isset($_GET['error'])) { ?>
                                        <p class="error">
                                            <?php echo $_GET['error']; ?>
                                        </p>
                                    <?php } ?>
                                    <?php if (isset($_GET['success'])) { ?>
                                        <p class="success">
                                            <?php echo $_GET['success']; ?>
                                        </p>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="name">Room Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Room Name"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">No of beds</label>
                                        <input type="text" class="form-control" placeholder="Enter No of Beds"
                                            name="beds">
                                    </div>

                                    <div class="form-group">
                                        <label for="contact">Price</label>
                                        <input type="text" class="form-control" placeholder="Enter Price" name="price">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Insert</button>
                                </form>
                            </div>
                        </div>


                        <div class="row" style="margin-top: 40px;">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapseTwo">
                                                            <button class="btn btn-default" type="button">
                                                                Room Types <span class="badge"></span>
                                                            </button>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                                    <div class="panel-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Room Name</th>
                                                                                <th>No of Beds</th>
                                                                                <th>Price</th>
                                                                                <th>Edit</th>
                                                                                <th>Delete</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            <?php
                                                                            $tsql = "select * from roomtype";
                                                                            $tre = mysqli_query($con, $tsql);
                                                                            while ($trow = mysqli_fetch_array($tre)) { {
                                                                                    echo "<th>" . $trow['roomid'] . "</th>";
                                                                                    echo "<th>" . $trow['name'] . "</th>";
                                                                                    echo "<th>" . $trow['beds'] . "</th>";
                                                                                    echo "<th>" . $trow['price'] . "</th>";
                                                                                    echo "<th onclick=\"window.location='edit_room.php?id=" . $trow['roomid'] . "';\">" ?><button
                                                                                        type="button"
                                                                                        class="btn btn-success">Edit</button>
                                                                                    <?php
                                                                                    echo "<th onclick=\"deleteRoom(" . $trow['roomid'] . ");\">" ?>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger">Delete</button>
                                                                                    <?php
                                                                                    echo "</tr>";
                                                                                }
                                                                            }
                                                                            ?>



                                                                        </tbody>
                                                                    </table>
                                                                    <?php
                                                                    // Delete customer function
                                                                    function deleteRoom($id)
                                                                    {
                                                                        global $con;
                                                                        mysqli_query($con, "DELETE FROM roomtype WHERE id=$id");
                                                                        // Show success message using SweetAlert
                                                                        echo '<script type="text/javascript">';
                                                                        echo 'Swal.fire({';
                                                                        echo '    title: "Success!",';
                                                                        echo '    text: "Successfully deleted!",';
                                                                        echo '    icon: "success",';
                                                                        echo '    confirmButtonText: "OK"';
                                                                        echo '}).then((result) => {';
                                                                        echo '    if (result.isConfirmed) {';
                                                                        echo '        window.location = "room.php";'; // Redirect to edit_customer.php without any specific customer ID
                                                                        echo '    }';
                                                                        echo '});';
                                                                        echo '</script>';
                                                                    }
                                                                    ?>

                                                                    <!-- JavaScript function to confirm and call deleteCustomer() -->
                                                                    <script>
                                                                        function deleteRoom(id) {
                                                                            Swal.fire({
                                                                                title: 'Are you sure?',
                                                                                text: 'You are about to delete a customer.',
                                                                                icon: 'warning',
                                                                                showCancelButton: true,
                                                                                confirmButtonColor: '#d33',
                                                                                cancelButtonColor: '#3085d6',
                                                                                confirmButtonText: 'Yes, delete it!'
                                                                            }).then((result) => {
                                                                                if (result.isConfirmed) {
                                                                                    // Call PHP function to delete customer
                                                                                    window.location = 'delete_room.php?id=' + id;
                                                                                }
                                                                            });
                                                                        }
                                                                    </script>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End  Basic Table  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <!-- /. WRAPPER  -->
            <!-- JS Scripts-->
            <!-- jQuery Js -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- Bootstrap Js -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- Metis Menu Js -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- Custom Js -->
            <script src="assets/js/custom-scripts.js"></script>


</body>

</html>