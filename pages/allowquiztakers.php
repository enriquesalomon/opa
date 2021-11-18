<?php
@ob_start();
session_start();
if ( isset( $_SESSION['username'])) {
$username=$_SESSION['username'];

} else {
    header('location: ../index.php');
}
include('dbconnect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Proctored Web App | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
   
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="toastr/css/toastr.min.css">
  <style>
* {
font-size: 13px;
line-height: 1.428;
}
/* style.css */
* {
font-size: 15px;
line-height: 2;
}

.main-sidebar { background-color: rgb(165,42,42) !important }

/**
.main-sidebar { background-color: rgb(67 144 85) !important }
 */
   .nav-header {
    background-color: inherit;
    color: #FFFFFF !important;
    
   }
   
   .d-block{
    background-color: inherit;
    color: #FFFFFF !important;
    
   }
   .nav-item p {
    background-color: inherit;
    color: #FFFFFF !important;
    
   }
   .brand-text{
    background-color: inherit;
    color: #FFFFFF !important;
    
   }


   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    color: #f8f9fa !important;
    background-color: rgb(50 143 232 / 90%) !important;

}

[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
      background-color: #FFCC00 !important;
      color: #fff !important;
}

  </style>
<style>
.datepicker{
z-index:6000 !important;
}
</style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php 
include('../includes/pagetopbar.php');
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="../assets/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ( $_SESSION['nickname']);?></a>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
           
          </li>
         
          
         
          <li class="nav-header">MANAGEMENT</li>         
          <!-- newwww  -->
         
          <li class="nav-item">
            <a href="classes.php" class="nav-link ">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Classes
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user-circle"></i>
              <p>
                Subject
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./subject.php" class="nav-link ">
                <i class="far fas-file nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./assignsubject.php" class="nav-link ">
                <i class="far fas-file nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-user-circle"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./student.php" class="nav-link ">
                <i class="far fas-file nav-icon"></i>
                  <p>Student</p>
                </a>
              </li>
            
             
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-folder-open"></i>
              <p>
              Assessment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./exam.php" class="nav-link ">
                <i class="far fas-file nav-icon"></i>
                  <p>Exam</p>
                </a>
              </li>

              
          <!--  
              
              <li class="nav-item">
                <a href="./quizz.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Quiz</p>
                </a>
              </li>
-->

              <li class="nav-item">
              <a href="./allowexaminees.php?examid=0" class="nav-link ">
                <i class="far fas-file nav-icon"></i>
                  <p>Allow Examinees</p>
                </a>
              </li>

           
              
            
            </ul>
          </li>

         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-folder-open"></i>
              <p>
              Score
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./examscore.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Exam Score</p>
                </a>
              </li>             
              <li class="nav-item">
              <a href="./quizscore.php?examid=0" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Quiz Score</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-header">Exit</li>
          <li class="nav-item">
          <a href="#" class="nav-link "data-toggle="modal" data-target="#logoutModal">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
         
        
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>List of Quiz Takers </h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Examinees </li>
                  </ol>
                </div>
            
            </div>

       
      </div><!-- /.container-fluid -->
     
    </section>
    <?php
if ( isset( $_SESSION['examadded']) ) {
include('toast-add.php');
}
if ( isset( $_SESSION['examedited']) ) {
  include('toast-edited.php');
  }
if ( isset( $_SESSION['delete']) ) {
include('toast-deleted.php');
}


if ( isset( $_SESSION['error']) ) {
  include('toast-error.php');
  }

unset($_SESSION['examadded']);
unset($_SESSION['examedited']);
unset($_SESSION['delete']);
unset($_SESSION['error']);
unset($_SESSION['error_remarks']);


?> 
 <!-- Main content -->
    
 <?php include 'modal-add-assignquiztakers.php'?>

<section class="content">
<div class="container-fluid">
<div class="row mb-4">
<div class="col-sm-12">
<h3>
      <?php 
      if (isset( $_GET['examid'])){
      $getexamid=$_GET['examid'];
      if($getexamid==""){ $getexamid=0;}

      include('dbconnect.php'); 
      $query = mysqli_query($conn,"SELECT e.id as eid,e.quiztype as quiztype,c.classname as cclassname,e.sy as sy,e.gradingperiod as gradingperiod FROM quiz e INNER JOIN class c ON e.classnameid=c.id  WHERE e.id=$getexamid");

      while ($result = mysqli_fetch_array($query)) {

      echo $result['gradingperiod']. ' '.$result['quiztype']. ' '.$result['sy']. ' '.$result['cclassname'] ;


      }
    }
      ?>

  </h3>
  </div>
  </div>
</div>
</section>

 <section class="content">
       <div class="container-fluid">
       
       <div class="row">
						<div class="col-lg-4">

            <?php
            if (isset( $_GET['examid'])){
              if ($_GET['examid']!=0){
                echo "	<button class='btn btn-success'style='margin-bottom: 15px;'data-toggle='modal' data-target='#add-exam'><i class='fa fa-plus' aria-hidden='true'></i></button>";
     
              }
              }
            ?>
						</div>
						<div class="col-lg-6">
                            <select name="classnameid" id="examid" class="form-control custom-select" required>
                            <option selected value="" disabled>Select Quiz</option>
                          <?php
                                  include('dbconnect.php'); 
                         // $query = mysqli_query($conn,"SELECT e.id as eid,e.examtype as examtype,c.classname as cclassname,e.sy as sy,ex.examcategoryname as examcategoryname FROM exam e INNER JOIN class c ON e.classnameid=c.id INNER JOIN examcategory ex ON ex.id=e.examcategoryid WHERE e.status='OPEN'");
                          $query = mysqli_query($conn,"SELECT e.id as id,e.quiztype as quiztype,c.classname as cclassname,e.sy as sy,e.gradingperiod as gradingperiod FROM quiz e INNER JOIN class c ON e.classnameid=c.id  WHERE e.status='OPEN'");
                          //$query = mysqli_query($conn,"SELECT e.id as eid,e.quiztype as quiztype,c.classname as cclassname,e.sy as sy,e.gradingperiod as gradingperiod FROM quiz e INNER JOIN class c ON e.classnameid=c.id  WHERE e.id=$getexamid");

                          while ($result = mysqli_fetch_array($query)) {
                          echo "<option value="  .$result['id']. ">" .$result['gradingperiod']. " | ".$result['quiztype']. " | ".$result['sy']. " | ".$result['cclassname']."</option>";
                          }
                          ?>
                          </select>
                          
						</div>
            <div class="col-lg-2">
         <button class="btn btn-success"style="margin-bottom: 15px;" onclick="btnFilter();">Filter Data</button>
      
            
            </div> 
				</div>
       <div class="row">
          <div class="col-12">
            
           

            <div class="card">
              <!-- /.card-header -->
              <div class="col-12 table-responsive">
                  <table class="table table-striped">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Student No.</th>
                  <th>Student Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
               
               

                include('dbconnect.php');    
                
                if (isset($_GET["examid"])){
                  $getexamid = $_GET['examid'];

                if(!empty($_GET["examid"])) {
                $check=mysqli_query($conn,"select * from quiz where id='" .$getexamid . "'");
                $erow=mysqli_fetch_array($check);
                if($erow>0) {              
                }else{
                header('location:allowquiztakers.php?examid=0');
                }               
                }


              }else{
                header('location:allowquiztakers.php?examid=0');
              }
              $num=0;
                $query=mysqli_query($conn," select *  from quiztaker WHERE  quizid='$getexamid'  ORDER BY studentname ASC");                                            
                while($getrow=mysqli_fetch_array($query)){
                ?>
                <?php 
                $id=$getrow['id'];   
                $studentid=$getrow['studentid'];               
                 
                $getrow1=mysqli_query($conn,"SELECT * FROM student where id='$studentid'");
                $getrow1=mysqli_fetch_array($getrow1);
                 $studentno=$getrow1['studentno'];           
                $studentname=$getrow1['firstname']." ".$getrow1['middlename']." ".$getrow1['lastname'];    
                $examid=$getrow['quizid'];         
                $status=$getrow['status'];  
                $num+=1;
                ?>             
                <tr>
                <td><?php echo $num; ?></td>
                <td><?php echo $studentno; ?></td>
                <td><?php echo $studentname; ?></td>
               
                <td >                  
                  <?php                  
                    echo '<a class="btn btn-danger btn-sm deletebtn" href="#"><i class="fas fa-trash"></i></a>&nbsp';
                  ?>
               </td>   
               
               <td hidden><?php  echo $getexamid; ?></td>    
               <td hidden><?php  echo $id; ?></td>       
                </tr> 
<?php
}                      
?>                                            
                    </tbody>                     
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row a-->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; Online Proctored Exam</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- Page specific script -->

<script src="	https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>




<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>


$(document).ready(function(){
  $('.editbtn').on('click', function(){

      $('#editmodal').modal('show');

        $tr =$(this).closest('tr');

        var data=$tr.children("td").map(function(){
          return $(this).text();
        }).get();

        $('#id').val(data[0]);    
        $('#examtypeid').val(data[2]);   
        $('#examnameid').val(data[9]);    
        $('#classnameid').val(data[8]);   
        $('#schoolyearid').val(data[4]);       
       
   

  });
});

$(document).ready(function(){
  $('.deletebtn').on('click', function(){

      $('#deletemodal').modal('show');

        $tr =$(this).closest('tr');

        var data=$tr.children("td").map(function(){
          return $(this).text();
        }).get();

        $('#iddelete').val(data[5]);  
        $('#studentnodelete').val(data[1]);  
        
        $('#examnamedelete').val(data[2]); 
        $('#examiddelete').val(data[4]); 
              
       
  });
});


</script>



</body>
</html>

<!--modal delete  -->
<div id="deletemodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="query-delete.php" method="POST">
<div class="modal-body">
 <center><h6>Are you sure you want to remove this Examinee in the List ?</h6> </center>

					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Student No.:</label>
						</div>
						<div class="col-lg-8">
            <input type="hidden" name="iddelete" id="iddelete">
            <input type="hidden" id="examiddelete" class="form-control" name="examid" required>
							<input type="text" id="studentnodelete" class="form-control" name="" required readonly>
						</div>
					</div>
					<div style="height:10px;"></div>
          
          <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Student Name</label>
						</div>
						<div class="col-lg-8">
							<input type="text" id="examnamedelete" class="form-control" name="" required readonly>
						</div>
					</div>
                    
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="submit" name="deleteexaminee" class="btn btn-primary">Yes</button>
</div>       
</form>


</div>
</div>
</div>
<?php 
include 'modal-logout.php';
?>

<script>
function btnFilter(){
  var examid=document.getElementById("examid").value;  
  location.href = './allowquiztakers.php?examid='+examid;
};   
</script>




 
    