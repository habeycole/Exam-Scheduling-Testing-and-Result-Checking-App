<?php
require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/accredit.css">
    <title>Accreditation</title>
</head>
<body>
<center>
<?php
    require('connections.php');

    
    
    if(isset($_POST['submit_accre'])){

    
    $staff_id_accr = mysqli_escape_string($conn, $_POST["staff_id_accr"]);
    
    $staff_id_accr = "lirs".strtolower($staff_id_accr);
    

    
    //Checks If The Input Fields Are Empty
    if(empty($staff_id_accr)){
        echo "<font color='red'> <b>Fields Required!!</b></font><br>";
    }else{

    
    $query = "SELECT `staff_id`, `images`, `email`, `name`, `time`, `center`, `checked_in` FROM `correct_data`";
    
    $result = mysqli_query($conn, $query);
    if($result){
        while($row = mysqli_fetch_array($result)){
            $staff_id_pass = $row["staff_id"];
            $email_pass = $row["email"];
            $name_pass = $row["name"];
            $images_pass = $row['images'];
            $time_pass = $row['time'];
            $center_pass = $row['center'];
            $chk_pass = $row['checked_in'];
            
            
            if($check = $staff_id_accr == strtolower($staff_id_pass)){
                
              echo "
        <img src='data:image/jpeg;base64,".base64_encode($row['images'])."' width='300px' height='300px'><br>
        ";
        $_SESSION["name_login"] = $name_pass;
        $_SESSION['id'] = $staff_id_pass;
        $_SESSION["email_login"] = $email_pass;
        $_SESSION["time_login"] = $time_pass;
        $_SESSION["center_login"] = $center_pass;
        $_SESSION['vld_data'] = $chk_pass;
        $_SESSION['img'] = $images_pass;
        
        
        echo "<h1> Name: ".$_SESSION['name_login']."</h1>";
        echo "<h1> Email: ".$_SESSION['email_login']."</h1>";
        echo "<h1> Time: ".$_SESSION['time_login']."</h1>";
        echo "<h1> Center: ".$_SESSION['center_login']."</h1>";
        echo "<h1><font color='green'> Status: ".$_SESSION['vld_data']."</font></h1>";
        
        break;
            }if($check = false){
                $err_msg = "<font color='red'><b>Invalid Data Input!!</b></font>";
            }
            else{
                  
            }
            }
        }
        
    }
    
    }
    
    if(isset($_POST['clear_user'])){
        session_destroy();
    }
    
    if(isset($_POST['vld'])){
        $id = $_SESSION['id'];
        $chk_query = "UPDATE correct_data SET `checked_in` = 'Checked In', `checked_in_time` = CURRENT_TIMESTAMP where `staff_id` = '$id'";
        mysqli_query($conn, $chk_query);
        echo "
        <img src='data:image/jpeg;base64,".base64_encode($_SESSION['img'])."' width='300px' height='300px'><br>
        ";
        echo "<h1> Name: ".$_SESSION['name_login']."</h1>";
        echo "<h1> Email: ".$_SESSION['email_login']."</h1>";
        echo "<h1> Time: ".$_SESSION['time_login']."</h1>";
        echo "<h1> Center: ".$_SESSION['center_login']."</h1>";
        echo "<h1><font color='green'> Status: ".$_SESSION['vld_data']."</font></h1>";
        echo "User Checked In";
    }

?>
    <h2>User Accreditation</h2>
      <form action="/accredit.php" method="POST">
        <div class="accredit-form">
            <input type="text" name="staff_id_accr" placeholder="Staff ID" class="input"><br>
           <input type="submit" class="btn" name="submit_accre" value="Check Profile">
           <input type="submit" class="btn" name="vld" value="Check In">
           <input type="submit" class="btn" name="clear_user" value="Clear">
           </div>
      </form>

      </center>


</body>
</html>