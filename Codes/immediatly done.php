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

$ordernumber = $_POST['ordernumber'];


$tow= "INSERT INTO DONEORDER( DONE_ORDER_NUMBER, PROVIDER_USER_ID, CUSTOMER_USER_ID ,PRODUCT, GIVEN_ORDER_DATE)
SELECT ID, PROVIDER_USER_ID, CUSTOMER_USER_ID ,PRODUCT, NOW()
FROM ORDERLIST  WHERE ORDERLIST.ID='".$ordernumber."' AND ORDERLIST.PROVIDER_USER_ID='".$USER_ID."'";
echo $tow;

$tr = "DELETE FROM ORDERLIST WHERE ORDERLIST.ID='".$ordernumber."' AND ORDERLIST.PROVIDER_USER_ID='".$USER_ID."'";
echo $tr;

if ($conn->query($tow) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: ";
}

if ($conn->query($tr) === TRUE) {
echo "New record deleted successfully";
} else {
echo "Error: ";
}
?>