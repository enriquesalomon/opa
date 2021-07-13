<?php
$conn = mysqli_connect('localhost', 'root', '123456','ope') or die("Error " . mysqli_error($conn));
mysqli_connect('localhost', 'root', '123456') or die(mysqli_error());
mysqli_select_db($conn,"ope") or die(mysqli_error());
?>