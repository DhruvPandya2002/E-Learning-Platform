<?php
putenv("PATH=C:\Program Files\Java\jdk-19\bin");
if(isset($_POST['code'])) {
    $code = $_POST['code'];
    $input = $_POST['input'];
    $file = "Main.java";
    file_put_contents($file, $code);

    $output = shell_exec("javac $file 2>&1");

    if (!empty($output)) {
        echo "<pre>$output</pre>";
    } else {
        $inputFile = "input.txt";
        file_put_contents($inputFile, $input);
        $output = shell_exec("java Main < $inputFile 2>&1");
        echo "<pre>$output</pre>";
    }
    
}
?>