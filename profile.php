<?php session_start(); ?>

<?php

require('connections.php');

    // =======================================
    //Staff_id SESSION assigned to a Variable
    // =======================================
    
    $st_id = $_SESSION['staff_login'];
    $_SESSION['center_login'];
    
if(isset($_POST['submit_img'])){
    
    $name = $_FILES['file']['name'];
    $tmp_loc = $_FILES['file']['tmp_name'];
    
    
    
    
    
    $file = addslashes(file_get_contents($tmp_loc));
    
    if(!empty($_FILES['file']['tmp_name']) 
     && file_exists($_FILES['file']['tmp_name'])) {
         
    $file= addslashes(file_get_contents($_FILES['file']['tmp_name']));
    
}elseif(empty($_FILES['file']['tmp_name'])){
    
    $file= addslashes(file_get_contents($_FILES['file']['tmp_name']));
    
}
    
    
    
    
    $query1 = "UPDATE `correct_data` SET `images`= ('$file')  WHERE `staff_id` = '$st_id' ";

    if(mysqli_query($conn, $query1)){
        
    }
    else{
        echo "SQL Error!";
    }
    
}
//=========================
//PAGE LOGO
//=========================

echo "<center>";
echo "<img src='css/img/logo-cropped.png' alt='logo' width='150px' height='150px'>";


?>
<form method="POST" action="profile.php" enctype="multipart/form-data">
<table>
<tr>
<td>
    <?php
    

$query2 = "SELECT `staff_id`, `images` FROM `correct_data` WHERE `staff_id` = '$st_id' ";
$result = mysqli_query($conn,$query2);

//LIST OUT staff_id FROM Database
    
$row = mysqli_fetch_array($result);

// $img_check = $row['mobile_number'];

$img_check = $row['images'];

$_SESSION['img'] = $img_check;
    

    //     if(empty($_SESSION['img'])){
    //   echo  "<input type='file' name='profile_img' onchange='readURL(this);' /><br>";
    //   echo "<b><font color='red'>NOTE-(Passport: Not More than 40kb)</font></b>";

    //     }elseif(!empty($_SESSION['img'])){
            
    //     }
?>

</td>
</form>

<div class="container" style="width:700px;">
   <br />
       
   <?php
   $file_pointer = './uploads/'.str_replace(' ', '', $_SESSION['staff_login']).'.jpg';
   

   if(!empty($_SESSION['img'])): ?>
  <?php  echo  "<img src='data:image/jpeg;base64,".base64_encode($_SESSION['img'])."' height='120px' width='120px'>";?>
    <?php else: ?>
    <h3> Welcome to your LIRS Exam  Profile. Kindly upload your passport and submit profile before printing.</h3>
    <div class="container1">
        
        <span id="uploaded_image"></span>  
            <input type="file" name="file" id="file" />
            
            </div>
            <br />
              
    <?php endif; ?>   

    
</div>

<script src="scripts/jquery-3.4.1.min.js"></script>


<script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                        
                };

                reader.readAsDataURL(input.files[0]);
         
            }
        }
//         function show_img(input){
//         $("input[type='image']").click(function() {
//   $("input[id='my_file']").click();
// });
// }
</script>

<?php



echo "<td>";
// echo "<font>Welcome to your LIRS Exam  Profile.\t Kindly upload your passport and submit profile before printing.\t</font></td><br>";
echo "</tr>";
echo "</table>";

echo "<font><b>|Candidate Details|</b></font>";
echo "<hr>";



echo "<b>NAME:</b> <u>".$_SESSION['name_login']."</u><br>";
echo "<b>STAFF ID:</b> ".$_SESSION['staff_login']."<br>";
echo "<b>Email:</b> ".$_SESSION['email_login'].".<br>";
echo "<b>Designation:</b> ".$_SESSION['designation_login']."<br>";

    $exam_hr = "<hr>";
    $exam_heading ="<font><b>|Examination Details|</b></font>";
    $exam_center = "<b>Exam Center:</b> ".$_SESSION['center_login']."<br>";
    $exam_time = "<font><b>Exam Time:</b> ".$_SESSION['time']."</font><br>";
    $exam_note ="<p><b>NOTE:</b> Kindly come with a copy of this printout to the examination center.</p><br>";

    
$file_pointer = './uploads/'.str_replace(' ', '', $_SESSION['name_login']).'.jpg';

if(empty($_SESSION['img'])){
echo "<input type='submit' name='submit_img' value='Submit'>";
}
elseif(file_exists($file_pointer)){
    echo "";
}

if(!empty($_SESSION['img'])){
  
echo $exam_hr;
echo $exam_heading;

echo $exam_hr;

echo $exam_center;
echo $exam_time." Saturday 20th, 2019";

echo $exam_note;
    echo "<input class='btn' type='submit' value='PRINT' onclick='window.print()'>";
}



echo "</center>";
if(isset($_POST["log_out"])){
    session_destroy();
    echo "<script>window.location = 'index.php'</script>";
}


?>
<html>
<head>
<title>Exam Profile Slip</title>
<link rel="icon" href="css/img/logo-cropped.png">
</head>
<style>
body{
    background-image:url(css/img/watermark.jpg);
    background-repeat:fixed;
    font-family:calibri;
    font-size:large;
    color:black;
}
img #blah{
    max-width:200px;
    max-height:200px;
}
hr{
    width:70%;
    color:black;
    font-size:30px;
    border:black 1px solid;
}
input{
    height:40px;
    width:120px;
}
.container1{
    height:120px;
    width:120px;
    border:2px solid;
    align-content:center;
    /*padding:10px;*/
}



</style>

<body>
<center>
<form action="profile.php" method="POST">

<input class="btn" type="submit" value="Log Out" name="log_out"><br><br><br>

<code>Powered By Ekocity. 2019 </code>|<code> Support-line: 09030008812, 07081327711</code>

</form>
<center>
</body>
</html>




<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size should not be more than 20kb");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>
