<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .tb{
            display: none;
        }
    </style>
    </head>

<body>
    <a href="logout.php">Logout</a>
<?php
session_start();
if(isset($_SESSION['name'])){


    
   include_once("config.php");
   
    $vmail="support@amazon.com";
    $vname=mysqli_query($db,"select vendor_name from vendor where vendor_mail='$vmail'");
    //$d=mysqli_fetch_array($vname,MYSQLI_ASSOC);
   // echo $d;
    $vdashboard=mysqli_query($db,"select * from ratings where service_name='".mysqli_fetch_array($vname)['vendor_name']."'");   

    
     echo "<p>Service:".mysqli_fetch_array($vdashboard)['service_name']."</p>";
     
     /*while($user_data = mysqli_fetch_array($vdashboard)) {
     //echo "<p>Service:     ".$user_data['service_name']."</p>";
     
     //echo  "<p>Rate:       ".$user_data['rate']."</p>";
      echo  "<p>Review:     ".$user_data['review']."</p>";
      echo "<p>User:        ".$user_data['user']."</p>";
      //echo "<a href=\"edit.php?id=$user_data[rating_id]\">Reply</a>";
         echo "<form action='' method='post'>";
      echo"<input type='text'/>";
         echo "<input type='submit' name='re'/>";
        echo "</form>";
      echo "<hr>";*/
         
         
        
    //}
     
   
    

  
}
    else echo "<h1>Please login first .</h1>";
    
    
    
    ?>
    
 <?php
    
     while($user_data = mysqli_fetch_array($vdashboard)) {
    
    
    ?>
    
   
    
    <form action="" method="post">
    <?php echo $user_data['user']; ?><p><?php echo $user_data['review']; ?></p>
        
       Reply: <p style="color:blue;"><?php echo $user_data['reply']; ?></p>
        <input type="hidden" name="idd" value="<?php echo $user_data['rating_id']; ?> ">
    <input type="text" name="repl"/>
    <input type="submit" name="re" value="Reply">
    <hr>
    </form>
    
    
       <?php
         
     }
   
     ?>
    <?php 
         
         
          if(isset($_POST["re"])) {
         $vreply = mysqli_real_escape_string($db,$_POST['repl']);
        
         $id = mysqli_real_escape_string($db,$_POST['idd']);
            mysqli_query($db, "UPDATE ratings SET reply='$vreply' WHERE rating_id=$id");
         //$reup=mysqli_query($db, "UPDATE ratings SET reply=$vreply WHERE service_name=$srn and review=$rvi and user=$ur");
        
        
    }
    
    
    ?>
    

 <!-- <script>
$(document).ready(function(){
  $(".re").click(function(){
    $(".tb").show();
  });
});
</script>-->
    
</body>
</html>