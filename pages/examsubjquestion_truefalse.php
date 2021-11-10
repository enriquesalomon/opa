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
  <link rel="stylesheet" href="../toastr/css/toastr.min.css">
  <!----->



  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
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
          <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
              <li class="nav-item">
                <a href="./assignstudent.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Assign Student</p>
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
                <a href="./exam.php" class="nav-link active">
                <i class="far fas-file nav-icon"></i>
                  <p>Exam</p>
                </a>
              </li>
             <!-- <li class="nav-item">
                <a href="./examsubject.php" class="nav-link">
                <i class="far fas-file nav-icon"></i>
                  <p>Exam Subject</p>
                </a>
              </li> -->
           
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
            <h1>Exam Subject Question Management</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">True or False</li>
              <li class="breadcrumb-item active">Question</li>
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


?> 
<?php include 'modal-add-exam-question_truefalse.php'?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">  
          <?php     
                 $examsubjectid = $_GET['examsubjectid'];      
                $examcatid = $_GET['examcategoryid'];
                $classnameid = $_GET['classnameid'];
                $eid = $_GET['eid'];
                $sy = $_GET['sy'];

                include('dbconnect.php');                         

                if(!empty($_GET["examsubjectid"]) && !empty($_GET["examcategoryid"]) && !empty($_GET["classnameid"]) && !empty($_GET["eid"]) && !empty($_GET["sy"]) ){

                  $check=mysqli_query($conn,"select * from examsubject_truefalse where id='" .$examsubjectid . "'");
                  $erow=mysqli_fetch_array($check);
                  if($erow>0) {              
                  }else{
                    header("location:examdetailsTF.php?examcategoryid=".$examcatid."&classnameid=".$classnameid."&id=".$eid."&sy=".$sy."");
                  exit();
                  }   
                  $check=mysqli_query($conn,"select * from exam where sy='" .$sy . "'");
                  $erow=mysqli_fetch_array($check);
                  if($erow>0) {              
                  }else{
                    header("location:examdetailsTF.php?examcategoryid=".$examcatid."&classnameid=".$classnameid."&id=".$eid."&sy=".$sy."");
              
                  exit();
                  }   
                  $check=mysqli_query($conn,"select * from class where id='" .$classnameid . "'");
                  $erow=mysqli_fetch_array($check);
                  if($erow>0) {              
                  }else{
                    header("location:examdetailsTF.php?examcategoryid=".$examcatid."&classnameid=".$classnameid."&id=".$eid."&sy=".$sy."");
              
                  exit();
                  }   
                  $check=mysqli_query($conn,"select * from examcategory where id='" .$examcatid . "'");
                  $erow=mysqli_fetch_array($check);
                  if($erow>0) {              
                  }else{
                    header("location:examdetailsTF.php?examcategoryid=".$examcatid."&classnameid=".$classnameid."&id=".$eid."&sy=".$sy."");
              
                  exit();
                  }   

                }else{
                  header("location:examdetailsTF.php?examcategoryid=".$examcatid."&classnameid=".$classnameid."&id=".$eid."&sy=".$sy."");
    
                }




                $getrow1=mysqli_query($conn,"SELECT * FROM examcategory where id='$examcatid'");
                $getrow1=mysqli_fetch_array($getrow1);
                 $examcat=$getrow1['examcategoryname'];

                 $getrow1=mysqli_query($conn,"SELECT * FROM class where id='$classnameid'");
                 $getrow1=mysqli_fetch_array($getrow1);
                  $classname=$getrow1['classname'];


                  $getrow1=mysqli_query($conn,"SELECT * FROM examsubject where id='$examsubjectid'");
                  $getrow1=mysqli_fetch_array($getrow1);
                   $subjectid=$getrow1['subjectid'];
                   $getrow1=mysqli_query($conn,"SELECT * FROM subjects where id='$subjectid'");
                   $getrow1=mysqli_fetch_array($getrow1);
                    $subjectname=$getrow1['subjectname'];


               
            ?>
               

        <!--  examsubjectid=40&examcategoryid=1&classnameid=7&eid=21&sy=2020-2021 -->

           <div class="callout callout-info">
              <h5><i class="far fa-file-alt"></i> Examination Details:</h5> 
              <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Periodical Exam: '. $examcat; ?></br>
              <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Class: '. $classname; ?></br>
              <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SY: '. $sy; ?></br> </br> 
              <h5><i class="far fa-file-alt"></i> Subject: <?php echo ''. $subjectname; ?></h5> 
            </div>
           
         
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">            
              <div class="col-12">
              <?php   echo "<a href='./examdetailsTF.php?examcategoryid=".$examcatid."&classnameid=".$classnameid."&id=".$eid."&sy=".$sy."'><button class='btn btn-info' style='margin-bottom: 15px;'data-toggle='modal' ><i class='fas fa-angle-double-left'></i> Back </button></a>";
            ?>
              <button class="btn btn-success"style="margin-bottom: 15px;"data-toggle="modal" data-target="#add-exam-subject"><i class="fa fa-plus" aria-hidden="true"></i> New Question</button>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
            
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th hidden>ID</th>
                      <th>Question</th>
                      <th>Choice A</th>
                      <th>Choice B</th>
                      <th>Answer</th>
                      <th>Right Mark</th>
                      <th>WrongMark</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                include('dbconnect.php');                           
                $query=mysqli_query($conn," select *  from examquestion_truefalse where examsubjectid='".$examsubjectid."'");                                            
                while($getrow=mysqli_fetch_array($query)){
                ?>
                <?php 
                $id=$getrow['id'];   
                $examsubjectid=$getrow['examsubjectid'];             
                $questiontitle=$getrow['questiontitle'];    
                $option1=$getrow['option1'];      
                $option2=$getrow['option2'];   
                $answer=$getrow['answer'];   
                $rightmark=$getrow['rightmark'];   
                $wrongmark=$getrow['wrongmark'];   
                $createdon=$getrow['createdon'];                    
           
                ?>  
                    <tr>
                      <td hidden><?php echo $id; ?></td>
                      <td><?php echo $questiontitle; ?></td>
                      <td><?php echo $option1; ?></td>
                      <td><?php echo $option2; ?></td>
                      <td><?php echo $answer; ?></td>
                      <td><?php echo $rightmark; ?></td>
                      <td><?php echo $wrongmark; ?></td>                     
                      <td ><?php                  
                        echo ' <a class="btn btn-info btn-sm editbtn" href="#"><i class="fas fa-pencil-alt"></i></a>&nbsp';
                        echo '<a class="btn btn-danger btn-sm deletebtn" href="#"><i class="fas fa-trash"></i></a>&nbsp';
                      //  echo "<a href='examsubjquestion.php?examsubjectid=".$id."&examcategoryid=".$examcatid."&classnameid=".$classnameid."&eid=".$eid."&sy=".$sy."' class='btn btn-sm btn-success'> <i class='fas fa-folder'></i>Manage Questions</a>";
                    
                   ?>
                     </td>                              

                    </tr>
                    <?php
}                      
?>       
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

         
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      
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
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- date-range-picker -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker for modal add
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    //Date and time picker for modal edit
    $('#reservationdatetimes').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })


  })
</script>

<script>
  
 function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

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

      
      $('#idedit').val(data[0]);       
      $('#questiontitleedit').val(data[1]);   
      $('#option1edit').val(data[2]); 
      $('#option2edit').val(data[3]);   
      $('#answeredit').val(data[4]);      
      $('#rightmarkedit').val(data[5]);      
      $('#wrongmarkedit').val(data[6]);      
       
   

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
        $('#questiontitledelete').val(data[1]);   
              
       
  });
});




</script>

   

  
<!-- Edit -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <center><h4 class="modal-title" id="myModalLabel">Edit Question</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">  
				<div class="container-fluid">
				<form method="POST" action="query-edit.php" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="id" name="idedit" required >


     <input type="hidden" class="form-control" id="examsubjectidedit" name="examsubjectid" value="<?php echo$_GET['examsubjectid']; ?>" required >
     <input type="hidden" class="form-control" id="examcategoryidedit" name="examcategoryid" value="<?php echo $_GET['examcategoryid']; ?>" required >
     <input type="hidden" class="form-control" id="classnameidedit" name="classnameid" value="<?php echo $_GET['classnameid']; ?>" required >
     <input type="hidden" class="form-control" id="examidedit" name="examid" value="<?php echo $_GET['eid']; ?>" required >
     <input type="hidden" class="form-control" id="syedit" name="sy" value="<?php echo $_GET['sy']; ?>" required >

     <input type="hidden" class="form-control" id="idedit" name="id" required >  

     <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Question Title</label>
						</div>
						<div class="col-lg-8">
                            <textarea id="questiontitleedit" class="form-control" rows="2" name="titlequestion"required></textarea>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice A</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="option1edit" name="option1" required>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice B</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control"  id="option2edit"  name="option2" required>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Answer</label>
                </div>
                <div class="col-lg-8">
                <select name="answer" id="answeredit" class="form-control custom-select" required>
                <option selected value="" disabled>Select</option> 
                <option value="TRUE">TRUE</option>"     
                <option value="FALSE">FALSE</option>"            
                </select>
                </div>
                </div>
             

                <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Right Ans(Mark +):</label>
						</div>
						<div class="col-lg-8">
							<input type="number" class="form-control" id="rightmarkedit"  name="rightmark"  onkeypress='validate(event)'  required>
                           
						</div>
					</div>		
					
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Wrong Ans(Mark -):</label>
						</div>
						<div class="col-lg-8">
							<input type="number" class="form-control" id="wrongmarkedit" name="wrongmark"  onkeypress='validate(event)'  required>
                           
						</div>
					</div>		
					



									
        
									
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit"name="editexamquestion_truefalse" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    	
				</form>
                </div>
				
            </div>
        </div>
    </div>



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
 <center><h6>Are you sure you want to delete this Question?</h6> </center>

		
<input type="hidden" class="form-control" id="examsubjectiddelete" name="examsubjectid" value="<?php echo$_GET['examsubjectid']; ?>" required >
<input type="hidden" class="form-control" id="examcategoryiddelete" name="examcategoryid" value="<?php echo $_GET['examcategoryid']; ?>" required >
<input type="hidden" class="form-control" id="classnameiddelete" name="classnameid" value="<?php echo $_GET['classnameid']; ?>" required >
<input type="hidden" class="form-control" id="examiddelete" name="examid" value="<?php echo $_GET['eid']; ?>" required >
<input type="hidden" class="form-control" id="sydelete" name="sy" value="<?php echo $_GET['sy']; ?>" required >

<input type="hidden" class="form-control" id="iddelete" name="id" required >  

					<div style="height:10px;"></div>
          <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Question Title</label>
						</div>
						<div class="col-lg-8">
              <textarea id="questiontitledelete" class="form-control" rows="2" name="questiontitle"required readonly></textarea>
                         
            </div>
					</div>             
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="submit" name="deleteexamquestion_truefalse" class="btn btn-primary">Yes</button>
</div>       
</form>


</div>
</div>
</div>

<?php 
include 'modal-logout.php';
?>





 
    