<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link href="css/registration.css" rel="stylesheet" type="text/css" />
    
    <style>
        #user{}
 
    </style>
    </head>
    <body>
<?php
// Include config file
include_once "config.php";

 
// Define variables and initialize with empty values
$emailid = $username = $firstname = $lastname =  $password= "";

$emailid_err = $username_err = $firstname_err = $lastname_err = $password_err= "";
 
//User Registration    
if(isset($_POST['usubmit'])){
    
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
     header("location: signin.php");
     } else {
     echo "Error: " . $sql . "<br>" . $db->error;
     }
        }
        else {
            
            echo "This mail id is already exist.";
        }
}
    }
        
        
$vservice  = $vmail = $vpassword= $vlogo="";

$vservice_err = $vlocation_err = $vmail_err = $vpassword_err = $vlogo_err= "";

    //Vendor Registration    
    if(isset($_POST['vsubmit'])){
    
    $input_vservice = trim($_POST["vendor_name"]);
    if(empty($input_vservice)){
        $vservice_err = "Please enter a Vendor_Name.";     
    } else{
        $vservice = $input_vservice;
    }
    
    /*$input_vlocation = trim($_POST["vendor_location"]);
    if(empty($input_vlocation)){
        $vlocation_err="Please enter location.";
    }
    else{
        $vlocation=$input_vlocation;
    }*/
    
    $input_vmail = trim($_POST["vendor_mail"]);
    if(empty($input_vmail)){
        $vmail_err = "Please enter a mail.";
    
    } else{
        $vmail = $input_vmail;
    }
    
    $input_vpassword = ($_POST["vendor_password"]);
    if(empty($input_vpassword)){
        $vpassword_err = "Please enter the last name.";     
    } 
     
    else{
        $vpassword = $input_vpassword;
    }
    
  if(!empty($_FILES["logo"]["name"])){
        
      $img=time().'_'.$_FILES['logo']['name'];
      $target = 'logos/'.$img;
      move_uploaded_file($_FILES['logo']['tmp_name'],$target);

        
    }
        
    
    
  
    if(empty($vservice_err) && empty($vlocation_err) && empty($vmail_err) && empty($vpassword_err) && empty($vlogo_err)){
        $sql = "SELECT vendor_id FROM vendor WHERE vendor_name = '$vservice'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['user_id'];
      $count = mysqli_num_rows($result);
        if($count!=1){
      $vsql = "SELECT vendor_id FROM vendor WHERE vendor_mail = '$vmail'";
      $vresult = mysqli_query($db,$vsql);
      $vrow = mysqli_fetch_array($vresult,MYSQLI_ASSOC);
      $vactive = $vrow['vendor_id'];
      $vcount = mysqli_num_rows($vresult);
    
    $vsql = "INSERT INTO vendor(vendor_name,vendor_mail,vendor_password,vendor_logo )values('$vservice','$vmail','$vpassword','$img')";
     if ($db->query($vsql) === TRUE) {
     header("location: signin.php");
     } else {
     echo "Error: " . $vsql . "<br>" . $db->error;
     }
        }
        else {
            
            echo "This mail id is already exist.";
        }
    }
}
        

?> 
        <div class="container">
  <div class="box">
    <div class="top">
      <p style="">User SignUp</p>
    </div>
    <div class="bottom">
     <form id="user" action="" method="post">
        
       <p><input class="form-control" name="email" type="email" class="input username"  placeholder="Email ID" required="true"/></p>
        <p><input class="form-control" name="username" type="text" class="input username"  placeholder="User Name" onfocus="this.value=''" required="true"/></p>
   <p> <input class="form-control" name="firstname" type="text" class="input username" placeholder="First Name" onfocus="this.value=''" required="true" /></p>
    <p><input class="form-control" name="lastname" type="text" class="input username" placeholder="Last Name" onfocus="this.value=''" required="true"/></p>
    <p><input class="form-control" name="password" type="password" class="input password" placeholder="Password" onfocus="this.value=''" id="password" required="true"/></p>
   <p><input class="form-control" name="confirmpassword" type="password" class="input password" placeholder="Confirm Password" onfocus="this.value=''" required="true" id="cpassword" /></p>
            <input type="submit" name="usubmit" class="btn btn-primary" value="Register">
         <a href="signin.php">Login</a>
        
            
      
        
        </form>
    </div>
  </div>
  <div class="box">
    <div class="top">
      <p>Vendor SignUp</p>
    </div>
    <div class="bottom">
       <form id="vendor" action="" method="post" enctype="multipart/form-data" onsubmit="return validate();">
        <p><input type="text" class="form-control" name="vendor_name" placeholder="Service Name" required="true"></p>
        <!--<p><input type="text" class="form-control" name="vendor_location" placeholder="Location" required="true"></p>-->
         <p><input type="text" class="form-control" name="vendor_mail" placeholder=" Email" required="true"></p>
            <p><input type="password" class="form-control" name="vendor_password" placeholder="Password"></p>
            <p><input type="password" class="form-control" name="vendor_cpasssword" placeholder="Confirm Password"></p>
            <p><label>Upload Company Logo</label></p>
            <p><input type="file" id="img" name="logo" accept="image/*" ></p>
            <input type="submit" name= "vsubmit" class="btn btn-primary" value="Register">
           <a href="signin.php">Login</a>
        
        
        </form>
    </div>
  </div>
 
</div>
    <div class="footer">
  <p>All Right reserve for Rating Zone.<br>
  <a href="mailto:ckant68@gmail.com">ckant68@gmail.com</a></p>
</div>
   
    
    <script>
$('.top').on('click', function() {
	$parent_box = $(this).closest('.box');
	$parent_box.siblings().find('.bottom').slideUp();
	$parent_box.find('.bottom').slideToggle(1000, 'swing');
});
</script>
    
  <script>
        
        function validate() {
	
	var file_size = $('#img')[0].files[0].size;
	if(file_size>100000) {
		
         alert("Large file!");
		return false;
	} 
	return true;
}
  </script>
    

    </body>



</html>