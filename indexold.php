<?php
@ob_start();
session_start();
if ( isset( $_SESSION['username']) ) {
$username=$_SESSION['username'];
$nickname=$_SESSION['nickname'];
    if ( isset( $_SESSION['success']) ) {
    $successmsg=$_SESSION['success'];
    include 'includes/header.php';
    include 'includes/topbar.php';
    include 'includes/navbar.php';
    include 'pages/dashboard.php';
    include 'includes/footer.php';
    include 'toast-welcome.php';
    
    }
unset($_SESSION['success']);
} else {
    header('location: index.php');
}
include('dbconnect.php');

?>

