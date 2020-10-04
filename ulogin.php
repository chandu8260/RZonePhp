<html>
<head>
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="css/login.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<!--<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>-->
    
</head>
<body>
    <?php
   include("config.php");
    include("query.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myemailid = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $login = "SELECT user_id FROM user WHERE email_id = '$myemailid' and password = '$mypassword'";
      $result = mysqli_query($db,$login);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['user_id'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         #session_register("myemailid")="something";
         $_SESSION['login_user'] = $myemailid;
         
         header("location: rating.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
    
    <!--<div class="container">
        
        <div class="login">
             <form action = "" method = "post">
    <label>UesrName</label>:<input type="text" name="username"><br>
    <label>Password</label>:<input type="password" name="password"><br>
                 <a href="register.php">Register</a>
    <input type="submit">
            </form>
            </div>
    </div>-->
    
   <div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Login Form</h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Fill out the form below to login to my super awesome imaginary control panel.</span><!--END DESCRIPTION-->
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="username" type="text" class="input username" value="EmailID" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Login" class="button" /><!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--<input type="submit" name="submit" value="Register" class="register" /><!--END REGISTER BUTTON-->
        <div class="register"><a href="registration.php">Register</a></div>
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

    
</body>
</html>