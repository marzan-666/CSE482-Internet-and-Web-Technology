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

$sql = "(SELECT O.ID, O.PROVIDER_USER_ID, O.CUSTOMER_USER_ID ,O.PRODUCT, O.GIVEN_ORDER_DATE ,U.USERNAME, U.CONTACT, U.LOCATION
		FROM ORDERLIST AS O, AUTH_USER AS U WHERE O.PROVIDER_USER_ID='".$USER_ID."' AND O.CUSTOMER_USER_ID = U.ID)";

		
	
$query = mysqli_query($conn, $sql);


if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>


<html>
<head>
	<title>DISPLAYING RUNNING ORDER</title>
	<link rel="stylesheet" type="text/css" href="styleTable.css">
	
</head>

<body>
<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">MY RUNNING ORDER </caption
		<thead>
			<tr>
			    <th>No</th>
				<th>TOTAL ORDER NUMBER</th>
				<th>PROVIDER USER ID</th>
				<th>CUSTOMER USER ID</th>
				<th>PRODUCT ORDERED</th>
				<th>GIVEN ORDER DATE BY CUSTOMER</th>	
				<th>CUSTOMER USERNAME</th>
				<th>CUSTOMER LOCATION</th>
				<th>CUSTOMER CONTACT</th>
				
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			$amount  = $row['PRODUCT'] == 0 ? '' : number_format($row['amount']);
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['ID'].'</td>
					<td>'.$row['PROVIDER_USER_ID'].'</td>
					<td>'.$row['CUSTOMER_USER_ID'].'</td>
					<td>'.$row['PRODUCT'].'</td>
					<td>'.$row['GIVEN_ORDER_DATE'].'</td>
					<td>'.$row['USERNAME'].'</td>
					<td>'.$row['LOCATION'].'</td>
					<td>'.$row['CONTACT'].'</td>
					
					
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
		
</body>
</html>