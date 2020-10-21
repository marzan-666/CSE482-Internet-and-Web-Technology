<?php

session_start();

if (isset($_POST['submit'])) {
	include_once "connection.php";

$uname=$_POST['username'];
$password=$_POST['psw'];

$sql="SELECT A.ID, R.ROLE FROM USER_ROLE AS R , AUTH_USER AS A  WHERE A.ID=R.USER_ID AND A.EMAIL='".$uname."'AND A.PASSWORD='".$password."'
limit 1";

$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

$result = mysqli_fetch_array($result); // get the result set from the query

$redirect = trim($result['ROLE']); // get the redirect column's value
$user_id = $result['ID']; // get the user_id column's value

if ($redirect == '') 
{echo "No redirect value set";}

elseif ($redirect=="provider"){
	$_SESSION['USER_VALUE'] = $user_id;
	header("Location: After login provider.php");
    
	}


else if($redirect=="customer"){
	$_SESSION['USER_VALUE'] = $user_id;
	header("Location: After login customer.php");
	}

 exit;
}
else 
{ echo "Wrong Username or Password"; } 



ob_end_flush();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #90EE90 ;
  color: black;
}
.topnav .login-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

.topnav .login-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #90EE90;
  color: black;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color:#90EE90 ;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

.topnav .signup-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

.topnav .signup-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #90EE90;
  color: black;
  font-size: 17px;
  border: none;
  cursor: pointer;
  
}

.topnav .signup-container button:hover {
  background-color: #90EE90;
}

@media screen and (max-width: 600px) {
  .topnav .signup-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .signup-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}

</style>
</head>
<body>

<div class="topnav">
  	<a class="active" href="#home">Home</a>
  	<a href="about.html">About</a>

	<div class="login-container">
	<form method="POST" action="index.php">
      	<input type="text" placeholder="Username" name="username">
      	<input type="text" placeholder="Password" name="psw">
		<button type="submit" name="submit">Login</button>
		</form>
	</div>
	
	<div class="signup-container">
	<form method="POST" action="index.php">
	<button type="submit"><a href="signup page provider.php">Signup Provider</a></button>
	<button type="submit"><a href="signup page customer.php">Signup Customer</a></button>
	</form>
	</div>

	
<!-- Slide Show -->
<section>
  <img class="mySlides" src="pic1.jpg" style="width:100%">
  <img class="mySlides" src="pic2.jpg" style="width:100%">
  
</section>

<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

</body>
</html>