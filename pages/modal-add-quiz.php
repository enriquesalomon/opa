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
<div class="modal fade" id="add-quiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                      <label class="control-label" style="position:relative; top:7px;">Date of Exam</label>
                                    </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                              
                  
                                <input id="datequiz2" class="form-control"  name="datequiz" placeholder="mm/dd/yyyy" type="calendar" readonly />
                                </div>
                               </div>
                      </div>			
					  <div style="height:10px;"></div>
				<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Grade & Section:</label>
						</div>
						<div class="col-lg-8">
                            <select name="grade" id="grade" class="form-control custom-select" required>
                            <option selected value="" disabled>Select Grade & Section</option>
                          <?php
                                  include('dbconnect.php'); 
                          $query = mysqli_query($conn,"SELECT * FROM gradelevel");

                          while ($result = mysqli_fetch_array($query)) {
                          echo "<option value=" .$result['id']. ">" .$result['gradelevel'].' '.$result['section']."</option>";
                          }
                          ?>
                          </select>
						</div>
					</div>
					
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Quiz Time Limit:</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="examtimelimit"required>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Question Limit to display:</label>
						</div>
							<div style="height:10px;"></div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="questiontimelimit"required>
						</div>
					</div>
						<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Quiz Title:</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="examtitle"required>
                           
						</div>
					</div>
								<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Quiz Description:</label>
						</div>
						<div class="col-lg-8">
                        <textarea id="inputDescription" class="form-control" rows="4" name="examdescription"></textarea>
         
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
$('#datequiz2').datepicker();
 $('.datepicker').datepicker({
   weekStart:1,
   color: 'red'
 });
</script>
	<?php 
  if (isset($_POST['save'])) {
 
    include 'dbconnect.php';

 
  	// Get image name
      $datequiz= mysqli_real_escape_string($conn, $_POST['datequiz']);
		$grade= mysqli_real_escape_string($conn, $_POST['grade']);
        $examtimelimit = mysqli_real_escape_string($conn, $_POST['examtimelimit']);
        $questiontimelimit = mysqli_real_escape_string($conn, $_POST['questiontimelimit']);		
        $examtitle = mysqli_real_escape_string($conn, $_POST['examtitle']);
        $examdescription = mysqli_real_escape_string($conn, $_POST['examdescription']);	
		$date = date('Y-m-d H:i:s');
     
        $sql = "INSERT INTO quiz VALUES (DEFAULT,'$datequiz','$grade','$examtimelimit','$questiontimelimit','$examtitle','$examdescription','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["quizadded"]="add";
                      header('location:quiz.php');
                      
                }

  }
 
?>
   

