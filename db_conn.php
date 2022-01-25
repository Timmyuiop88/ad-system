<?php
                              //username  password   dbname
$conn=new mysqli("localhost", "spectro", "spectro", "swift");
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
   $site_wallet = $row55['wallet'];
   $site_number = $row55['phone_number'];
   $site_address = $row55['address'];
   $url = $row55['url'];
   $chat_code = $row55['chat_code'];
      $free_price = 5;
	
    






   }}


?>