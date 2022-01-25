<?php
include('../db_conn.php');
$sql="SELECT * FROM `users` ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
   while($row = mysqli_fetch_array($result)) {


    var_dump($row['email']);

   }}



?>