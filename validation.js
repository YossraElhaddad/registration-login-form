function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}


function registerValidation(){
	
	    var name= document.getElementById("name").value;
        var email= document.getElementById("email").value;
        var pwd= document.getElementById("passwrd").value;           
        var cpwd= document.getElementById("cpasswrd").value;
		if(name==''){alert('Please enter your name');}
		else if(email==''){alert('Please enter your email');}
		else if(validateEmail(email)==false){alert('Invalid email format');}
		else if(pwd==''){alert('Please enter your password');}
		else if(cpwd==''){alert('Please enter your cpnfirmation password');}
		else if(pwd!=cpwd){alert('Password not matched!');}
		else{alert('Thank you for registeration');}
}

function loginValidation(){
	
        var email= document.getElementById("email").value;
        var pwd= document.getElementById("passwrd").value;           
		else if(email==''){alert('Please enter your email');}
		else if(pwd==''){alert('Please enter your password');}
		
		else{alert('Thank you for logging in, you will be directed to another webpage soon');}
}