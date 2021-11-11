<?php
 date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
?>
<!--date picker-->
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css" />
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>


<!-- Add New -->
<div class="modal fade" id="add-exam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New Examinee</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" enctype="multipart/form-data">	
			
        <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Student</label>
						</div>
						<div class="col-lg-8">
                            <select name="studentid" id="" class="form-control custom-select" required>
                            <option selected value="" disabled>Select Class</option>
                          <?php
                                  include('dbconnect.php'); 
                          $query = mysqli_query($conn,"SELECT * FROM student");

                          while ($result = mysqli_fetch_array($query)) {
                          echo "<option value=" .$result['id']. ">" .$result['firstname']. " ".$result['middlename']. " ".$result['lastname']."</option>";
                          }
                          ?>
                          </select>
						</div>
					</div>

          
			
         
				
                
									
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit"name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    	
				</form>
                </div>
				
            </div>
        </div>
    </div>

	

<script type="text/javascript">
$('#dateexam2').datepicker();
 $('.datepicker').datepicker({
   weekStart:1,
   color: 'red'
 });
</script>
	<?php 
  if (isset($_POST['save'])) {
 
    include 'dbconnect.php';

 
  	// Get image name
	  $studentid= mysqli_real_escape_string($conn, $_POST['studentid']);
    $date = date('Y-m-d H:i:s');



include('dbconnect.php'); 
$query = mysqli_query($conn,"SELECT * FROM student where id='$studentid'");
while ($result = mysqli_fetch_array($query)) {
$studentname= $result['firstname']. " ".$result['middlename']. " ".$result['lastname'];
}

if (isset( $_GET['examid'])){
$getexamid=$_GET['examid'];
}



    if(!empty($_POST["studentid"])) {


            
     include('dbconnect.php'); 
        $query = mysqli_query($conn,"SELECT * FROM exam where id='$getexamid'");
        while ($result = mysqli_fetch_array($query)) {
        $status= $result['status'];
        }
        if ($status=="CLOSED"){
          $_SESSION["error_remarks"]="EXAM IS ALREADY CLOSED , CANNOT ADD NEW EXAMINEE";
          $_SESSION["error"]="error";
               header('location:allowexaminees.php?examid='.$getexamid.'');
               exit();
        }
 

      $check=mysqli_query($conn,"select * from examinee where studentid='" . $studentid . "' AND  examid='" . $getexamid . "'");
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found exam info duplication";
           
              $_SESSION["error"]="error";
              header('location:allowexaminees.php?examid='.$getexamid.'');
              exit();
                }      
      }
     
        $sql = "INSERT INTO examinee VALUES (DEFAULT,'$studentid','$studentname','$getexamid','','','','','','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["examadded"]="add";
                      header('location:allowexaminees.php?examid='.$getexamid.'');
                      header('location:allowexaminees.php?examid='.$getexamid.'');
                      
                }

  }
 
?>
   

