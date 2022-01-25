<?php
include("../db_conn.php");
session_start();
$id = rand(000000, 999999);
$din = "D/".$id;
$id2 = rand(000, 999);
$hin = "H/".$id2;
$today = date("d-m-Y");
if(isset($_POST["submit"]))
{

$passport=$_FILES["data"]['name'];
$target="proof/";
$target=$target.$_FILES["data"]["name"];
    if (move_uploaded_file($_FILES["data"]['tmp_name'],$target)>0){



        $sql="INSERT INTO deposit (din, uin, first_name, last_name, email, deposit_price, payment_method, proof, status) 
        VALUES('$din', '$_SESSION[uin]', '$_SESSION[first_name]', '$_SESSION[last_name]', '$_SESSION[email]', '$_POST[amount]', '$_POST[method]', '$passport', 'pending')";
mysqli_query($conn,$sql) or die (mysqli_error($conn));
$num=mysqli_insert_id($conn);
if(mysqli_affected_rows($conn)!=1){
	$message="error inserting into DB";

}
 echo "<script> alert('Your deposit was successful')
 location.href='index.php'</script>";
                                                $sql5="INSERT INTO history (hin, unique_id, first_name, last_name, type, price, description, status, dat_e) 
                                                VALUES('$din', '$_SESSION[uin]', '$_SESSION[first_name]', '$_SESSION[last_name]', 'deposit', '$_POST[amount]', 'Deposit Funds', 'Pending-Approval', '$today')";
                                                mysqli_query($conn,$sql5) or die (mysqli_error($conn));
                                                $num=mysqli_insert_id($conn);
                                                if(mysqli_affected_rows($conn)!=1){
                                                $message5="error inserting into DB";

                                                }






    }











}
?>