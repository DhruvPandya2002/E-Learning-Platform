<?php
// Set the path to the Java JDK bin directory
putenv("PATH=C:\Program Files\Java\jdk-19\bin");

// Define variables for the commands and files
$compiler = "javac";
$program = "Main";
$input_file = "input.txt";
$output_file = "output.txt";
$error_file = "error.txt";
$class_files = "*.class";
$code = $_POST["code"];
$input = $_POST["input"];

// Validate user input and escape special characters
if (empty(trim($code))) {
    die("The code area is empty");
}
$code = escapeshellcmd($code);
$input = escapeshellcmd($input);

// Write the Java code and input to files
file_put_contents("Main.java", $code);
file_put_contents($input_file, $input);

// Compile the Java code
$compile_command = "$compiler Main.java 2> $error_file";
exec($compile_command, $output, $status);

if ($status !== 0) {
    // There was an error during compilation
    $error = file_get_contents($error_file);
    echo "$error";
} else {
    // Compilation was successful, so run the program with the input
    $run_command = "java $program < $input_file > $output_file 2>$error_file";
    exec($run_command, $output, $status);
    if ($status !== 0) {
        // There was an error during execution
        $error = file_get_contents($error_file);
        echo "$error";
    } else {
        // Execution was successful, so display the output
        $output = file_get_contents($output_file);
        echo "$output";
    }
}

// Clean up the temporary files
unlink("Main.java");
unlink($input_file);
unlink($output_file);
unlink($error_file);
exec("rm $class_files");
?>
