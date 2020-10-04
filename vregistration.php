

<html>
<head></head>
    <body>
    <?php  

include_once("config.php");


$vservice = $vlocation = $vmail = $vpassword= $target_dir=$target_file=$uploadOk=$imageFileType="";

$vservice_err = $vlocation_err = $vmail_err = $vpassword_err = $vlogo_err= "";

    //Vendor Registration    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_vservice = trim($_POST["vendor_name"]);
    if(empty($input_vservice)){
        $vservice_err = "Please enter a Vendor_Name.";     
    } else{
        $vservice = $input_vservice;
    }
    
    $input_vlocation = trim($_POST["vendor_location"]);
    if(empty($input_vlocation)){
        $vlocation_err="Please enter location.";
    }
    else{
        $vlocation=$input_vlocation;
    }
    
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
      $vsql = "SELECT vendor_id FROM vendor WHERE vendor_mail = '$vmail'";
      $vresult = mysqli_query($db,$vsql);
      $vrow = mysqli_fetch_array($vresult,MYSQLI_ASSOC);
      $vactive = $vrow['vendor_id'];
      $vcount = mysqli_num_rows($vresult);
    
    $vsql = "INSERT INTO vendor(vendor_name,vendor_location,vendor_mail,vendor_password,vendor_logo )values('$vservice','$vlocation','$vmail','$vpassword','$img')";
     if ($db->query($vsql) === TRUE) {
     header("location: vregistration.php");
     } else {
     echo "Error: " . $vsql . "<br>" . $db->error;
     }
        }
        else {
            
            echo "This mail id is already exist.";
        }
}
    
    
?>
    
    
     <form id="vendor" action="" method="post"  enctype="multipart/form-data">
        <p><input type="text" class="form-control" name="vendor_name" placeholder="Service Name" required="true"></p>
        <p><input type="text" class="form-control" name="vendor_location" placeholder="Location" required="true"></p>
         <p><input type="text" class="form-control" name="vendor_mail" placeholder=" Email" required="true"></p>
            <p><input type="password" class="form-control" name="vendor_password" placeholder="Password"></p>
            <p><input type="password" class="form-control" name="vendor_cpasssword" placeholder="Confirm Password"></p>
            <p><label>Upload Company Logo</label></p>
            <p><input type="file" id="img" name="logo" accept="image/*" ></p>
            <input type="submit" class="btn btn-primary" value="Register">
           <a href="ulogin.php">Login</a>
        
        
        </form>
    </body>
</html>
