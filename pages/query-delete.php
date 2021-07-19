<?php 
@ob_start();
session_start();
  include 'dbconnect.php'; 
  if (isset($_POST['deletestudent'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['iddelete']);

        if(!empty($_POST["iddelete"])) {           
                if (!mysqli_query($conn, "DELETE from student where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["studentdeleted"]="delete";
                      header('location:student.php');
                      
                }

  }
}

if (isset($_POST['deletegradelevel'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);
  
  $classname= mysqli_real_escape_string($conn, $_POST['classname']);
  

      if(!empty($_POST["iddelete"])) { 
        
          // check if has 1-1 relationship to other table
          $check=mysqli_query($conn,"select * from subjectclass where classname='" . $classname . "'");
          $erow=mysqli_fetch_array($check);
           if($erow>0) {
                    $_SESSION["error_remarks"]="Cannot be deleted, found existing record to Subject Class";
                   //  
                   $_SESSION["error"]="error";
                   header('location:classes.php');
                   exit();
                     }      
           

              if (!mysqli_query($conn, "DELETE from class where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["deleted"]="delete";
                    header('location:classes.php');
                    
              }

}
}



if (isset($_POST['deleteexam'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);

      if(!empty($_POST["iddelete"])) { 
        
          // check if has 1-1 relationship to other table
          $check=mysqli_query($conn,"select * from examsubject where examid='" . $id . "'");
          $erow=mysqli_fetch_array($check);
           if($erow>0) {
                    $_SESSION["error_remarks"]="Cannot be deleted, found existing record to exam result";
                   //  
                   $_SESSION["error"]="error";
                   header('location:exam.php');
                   exit();
                     }      
           

              if (!mysqli_query($conn, "DELETE from exam where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["examdeleted"]="delete";
                    header('location:exam.php');
                    
              }

}
}



if (isset($_POST['deletequiz'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);

      if(!empty($_POST["iddelete"])) { 
        
          // check if has 1-1 relationship to other table
          $check=mysqli_query($conn,"select * from quizresult where id='" . $id . "'");
          $erow=mysqli_fetch_array($check);
           if($erow>0) {
                    $_SESSION["error_remarks"]="Cannot be deleted, found existing record to quiz result";
                   //  
                   $_SESSION["error"]="error";
                   header('location:quiz.php');
                   exit();
                     }      
           

              if (!mysqli_query($conn, "DELETE from quiz where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["quizdeleted"]="delete";
                    header('location:quiz.php');
                    
              }

}
}



if (isset($_POST['deletesubject'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);
  $subjectname= mysqli_real_escape_string($conn, $_POST['subjectname']);
  

      if(!empty($_POST["iddelete"])) { 
        
          // check if has 1-1 relationship to other table
          $check=mysqli_query($conn,"select * from subjectclass where subjectname='$subjectname' ");
          $erow=mysqli_fetch_array($check);
           if($erow>0) {
                    $_SESSION["error_remarks"]="Cannot be deleted, found existing record to Subject Class";
                   //  
                   $_SESSION["error"]="error";
                   header('location:subject.php');
                   exit();
                     }      
         

              if (!mysqli_query($conn, "DELETE from subjects where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["deleted"]="delete";
                    header('location:subject.php');
                    
              }

}
}


if (isset($_POST['deleteassignsubject'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);
  

      if(!empty($_POST["iddelete"])) { 
        
          // check if has 1-1 relationship to other table
        //  $check=mysqli_query($conn,"select * from subjectclass where subjectname='$subjectname' ");
        //  $erow=mysqli_fetch_array($check);
        // If   if($erow>0) {
          //          $_SESSION["error_remarks"]="Cannot be deleted, found existing record to Subject Class";
                   //  
            //       $_SESSION["error"]="error";
             //      header('location:subject.php');
             //      exit();
             //        }      
         

              if (!mysqli_query($conn, "DELETE from subjectclass where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["deleted"]="delete";
                    header('location:assignsubject.php');
                    
              }

}
}


if (isset($_POST['deleteassignstudent'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);
  

      if(!empty($_POST["iddelete"])) { 
        
          // check if has 1-1 relationship to other table
        //  $check=mysqli_query($conn,"select * from subjectclass where subjectname='$subjectname' ");
        //  $erow=mysqli_fetch_array($check);
        // If   if($erow>0) {
          //          $_SESSION["error_remarks"]="Cannot be deleted, found existing record to Subject Class";
                   //  
            //       $_SESSION["error"]="error";
             //      header('location:subject.php');
             //      exit();
             //        }      
         

              if (!mysqli_query($conn, "DELETE from studentclass where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["deleted"]="delete";
                    header('location:assignstudent.php');
                    
              }

}
}

if (isset($_POST['deleteexamsubjects'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['iddelete']);
  $eid =  mysqli_real_escape_string($conn, $_POST['eid']);  
  $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);  
  $sy = mysqli_real_escape_string($conn, $_POST['sy']);  
  $examcategoryid = mysqli_real_escape_string($conn, $_POST['examcategoryid']);  
  //$subjectid = mysqli_real_escape_string($conn, $_POST['subjectid']);  
  
  

      if(!empty($_POST["iddelete"])) { 
       // check if has 1-1 relationship to other table
   $check=mysqli_query($conn,"select * from examquestion where examsubjectid='" .$id. "'");
       $erow=mysqli_fetch_array($check);
        if($erow>0) {
                 $_SESSION["error_remarks"]="Cannot be deleted, found existing record to exam subject question";
                //  
                $_SESSION["error"]="error";
                header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
                          
                exit();
                  }       
      

              if (!mysqli_query($conn, "DELETE from examsubject where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["deleted"]="delete";
                    header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
                      
                    
              }

}
}


if (isset($_POST['deleteexamquestion'])) {
  
$id= mysqli_real_escape_string($conn, $_POST['id']);
$examsubjectid = mysqli_real_escape_string($conn, $_POST['examsubjectid']);
$examcategoryid =mysqli_real_escape_string($conn, $_POST['examcategoryid']);
$classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);
$examid = mysqli_real_escape_string($conn, $_POST['examid']);
$sy = mysqli_real_escape_string($conn, $_POST['sy']);
$date = date('Y-m-d H:i:s');

  

      if(!empty($_POST["id"])) { 
       // check if has 1-1 relationship to other table
     /**  $check=mysqli_query($conn,"select * from examsubjectquestion where id='" . $id . "'");
       $erow=mysqli_fetch_array($check);
        if($erow>0) {
                 $_SESSION["error_remarks"]="Cannot be deleted, found existing record to exam result";
                //  
                $_SESSION["error"]="error";
               header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
                      
                exit();
                  }       
          */

              if (!mysqli_query($conn, "DELETE from examquestion where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["deleted"]="delete";
                    header('location:examsubjquestion.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');
    
                    
              }

}
}
?>