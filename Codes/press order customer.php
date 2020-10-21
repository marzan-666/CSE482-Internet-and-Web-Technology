<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'groceryshop'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

session_start();

if ( isset( $_SESSION['USER_VALUE'] ) ) {
    //echo("USER_ID present\n");
	$USER_ID =$_SESSION['USER_VALUE'];
	//echo $USER_ID;
}

$product = $_POST['product'];

$Puser_id = $_POST['p_userid'];

$tow= "INSERT INTO ORDERLIST(PROVIDER_USER_ID, CUSTOMER_USER_ID ,PRODUCT, GIVEN_ORDER_DATE)

VALUES ('".$Puser_id."', '".$USER_ID."' , '".$product."', NOW())";

if ($conn->query($tow) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: ";
}
?>
