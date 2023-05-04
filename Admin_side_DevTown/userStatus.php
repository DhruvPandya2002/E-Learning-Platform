<?php
session_start();

$con = new mysqli('localhost', 'root', '', 'devtown');
if (!$con)
    die(mysqli_error($con));

if (!isset($_SESSION['UserID'])) {
    header('location:User.php');
}
$uid = $_SESSION['UserID'];


?>
<html>

<head>
    <!-- ChartJS -->
    <!-- <script src="plugins/chart.js/Chart.min.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="png" href="Logo\Circle_1980x1980.png">
    <title>DevTown-Admin</title>
    <link rel="stylesheet" href="style.css" />
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js"></script> -->
    <style>
        .swal-modal {
            padding: 30px;
        }

        .panel-body {
            margin-top: 20px;
            margin-left: 20px;
            height: auto;
            width: auto !important;
            border-radius: 30px;
        }

        .row {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
            height: auto;
            width: auto;
        }

        #bubble {
            height: auto;
            width: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- user template -->
            <div class="col-md-4">
                <!-- START widget-->
                <div class="panel widget">
                    <div style="background-image: linear-gradient(to bottom right,#9600FF,#AEBAF8);" class="panel-body text-center bg-center">
                        <div class="row row-table">
                            <?php
                            $sql = "SELECT * FROM `users` WHERE `user_id`='$uid'";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-12 text-white text-center center-block">
                                    <img src="Logo\user_image.png" alt="Image" class="img-thumbnail img-circle thumb128 ">
                                    <p><?php echo $uid; ?></p>
                                    <h3 class="m0"><?php echo $row['name']; ?></h3>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- END widget-->
            </div>
            <!-- user template -->
            <div class="card" style="width: 18rem; border-radius: 10px; margin-left: 20px; margin-top: 20px;">
                <div class="card-header" style="background-color:cadetblue;">
                    User Status
                </div>
                <?php
                                $class = "red";
                                $status = "offine";
                                if ($row['user_status'] == 1) {
                                    $class = "Black";
                                    $status = "online";
                                }
                ?>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="background-color:aliceblue;color:<?php echo $class; ?>;"><?php echo $status; ?></li>
                    <li>
                        <p><?php echo $row['user_id']; ?></p>
                    </li>
                </ul>
            </div>
        <?php
                            }
        ?>
        </div>
    </div>
</body>

</html>