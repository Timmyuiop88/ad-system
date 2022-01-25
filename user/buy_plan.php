<?php
session_start();
include("../db_conn.php");
$dat_e = date('d-m-Y');
$id = rand(000000, 999999);
$hin = "H/".$id;

if(isset($_POST["submit"]))
{
    $sql="SELECT * FROM users WHERE unique_id='$_SESSION[uin]'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_array($result)) {

           //do something
           if($row['Balance'] < $_POST['price']){

            echo "<script>alert('insufficient Funds')
            location.href='invest.php'</script>";

           }
           else{

           $newbalance = $row['Balance'] - $_POST['price'];
           $newtotalinvestment = $row['Total_investment'] + $_POST['price'];
         
          
           $planprice = $_POST['total_earnings_per_day'];
           $today = date('Y-m-d');
           $endate = date("Ymd", strtotime($today.'+'.$_POST['duration'].' days'));



                                                        $sql1  = "UPDATE users SET Balance='$newbalance', Total_investment='$newtotalinvestment', current_plan='$_POST[plan_name]', plan_price='$planprice', start_date='$today', end_date='$endate'  WHERE unique_id='$_SESSION[uin]'";

                                                        mysqli_query($conn,$sql1) or die (mysqli_error($conn));
                                                        $num=mysqli_insert_id($conn);
                                                                            if(mysqli_affected_rows($conn)!=1){
                                                                                $message= "Error inserting the application information.";
                                                                                }
                                                                                    
                                                        $result1 = mysqli_query($conn, $sql1);
                                                        
                                                        // if successfully update
                                                        if($result1) {
                                                            echo "<script>alert('purchase Successful')
                                                            location.href='invest.php'</script>";

                                                            $sql7="SELECT * FROM `users` WHERE id='$row[upline]' ";
                                                            $result7 = mysqli_query($conn, $sql7);
                                                            if(mysqli_num_rows($result7)>0){
                                                            while($row7 = mysqli_fetch_array($result7)) {

                                                                $ref_earning = $_POST['price'] * 0.1;
                                                                $new_ref_earning = $row7['ref_earnings'] + $ref_earning;
                                                            if($row['ref_status'] == 'inactive'){

                                                           


                                                                $sql9  = "UPDATE users SET ref_earnings ='$new_ref_earning'  WHERE unique_id='$row7[unique_id]'";

                                                        mysqli_query($conn,$sql9) or die (mysqli_error($conn));
                                                        $num=mysqli_insert_id($conn);
                                                                            if(mysqli_affected_rows($conn)!=1){
                                                                                $message9= "Error inserting the application information.";
                                                                                }
                                                                                    
                                                        $result9 = mysqli_query($conn, $sql9);
                                                        if($result9) {




                                                            $sql1  = "UPDATE users SET ref_status='Active', upline_amount='$ref_earning'  WHERE unique_id='$_SESSION[uin]'";

                                                            mysqli_query($conn,$sql1) or die (mysqli_error($conn));
                                                            $num=mysqli_insert_id($conn);
                                                                                if(mysqli_affected_rows($conn)!=1){
                                                                                    $message= "Error inserting the application information.";
                                                                                    }
                                                                                        
                                                            $result1 = mysqli_query($conn, $sql1);










                                                                            }
                                                                        }






                                                            }
                                                        }
                                                        
                                                    
                                                            
                                                $sql5="INSERT INTO history (hin, unique_id, first_name, last_name, type, price, description, status, dat_e) 
                                                VALUES('$hin', '$_SESSION[uin]', '$row[first_name]', '$row[last_name]', 'investment', '$_POST[price]', 'Purchased new plan', 'Completed', '$dat_e')";
                                                mysqli_query($conn,$sql5) or die (mysqli_error($conn));
                                                $num=mysqli_insert_id($conn);
                                                if(mysqli_affected_rows($conn)!=1){
                                                $message5="error inserting into DB";

                                                }
                                                            }
                                                            else{
                                                                echo "<script>alert('Sorry! Purchase Not Successful!')
                                                            location.href='index.php'</script>";
                                                            }

        




                                                        }  
        

       }
    
    }





}












?>