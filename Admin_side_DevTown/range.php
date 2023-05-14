<?php
//connect to database
$conn = new mysqli('localhost', 'root', '', 'devtown');
if (!$conn) {
    die(mysqli_error($conn));
}
?>
<html>
<header>
    <title>range</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .meter {
            box-sizing: content-box;
            height: 20px;
            /* Can be anything */
            position: relative;
            margin: 60px 0 20px 0;
            /* Just for demo spacing */
            background: gray;
            border-radius: 25px;
            padding: 10px;
            box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.3);
        }

        .meter>span {
            display: block;
            height: 100%;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            background-color: rgb(43, 194, 83);
            background-image: linear-gradient(center bottom,
                    rgb(43, 194, 83) 37%,
                    rgb(84, 240, 84) 69%);
            box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3),
                inset 0 -2px 6px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        .meter>span:after,
        .animate>span>span {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-image: linear-gradient(-45deg,
                    rgba(255, 255, 255, 0.2) 25%,
                    transparent 25%,
                    transparent 50%,
                    rgba(255, 255, 255, 0.2) 50%,
                    rgba(255, 255, 255, 0.2) 75%,
                    transparent 75%,
                    transparent);
            z-index: 1;
            background-size: 50px 50px;
            animation: move 2s linear infinite;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            overflow: hidden;
        }

        .animate>span:after {
            display: none;
        }

        @keyframes move {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 50px 50px;
            }
        }

        .orange>span {
            background-image: linear-gradient(#30559e, #759dea);
        }

        .nostripes>span>span,
        .nostripes>span::after {
            background-image: none;
        }

        #page-wrap {
            width: 490px;
            margin: 80px auto;
        }

        * {
            box-sizing: border-box;
        }

        #page-wrap {
            cursor: pointer;			
        }		
		.card {
				display: flex;
				justify-content: center;
		}
    </style>
</header>

<body>
    <?php
    $username = 'rahul singh';
    //query to fetch all course names for the user
    $sql = "SELECT DISTINCT `course_name` FROM `user_watched` WHERE `user_name`='$username'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_array($res)) {
            $course_name  = $row['course_name'];

            $query = "SELECT * FROM `user_watched` WHERE `course_name` = '$course_name' AND `user_name` = '$username'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    $total_videos = $row['total_videos'];
                    $watched_videos = $row['watched_videos'];

                    //calculate the current value for the range input
                    $current_value = $watched_videos / $total_videos * 100;
    ?>                    
					<div class="card" style="width: 18rem; border-radius: 10px; margin-left: 20px; margin-top: 20px;">
						<ul class="list-group list-group-flush">
								<li class="list-group-item" style="background-color:cadetblue;"><?php echo $course_name ?></li>
								<li class="list-group-item" style="background-color:alicebstyle;">									
											<abbr title="<?php echo $current_value; ?>%">
												<div class="meter orange nostripes item">
													<span style="width: <?php echo $current_value; ?>%"></span>
												</div>
											</abbr>			
								</li>    
						</ul>
					</div>
    <?php
                }
            } else {
                echo "No data found for course $course_name.";
            }
        }
    } else {
        echo "No course found for user $username.";
    }
    ?>
    <script>
        $(".meter > span").each(function() {
            $(this)
                .data("origWidth", $(this).width())
                .width(0)
                .animate({
                        width: $(this).data("origWidth")
                    },
                    1200
                );
        });
    </script>
</body>

</html>