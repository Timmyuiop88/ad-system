<?php
//login.html

include("db_conn.php");
$message = " ";
$message1 = " ";


session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: user/index.php");
  exit;
}


if(isset($_POST["submit"]))
{
    $sql="SELECT * FROM `users` WHERE email='$_POST[email]' && account_type='user'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_array($result)) {
				
                
				if(password_verify($_POST["password"], $row["password"]))
				{
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["uin"] = $row['unique_id'];
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["email"] = $row['email']; 
                    $_SESSION["first_name"] = $row['first_name'];
                    $_SESSION["last_name"] = $row['last_name'];
                    $_SESSION["Account_type"] = $row['account_type'];


					header("location:user/index.php");
				}
				else
				{
                    $message = "wrong Password";
                    echo "<script>alert('$message ')
     location.href='php'</script>";
        
          
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