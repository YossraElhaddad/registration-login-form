<html>
 <head>
 <title> Retrive Department data</title>
 <link rel="stylesheet" type="text/css" href="style.css">
 </head>
<body>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_lab1';
$loginemail = $_POST["loginemail"];
$loginpasswrd = $_POST["loginpasswrd"];
$loginpasswrd = md5($loginpasswrd);

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$n = mysqli_query($conn,"SELECT name FROM users WHERE email = '$loginemail' AND passwrd = '$loginpasswrd'");


if(empty($loginemail)){
	      echo "<script>alert('Email is required!');location.replace(document.referrer);</script>";
  }
  else if(empty($loginpasswrd)){
	      echo "<script>alert('Password is empty!');location.replace(document.referrer);</script>";
  }
  else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $loginemail))
 {
      echo "<script>alert('Invalid format for email!');location.replace(document.referrer);</script>";
 }


if(mysqli_num_rows($n) > 0){
	$row = mysqli_fetch_array($n); ?> 
<p id="user"> <?php echo "Welcome " .$row["name"] ."!"; ?></p>

<?php
}

else{
    echo "<script>alert('Incorrect username or password!');location.replace(document.referrer);</script>";
	exit();
	
}
?>
<br>

<?php
$result = mysqli_query($conn,"SELECT * FROM department");
?>

<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td class="title"> Name</td>
    <td class = "title">Description</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td class="infon"><?php echo $row["name"]; ?></td>
    <td class ="infod"><?php echo $row["description"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>
