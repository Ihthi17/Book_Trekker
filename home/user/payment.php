
    <?php
    include 'config.php';
    session_start();
   if(isset($_POST['phone']) && isset($_POST['address'])&&isset($_POST['total']) )
   {
    $phone = $_POST['phone'];
    $address=$_POST['address'];
    $total= $_POST['total'];

   
    $username = $_SESSION["name"];
    $user_id = $_SESSION["u_id"];
   

     $sql = "SELECT `email` FROM `user` WHERE `u_id`= $user_id";
     $result = $con->query( $sql);
       $row =  $result->num_rows;

       if($row >=0)
       {
        // !get vehicle details from database
         $user_data = $result->fetch_assoc();
         $U_email = $user_data['email'];
         
      
       }


    $amount = $total;
        $merchant_id ="1223327";
        $order_id = uniqid();
        $merchant_secret="MjYyNTQ3OTkyNTMwMzYzNjA4NjUxNTExNjgzNzc3Mjk4NzI1NzQ5MA==";
        $currency ='LKR';
        $hash = strtoupper(
            md5 (
                $merchant_id .
                $order_id .
                number_format($amount,2,'.','') .
                $currency.
                strtoupper(md5($merchant_secret)) 
            ) 
            );
 
            $array;

            $array['total'] = $amount;
            $array['address'] = $address;
            $array['user_name'] = $username;
            $array['user_Mobile'] = $phone;
            $array['user_email'] = $U_email;
            $array['merchant_id'] = $merchant_id;
            $array['order_id'] = $order_id;
            $array['currency'] = $currency;
            $array['hash'] = $hash;
      
            $JSONobj = json_encode($array);
            echo $JSONobj ;

   }
    ?>
