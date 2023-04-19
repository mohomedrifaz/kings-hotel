<?php
include "db.php";
$id = $_GET["id"];
$name = "";
$beds = "";
$price = "";
$res = mysqli_query($con, "select * from roomtype where roomid=$id");
while ($row = mysqli_fetch_array($res)) {
    $name = $row["name"];
    $beds = $row["beds"];
    $price = $row["price"];
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        
                        
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
                    <li>
                        <a href="roomdel.php"><i class="fa fa-desktop"></i> Delete Room</a>
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
                                            value="<?php echo $name; ?>" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">No of beds</label>
                                        <input type="text" class="form-control" value="<?php echo $beds; ?>"
                                            placeholder="Enter No of Beds" name="beds">
                                    </div>

                                    <div class="form-group">
                                        <label for="contact">Price</label>
                                        <input type="text" class="form-control" value="<?php echo $price; ?>"
                                            placeholder="Enter Price" name="price">
                                    </div>

                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </form>
                                <?php
                                if (isset($_POST["update"])) {
                                    mysqli_query($con, "update roomtype set 
                            name='$_POST[name]',
                            beds='$_POST[beds]',
                            price='$_POST[price]'  
                            where roomid = $id");

                                    echo '<script type="text/javascript">';
                                    echo 'Swal.fire({';
                                    echo '    title: "Success!",';
                                    echo '    text: "Successfully updated!",';
                                    echo '    icon: "success",';
                                    echo '    confirmButtonText: "OK"';
                                    echo '}).then((result) => {';
                                    echo '    if (result.isConfirmed) {';
                                    echo '        window.location = "room.php";'; // Redirect to edit_customer.php with the updated customer ID
                                    echo '    }';
                                    echo '});';
                                    echo '</script>';
                                }
                                ?>
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
                                                                                    echo "<th onclick=\"deleteCustomer(" . $trow['roomid'] . ");\">" ?>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger">Delete</button>
                                                                                    <?php
                                                                                    echo "</tr>";
                                                                                }
                                                                            }
                                                                            ?>



                                                                        </tbody>
                                                                    </table>

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