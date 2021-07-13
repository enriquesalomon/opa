<!-- Add New -->
<div class="modal fade" id="add-subject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                <h4 class="modal-title" id="myModalLabel">Add Subject</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST"  enctype="multipart/form-data">				

					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Subject Name</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="subject" required>
						</div>
					</div>				
					
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
   
                </div>
                </form>
				
            </div>
        </div>
    </div>
    <?php
    
 date_default_timezone_set('Asia/Manila');
 $date = date('Y-m-d H:i:s');
  // If upload button is clicked ...
  if (isset($_POST['save'])) {
 
    include 'dbconnect.php';

 
  	// Get image name

        $subject = mysqli_real_escape_string($conn, $_POST['subject']);

        if(!empty($_POST["section"])) {
            $check=mysqli_query($conn,"select * from subjects where subjectname='" . $_POST["subject"] . "' ");
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
                $_SESSION["error_remarks"]="Record duplication found!. Cannot be saved.";
                    //  
                    $_SESSION["error"]="error";
                    header('location:subject.php');
                    exit();
                      }      
            }

        $sql = "INSERT INTO subjects VALUES (DEFAULT,'$subject','$date','active')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["subjectadded"]="add";
                      header('location:subject.php');
                      
                }

  }
 
?>
   
