<?php
include("../db_conn.php");
session_start();
if(!isset($_SESSION['loggedin_a'])){
	echo "<script>alert('You have to login first')
	location.href='login.php'</script>";

 }
 else{


if(isset($_REQUEST['din'])){

    $sql="SELECT * FROM `deposit` WHERE din='$_REQUEST[din]' && status='pending' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_array($result)) {
       
    
    



        $sql2="SELECT * FROM `users` WHERE unique_id='$row[uin]' ";
        $result2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result2)>0){
           while($row2 = mysqli_fetch_array($result2)) {

            $sql4  = "UPDATE deposit SET status='canceled' WHERE din='$_REQUEST[din]'";

            mysqli_query($conn,$sql4) or die (mysqli_error($conn));
            $num4=mysqli_insert_id($conn);
                                if(mysqli_affected_rows($conn)!=1){
                                    $message4= "Error inserting the application information.";
                                    }
                                    
            $result4 = mysqli_query($conn, $sql4);

            // if successfully update2
            if($result4) {

                echo "<script>alert('Successfully cancled')
                                                location.href='pending_deposit.php'</script>";

                    //
                    $sql5  = "UPDATE history SET status='cancled' WHERE hin='$_REQUEST[din]'";

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
    
    
    
    
    
    }}










}



 }


?>