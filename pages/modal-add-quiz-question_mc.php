<?php
 date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
$quizsubjectid = $_GET['quizsubjectid']; 
?>


<!--date picker
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css" />
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
-->
<!-- Add New -->
<div class="modal fade" id="add-quiz-subject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <center><h4 class="modal-title" id="myModalLabel">Add New Question</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" enctype="multipart/form-data">	 
                <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Question #</label>
						</div>
						<div class="col-lg-8">				
                        <?php
                        include('dbconnect.php'); 
                        $query = mysqli_query($conn,"SELECT COUNT(*) as num from quizquestion_mc where quizsubjectid='".$quizsubjectid."'");
                        while ($result = mysqli_fetch_array($query)) {  
                        $questno  =  $result['num'];     
                        $questno+=1;                
                        echo " <input type='text' class='form-control' name='questno' value="  .$questno. "  required readonly>";
                        }
                        ?>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>     
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
							<input type="text" class="form-control" name="option1" required>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice B</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="option2" required>
                           
						</div>
					</div>
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice C</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="option3" required>
                           
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Choice D</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="option4" required>
                           
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
                <option value="1">Choice A</option>"     
                <option value="2">Choice B</option>"     
                <option value="3">Choice C</option>" 
                <option value="4">Choice D</option>"
                <option value="5">None of the above</option>"          
                </select>
                </div>
                </div>
             

                <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Right Ans(Mark +):</label>
						</div>
						<div class="col-lg-8">
							<input type="number" class="form-control" name="rightmark"  onkeypress='validate(event)'  required>
                           
						</div>
					</div>		
					
                    <div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Wrong Ans(Mark -):</label>
						</div>
						<div class="col-lg-8">
							<input type="number" class="form-control" name="wrongmark"  onkeypress='validate(event)'  required>
                           
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
$option3= mysqli_real_escape_string($conn, $_POST['option3']);
$option4 = mysqli_real_escape_string($conn, $_POST['option4']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);
$rightmark = mysqli_real_escape_string($conn, $_POST['rightmark']);
$wrongmark = mysqli_real_escape_string($conn, $_POST['wrongmark']);
$questno = mysqli_real_escape_string($conn, $_POST['questno']);


$quizsubjectid = $_GET['quizsubjectid'];
$examcategoryid = $_GET['gradingperiod'];
$classnameid = $_GET['classnameid'];
$qid = $_GET['qid'];
$sy = $_GET['sy'];
$date = date('Y-m-d H:i:s');



        if(!empty($_POST["titlequestion"])) {
            $check=mysqli_query($conn,"select * from quizquestion_mc where quizsubjectid='".$quizsubjectid."' AND  questiontitle='".$titlequestion."'");        
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
              $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
                 
                    $_SESSION["error"]="error";
                    header('location:quizsubjquestion_mc.php?quizsubjectid='.$quizsubjectid.'&gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&qid='.$qid.'&sy='.$sy.'');
                    exit();
                      }      
            }
           
     
        $sql = "INSERT INTO quizquestion_mc VALUES (DEFAULT,'$quizsubjectid','$questno','$titlequestion','$option1','$option2','$option3','$option4','$answer','$rightmark','$wrongmark','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["added"]="add";
                      header('location:quizsubjquestion_mc.php?quizsubjectid='.$quizsubjectid.'&gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&qid='.$qid.'&sy='.$sy.'');
                
                }

  }
 
?>
   

