<?php
session_start();
include("../db_conn.php");


if(isset($_POST["submit"]))
{
    if($_POST['amount'] > $_POST['balance']){
        echo "<script>alert('insufficient Funds')
            location.href='ref_withdraw.php'</script>";


    }
    else{

       

 
$sql="SELECT * FROM `users` WHERE unique_id = '$_SESSION[uin]' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
   while($row = mysqli_fetch_array($result)) {


    $new_balance = $row['Total_earnings'] + $_POST['amount'];
    $new_ref_earn = $row['ref_earnings'] -  $_POST['amount'];

    $sql1  = "UPDATE users SET Total_earnings='$new_balance', ref_earnings='$new_ref_earn' WHERE unique_id='$_SESSION[uin]'";

    mysqli_query($conn,$sql1) or die (mysqli_error($conn));
    $num=mysqli_insert_id($conn);
                        if(mysqli_affected_rows($conn)!=1){
                            $message= "Error inserting the application information.";
                            }
                                
    $result1 = mysqli_query($conn, $sql1);
    
    // if successfully update
    if($result1) {

        echo "<script>alert('You have sucessfully transfered $".$_POST['amount']." to your earnings balance ')
        location.href='index.php'</script>";


    }



    
}
}






    }






}


