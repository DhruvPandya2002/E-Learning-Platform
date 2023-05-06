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
<p>Congratulations you have successfully completed the course</p>
<p>Check your E-mail for certificate</p>