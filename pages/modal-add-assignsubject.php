<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    
                <h4 class="modal-title" id="myModalLabel">Assign Subject to Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST"  enctype="multipart/form-data">				
                <div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Class Name:</label>
						</div>
						<div class="col-lg-8">
                            <select name="classnameid" id="classname" class="form-control custom-select" required>
                            <option selected value="" disabled>Select Class</option>
                          <?php
                                  include('dbconnect.php'); 
                          $query = mysqli_query($conn,"SELECT * FROM class");

                          while ($result = mysqli_fetch_array($query)) {
                          echo "<option value="  .$result['id']. ">" .$result['classname']."</option>";
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
                            <select name="subjectnameid" id="subject" class="form-control custom-select" required>
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

        $subjectnameid = mysqli_real_escape_string($conn, $_POST['subjectnameid']);
        $classnameid = mysqli_real_escape_string($conn, $_POST['classnameid']);
        
        $getrow1=mysqli_query($conn,"SELECT * FROM class where id='$classnameid'");
        $getrow1=mysqli_fetch_array($getrow1);
         $classname=$getrow1['classname'];

         $getrow2=mysqli_query($conn,"SELECT * FROM subjects where id='$subjectnameid'");
         $getrow2=mysqli_fetch_array($getrow2);
          $subjectname=$getrow2['subjectname'];

        if(!empty($_POST["classnameid"])) {
            $check=mysqli_query($conn,"select * from subjectclass where classid='".$classnameid."' and subjectid='".$subjectnameid."' ");
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
                $_SESSION["error_remarks"]="Record duplication found!. Cannot be saved.";
                    //  
                    $_SESSION["error"]="error";
                    header('location:assignsubject.php');
                    exit();
                      }      
            }

        $sql = "INSERT INTO subjectclass VALUES (DEFAULT,'$classnameid','$classname','$subjectnameid','$subjectname','$date')";   
        if (!mysqli_query($conn, $sql)) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["added"]="add";
                      header('location:assignsubject.php');
                      
                }

  }
 
?>
   
