<?php

if(isset($_POST["u_email"]) && isset($_POST["u_pass"]) ){
	
	require_once "connect.php";

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8" />
</head>
<body>
<h2>Found user:</h2>
<?php

$u_email = $_POST['u_email'];
$u_pass = $_POST['u_pass'];

$sql = "SELECT * FROM eapp_users WHERE email = '".$u_email."' AND password = '".$u_pass."'";

if($result = mysqli_query($connection, $sql)){
     
    $rowsCount = mysqli_num_rows($result); 

    echo "<table><tr><th>Id</th><th>NAME</th><th>EMAIL</th><th>SEND_UPDATE</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["send_update"] . "</td>";
        echo "</tr>";

    }
    echo "</table>";

    echo "<form action='' method='post'>";
    foreach($result as $row){
        echo "<input type='hidden' name='u_id' value='".$row["id"]."' />";
        echo "<input type='hidden' name='u_su' value='1' />";

    }
    echo "<input type='submit' value='Get updates' />";
    echo "</form>";

    mysqli_free_result($result);
} else{
    echo "eRROR: " . mysqli_error($connection);
}
mysqli_close($connection);
?>
</body>
</html>
<?php

}

else if(isset($_POST["u_id"]) && isset($_POST["u_su"])){
	$u_id = $_POST["u_id"];
	$u_su = $_POST["u_su"];

	require_once "connect.php";

	$sql = "UPDATE eapp_users SET send_update = '$u_su' WHERE id = '$u_id'";

	if($result = mysqli_query($connection, $sql)){
        header("Location: index.php");
    } else{
        echo "Error: " . mysqli_error($connection);
    }
}

?>