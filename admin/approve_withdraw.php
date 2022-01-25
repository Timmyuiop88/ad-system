<?php
include("../db_conn.php");
session_start();
if(!isset($_SESSION['loggedin_a'])){
	echo "<script>alert('You have to login first')
	location.href='login.php'</script>";

 }
 else{
    if(isset($_REQUEST['win'])){

        $sql="SELECT * FROM `withdraw` WHERE win='$_REQUEST[win]' && status='pending Approval' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
   while($row = mysqli_fetch_array($result)) {


                            $sql2="SELECT * FROM `users` WHERE unique_id='$row[uin]' ";
                            $result2 = mysqli_query($conn, $sql2);
                            if(mysqli_num_rows($result2)>0){
                            while($row2 = mysqli_fetch_array($result2)) {
                                if($row['amount'] > $row2['Total_earnings']){


                                    echo "<script>alert('insufficient Funds')
                                                location.href='pending_withdraw.php'</script>";
                                }
                                else{
                                            $newearnings = $row2['Total_earnings'] - $row['amount'];
                                $sql4  = "UPDATE users SET Total_earnings='$newearnings' WHERE unique_id='$row[uin]'";

                                            mysqli_query($conn,$sql4) or die (mysqli_error($conn));
                                            $num4=mysqli_insert_id($conn);
                                                                if(mysqli_affected_rows($conn)!=1){
                                                                    $message4= "Error inserting the application information.";
                                                                    }
                                                                    
                                            $result4 = mysqli_query($conn, $sql4);

                                            // if successfully update
                                            if($result4) {

                                                 echo "<script>alert('Withdraw Approved')
                                                location.href='pending_withdraw.php'</script>";
                                                $sql6  = "UPDATE history SET status='Approved' WHERE hin='$_REQUEST[win]'";

                                                mysqli_query($conn,$sql6) or die (mysqli_error($conn));
                                                $num6=mysqli_insert_id($conn);
                                                                    if(mysqli_affected_rows($conn)!=1){
                                                                        $message6= "Error inserting the application information.";
                                                                        }
                                                                        
                                                $result6 = mysqli_query($conn, $sql6);
                                                // un-pend withdraw
                                            if($result6) {
                                                $sql8  = "UPDATE withdraw SET status='Approved' WHERE win='$_REQUEST[win]'";

                                                mysqli_query($conn,$sql8) or die (mysqli_error($conn));
                                                $num8=mysqli_insert_id($conn);
                                                                    if(mysqli_affected_rows($conn)!=1){
                                                                        $message8= "Error inserting the application information.";
                                                                        }
                                                                        
                                                $result8 = mysqli_query($conn, $sql8);
                                                // if successfully update2
                                            if($result8) {
                                                
                                            }
                                            else{
                                                
                                            }

                                                





                                                
                                            }
                                            else{
                                                
                                            }







                                                }
                                                else{
                                                    echo "<script>alert('Withdraw Failed')
                                                location.href='pending_withdraw.php'</script>";
                                                }

                                            }



                                



                            }}












   }}










    }












 }

 ?>