<?php
include("../db_conn.php");
session_start();
$id = rand(000000, 999999);
$hin = "H/".$id;
$dat_e = date('d-m-Y');
if(!isset($_SESSION['loggedin'])){
	echo "<script>alert('You have to login first')
	location.href='../login.php'</script>";

 }
 else{
    if(!isset($_REQUEST['ad_id'])){
        header("location: ads.php");
     }
     else{


        $sql="SELECT * FROM `shared` WHERE ain='$_REQUEST[ad_id]' && uin='$_SESSION[uin]'  ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
           
            echo "<script>alert('Reward has already been claimed by user')
	location.href='ads.php'</script>";






           }
           else{


            $sql="SELECT * FROM users WHERE unique_id='$_SESSION[uin]'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
               while($row = mysqli_fetch_array($result)) {

                $old_balance = $row['Total_earnings'];

                $ad = $row['plan_price'];

                $new_balance = $old_balance + $ad;

                $sql1  = "UPDATE users SET Total_earnings='$new_balance' WHERE unique_id='$_SESSION[uin]'";

                mysqli_query($conn,$sql1) or die (mysqli_error($conn));
                $num=mysqli_insert_id($conn);
                                    if(mysqli_affected_rows($conn)!=1){
                                        $message= "Error inserting the application information.";
                                        }
                                            
                $result1 = mysqli_query($conn, $sql1);
                
                // if successfully update
                if($result1) {
                    echo "<script>alert('claim Successful')
                    location.href='ads.php'</script>";


                    $sql5="INSERT INTO history (hin, unique_id, first_name, last_name, type, price, description, status, dat_e) 
                    VALUES('$hin', '$_SESSION[uin]', '$row[first_name]', '$row[last_name]', 'Ad reward', '$ad', 'Claimed Ad reward', 'Completed', '$dat_e')";
                    mysqli_query($conn,$sql5) or die (mysqli_error($conn));
                    $num=mysqli_insert_id($conn);
                    if(mysqli_affected_rows($conn)!=1){
                    $message5="error inserting into DB";

                    }


                    $sql6="INSERT INTO shared (ain, uin, status) 
                    VALUES('$_REQUEST[ad_id]', '$_SESSION[uin]', 'Completed')";
                    mysqli_query($conn,$sql6) or die (mysqli_error($conn));
                    $num6=mysqli_insert_id($conn);
                    if(mysqli_affected_rows($conn)!=1){
                    $message6="error inserting into DB";

                    }



                }







               }}





           }











     }







 }


?>