<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>REGISTRATION</title>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css'
    media="screen" />
    <link href="css/register.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--<link rel="stylesheet" href="../resources/css/register.css">-->
</head>
<body>
    
<?php
// Include config file
include_once "config.php";
 
// Define variables and initialize with empty values
$emailid = $username = $firstname = $lastname =  $password="";

$emailid_err = $username_err = $firstname_err = $lastname_err = $password_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_emailid = trim($_POST["email"]);
    if(empty($input_emailid)){
        $emailid_err = "Please enter an email.";     
    } else{
        $emailid = $input_emailid;
    }
    
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err="Please enter username.";
    }
    else{
        $username=$input_username;
    }
    
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter the first name.";
    
    } else{
        $firstname = $input_firstname;
    }
    
    $input_lastname = ($_POST["lastname"]);
    if(empty($input_lastname)){
        $lastname_err = "Please enter the last name.";     
    } 
     
    else{
        $lastname = $input_lastname;
    }
    
    
    
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter a password.";     
    } else{
        $password = $input_password;
    }
    if(empty($emailid_err) && empty($firstname_err) && empty($lastname_err) && empty($password_err) && empty($username_err)){
        $sql = "SELECT user_id FROM user WHERE email_id = '$emailid'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['user_id'];
      $count = mysqli_num_rows($result);
        if($count!=1){
    $sql = "INSERT INTO user(email_id,username,first_name,last_name,password ) values('$emailid','$username','$firstname','$lastname','$password')";
     if ($db->query($sql) === TRUE) {
     header("location: ulogin.php");
     } else {
     echo "Error: " . $sql . "<br>" . $db->error;
     }
        }
        else {
            
            echo "This mail id is already exist.";
        }
}
    }
?>   
	<!--<div class="container">
	    <h1>Sign Up</h1>
		<form  method="post" action="">
			<div class="form-group">
				<p><label for="id">Email ID</label></p> <input type="email" id="email"
					name="email" placeholder="Enter ID" required="required" >

			</div>
			<div class="form-group">
				<p><label>First Name</label></p> <input type="text" id="firstname"
					name="firstname" placeholder="Enter Name" required="required">

			</div>
			<div class="form-group">
				<p><label>Last Name</label></p> <input type="text" id="lastname"
					name="lastname" placeholder="Enter Name" required="required" >

			</div>
			<div class="form-group">
				<p><label>Password</label></p> <input type="password" id="password"
					name="password" placeholder="Enter Password" required="required">
			</div>
			<div class="form-group">
				<p><label>Confirm Password</label></p> <input type="password"
					class="form-control" id="cpassword" name="confirmpassword"
					placeholder="Confirm Password" >

			</div>

			<div class="form-group">
				<p><input type="submit" value="Register"></p>
			</div>
		</form>
          </div>-->
      <div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--REGISTER FORM-->
<form name="register-form" class="register-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Register Form</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Fill out the form below to login to my super awesome imaginary control panel.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<input name="email" type="email" class="input username"  placeholder="Email ID" required="true"/>
        <input name="username" type="text" class="input username"  placeholder="User Name" onfocus="this.value=''" required="true"/>
    <input name="firstname" type="text" class="input username" placeholder="First Name" onfocus="this.value=''" required="true" />
    <input name="lastname" type="text" class="input username" placeholder="Last Name" onfocus="this.value=''" required="true"/>
    <input name="password" type="password" class="input password" placeholder="Password" onfocus="this.value=''" id="password" required="true"/>
   <input name="confirmpassword" type="password" class="input password" placeholder="Confirm Password" onfocus="this.value=''" required="true" id="cpassword" />
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Register" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--<input type="submit" name="submit" value="Register" class="register" /><!--END REGISTER BUTTON-->
        <div class="register"><a href="ulogin.php">Login</a></div>
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->
<script>
    window.onload = function () {
        var txtPassword = document.getElementById("password");
        var txtConfirmPassword = document.getElementById("cpassword");
        txtPassword.onchange = ConfirmPassword;
        txtConfirmPassword.onkeyup = ConfirmPassword;
        function ConfirmPassword() {
            txtConfirmPassword.setCustomValidity("");
            if (txtPassword.value != txtConfirmPassword.value) {
                txtConfirmPassword.setCustomValidity("Passwords do not match.");
            }
        }
    }
</script>
    </div>
		
  <div class="footer">
  <p>All Right reserve for Rating Zone.<br>
  <a href="mailto:ckant68@gmail.com">ckant68@gmail.com</a></p>
</div>

</body>
</html>