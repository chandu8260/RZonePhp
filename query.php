<?php 
include("config.php");
$aresult= mysqli_query($db, "select service_name,avg(rate),review,user from ratings where service_name='Amazon'");
    $arate =mysqli_query($db,"select format(avg(rate),1) as avg_rate from ratings where service_name='Amazon'");
    $areview = mysqli_query($db,"select count(review) as a_review from ratings where service_name='Amazon' ");
$fresult=mysqli_query($db, "select service_name,avg(rate),review,user from ratings where service_name='Flipkart'");
$frate =mysqli_query($db,"select format(avg(rate),1) as avg_rate from ratings where service_name='Flipkart'");
$freview = mysqli_query($db,"select count(review) as f_review from ratings where service_name='Flipkart' ");
$mresult= mysqli_query($db, "select service_name,avg(rate),review,user from ratings where service_name='Motorola'");
    $mrate =mysqli_query($db,"select format(avg(rate),1) as avg_rate from ratings where service_name='Motorola'");
    $mreview = mysqli_query($db,"select count(review) as m_review from ratings where service_name='Motorola'");
$search = mysqli_query($db,"select format(avg(rate),1) as avg_rate, review from ratings where service_name='' and location =''");

?>