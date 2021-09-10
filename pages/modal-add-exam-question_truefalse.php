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
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New Subject Question</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" enctype="multipart/form-data">	 
                     <!-- Date and time -->             
                     <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Question Title</label>
						</div>
						<div class="col-lg-8">
                            <textarea id="address" class="form-control" rows="2" name="titlequestion"required></textarea>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice A</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="option1" value='TRUE' readonly required>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice B</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="option2" value='FALSE' readonly required>
                           
						</div>
					</div>
                  	
                    
                <div style="height:10px;"></div>
                <div class="row">
                <div class="col-lg-4">
                <label class="control-label" style="position:relative; top:7px;">Answer</label>
                </div>
                <div class="col-lg-8">
                <select name="answer" id="" class="form-control custom-select" required>
                <option selected value="" disabled>Select</option> 
                <option value="TRUE">Choice A</option>"     
                <option value="FALSE">Choice B</option>"             
                </select>
                </div>
                </div>
             

                <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Right Ans(Mark +):</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="rightmark"  onkeypress='validate(event)'  required>
                           
						</div>
					</div>		
					
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Wrong Ans(Mark -):</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="wrongmark"  onkeypress='validate(event)'  required>
                           
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

 
$titlequestion= mysqli_real_escape_string($conn, $_POST['titlequestion']);
$option1= mysqli_real_escape_string($conn, $_POST['option1']);
$option2 = mysqli_real_escape_string($conn, $_POST['option2']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);
$rightmark = mysqli_real_escape_string($conn, $_POST['rightmark']);
$wrongmark = mysqli_real_escape_string($conn, $_POST['wrongmark']);


$examsubjectid = $_GET['examsubjectid'];
$examcategoryid = $_GET['examcategoryid'];
$classnameid = $_GET['classnameid'];
$examid = $_GET['eid'];
$sy = $_GET['sy'];
$date = date('Y-m-d H:i:s');



        if(!empty($_POST["titlequestion"])) {
            $check=mysqli_query($conn,"select * from examquestion_truefalse where examsubjectid='".$examsubjectid."' AND  questiontitle='".$titlequestion."'");        
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
              $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
                 
                    $_SESSION["error"]="error";
                    header('location:examsubjquestion_truefalse.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

                    exit();
                      }      
            }
           
     
        $sql = "INSERT INTO examquestion_truefalse VALUES (DEFAULT,'$examsubjectid','$examid','$titlequestion','$option1','$option2','$answer','$rightmark','$wrongmark','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["added"]="add";
                       header('location:examsubjquestion_truefalse.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');
                 
                }

  }
 
?>
   

