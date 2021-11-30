<?php
$conn = mysqli_connect('localhost', 'root', '','ope') or die("Error " . mysqli_error($conn));
mysqli_connect('localhost', 'root', '') or die(mysqli_error());
mysqli_select_db($conn,"ope") or die(mysqli_error());
?>

<?php
//$conn = mysqli_connect('sql106.epizy.com', 'epiz_30454422', 'RP6lCfpZcn','epiz_30454422_ope') or die("Error " . mysqli_error($conn));
//mysqli_connect('sql106.epizy.com', 'epiz_30454422', 'RP6lCfpZcn') or die(mysqli_error());
//mysqli_select_db($conn,"ope") or die(mysqli_error());
?>