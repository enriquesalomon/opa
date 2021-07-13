<!-- Add New -->
<div class="modal fade" id="add-gradelevel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                <h4 class="modal-title" id="myModalLabel">Add New Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST"  enctype="multipart/form-data">			
					
				
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Class Name</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="classname"required>
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
  // If upload button is clicked ...
  if (isset($_POST['save'])) {
 
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d H:i:s');
    include 'dbconnect.php';

 
  	// Get image name

        $classname = mysqli_real_escape_string($conn, $_POST['classname']);

        if(!empty($_POST["classname"])) {
            $check=mysqli_query($conn,"select * from class where classname='" . $_POST["classname"] . "'");
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
                $_SESSION["error_remarks"]="Record duplication found!. Cannot be saved.";
                    //  
                    $_SESSION["error"]="error";
                    header('location:classes.php');
                    exit();
                      }      
            }

        $sql = "INSERT INTO class VALUES (DEFAULT,'$classname','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["added"]="add";
                      header('location:classes.php');
                      
                }

  }
 
?>
   
