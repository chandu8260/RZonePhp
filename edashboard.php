<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/dashboard.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

ul.topnav li a:hover:not(.active) {background-color: #fcba03;}

ul.topnav li a.active {background-color: #fcba03;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
    
    
</head>
    <?php 
    include("config.php");
    session_start();
    $mailid=$_SESSION["login_user"];
    $result = mysqli_query($db, "SELECT * FROM ratings where user='$mailid'");
    ?>
    
    
    
<body>

<ul class="topnav">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#contact">Contact</a></li>
  <li class="right"><a href="logout.php">Logout</a></li>
</ul>

<div style="padding:0 16px;">
  
</div>
    
   
    <?php
    while($user_data = mysqli_fetch_array($result)) {
      
      echo "<p>Service:     ".$user_data['service_name']."</p>";
      echo  "<p>Rate:   ".$user_data['rate']."</p>";
      echo  "<p>Review:     ".$user_data['review']."</p>";
      echo "<hr>";
        
    }
    ?>
   
    
<footer>
  <p>Author: Hege Refsnes<br>
  <a href="mailto:hege@example.com">hege@example.com</a></p>
</footer>

</body>
</html>
