<?php
 date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
?>
<!--date picker
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css" />
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
-->
<!-- Add New -->
<div class="modal fade" id="add-exam-subject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New Exam Subject</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" enctype="multipart/form-data">	 
                     <!-- Date and time -->             
                   <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Date and Time</label>
						</div>
                        <div class="col-lg-8">
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" name="examdatetime" class="form-control datetimepicker-input" data-target="#reservationdatetime" required/>
                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div> 
                    </div>                
             
				    <div style="height:10px;"></div>
                    <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Subject</label>
						</div>
						<div class="col-lg-8">
                            <select name="subjectnameid" class="form-control custom-select" required>
                            <option selected value="" disabled>Select Subject</option>
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
							<label class="control-label" style="position:relative; top:7px;">Total Question</label>
						</div>
						<div class="col-lg-8">
							<input type="number" class="form-control" name="totalquestion"  onkeypress='validate(event)'  required>
                           
						</div>
					</div>

                    <div style="height:10px;"></div>

                    <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Time Limit(Minutes)</label>
						</div>
						<div class="col-lg-8">
							<input type="number" class="form-control" name="timelimit"  onkeypress='validate(event)'  required>
                           
						</div>
					</div>

                    <!--
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Time Limit</label>
                </div>
                <div class="col-lg-8">
                <select name="timelimit" id="" class="form-control custom-select" required>
                <option selected value="" disabled>Select</option> 
                <option value="1">1hr</option>"     
                <option value="2">2hrs</option>"     
                <option value="3">3hrs</option>"                   
                </select>
                </div>
                </div>
                        -->
								
									
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

/**$('#datequiz2').datepicker();
 $('.datepicker').datepicker({
   weekStart:1,
   color: 'red'
 });
*/
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
</script>
	<?php 
  if (isset($_POST['save'])) {
 
    include 'dbconnect.php';

 
  	// Get image name
      $examdatetime= mysqli_real_escape_string($conn, $_POST['examdatetime']);
		$subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectnameid']);
        $totalquestion = mysqli_real_escape_string($conn, $_POST['totalquestion']);
        $timelimit = mysqli_real_escape_string($conn, $_POST['timelimit']);
        $eid = $_GET['id'];
        $classnameid = $_GET['classnameid'];
        $sy = $_GET['sy'];
        $examcategoryid = $_GET['examcategoryid'];

		$date = date('Y-m-d H:i:s');

        if(!empty($_POST["examdatetime"])) {
            $check=mysqli_query($conn,"select * from examsubject where examid='" .$eid. "' AND  subjectid='" .$subjectnameid. "' AND  examdatetime='" .$examdatetime. "'");        
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
              $_SESSION["error_remarks"]="Cannot be saved, found exam subject info duplication";
                 
                    $_SESSION["error"]="error";
                    header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
                
                    exit();
                      }      
            }
           
               $sql= "INSERT INTO examsubject VALUES (DEFAULT,'$eid','$subjectnameid','$examdatetime','$totalquestion','$date','$timelimit')";   
                if (!mysqli_query($conn, $sql)) {
         
            echo("Error description: " . mysqli_error($conn));
                }else{
                  
                    $query=mysqli_query($conn,"SELECT * FROM examsubject ORDER BY id DESC LIMIT 1");
                    while($row=mysqli_fetch_array($query)){
                        $exammasterid= $row['id'];
                    }

                    $sql2 = "INSERT INTO exammaster VALUES ('$exammasterid','$eid','Multiple Choice','$examcategoryid','$subjectnameid','$classnameid','')"; 
                    mysqli_query($conn, $sql2);
                      $_SESSION["added"]="add";
                      header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
                      
                }

  }
 
?>
   

