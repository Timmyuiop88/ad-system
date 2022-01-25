<?php
include('db_conn.php');



if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone'];
    $wallet = $_POST['wallet'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $upline = 1;
    $email_code = uniqid();
    $rawpassword = $_POST['password'];
    $password = password_hash($rawpassword, PASSWORD_DEFAULT);
    $rawid = rand(0000 , 9999);
    $uin = "KRY/".$rawid;
   
    $check=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
    $checkrows=mysqli_num_rows($check);
    if($checkrows>0){
    echo "<script> alert('Email is used by another user')
    location.href='signup.php'</script>";	
    }
    else{
   

        $sql="INSERT INTO users (unique_id, first_name, last_name, phone_number, wallet, country, email, password, account_type, upline, ref_status, plan_price, email_code) VALUES('$uin', '$firstname', '$lastname', '$phone_number', '$wallet', '$country', '$email', '$password', 'user', '$upline', 'inactive', '$free_price', '$email_code')";
        mysqli_query($conn,$sql) or die (mysqli_error($conn));
        $num=mysqli_insert_id($conn);
        if(mysqli_affected_rows($conn)!=1){
            $message="error inserting into DB";
    
    }
     


	
	    echo "<script>alert('registration successful  ')
     location.href='login.php'</script>";
	
	

        
        
        
        
    
        
    

  }
    


}









?>