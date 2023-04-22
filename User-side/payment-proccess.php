<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "devtown";
$conn = new mysqli($servername, 
            $username, $password,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failure: " 
        . $conn->connect_error);
}
if(($_POST['amount']) && ($_POST['user']) && ($_POST['email']) && ($_POST['product_name'])){
    $product_name=$_POST['product_name'];
    $amount=$_POST['amount'];
    $user=$_POST['user'];
    $email=$_POST['email'];
    $payment_status="pending";
    $date=date('Y-m-d h-i-s');

    echo $product_name;
    mysqli_query($conn,"insert into tbl_payment(product_name,user,email,amount,payment_status,date_time) values('$product_name','$user','$email','$amount','$payment_status','$date')");
    $_SESSION['OID']=mysqli_insert_id($conn);
    echo "data-inserted";
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    $date=date('Y-m-d h-i-s');
    $payment_status="complete";
    mysqli_query($conn,"update tbl_payment set payment_status='$payment_status',transaction_id='$payment_id', date_time='$date' where id='".$_SESSION['OID']."' "); 
}
?>