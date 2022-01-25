<?php
                              //username  password   dbname
$conn=new mysqli("localhost", "spectro", "spectro", "rack");
if (mysqli_connect_errno()){
	printf("connect failed: %s\n", mysqli_connect_error());
	exit();

}



$sql5="SELECT * FROM `site`";
$result5 = mysqli_query($conn, $sql5);
if(mysqli_num_rows($result5)>0){
   while($row55 = mysqli_fetch_array($result5)) {

    $site_name = $row55['site_name'];
	$site_mail = $row55['site_mail'];
 
   $site_number = $row55['site_phone'];
   $site_address = $row55['site_address'];
   
	
    






   }}




?>