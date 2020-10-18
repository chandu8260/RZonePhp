<html>

<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link href="css/signin.css" rel="stylesheet" type="text/css" />
    <style>
    
    
    body {margin: 0;}

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
    
    
}
    
    
    .toprv a:link{
        text-decoration: none;
    }
    

ul.topnav li {float: left;}

ul.topnav li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
        
ul.topnav li img {
 height: 50px;
 width: 50px;
}

ul.topnav li a:hover:not(.active) {background-color: #fcba03;}

ul.topnav li a.active {background-color: #fcba03;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
    
    </style>
    </head>
    <body>
    <ul class="topnav">
  <li><img src="images/rating.png"></li>
  <li><a  href="#home"><b>Home</b></a></li>
  <li><a href="commondashboard.php"><b>Dashboard</b></a></li>
  <li><a href="#contact"><b>Contact</b></a></li>
  
  <li class="right"><a href="signin.php"><b>Login</b></a></li>
    <li class="right"><a href="registration.php"><b>Register</b></a></li>
</ul>
     <?php
        session_start();
   include("config.php");
    include("query.php");
  
   
   if(isset($_POST['usubmit'])) {
      // username and password sent from form 
      $myemailid = mysqli_real_escape_string($db,$_POST['email']);
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
        
        if(isset($_POST['vsubmit'])){
            
            $vname=mysqli_real_escape_string($db,$_POST['vendor_name']);
            $vmail=mysqli_real_escape_string($db,$_POST['vendor_mail']);
            $vpassword=mysqli_real_escape_string($db,$_POST['vendor_password']);
            $vlogin="SELECT vendor_id FROM vendor WHERE vendor_name='$vname' and vendor_mail='$vmail' and vendor_password='$vpassword'";
            $vresult=mysqli_query($db,$vlogin);
            $vrow= mysqli_fetch_array($vresult,MYSQLI_ASSOC);
            $vactive = $vrow['vendor_id'];
            $vcount = mysqli_num_rows($vresult);
            if($vcount == 1){
            $_SESSION['name'] = $vname;
           // $_SESSION['mail'] = $vmail;
         
           
            }
            else{
               // echo "invalid Username or Password";
                 echo "<script>alert('invalid Username or Password');</script>";
            }
        }
            else {
            $error = "Your Login Name or Password is invalid";
                
            }
        
        if(isset($_SESSION['name'])){
             header("location:vendordashboard.php");
        }
        
?>
    
    
    <div class="container">
  <div class="box">
    <div class="top">
      <p style="">User Signin</p>
    </div>
    <div class="bottom">
     <form id="user" action="" method="post">
        
       <p><input class="form-control" name="email" type="email" class="input username"  placeholder="Email ID" required="true"/></p>
        
    <p><input class="form-control" name="password" type="password" class="input password" placeholder="Password" onfocus="this.value=''" id="password" required="true"/></p>
  
            <input type="submit" name="usubmit" class="btn btn-primary" value="Sign">
         <a href="registration.php">Signup</a>
        
            
      
        
        </form>
    </div>
  </div>
  <div class="box">
    <div class="top">
      <p>Vendor Signin</p>
    </div>
    <div class="bottom">
       <form id="vendor" action="" method="post" enctype="multipart/form-data">
        <p><input type="text" class="form-control" name="vendor_name" placeholder="Vendor Name" required="true"></p>
        <p><input type="text" class="form-control" name="vendor_mail" placeholder="Vendor Mail" required="true"></p>
        
            <p><input type="password" class="form-control" name="vendor_password" placeholder="Password"></p>
            
            <input type="submit" name= "vsubmit" class="btn btn-primary" value="Signin">
           <a href="registration.php">Signup</a>
        
        
        </form>
    </div>
  </div>
 
</div>
      <script>
$('.top').on('click', function() {
	$parent_box = $(this).closest('.box');
	$parent_box.siblings().find('.bottom').slideUp();
	$parent_box.find('.bottom').slideToggle(1000, 'swing');
});
</script>
<div class="footer">
  <p>All Right reserve for Rating Zone.<br>
  <a href="mailto:ckant68@gmail.com">ckant68@gmail.com</a></p>
</div>
    </body>
</html>