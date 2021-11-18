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

   .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
  background-color: #FFCC00 !important;
  color: #fff !important;
  }

   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    color: #f8f9fa !important;
    background-color: rgb(50 143 232 / 90%) !important;

}


  </style>
  
<style>
.datepicker{
z-index:6000 !important;
}
</style>
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
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
  <link rel="stylesheet" href="../toastr/css/toastr.min.css">
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
         
         
           <li class="nav-item">
            <a href="./classes.php" class="nav-link active">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Classes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user-circle"></i>
              <p>
                Subject
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./subject.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./assignsubject.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-user-circle"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./student.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./assignstudent.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Assign Student</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-folder-open"></i>
              <p>
              Assessment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./exam.php" class="nav-link">
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
              <a href="./allowexaminees.php?examid=0" class="nav-link">
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
            <h1>Classes Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
if ( isset( $_SESSION['added']) ) {
include('toast-add.php');
}
if ( isset( $_SESSION['edited']) ) {
  include('toast-edited.php');
  }
if ( isset( $_SESSION['deleted']) ) {
include('toast-deleted.php');
}

if ( isset( $_SESSION['error']) ) {
  include('toast-error.php');
  }

unset($_SESSION['added']);
unset($_SESSION['edited']);
unset($_SESSION['deleted']);
unset($_SESSION['error']);
unset($_SESSION['error_remarks']);
include 'modal-add-gradelevel.php';
?> 
 
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
       <button class="btn btn-success"style="margin-bottom: 15px;"data-toggle="modal" data-target="#add-gradelevel"><i class="fa fa-plus" aria-hidden="true"></i></button>
   
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th hidden>ID</th>
                    <th>Class Name</th>
                    <th>Created On </th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                include('dbconnect.php');                           
                $query=mysqli_query($conn," select *  from class");                                            
                while($getrow=mysqli_fetch_array($query)){
                ?>
                <?php 
                $id=$getrow['id'];
                $classname=$getrow['classname'];  
                $createdon=$getrow['createdon'];                    
                ?>             
                <tr>
                <td hidden><?php echo $id; ?></td>
                <td><?php echo $classname; ?></td>
                <td><?php echo $createdon; ?></td>       
                <td><?php 
               echo ' <a class="btn btn-info btn-sm editbtn" href="#"><i class="fas fa-pencil-alt"></i></a>&nbsp';
               echo '<a class="btn btn-danger btn-sm deletebtn" href="#"><i class="fas fa-trash"></i></a>&nbsp';

                   ?>
               </td>                  
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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
          $('#classname').val(data[1]);    
   

  });
});

$(document).ready(function(){
  $('.deletebtn').on('click', function(){

      $('#deletemodal').modal('show');

        $tr =$(this).closest('tr');

        var data=$tr.children("td").map(function(){
          return $(this).text();
        }).get();

        $('#iddelete').val(data[0]);  
        $('#classnameid').val(data[1] );       
       
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
 <center><h6>Are you sure you want to delete this record?</h6> </center>
<input type="hidden" name="iddelete" id="iddelete">
<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Class Name</label>
						</div>
						<div class="col-lg-8">
							<input type="text" id="classnameid" class="form-control" name="classname" required readonly>
						</div>
					</div>
					<div style="height:10px;"></div>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="submit" name="deletegradelevel" class="btn btn-primary">Yes</button>
</div>       
</form>


</div>
</div>
</div>

<!-- Add edit -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                <h4 class="modal-title" id="myModalLabel">Edit Class Name</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="query-edit.php" enctype="multipart/form-data">			
				
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Class Name</label>
						</div>
						<div class="col-lg-8">
            <input type="hidden" class="form-control" id="id" name="id" required >
							<input type="text" class="form-control" name="classname" id="classname" required>
						</div>
					</div>				
					
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="editgradevel" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
   
                </div>
                </form>
				
            </div>
        </div>
    </div>
<?php 
include 'modal-logout.php';
?>

