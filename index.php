<html>
<head>
<title>Registeration and Login form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="validation.js"></script>
</head>

<body>

<h1 id="wlcm">Welcome!</h1>

<form action="welcome.php" onSubmit="return loginValidation();" method="post">
<p id="login"> Login</p><br>
<p>Email:<p/> <input type="text" name="loginemail" id="loginemail">
<p>Password:<p/><input type="password" name="loginpasswrd" id="loginpasswrd"><br>
<input type="submit" id="loggingin" value="Go">
</form>
<hr>
<form onSubmit="return registerValidation();" action="submit.php" method="post">
<p id="notlogged"> Don't have an account?</p>
<p id="reg">Register</p><br>
<p>Name:<p/> <input type="text" name="name" id="name">

<p>Email:<p/><input type="text" name="email" id="email">

<p>Password:<p/><input type="password" name="passwrd" id="passwrd">
<p>Confirm Password:<p/><input type="password" name="cpasswrd" id="cpasswrd"><br>
<input type="submit" id="registering">
</form>


</body>
</html>