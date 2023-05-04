<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'devtown');
if (!$conn) {
    die(mysqli_error($conn));
}

// Set the username and course name
$username = 'rahul singh';
$course_name = 'Web Development';

// Query to fetch total and watched videos for the user and course
$query = "SELECT * FROM `user_watched` WHERE `course_name` = '$course_name' AND `user_name` = '$username'";
$result = mysqli_query($conn, $query);

// Check if the user has watched all the videos
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        $total_videos = $row['total_videos'];
        $watched_videos = $row['watched_videos'];

        // Check if the user has watched all the videos
        if ($total_videos == $watched_videos) {

            // Generate the certificate file name
            $certificate_file = $username . '_' . date('Y-m-d') . '.pdf';

            // Create the certificate
            $certificate = <<<EOD
            <html>
                <head>
                    <title>Certificate of Completion</title>
                </head>
                <body>
                    <h1>Certificate of Completion</h1>
                    <p>This certificate is presented to $username for successfully completing the $course_name course.</p>
                    <p>Date: $date</p>
                </body>
            </html>
            EOD;

            // Save the certificate as a PDF file
            $pdf = new TCPDF();
            $pdf->AddPage();
            $pdf->SetFont('helvetica', 'B', 20);
            $pdf->WriteHTML($certificate);
            $pdf->Output($certificate_file, 'F');

            // Insert the certification data into the `certification` table
            $query = "INSERT INTO `certification` (`user_name`, `course_name`, `certificate_file`, `date`) VALUES ('$username', '$course_name', '$certificate_file', CURDATE())";
            mysqli_query($conn, $query);
        }
    }
} else {
    echo "No data found.";
}
