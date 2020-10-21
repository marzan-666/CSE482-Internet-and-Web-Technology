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

$sql = "(SELECT D.DONE_ORDER_NUMBER,D.PROVIDER_USER_ID, D.CUSTOMER_USER_ID ,D.PRODUCT, D.GIVEN_ORDER_DATE , A.CONTACT ,A.LOCATION ,A.USERNAME
		FROM DONEORDER AS D ,AUTH_USER AS A WHERE D.CUSTOMER_USER_ID='".$USER_ID."' AND D.PROVIDER_USER_ID=A.ID )";
	
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
		<caption class="title">MY RECEIVED ORDER </caption
		<thead>
			<tr>
			    <th>No</th>
				<th>TOTAL ORDER NUMBER</th>
				<th>PROVIDER USER ID</th>
				<th>CUSTOMER USER ID</th>
				<th>PRODUCT ORDERED</th>
				<th>RECEIVED ORDER DATE</th>
                <th>PROVIDER CONTACT</th>
                <th>PROVIDER LOCATION</th>	
                <th>PROVIDER USERNAME</th>					
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
					<td>'.$row['DONE_ORDER_NUMBER'].'</td>
					<td>'.$row['PROVIDER_USER_ID'].'</td>
					<td>'.$row['CUSTOMER_USER_ID'].'</td>
					<td>'.$row['PRODUCT'].'</td>
					<td>'.$row['GIVEN_ORDER_DATE'].'</td>
					<td>'.$row['CONTACT'].'</td>
					<td>'.$row['LOCATION'].'</td>
					<td>'.$row['USERNAME'].'</td>
					
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
		
</body>
</html>