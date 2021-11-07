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
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New Quiz</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" enctype="multipart/form-data">	

         
            <div class="row">
            <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Quiz Name:</label>
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="quizname"required>
            </div>
            </div>
            <div style="height:10px;"></div>
        <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Grading Period</label>
						</div>
                        <div class="col-lg-8">
                        <select name="gradingperiod" class="form-control custom-select" required>
                        <option selected value="" disabled>Select</option> 
                        <option value="First Grading">First Grading</option>"     
                        <option value="Second Grading">Second Grading</option>"     
                        <option value="Third Grading">Third Grading</option>"  
                        <option value="Fourth Grading">Fourth Grading</option>"  
                        </select>
                      </div>
					</div>

            
          <div style="height:10px;"></div>
                <div class="row">
                    <div class="col-lg-4">
                      <label class="control-label" style="position:relative; top:7px;">Quiz Type</label>
                      </div>
                      <div class="col-lg-8">
                        <select name="quiztype" class="form-control custom-select" required>
                        <option selected value="" disabled>Select</option> 
                        <option value="Multiple Choice">Multiple Choice</option>"     
                        <option value="Essay">Essay</option>"     
                        <option value="True or False">True or False</option>"  
                        </select>
                      </div>
                  </div>	


								<div style="height:10px;"></div>
				<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Class</label>
						</div>
						<div class="col-lg-8">
                            <select name="classname" id="" class="form-control custom-select" required>
                            <option selected value="" disabled>Select</option>
                          <?php
                                  include('dbconnect.php'); 
                          $query = mysqli_query($conn,"SELECT * FROM class");

                          while ($result = mysqli_fetch_array($query)) {
                          echo "<option value=" .$result['id']. ">" .$result['classname']."</option>";
                          }
                          ?>
                          </select>
						</div>
					</div>

         
					
         
          <div style="height:10px;"></div>
                <div class="row">
                    <div class="col-lg-4">
                      <label class="control-label" style="position:relative; top:7px;">School Year</label>
                      </div>
                      <div class="col-lg-8">
                        <select name="schoolyear" class="form-control custom-select" required>
                        <option selected value="" disabled>Select</option> 
                        <option value="2020-2021">2020-2021</option>"     
                        <option value="2021-2022">2021-2022</option>"     
                        <option value="2022-2023">2022-2023</option>" 
                        <option value="2023-2024">2023-2024</option>"
                        <option value="2024-2025">2024-2025</option>"   
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

 
    $quizname= mysqli_real_escape_string($conn, $_POST['quizname']);
	  $gradingperiod= mysqli_real_escape_string($conn, $_POST['gradingperiod']);
		$classname= mysqli_real_escape_string($conn, $_POST['classname']);    
    $schoolyear= mysqli_real_escape_string($conn, $_POST['schoolyear']); 
    $quiztype= mysqli_real_escape_string($conn, $_POST['quiztype']);      
		$date = date('Y-m-d H:i:s');

    if(!empty($_POST["quizname"])) {
      $check=mysqli_query($conn,"select * from quiz where quizname='" . $_POST["quizname"] . "' AND gradingperiod='" . $_POST["gradingperiod"] . "' AND  classnameid='" . $_POST["classname"] . "' AND quiztype='" . $_POST["quiztype"] . "'");
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found quiz info duplication";
           
              $_SESSION["error"]="error";
              header('location:quizz.php');
              exit();
                }      
      }
     
        $sql = "INSERT INTO quiz VALUES (DEFAULT,'$quizname','$gradingperiod','$classname','$schoolyear','','$date','$quiztype','OPEN')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["added"]="add";
                      header('location:quizz.php');
                      
                }

  }
 
?>
   

