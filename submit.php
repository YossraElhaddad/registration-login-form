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

$name = $_POST['name'];
$email = $_POST['email'];
$passwrd = $_POST['passwrd'];
$passwrd = md5($passwrd);
$cpasswrd = $_POST['cpasswrd'];
$cpasswrd = md5($cpasswrd);

$res = mysqli_connect($servername, $username, $password, $dbname)or die($res);


	//header("location:javascript://history.go(-1)");

//if(isset($_POST['submit'])){
	
	if (empty($name)) {
    echo "<script>alert('Name is required');location.replace(document.referrer);</script>";
	//if(!alert('Name is required')){window.location.reload();}
	
  }
  else if(empty($email)){
	      echo "<script>alert('Email is required!');location.replace(document.referrer);</script>";
  }
  else if(empty($passwrd)){
	      echo "<script>alert('Password is empty!');location.replace(document.referrer);</script>";
  }
  else if(empty($cpasswrd)){
	      echo "<script>alert('Confirmation Password is empty!');location.replace(document.referrer);</script>";
  }
  else if($passwrd!=$cpasswrd){
	      echo "<script>alert('Passwords are not matched!');location.replace(document.referrer);</script>";
  }
  else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
      echo "<script>alert('Invalid format for email!');location.replace(document.referrer);</script>";
 }
 else{
	 $q1 = mysqli_query($res,"SELECT * FROM users WHERE name='$name'");
	 $q2 = mysqli_query($res,"SELECT * FROM users WHERE email='$email'");
	 
	 if(mysqli_num_rows($q1) >0 || mysqli_num_rows($q2) >0){
 echo "<script>alert('This email or username already associated with another account');;location.replace(document.referrer);</script>";
 }
     else{
		  $query = mysqli_query($res,"INSERT INTO users(name, email, passwrd) VALUES ('$name','$email','$passwrd')");
         if(!$query){
	echo "Error: " . mysqli_error($res);
            }
			else{
	?>
  <p id="user"> <?php echo "Welcome " .$name ."!"; ?></p><br>
  
  <?php
$result = mysqli_query($res,"SELECT * FROM department");
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

}

	 }
 
}
	
	
//}	
	
?>	
	


<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

</body>
</html>