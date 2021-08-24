
<?php
@ob_start();
session_start();
// LOGIN USER
$username = "";
$errors = array();

//$db = mysqli_connect('localhost', 'root', '123456','ope');
$db = mysqli_connect('localhost', 'root', '','ope');

if (isset($_POST['user_login'])) {

$username = mysqli_real_escape_string($db, $_POST['username']);

$password = mysqli_real_escape_string($db, $_POST['password']);

if (empty($username)) {

array_push($errors, "Username is required.");

}

if (empty($password)) {

array_push($errors, "Password is required.");

}

if (count($errors) == 0) {


$query=mysqli_query($db,"SELECT * FROM user WHERE username='$username' AND password='$password'");
while($row=mysqli_fetch_array($query)){
     $_SESSION['nickname']  =  $row['nickname'];
}
    

$password = $password;
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) == 1) {
    

$_SESSION['username'] = $username;
$_SESSION['success'] = " ".$username."!";
header('location: pages/dashboard.php');




}else {

array_push($errors, "Wrong username/password combination!");

}

}

}
?>