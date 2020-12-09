<?php
require_once('session.php');
?>
<html>
<head>
<meta name="description" content="LIRS Portal" />

<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/exam.css">
<link rel="icon" href="css/img/logo-cropped.png">
<title>LIRS Page</title>
<meta charset=utf-8>
</head>
<body>
  <center>
      <img src="css/img/logo-cropped.png" height="auto">
      <!-- <img src="css/img/ekocity_logo.jpg" border-radius="50%"> -->
  <div class="tabbed">
   <input type="radio" name="tabs" id="tab-nav-1" checked>
    <label for="tab-nav-1">CHECK RESULT</label>
    <!-- <input type="radio" name="tabs" id="tab-nav-2">
    <label for="tab-nav-2">CBT Pratice</label> -->
    <!--<input type="radio" name="tabs" id="tab-nav-3">-->
    <!--<label for="tab-nav-3">Check Result</label>-->
<!-- link to exam -->
<!--<input type="button" onclick="location.href='http://apiquestion.ekocity.com.ng/';" id="tab-nav-4">-->
<!--<label for="tab-nav-4">CBT Pratice</label>-->
<!-- link to exam -->
     <div class="tabs">
      <div><h2></h2>
      <form action="index.php" method="POST">
        <div class="register-form">
            <!--<input type="text" name="email" placeholder="mail.address@lirs.net" class="input"><br>-->
            <input type="text" name="access_code" placeholder="e.g: LIRS0000" class="input">
           <input type="submit" class="btn" name="submit2" value="SUBMIT">
           </div>
      </form>
      </div>

      <div><h2>Welcome to CBT Pratice</h2>
      <form action="" method="POST">
        <div class="cbt-form">
              <input type="text" name="email1" placeholder="Your Email Address " class="input"><br />
              <input type="text" name="staff_id1" placeholder="lirs0000" class="input"><br />
            <input type="submit" class="btn" name="submit1" value="Start CBT Pratice">
           </div>
      </form>
      </div>

      <div id="check"><h2>Check Result</h2>
      <form action="index.php" method="POST">
        <div class="result-form">
              <input type="text" name="access_code" placeholder="lirs0000" class="input"><br />
              <input type="submit" class="btn" name="submit2" value="Check Result">
           </div>
           </form>
      </div>
      
    </div>
    <div class="footer">
  
  <div class="footer_container">
      <br>
  <code>Copyright &copy; 2019. LIRS / Eko City</code><br>
  <code>Powered By Ekocity. 2019 </code>|<code> Support-line: 09030008812, 07081327711</code>
  <!--<code>Built By Daniels, Abiodun Olumide; Totoola Kehinde(--Back-End--) And Adedeji Ayodeji(--Front-End--)</code>-->
  </div>
  
  </div>
  </div>



  <?php

require('connections.php');


//When The User Clicks The Submit Button
if(isset($_POST['submit'])){

    $email = mysqli_escape_string($conn, $_POST['email']);
    $staff_id = mysqli_escape_string($conn, $_POST['staff_id']);
    
    $email = strtolower($email);
    $staff_id = strtolower($staff_id);

    
    //Checks If The Input Fields Are Empty
    
    if(!isset($email) && !isset($staff_id)){
        echo "<font color='red'> <b>Fields Required!!</b></font><br>";
    }else{

    $sql = "SELECT `staff_id`, `email`, `name`, `center`, `designations`, `time` FROM `correct_data`";

    
    $result = mysqli_query($conn, $sql);
    
    
    if($result){
    
   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $staff_id_pass = $row["staff_id"];
        $email_pass = $row["email"];
        $name_pass = $row["name"];
        $center_pass = $row["center"];
        $designation_pass = $row["designations"];
        $time_pass = $row['time'];

        /*echo $staff_id_pass."<br>";
        echo $email_pass."<br>";*/

        //Code Here To Validate Input
        if( $check = $staff_id == strtolower($staff_id_pass) && $email == strtolower($email_pass)){
          $_SESSION["staff_login"] = $staff_id;
          $_SESSION["name_login"] = $name_pass;
          $_SESSION["email_login"] = $email_pass;
          $_SESSION["center_login"] = $center_pass;
          $_SESSION["designation_login"] = $designation_pass;
          $_SESSION["time"] = $time_pass;

          echo "<font color='green'>Logging In Successfully!</font>";
          
        
          
        }
        if($check == false){
          $err_msg = "<font color='red'><b>Invalid Data Input!!</b></font>";
          
        }else{
            echo $_SESSION['staff_login'];
            echo "<script>window.location = 'profile.php'</script>";
        }
    }
    
    echo $err_msg;
    
}else{
  echo "<font color='red'><b>SQL Error!!</b></font>";
}
}
}

if(isset($_POST['submit2'])){
//   echo "<script>alert('Not yet Released!');</script>";

    
   $access_code = mysqli_escape_string($conn, $_POST["access_code"]);
    
   
    $access_code = strtolower($access_code);

    
    //Checks If The Input Fields Are Empty
    if(empty($access_code)&& empty($staff_id2)){
        echo "<font color='red'> <b>Fields Required!!</b></font><br>";
    }else{

    $sql2 = "SELECT `name`, `staff_id`, `main_score` FROM `main_results`";

    
    $result2 = mysqli_query($conn, $sql2);
    
    if($result2){
    
   while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
        $name_pass = $row2['name'];
        $student_id_pass = $row2['staff_id'];
        
        $score_pass = $row2['main_score'];
        
        
        

        //Code Here To Validate Input
        if( $check = $access_code == strtolower($student_id_pass)){
          $_SESSION['score'] = $score_pass;
          $_SESSION['name'] = $name_pass;
          
          $_SESSION['id'] = $student_id_pass;
          
         

          echo "<font color='green'>Logging In Successfully!</font>";
          
        
          
        }
        if($check == false){
          $err_msg = "<font color='red'><b>Invalid Data Input!!</b></font>";
          
        }else{
            echo $_SESSION['name'];
            echo "<script>window.location = 'result.php'</script>";
        }
    }
    
    echo $err_msg;
    
}
}
}



  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.6/prefixfree.min.js"></script>
</center>
</body>
</html>
