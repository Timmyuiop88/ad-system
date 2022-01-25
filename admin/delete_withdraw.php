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


        $sql4  = "UPDATE withdraw SET status='canceled' WHERE win='$_REQUEST[win]'";

        mysqli_query($conn,$sql4) or die (mysqli_error($conn));
        $num4=mysqli_insert_id($conn);
                            if(mysqli_affected_rows($conn)!=1){
                                $message4= "Error inserting the application information.";
                                }
                                
        $result4 = mysqli_query($conn, $sql4);
        if($result4) {
            echo "<script>alert('successfully Cancelled')
            location.href='pending_withdraw.php'</script>";




            $sql5  = "UPDATE history SET status='cancled' WHERE hin='$_REQUEST[win]'";

                                            mysqli_query($conn,$sql5) or die (mysqli_error($conn));
                                            $num5=mysqli_insert_id($conn);
                                                                if(mysqli_affected_rows($conn)!=1){
                                                                    $message5= "Error inserting the application information.";
                                                                    }
                                                                    
                                            $result5 = mysqli_query($conn, $sql5);

                                            // if successfully update2
                                            if($result5) {
                                                
                                                }
                                                else{
                                                    
                                                }
                                                
        }
        else{
            
        }











       }}








    }



 }
 ?>