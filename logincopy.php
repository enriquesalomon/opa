<?php
@ob_start();
session_start();
session_destroy();?>
<?php include('server.php');?>
<?php
//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
//echo $ip_address;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>iPay Payment Center | Your One-Stop Payment Center</title>
  <!-- MDB icon -->
  <link rel="icon" href="landing/images/ipay-favicon" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="landing/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="landing/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="landing/css/style.css">
</head>
<body >
<div style="height: 100vh;background-image:url(landing/images/ipay-center-header-dark.png);background-repeat: no-repeat;
  background-size: cover;">
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark scrolling-navbar intro-fixed-nav">
      <div class="container">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
        <!--<a class="btn btn-danger btn-rounded smooth-scroll" href=""><h4>i.Pay Outlets</h4></a> -->
        
          <!--   <li class="nav-item active">
            <a class="nav-link" href="#">
           <i ></i>Home
              <span class="sr-only">(active link)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Services </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
               <a class="dropdown-item" href="#">Electricity</a>
              <a class="dropdown-item" href="#">Government</a>
              <a class="dropdown-item" href="#">Insurance</a>
              <a class="dropdown-item" href="#">Utilities</a>
              <a class="dropdown-item" href="#">Water</a>
              <a class="dropdown-item" href="#">Others</a>
            </div>
           
          </li> -->
           
     
        </ul>
      </div>
      
      
      </div>
    </nav>
  <div>
  <div class="container"style="height:80px;"></div>
  <div class="container my-auto">
  <div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4 animated bounceInRight">
       <a class="navbar-brand" href="index.php">
        <!--   <img src="landing/images/ipay-logo.png" height="80" alt="ipay center logo"> -->
        <img src="landing/images/ipay-logo.png" height="150" alt="ipay center logo">
      </a>
    <div class="card text-center">
    <div class=" card-header success-color white-text card-header-home">
      LOG IN TO IPAY
    </div>
    <div class="card-body">
<form class="text-center" action="login.php" method="post">
    <?php include('errors.php'); ?>

    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username"name="username">
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password"name="password">

    <button class="btn btn-success btn-block my-4" type="submit"name="franchisee_login">Log in</button>
</form>

    </div>
<!--    <div class="card-footer text-muted success-color white-text">
       <p class="margin-0">Don't have an account yet?
        <a href="">Be a Franchisee!</a>
    </p>
    </div> -->
  </div>
</div>
  </div>
  </div>
  </div>
</div>


  <!-- jQuery -->
  <script type="text/javascript" src="landing/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="landing/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="landing/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="landing/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
