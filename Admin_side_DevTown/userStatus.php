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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="png" href="Logo\Circle_1980x1980.png">
    <title>DevTown-Admin</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTable Style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- ajax cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- sweet alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- chart js cdn  -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        .swal-modal {
            padding: 30px;
        }

        .panel-body {
            margin-top: 20px;
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

        #graph {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
            margin-left: 80px;
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
                                <div class="col-xs-12 text-white text-center">
                                    <img src="Logo\user_image.png" alt="Image" class="img-thumbnail img-circle thumb128 ">                                    
                                    <h3 class="m0"><?php echo $row['name']; ?></h3>
                                </div>
                        </div>
                    </div>
                </div> 
                <!-- END widget-->
            </div>
            <!-- user template -->
            <div class="card" style="width: 18rem; border-radius: 10px; margin-top: 20px;">
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
                </ul>
            </div>
        <?php
                            }
        ?>		
        </div>
    </div>
</body>

</html>