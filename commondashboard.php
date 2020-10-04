<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/commondashboard.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {margin: 0;}

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #e1eaea;
    
    
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

ul.topnav li a:hover:not(.active) {background-color: #ffff80;}

ul.topnav li a.active {background-color: #ffff80;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
    
    
</head>
    <?php 
    include("config.php");
    include("query.php");
  
    ?>
    
<body>

<ul class="topnav">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#contact">Contact</a></li>
  <li class="right"><a href="signin.php">Login</a></li>
    <li class="right"><a href="registration.php">Register</a></li>
</ul>

<div style="padding:0 16px;">
  
</div>
                           
                           
<div class="searchbox">
       
    <form action="/action_page.php">
   
        <input type="text"  placeholder="Company,Service" name="service" >
      
        <input type="text"  placeholder="Place,City" name="location">
       
     
        <button class="btn btn-default" type="submit">Find</button>
      
   
  </form>
    </div>                           
     <div class="content">
  <?php
        
        echo"<button class='button1'>";
      
        echo "<img src='./images/company.png' alt='comp_logo'>".mysqli_fetch_array($aresult)['service_name'];
        echo "<p class='ratep'>".mysqli_fetch_array($arate)['avg_rate']."</p>";
        echo "<p>Review:   ".mysqli_fetch_array($areview)['a_review']."</p>";                   
        echo"</button>";   
    
    
         echo"<button class='button1'>";
      
        echo "<img src='./images/company.png' alt='comp_logo'>".mysqli_fetch_array($fresult)['service_name'];
        echo "<p class='ratep'>".mysqli_fetch_array($frate)['avg_rate']."</p>";
        echo "<p>Review:   ".mysqli_fetch_array($freview)['f_review']."</p>";                   
        echo"</button>";   
       
    
        echo"<button class='button1'>";
      
        echo "<img src='./images/company.png' alt='comp_logo'>".mysqli_fetch_array($mresult)['service_name'];
        echo "<p class='ratep'>".mysqli_fetch_array($mrate)['avg_rate']."</p>";
        echo "<p>Review:   ".mysqli_fetch_array($mreview)['m_review']."</p>";                   
        echo"</button>";   
       
    
    ?>
    
   
   
    
    
    </div>
    
<div class="footer">
  <p>All Right reserve for Rating Zone.<br>
  <a href="mailto:ckant68@gmail.com">ckant68@gmail.com</a></p>
</div>

</body>
</html>
