<?php
session_start();
include("../db_conn.php");
$dat_e = date('d-m-Y');
$id = rand(000000, 999999);
$hin = "D/".$id;

if(isset($_POST["submit"]))
{

    if($_POST['amount'] > $_POST['balance']){
        echo "<script>alert('insufficient Funds')
            location.href='withdraw.php'</script>";


    }
    else{

        $sql="INSERT INTO withdraw (win, uin, first_name, last_name, email, wallet, amount, status) 
        VALUES('$hin', '$_SESSION[uin]', '$_SESSION[first_name]', '$_SESSION[last_name]', '$_SESSION[email]', '$_POST[wallet]', '$_POST[amount]', 'pending Approval')";
mysqli_query($conn,$sql) or die (mysqli_error($conn));
$num=mysqli_insert_id($conn);
if(mysqli_affected_rows($conn)!=1){
	$message="error inserting into DB";

}
 echo "<script> alert('Your withdrawl request was successful')
 location.href='withdraw.php'</script>";

                                        $sql5="INSERT INTO history (hin, unique_id, first_name, last_name, type, price, description, status, dat_e) 
                                        VALUES('$hin', '$_SESSION[uin]', '$_SESSION[first_name]', '$_SESSION[last_name]', 'withdraw', '$_POST[amount]', 'withdraw Funds', 'Pending-Approval', '$dat_e')";
                                        mysqli_query($conn,$sql5) or die (mysqli_error($conn));
                                        $num=mysqli_insert_id($conn);
                                        if(mysqli_affected_rows($conn)!=1){
                                        $message5="error inserting into DB";

                                        }


    }








}





?>