<?php
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

session_start();

$html2pdf = new Html2Pdf();
$filename = $_SESSION['PDF_COURSE_FILENAME'];
$content = $_SESSION['PDF_COURSE_CONTENT'];
$html2pdf->writeHTML($content);
$html2pdf->output($filename.'.pdf','D');
?>