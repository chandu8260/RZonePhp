<html>
    <head>
    <link rel="stylesheet" href="./css/rating.css">
<link rel="stylesheet"
	href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style type="text/css">
    body {margin: 0;}

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #e1eaea;
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
<title>Rating</title>
    </head>
<body>
    <?php
session_start();
    if($_SESSION["login_user"]) {
 #echo $_SESSION["login_user"]; 
      ?>                           
    <!--<a href="logout.php" tite="Logout">   Logout </a>-->
       <?php
}
    else{
        echo "<h1>Please login first .</h1>";
        header("location: index.php");
        } 
    ?>
    
 <?php
// Include config file
include_once "config.php";
 
// Define variables and initialize with empty values
$servicename = "";
$rate =[];
$review = "";
$user="";
$service_err = $review_err = $rate_err = $user_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_servicename = trim($_POST["serviceProvider"]);
    if(empty($input_servicename)){
        $name_err = "Please enter a serveice.";
    } elseif(!filter_var($input_servicename, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $service_err = "Please enter a valid service.";
    } else{
        $servicename = $input_servicename;
    }
    
    $input_rate = ($_POST["star"]);
    if(empty($input_rate)){
        $rate_err = "Please enter the rate amount.";     
    } 
     
    else{
        $rate = $input_rate;
    }
    
    $input_review = trim($_POST["review"]);
    if(empty($input_review)){
        $review_err = "Please enter a review.";     
    } else{
        $review = $input_review;
    }
    
    $input_user = $_SESSION["login_user"];
    if(empty($input_user)){
        $user_err = "Please login first";
        }
    else{
        $user = $input_user;
        }
      $sql1 = "SELECT rating_id FROM ratings WHERE service_name = '$servicename' and user = '$user'";
      $result1 = mysqli_query($db,$sql1);
      $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
      $active1 = $row1['rating_id'];
      $count1 = mysqli_num_rows($result1);
    
    
    
    // Check input errors before inserting in database
    if($count1!=1){
    if(empty($service_err) && empty($rate_err) && empty($review_err)&& empty($user_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO ratings (service_name, rate, review,user) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($db, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_service, $param_rate, $param_review, $param_user);
            
            // Set parameters
            $param_service = $servicename;
            $param_rate = $rate;
            $param_review = $review;
            $param_user = $user;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: rating.php");
                exit();
            } else{
                echo "Something went wrong.Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    }
    else{
        $sql2="UPDATE ratings SET rate='$rate',review='$review' WHERE service_name='$servicename' and user='$user'";
        mysqli_query($db, $sql2);
        
        }
        
    
    // Close connection
    mysqli_close($db);
    }
?>   
    
   <ul class="topnav">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="edashboard.php">My Ratings</a></li>
  <li><a href="#contact">Contact</a></li>
  <li class="right">hi <?php echo $_SESSION["login_user"]; ?></li>
  <li class="right"><a href="logout.php">Logout</a></li>
       
</ul>
   <div class="stars">
		<form method="post" action="">
           
			<div class="sp">
				<label>Service Provider Url<label>      Ex:xyz.com</label></label> <input type="text"
					name="serviceProvider" required="required">
			</div>
            
			<input class="star star-5" id="star-5" type="radio" name="star"
				value="5" /> <label class="star star-5" for="star-5"></label> <input
				class="star star-4" id="star-4" type="radio" name="star" value="4" />
			<label class="star star-4" for="star-4"></label> <input
				class="star star-3" id="star-3" type="radio" name="star" value="3" />
			<label class="star star-3" for="star-3"></label> <input
				class="star star-2" id="star-2" type="radio" name="star" value="2" />
			<label class="star star-2" for="star-2"></label> <input
				class="star star-1" id="star-1" type="radio" name="star" value="1" />
			<label class="star star-1" for="star-1"></label>

			<div class="rv">
				<label>Review</label> <input type="text" name="review">
			</div>

			<p>
				<input type="submit" value="Submit">
			</p>

		</form>

		<script>
			
		</script>

	</div>
   
    
    </body>
</html>