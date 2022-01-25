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
               $newbalance = $row['deposit_price'] + $row2['Balance'];

            $sql1  = "UPDATE users SET balance='$newbalance' WHERE unique_id='$row[uin]'";

mysqli_query($conn,$sql1) or die (mysqli_error($conn));
$num=mysqli_insert_id($conn);
					if(mysqli_affected_rows($conn)!=1){
						$message= "Error inserting the application information.";
						}
						 
$result1 = mysqli_query($conn, $sql1);

// if successfully update
if($result1) {
                                                echo "<script>alert('Successfully Approved')
                                                location.href='pending_deposit.php'</script>";
                                                $sql4  = "UPDATE history SET status='completed' WHERE hin='$_REQUEST[din]'";

                                            mysqli_query($conn,$sql4) or die (mysqli_error($conn));
                                            $num4=mysqli_insert_id($conn);
                                                                if(mysqli_affected_rows($conn)!=1){
                                                                    $message4= "Error inserting the application information.";
                                                                    }
                                                                    
                                            $result4 = mysqli_query($conn, $sql4);

                                            // if successfully update2
                                            if($result4) {
                                                
                                                }
                                                else{
                                                    
                                                }


                                                // un-pend deposit

                                                $sql5  = "UPDATE deposit SET status='completed' WHERE din='$_REQUEST[din]'";

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
		echo "<script>alert('Sorry! Not Successful!')
    location.href='pending_deposit.php'</script>";
                                                $sql5  = "UPDATE history SET status='Failed' WHERE hin='$_REQUEST[din]'";

                                                mysqli_query($conn,$sql5) or die (mysqli_error($conn));
                                                $num4=mysqli_insert_id($conn);
                                                                    if(mysqli_affected_rows($conn)!=1){
                                                                        $message4= "Error inserting the application information.";
                                                                        }
                                                                        
                                                $result4 = mysqli_query($conn, $sql4);

                                                // if successfully failed
                                                if($result4) {
                                                    
                                                    }
                                                    else{
                                                        
                                                    }
//un=pend deposit
                                                    $sql6  = "UPDATE deposit SET status='failed' WHERE din='$_REQUEST[din]'";

                                            mysqli_query($conn,$sql6) or die (mysqli_error($conn));
                                            $num6=mysqli_insert_id($conn);
                                                                if(mysqli_affected_rows($conn)!=1){
                                                                    $message6= "Error inserting the application information.";
                                                                    }
                                                                    
                                            $result6 = mysqli_query($conn, $sql6);

                                            // if successfully update2
                                            if($result6) {
                                                
                                                }
                                                else{
                                                    
                                                }
                                                




	}


        
    
     
    
    
        }
    }







    }
}






}








 }







?>