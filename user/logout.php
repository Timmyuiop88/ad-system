<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["firstname"]);
unset($_SESSION["uin"]);
unset($_SESSION["last_name"]);
unset($_SESSION["Account_type"]);

echo "<script>alert('Youve successfully logged out of Invest')
     location.href='../login.php'</script>";
        

 

?>