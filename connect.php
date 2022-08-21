<?php

$connection = new mysqli("sql108.epizy.com", "epiz_27518265", "1GogFnQ1AkJCbUf", "epiz_27518265_emailapp");
if($connection->connect_error){
    die("Error: " . $connection->connect_error);
}

?>

