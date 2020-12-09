<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Result</title>
    <link rel="stylesheet" href="css/result.css">
    <link rel="icon" href="css/img/logo-cropped.png">
</head>
<body>
<center>    
 <img src="css/img/logo-cropped.png" width="200px" height="170px">

</br>
</br>
<?php


 echo "<h1>LIRS 2019 Promotion Examination Result </h1>";
 echo "<br>";
 echo "<h3>Name: ".$_SESSION['name']."</h3>";
 echo "<h3>Staff ID: ".$_SESSION['id']."</h3>";

echo "<h2>Total Score = ".$_SESSION['score']."<b>/50</b></h2><br>";

echo "<input type='submit' onclick='window.print()' value='PRINT'><br>";

if(isset($_POST['signout'])){
    session_destroy();
    echo "<script>window.location = 'index.php'</script>";
}
?>
<form method="POST" action="result.php">
    <br>
<input type="submit" value="Log Out" name="signout">

</form>
</center>
</body>
</html>