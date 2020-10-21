<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'groceryshop'; // Databas
$speciality ;
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$locatin=$_POST['location'];

$sql = "(SELECT A.FIRSTNAME, A.LASTNAME, A.USERNAME, A.EMAIL, A.GENDER, A.ID, A.CONTACT , A.LOCATION, P.GROCERYNAME ,P.PRODUCTLIST, P.NIDNUMBER, P.TIME_FOR_GIVING_ORDER 
		FROM PROVIDER AS P, AUTH_USER AS A  WHERE A.LOCATION ='".$locatin."' AND P.USER_ID =A.ID)";

	
$query = mysqli_query($conn, $sql);


if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}


?>


<html>
<head>
	<title>DISPLAYING PROVIDER INFORMATION</title>
	<link rel="stylesheet" type="text/css" href="styleTable.css">
	
</head>

<body>
<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">PROVIDER INFO ACCORDING SEARCHED LOCATION </caption
		<thead>
			<tr>
			    <th>No</th>
				<th>PROVIDER USER ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>User name</th>
				<th>Gender</th>
				<th>Email</th>
				<th>NID</th>
				<th>Contact</th>
				<th>Location</th>
				<th>Product List</th>
				<th>Grocery Name</th>
				<th>Appointment time</th>
				
				
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			$amount  = $row['FIRSTNAME'] == 0 ? '' : number_format($row['amount']);
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['ID'].'</td>
					<td>'.$row['FIRSTNAME'].'</td>
					<td>'.$row['LASTNAME'].'</td>
					<td>'.$row['USERNAME'].'</td>
					<td>'.$row['GENDER'].'</td>
					<td>'.$row['EMAIL'].'</td>
					<td>'.$row['NIDNUMBER'].'</td>
					<td>'.$row['CONTACT'].'</td>
					<td>'.$row['LOCATION'].'</td>
					<td>'.$row['PRODUCTLIST'].'</td>
					<td>'.$row['GROCERYNAME'].'</td>
					<td>'.$row['TIME_FOR_GIVING_ORDER'].'</td>
					
					
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
		
</body>
</html>