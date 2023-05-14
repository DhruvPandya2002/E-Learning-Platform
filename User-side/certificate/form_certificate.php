<?php
session_start();
if(isset($_SESSION['User'])){
	$font="The Hand ExtraBlack.otf";
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,19,21,22);
	$name="Devtown";
	imagettftext($image,220,0,520,1250,$color,$font,$_SESSION['User']);
	$course_name=$_SESSION['premium_course_name'];
	imagettftext($image,75,0,520,1600,$color,$font,$course_name);
	$file="certificate";
	$file_path="certificate/".$file.".jpg";
	// $file_path_pdf="certificate/".$file.".pdf";
	imagejpeg($image,$file_path);
	imagedestroy($image);

	// require('fpdf.php');
	// $pdf=new FPDF();
	// $pdf->AddPage();
	// $pdf->Image($file_path,0,0,210,150);
	// $pdf->Output($file_path_pdf,"F");

	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->Host='smtp.sendgrid.net';
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="apikey";
	$mail->Password="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";
    $mail->setFrom('devtown2023@gmail.com', $name);
    $mail->addAddress($_SESSION['email'], 'DevTown');        //Add a recipient
	$mail->isHTML(true);
	$mail->Subject="Course Completion Certificate";
	$mail->Body="Certificate Generated";
	// $mail->addAttachment($file_path_pdf);
	$mail->addAttachment($file_path);
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	if($mail->send()){
		echo "Send";
	}else{
		echo $mail->ErrorInfo;
	}
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Certification Completion</title>
    <link rel="icon" href="../Logo/Circle_1980x1980.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div id="world" class="flex flex-col justify-center items-center">
		<p class="text-3xl text-center mt-28">Congratulations you have successfully completed the course</p>
		<a href="../index.php" class="text-center mt-10"><button class="bg-blue-700 text-xl p-3 font-medium text-white rounded-lg">Go To Home Page</button></a>
	</div>
	<script>
	(function() {
  var COLORS, Confetti, NUM_CONFETTI, PI_2, canvas, confetti, context, drawCircle, i, range, resizeWindow, xpos;

  NUM_CONFETTI = 350;

  COLORS = [[85, 71, 106], [174, 61, 99], [219, 56, 83], [244, 92, 68], [248, 182, 70]];

  PI_2 = 2 * Math.PI;

  canvas = document.getElementById("world");

  context = canvas.getContext("2d");

  window.w = 0;

  window.h = 0;

  resizeWindow = function() {
    window.w = canvas.width = window.innerWidth;
    return window.h = canvas.height = window.innerHeight;
  };

  window.addEventListener('resize', resizeWindow, false);

  window.onload = function() {
    return setTimeout(resizeWindow, 0);
  };

  range = function(a, b) {
    return (b - a) * Math.random() + a;
  };

  drawCircle = function(x, y, r, style) {
    context.beginPath();
    context.arc(x, y, r, 0, PI_2, false);
    context.fillStyle = style;
    return context.fill();
  };

  xpos = 0.5;

  document.onmousemove = function(e) {
    return xpos = e.pageX / w;
  };

  window.requestAnimationFrame = (function() {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
      return window.setTimeout(callback, 1000 / 60);
    };
  })();

  Confetti = class Confetti {
    constructor() {
      this.style = COLORS[~~range(0, 5)];
      this.rgb = `rgba(${this.style[0]},${this.style[1]},${this.style[2]}`;
      this.r = ~~range(2, 6);
      this.r2 = 2 * this.r;
      this.replace();
    }

    replace() {
      this.opacity = 0;
      this.dop = 0.03 * range(1, 4);
      this.x = range(-this.r2, w - this.r2);
      this.y = range(-20, h - this.r2);
      this.xmax = w - this.r;
      this.ymax = h - this.r;
      this.vx = range(0, 2) + 8 * xpos - 5;
      return this.vy = 0.7 * this.r + range(-1, 1);
    }

    draw() {
      var ref;
      this.x += this.vx;
      this.y += this.vy;
      this.opacity += this.dop;
      if (this.opacity > 1) {
        this.opacity = 1;
        this.dop *= -1;
      }
      if (this.opacity < 0 || this.y > this.ymax) {
        this.replace();
      }
      if (!((0 < (ref = this.x) && ref < this.xmax))) {
        this.x = (this.x + this.xmax) % this.xmax;
      }
      return drawCircle(~~this.x, ~~this.y, this.r, `${this.rgb},${this.opacity})`);
    }

  };

  confetti = (function() {
    var j, ref, results;
    results = [];
    for (i = j = 1, ref = NUM_CONFETTI; (1 <= ref ? j <= ref : j >= ref); i = 1 <= ref ? ++j : --j) {
      results.push(new Confetti());
    }
    return results;
  })();

  window.step = function() {
    var c, j, len, results;
    requestAnimationFrame(step);
    context.clearRect(0, 0, w, h);
    results = [];
    for (j = 0, len = confetti.length; j < len; j++) {
      c = confetti[j];
      results.push(c.draw());
    }
    return results;
  };

  step();

}).call(this);
	</script>
</body>
</html>