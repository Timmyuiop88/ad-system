<?php
//login.php

include("../db_conn.php");
$message = " ";
$message1 = " ";


session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin_a"]) && $_SESSION["loggedin_a"] === true){
  header("location: index.php");
  exit;
}


if(isset($_POST["submit"]))
{
    $sql="SELECT * FROM users WHERE account_type='Admin'&& email='$_POST[email]'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_array($result)) {
				
                
				if(password_verify($_POST["password"], $row["password"]))
				{
                    session_start();
                    $_SESSION["loggedin_a"] = true;
                    $_SESSION["uin_a"] = $row['unique_id'];
                    $_SESSION["id_a"] = $row['id'];
                    $_SESSION["email_a"] = $row['email']; 
                    $_SESSION["first_name_a"] = $row['first_name'];
                    $_SESSION["last_name_a"] = $row['last_name'];
                    $_SESSION["Account_type_a"] = $row['account_type'];


					header("location:index.php");
				}
				else
				{
                    $message = "wrong Password";
                    echo "<script>alert('$message ')
     location.href='login.php'</script>";
        
          
				}
			
			
		
            }
        }
        else{
            $message1 = " Account does not Exist";
            echo "<script>alert('$message1 ')
            location.href='login.php'</script>";
    }
	
        }
        mysqli_close($conn);
?>