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
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New Exam Subject Data</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" enctype="multipart/form-data">	
			
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Exam Name:</label>
                </div>
                <div class="col-lg-8">
                <select name="examname" id="" class="form-control custom-select" required>
                <option selected value="" disabled>Select</option>
                <?php
                  include('dbconnect.php'); 
                $query = mysqli_query($conn,"SELECT * FROM exam");

                while ($result = mysqli_fetch_array($query)) {
                echo "<option value="  .$result['id']. ">" .$result['examname']."</option>";
                }
                ?>
                </select>
                </div>
                </div>

                <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Subject Name:</label>
                </div>
                <div class="col-lg-8">
                <select name="subjectname" id="" class="form-control custom-select" required>
                <option selected value="" disabled>Select</option>
                <?php
                  include('dbconnect.php'); 
                $query = mysqli_query($conn,"SELECT * FROM subjects");

                while ($result = mysqli_fetch_array($query)) {
                echo "<option value="  .$result['id']. ">" .$result['subjectname']."</option>";
                }
                ?>
                </select>
                </div>
                </div>

                <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Exam DateTime:</label>
                </div>
                <div class="col-lg-8">
                <input type="text" class="form-control" name="examdatetime"required>

                </div>
                </div>
                          <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Total Question:</label>
                </div>
                <div class="col-lg-8">
                <input type="text" class="form-control" name="totalquestion"required>

                </div>
                </div>
                      <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Right Ans(Mark +):</label>
                </div>
                <div class="col-lg-8">
                <select name="rightmark" id="" class="form-control custom-select" required>
                <option selected value="" disabled>Select points</option> 
                <option value="1">1</option>"     
                <option value="2">2</option>"     
                <option value="3">3</option>" 
                <option value="4">4</option>"
                <option value="5">5</option>"          
                </select>
                </div>
                </div>
                         <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Wrong Ans(Mark -):</label>
                </div>
                <div class="col-lg-8">
                <select name="wrongmark" id="" class="form-control custom-select" required>
                <option selected value="" disabled>Select points</option> 
                 <option value="1">1</option>"     
                 <option value="2">2</option>"     
                 <option value="3">3</option>" 
                 <option value="4">4</option>"
                 <option value="5">5</option>"   
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
	  $examnameid= mysqli_real_escape_string($conn, $_POST['examname']);
		$subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectname']);    
    $examdatetime= mysqli_real_escape_string($conn, $_POST['examdatetime']);
		$totalquestion= mysqli_real_escape_string($conn, $_POST['totalquestion']); 
    $rightmark= mysqli_real_escape_string($conn, $_POST['rightmark']);
		$wrongmark= mysqli_real_escape_string($conn, $_POST['wrongmark']);    
		$date = date('Y-m-d H:i:s');

    $getrow1=mysqli_query($conn,"SELECT * FROM exam where id='$examnameid'");
    $getrow1=mysqli_fetch_array($getrow1);
     $examname=$getrow1['examname'];

     $getrow2=mysqli_query($conn,"SELECT * FROM subjects where id='$subjectnameid'");
     $getrow2=mysqli_fetch_array($getrow2);
      $subjectname=$getrow2['subjectname'];

    if(!empty($_POST["examname"])) {
      $check=mysqli_query($conn,"select * from examsubject where examname='".$examname."' AND  subjectname='".$subjectname."'  AND  examdatetime='".$examdatetime."'");
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found exam info duplication";
           
              $_SESSION["error"]="error";
              header('location:examsubject.php');
              exit();
                }      
      }
     
        $sql = "INSERT INTO examsubject VALUES (DEFAULT,'$examnameid','$subjectnameid','$examname','$subjectname','$examdatetime','$totalquestion','$rightmark','$wrongmark','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["added"]="add";
                      header('location:examsubject.php');
                      
                }

  }
 
?>
   

