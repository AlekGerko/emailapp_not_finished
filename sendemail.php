<?php
$to_email = "sunofhaven@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: sunofhaven@yahoo.com";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}