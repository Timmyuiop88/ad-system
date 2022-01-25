<?php
include('../db_conn.php');
session_start();
unset($_SESSION["loggedin_a"]);
unset($_SESSION["id_a"]);
unset($_SESSION["email_a"]);
unset($_SESSION["firstname_a"]);
unset($_SESSION["uin_a"]);
unset($_SESSION["last_name_a"]);
unset($_SESSION["Account_type_a"]);

echo "<script>alert('Youve successfully logged out of  $site_name ')
     location.href='login.php'</script>";
        

 






?>