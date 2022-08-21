<?php
    require_once "connect.php";

    $sql = "SELECT * FROM eapp_users WHERE send_update = 1";

    if($result = mysqli_query($connection, $sql)){
         
        $rowsCount = mysqli_num_rows($result); 

        foreach($result as $row){

            $to      = $row["email"];
            $subject = 'the subject';
            $message = 'hello';
            $headers = 'From: no-reaply@emailapp.com'       . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();

            if(mail($to, $subject, $message, $headers)) {
                echo "email send";
            }

        }

        mysqli_free_result($result);
    } else{
        echo "eRROR: " . mysqli_error($connection);
    }
    mysqli_close($connection);
?>