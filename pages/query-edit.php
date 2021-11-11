<?php 
@ob_start();
session_start();
  include 'dbconnect.php'; 

  if (isset($_POST['editstudent'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);		
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);		
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);		
        $opeusername = mysqli_real_escape_string($conn, $_POST['username']);
        $opepassword = mysqli_real_escape_string($conn, $_POST['password']);
        $studentno = mysqli_real_escape_string($conn, $_POST['studentno']);
		$date = date('Y-m-d H:i:s');

    if(!empty($_POST["username"])) {
      $check=mysqli_query($conn,"select * from student where opeusername='" .$opeusername . "' AND id <> '".$id ."' ");
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, username already taken";
           
              $_SESSION["error"]="error";
              header('location:student.php');
              exit();
                }      
      }
                if (!mysqli_query($conn, "UPDATE student set firstname='$firstname',middlename='$middlename',lastname='$lastname',contact='$contactno',email='$email',address='$address',opeusername='$opeusername',opepassword='$opepassword',studentno='$studentno' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["studentedited"]="edit";
                      header('location:student.php');
                      
                }

  }
 

  if (isset($_POST['editgradevel'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['id']);
		$classname= mysqli_real_escape_string($conn, $_POST['classname']);    

        if(!empty($_POST["classname"])) {
            $check=mysqli_query($conn,"select * from class where classname='".$classname."' AND id <> '$id' ");
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
              $_SESSION["error_remarks"]="Cannot be saved, found class name duplication";
                    //  
                    $_SESSION["error"]="error";
                    header('location:classes.php');
                    exit();
                      }      
            }
               

                if (!mysqli_query($conn, "UPDATE class set classname='$classname' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:classes.php');
                      
                }

  }


  
  if (isset($_POST['editexam'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
    $classname= mysqli_real_escape_string($conn, $_POST['classname']);
    $examname= mysqli_real_escape_string($conn, $_POST['examname']);
    $schoolyear= mysqli_real_escape_string($conn, $_POST['schoolyear']);
    $examtype= mysqli_real_escape_string($conn, $_POST['examtype']);
    $status= mysqli_real_escape_string($conn, $_POST['status']);
    

        if(!empty($_POST["classname"])) {
            $check=mysqli_query($conn,"select * from exam where examcategoryid='" . $_POST["examname"] . "' AND  classnameid='" . $_POST["classname"] . "'AND  classnameid='" . $_POST["classname"] . "'AND examtype='" . $_POST["examtype"] . "'AND status='" . $_POST["status"] . "'  AND id <> '$id' ");
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
              $_SESSION["error_remarks"]="Cannot be saved, found exam info duplication";
                 
                    $_SESSION["error"]="error";
                    header('location:exam.php');
                    exit();
                      }      
            }
               

                if (!mysqli_query($conn, "UPDATE exam set examcategoryid='$examname',classnameid='$classname',sy='$schoolyear',examtype='$examtype',status='$status' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["examedited"]="edit";
                      header('location:exam.php');
                      
                }

  }
 
 
  
  

  

  if (isset($_POST['editsubject'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$subject= mysqli_real_escape_string($conn, $_POST['subject']);    

        if(!empty($_POST["subject"])) {
            $check=mysqli_query($conn,"select * from subjects where subjectname='" . $_POST["subject"] . "'  AND id <> '$id' ");
           $erow=mysqli_fetch_array($check);
            if($erow>0) {
                    // $_SESSION["username_taken"]="duplicate";
                    //  
                    $_SESSION["error"]="error";
                    header('location:subject.php');
                      }      
            }
               

                if (!mysqli_query($conn, "UPDATE subjects set subjectname='$subject' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:subject.php');
                      
                }

  }

  

  if (isset($_POST['editassignsubject'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectname']);  
    $classnameid= mysqli_real_escape_string($conn, $_POST['classname']);    

    $getrow1=mysqli_query($conn,"SELECT * FROM class where id='$classnameid'");
    $getrow1=mysqli_fetch_array($getrow1);
     $classname=$getrow1['classname'];

     $getrow2=mysqli_query($conn,"SELECT * FROM subjects where id='$subjectnameid'");
     $getrow2=mysqli_fetch_array($getrow2);
      $subjectname=$getrow2['subjectname'];

    if(!empty($_POST["classname"])) {
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


                if (!mysqli_query($conn, "UPDATE subjectclass set classid='$classnameid',classname='$classname',subjectid='$subjectnameid',subjectname='$subjectname' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:assignsubject.php');
                      
                }

  }
  
  if (isset($_POST['editassignstudent'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$classnameid= mysqli_real_escape_string($conn, $_POST['classnameedit']);  
    $studentnameid= mysqli_real_escape_string($conn, $_POST['studentnameedit']);  
     $controlno= mysqli_real_escape_string($conn, $_POST['controlnoedit']);
     $schoolyear= mysqli_real_escape_string($conn, $_POST['schoolyearedit']);  

    $getrow1=mysqli_query($conn,"SELECT * FROM class where id='$classnameid'");
    $getrow1=mysqli_fetch_array($getrow1);
     $classname=$getrow1['classname'];

     $getrow2=mysqli_query($conn,"SELECT * FROM student where id='$studentnameid'");
     $getrow2=mysqli_fetch_array($getrow2);
      $studentname=$getrow2['firstname'].' '.$getrow2['middlename'].' '.$getrow2['lastname']  ;

    if(!empty($_POST["classname"])) {
        $check=mysqli_query($conn,"select * from studentclass where sy='".$schoolyear."' and studentid='".$studentnameid."' and classid='".$classnameid."' WHERE id <> '".$id."'");
       $erow=mysqli_fetch_array($check);
        if($erow>0) {
            $_SESSION["error_remarks"]="Record duplication found!. Cannot be saved.";
                //  
                $_SESSION["error"]="error";
                header('location:assignstudent.php');
                exit();
                  }      
        }


                if (!mysqli_query($conn, "UPDATE studentclass set controlno='$controlno',studentid='$studentnameid',studentname='$studentname',classid='$classnameid',classname='$classname',sy='$schoolyear' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:assignstudent.php');
                      
                }

  }
  
  
  
  if (isset($_POST['editexamsubject'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$examdatetime= mysqli_real_escape_string($conn, $_POST['examdatetime']);  
    $subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectnameid']);  
     $totalquestion= mysqli_real_escape_string($conn, $_POST['totalquestion']);  
     $timelimit= mysqli_real_escape_string($conn, $_POST['timelimit']);  

     $eid =  mysqli_real_escape_string($conn, $_POST['eid']);  
     $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);  
     $sy = mysqli_real_escape_string($conn, $_POST['sy']);  
     $examcategoryid = mysqli_real_escape_string($conn, $_POST['examcategoryid']);  

    /** if(!empty($_POST["subjectnameid"])) {
      $check=mysqli_query($conn,"select * from examsubject where examid='". $_POST["eid"] ."' AND subjectid='" . $_POST["subjectnameid"] . "' AND id <> '$id' ");
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found data duplication";
           
              $_SESSION["error"]="error";
              header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
          
              exit();
                }      
      }
       */
      
                if (!mysqli_query($conn, "UPDATE examsubject set examid='$eid',subjectid='$subjectnameid',examdatetime='$examdatetime',totalquestion='$totalquestion',timelimit='$timelimit' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:examdetails.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
          
                      
                }

  }

  

  if (isset($_POST['editexamsubject_essay'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$examdatetime= mysqli_real_escape_string($conn, $_POST['examdatetime']);  
    $subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectnameid']);  
     $totalquestion= mysqli_real_escape_string($conn, $_POST['totalquestion']);  
     $timelimit= mysqli_real_escape_string($conn, $_POST['timelimit']);  

     $eid =  mysqli_real_escape_string($conn, $_POST['eid']);  
     $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);  
     $sy = mysqli_real_escape_string($conn, $_POST['sy']);  
     $examcategoryid = mysqli_real_escape_string($conn, $_POST['examcategoryid']);  

  
      
                if (!mysqli_query($conn, "UPDATE examsubject_essay set examid='$eid',subjectid='$subjectnameid',examdatetime='$examdatetime',totalquestion='$totalquestion',timelimit='$timelimit' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:examdetailsEssay.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
          
                      
                }

  }
  
  if (isset($_POST['editexamsubject_truefalse'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$examdatetime= mysqli_real_escape_string($conn, $_POST['examdatetime']);  
    $subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectnameid']);  
     $totalquestion= mysqli_real_escape_string($conn, $_POST['totalquestion']);  
     $timelimit= mysqli_real_escape_string($conn, $_POST['timelimit']);  

     $eid =  mysqli_real_escape_string($conn, $_POST['eid']);  
     $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);  
     $sy = mysqli_real_escape_string($conn, $_POST['sy']);  
     $examcategoryid = mysqli_real_escape_string($conn, $_POST['examcategoryid']);  

  
      
                if (!mysqli_query($conn, "UPDATE examsubject_truefalse set examid='$eid',subjectid='$subjectnameid',examdatetime='$examdatetime',totalquestion='$totalquestion',timelimit='$timelimit' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:examdetailsTF.php?examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&id='.$eid.'&sy='.$sy.'');
          
                      
                }

  }
  

  if (isset($_POST['editexamquestion'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['id']);
    $titlequestion= mysqli_real_escape_string($conn, $_POST['titlequestion']);
    $option1= mysqli_real_escape_string($conn, $_POST['option1']);
    $option2= mysqli_real_escape_string($conn, $_POST['option2']);
    $option3= mysqli_real_escape_string($conn, $_POST['option3']);
    $option4= mysqli_real_escape_string($conn, $_POST['option4']);
    $answer= mysqli_real_escape_string($conn, $_POST['answer']);
    $rightmark= mysqli_real_escape_string($conn, $_POST['rightmark']);
    $wrongmark= mysqli_real_escape_string($conn, $_POST['wrongmark']);
    
    $examsubjectid = mysqli_real_escape_string($conn, $_POST['examsubjectid']);
    $examcategoryid =mysqli_real_escape_string($conn, $_POST['examcategoryid']);
    $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);
    $examid = mysqli_real_escape_string($conn, $_POST['examid']);
    $sy = mysqli_real_escape_string($conn, $_POST['sy']);
    $date = date('Y-m-d H:i:s');
    

    if(!empty($_POST["titlequestion"])) {
      $check=mysqli_query($conn,"select * from examquestion where examsubjectid='".$examsubjectid."' AND  questiontitle='".$titlequestion."' AND id <> '$id'");        
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
           
              $_SESSION["error"]="error";
              header('location:examsubjquestion.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

              exit();
                }      
      }     
    
  

                if (!mysqli_query($conn, "UPDATE examquestion set questiontitle='$titlequestion',option1='$option1',option2='$option2',option3='$option3',option4='$option4',answer='$answer',rightmark='$rightmark',wrongmark='$wrongmark' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:examsubjquestion.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

                      
                }

  }

  

  
  if (isset($_POST['editexamquestion_essay'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['id']);
    $titlequestion= mysqli_real_escape_string($conn, $_POST['titlequestion']);
    $highestmark= mysqli_real_escape_string($conn, $_POST['highestmark']);
    
    $examsubjectid = mysqli_real_escape_string($conn, $_POST['examsubjectid']);
    $examcategoryid =mysqli_real_escape_string($conn, $_POST['examcategoryid']);
    $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);
    $examid = mysqli_real_escape_string($conn, $_POST['eid']);
    $sy = mysqli_real_escape_string($conn, $_POST['sy']);
    $date = date('Y-m-d H:i:s');
    

    if(!empty($_POST["titlequestion"])) {
      $check=mysqli_query($conn,"select * from examquestion_essay where examsubjectid='".$examsubjectid."' AND  questiontitle='".$titlequestion."' AND id <> '$id'");        
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
           
              $_SESSION["error"]="error";
              header('location:examsubjquestion_essay.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

              exit();
                }      
      }     
    
      
                if (!mysqli_query($conn, "UPDATE examquestion_essay set questiontitle='$titlequestion',highestmark='$highestmark' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:examsubjquestion_essay.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

                        
                }

  }
  


  if (isset($_POST['editexamquestion_truefalse'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['id']);
    $titlequestion= mysqli_real_escape_string($conn, $_POST['titlequestion']);
    $option1= mysqli_real_escape_string($conn, $_POST['option1']);
    $option2= mysqli_real_escape_string($conn, $_POST['option2']);
    $answer= mysqli_real_escape_string($conn, $_POST['answer']);
    $rightmark= mysqli_real_escape_string($conn, $_POST['rightmark']);
    $wrongmark= mysqli_real_escape_string($conn, $_POST['wrongmark']);
    
    $examsubjectid = mysqli_real_escape_string($conn, $_POST['examsubjectid']);
    $examcategoryid =mysqli_real_escape_string($conn, $_POST['examcategoryid']);
    $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);
    $examid = mysqli_real_escape_string($conn, $_POST['examid']);
    $sy = mysqli_real_escape_string($conn, $_POST['sy']);
    $date = date('Y-m-d H:i:s');
    

    if(!empty($_POST["titlequestion"])) {
      $check=mysqli_query($conn,"select * from examquestion_truefalse where examsubjectid='".$examsubjectid."' AND  questiontitle='".$titlequestion."' AND id <> '$id'");        
     $erow=mysqli_fetch_array($check);
      if($erow>0) {
        $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
           
              $_SESSION["error"]="error";
              header('location:examsubjquestion_truefalse.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

              exit();
                }      
      }     
    
  

                if (!mysqli_query($conn, "UPDATE examquestion_truefalse set questiontitle='$titlequestion',option1='$option1',option2='$option2',answer='$answer',rightmark='$rightmark',wrongmark='$wrongmark' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:examsubjquestion_truefalse.php?examsubjectid='.$examsubjectid.'&examcategoryid='.$examcategoryid.'&classnameid='.$classnameid.'&eid='.$examid.'&sy='.$sy.'');

                      
                }

  }


  
  if (isset($_POST['editquizsubject'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
		$quizdatetime= mysqli_real_escape_string($conn, $_POST['quizdatetime']);  
    $subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectnameid']);  
     $totalquestion= mysqli_real_escape_string($conn, $_POST['totalquestion']);  
     $timelimit= mysqli_real_escape_string($conn, $_POST['timelimit']);  

     $qid =  mysqli_real_escape_string($conn, $_POST['qid']);  
     $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);  
     $sy = mysqli_real_escape_string($conn, $_POST['sy']);  
     $gradingperiod = mysqli_real_escape_string($conn, $_POST['gradingperiod']);  


      
                if (!mysqli_query($conn, "UPDATE quizsubject_mc set subjectid='$subjectnameid',quizdatetime='$quizdatetime',totalquestion='$totalquestion',timelimit='$timelimit' where id='$id'")) {
            echo("Error description: " . mysqli_error($conn));
                }else{
                      $_SESSION["edited"]="edit";
                      header('location:quizdetailsMC.php?gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&id='.$qid.'&sy='.$sy.'');
                   
                      
                }

  }

  
  if (isset($_POST['editquiz'])) {
  
    $id= mysqli_real_escape_string($conn, $_POST['idedit']);
    $quizname= mysqli_real_escape_string($conn, $_POST['quizname']);
		$gradingperiod= mysqli_real_escape_string($conn, $_POST['gradingperiod']);
        $quiztype = mysqli_real_escape_string($conn, $_POST['quiztype']);
        $classname = mysqli_real_escape_string($conn, $_POST['classname']);		
        $schoolyear = mysqli_real_escape_string($conn, $_POST['schoolyear']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);	

       
        if(!empty($_POST["quizname"])) {
          $check=mysqli_query($conn,"select * from quiz where gradingperiod='" . $_POST["gradingperiod"] . "' AND  quizname='" . $_POST["quizname"] . "'AND  classnameid='" . $_POST["classname"] . "'AND quiztype='" . $_POST["quiztype"] . "'AND status='" . $_POST["status"] . "'  AND id <> '$id' ");
         $erow=mysqli_fetch_array($check);
          if($erow>0) {
            $_SESSION["error_remarks"]="Cannot be saved, found quiz info duplication";
               
                  $_SESSION["error"]="error";
                  header('location:quizz.php');
                  exit();
                    }      
          }
             

              if (!mysqli_query($conn, "UPDATE quiz set quizname='$quizname',classnameid='$classname',sy='$schoolyear',quiztype='$quiztype',status='$status' where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["edited"]="edit";
                    header('location:quizz.php');
                    
              }

}


if (isset($_POST['editquizquestion'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['id']);
  $titlequestion= mysqli_real_escape_string($conn, $_POST['titlequestion']);
  $option1= mysqli_real_escape_string($conn, $_POST['option1']);
  $option2= mysqli_real_escape_string($conn, $_POST['option2']);
  $option3= mysqli_real_escape_string($conn, $_POST['option3']);
  $option4= mysqli_real_escape_string($conn, $_POST['option4']);
  $answer= mysqli_real_escape_string($conn, $_POST['answer']);
  $rightmark= mysqli_real_escape_string($conn, $_POST['rightmark']);
  $wrongmark= mysqli_real_escape_string($conn, $_POST['wrongmark']);
  
  $quizsubjectid = mysqli_real_escape_string($conn, $_POST['quizsubjectid']);
  $gradingperiod =mysqli_real_escape_string($conn, $_POST['gradingperiod']);
  $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);
  $qid = mysqli_real_escape_string($conn, $_POST['qid']);
  $sy = mysqli_real_escape_string($conn, $_POST['sy']);
  $date = date('Y-m-d H:i:s');
  

  if(!empty($_POST["titlequestion"])) {
    $check=mysqli_query($conn,"select * from quizquestion_mc where quizsubjectid='".$quizsubjectid."' AND  questiontitle='".$titlequestion."' AND id <> '$id'");        
   $erow=mysqli_fetch_array($check);
    if($erow>0) {
      $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
         
            $_SESSION["error"]="error";
              header('location:quizsubjquestion_mc.php?quizsubjectid='.$quizsubjectid.'&gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&qid='.$qid.'&sy='.$sy.'');
              
            exit();
              }      
    }     
  


              if (!mysqli_query($conn, "UPDATE quizquestion_mc set questiontitle='$titlequestion',option1='$option1',option2='$option2',option3='$option3',option4='$option4',answer='$answer',rightmark='$rightmark',wrongmark='$wrongmark' where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["edited"]="edit";
                    header('location:quizsubjquestion_mc.php?quizsubjectid='.$quizsubjectid.'&gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&qid='.$qid.'&sy='.$sy.'');
            
                    
              }

}




if (isset($_POST['editquizquestiontf'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['id']);
  $titlequestion= mysqli_real_escape_string($conn, $_POST['titlequestion']);
  $option1= mysqli_real_escape_string($conn, $_POST['option1']);
  $option2= mysqli_real_escape_string($conn, $_POST['option2']);
  $answer= mysqli_real_escape_string($conn, $_POST['answer']);
  $rightmark= mysqli_real_escape_string($conn, $_POST['rightmark']);
  $wrongmark= mysqli_real_escape_string($conn, $_POST['wrongmark']);
  
  $quizsubjectid = mysqli_real_escape_string($conn, $_POST['quizsubjectid']);
  $gradingperiod =mysqli_real_escape_string($conn, $_POST['gradingperiod']);
  $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);
  $qid = mysqli_real_escape_string($conn, $_POST['qid']);
  $sy = mysqli_real_escape_string($conn, $_POST['sy']);
  $date = date('Y-m-d H:i:s');
  

  if(!empty($_POST["titlequestion"])) {
    $check=mysqli_query($conn,"select * from quizquestion_truefalse where quizsubjectid='".$quizsubjectid."' AND  questiontitle='".$titlequestion."' AND id <> '$id'");        
   $erow=mysqli_fetch_array($check);
    if($erow>0) {
      $_SESSION["error_remarks"]="Cannot be saved, found question title duplication";
         
            $_SESSION["error"]="error";
              header('location:quizsubjquestion_tf.php?quizsubjectid='.$quizsubjectid.'&gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&qid='.$qid.'&sy='.$sy.'');
              
            exit();
              }      
    }     
  


              if (!mysqli_query($conn, "UPDATE quizquestion_truefalse set questiontitle='$titlequestion',option1='$option1',option2='$option2',answer='$answer',rightmark='$rightmark',wrongmark='$wrongmark' where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["edited"]="edit";
                    header('location:quizsubjquestion_tf.php?quizsubjectid='.$quizsubjectid.'&gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&qid='.$qid.'&sy='.$sy.'');
            
                    
              }

}




  
if (isset($_POST['editquizsubjectessay'])) {
  
  $id= mysqli_real_escape_string($conn, $_POST['idedit']);
  $quizdatetime= mysqli_real_escape_string($conn, $_POST['quizdatetime']);  
  $subjectnameid= mysqli_real_escape_string($conn, $_POST['subjectnameid']);  
   $totalquestion= mysqli_real_escape_string($conn, $_POST['totalquestion']);  
   $timelimit= mysqli_real_escape_string($conn, $_POST['timelimit']);  

   $qid =  mysqli_real_escape_string($conn, $_POST['qid']);  
   $classnameid =mysqli_real_escape_string($conn, $_POST['classnameid']);  
   $sy = mysqli_real_escape_string($conn, $_POST['sy']);  
   $gradingperiod = mysqli_real_escape_string($conn, $_POST['gradingperiod']);  


    
              if (!mysqli_query($conn, "UPDATE quizsubject_essay set subjectid='$subjectnameid',quizdatetime='$quizdatetime',totalquestion='$totalquestion',timelimit='$timelimit' where id='$id'")) {
          echo("Error description: " . mysqli_error($conn));
              }else{
                    $_SESSION["edited"]="edit";
                    header('location:quizdetailsEssay.php?gradingperiod='.$gradingperiod.'&classnameid='.$classnameid.'&id='.$qid.'&sy='.$sy.'');
                 
                    
              }

}

  
?>