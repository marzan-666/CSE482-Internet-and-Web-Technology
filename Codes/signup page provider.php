
<?php
if (isset($_POST['submit'])) {
include_once "connection.php";

$first_name =$_POST['fstname'];
$last_name =$_POST['lstname'];
$user_name =$_POST['usrnm'];
$email =$_POST['email'];
$retype_pass=$_POST['retypepassword'];
$password =$_POST['psw'];
$gender = $_POST['gen'];
$grocery_name= $_POST['gronme'];
$contact =$_POST['mobilenum'];
$nid= $_POST['nid'];
$location = $_POST['locaton'];
$avaiabl = $_POST['available'];


$tor= "INSERT INTO AUTH_USER(FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD , RETYPEPASSWORD ,GENDER , CONTACT , LOCATION )

VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$user_name."' , '".$password."', '".$retype_pass."' , '".$gender."' ,'".$contact."' , '".$location."')";


$td= "INSERT INTO PROVIDER(NIDNUMBER ,GROCERYNAME, PRODUCTLIST , USER_ID,TIME_FOR_GIVING_ORDER )
VALUES ('".$nid."','".$grocery_name."', '' ,  (SELECT ID FROM AUTH_USER WHERE EMAIL='".$email."'), '".$avaiabl."')";

$sd= "INSERT INTO USER_ROLE(ROLE , USER_ID)
VALUES ('provider' , (SELECT ID FROM AUTH_USER WHERE EMAIL='".$email."'))";

if ($conn->query($tor) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: ";
}
if ($conn->query($td) === TRUE) {
echo "";
} else {
echo "Error: ";
}
if ($conn->query($sd) === TRUE) {
echo "";
} else {
echo "Error: ";
}


$conn->close();
}
?>


<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}

</style>

	
	<body bgcolor="gray">
	<form class="modal-content" action="signup page provider.php" method="post" onsubmit="return validateForm()">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

	<label for="firstname"><b>First Name</b></label>
	<input class="input-field" type="text" placeholder="fast_name" name="fstname">

  	<label for="lastname"><b>Last Name</b></label>
	<input class="input-field" type="text" placeholder="last_name" name="lstname">

	<label for="username"><b>Username</b></label>
	<input class="input-field" type="text" placeholder="username" name="usrnm" id= "username">
	
 	<label for="email"><b>Email</b></label>
     <input type="text" placeholder="Enter Email" name="email" id="email">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="psw" >
		
    <label for="retypepassword"><b>Retype Password</b></label>
	<input class="input-field" type="password" placeholder="Retype Password" id="retypepassword" name="retypepassword" >
	
	<label for="gender"><b>Gender</b></label>
	<input class="input-field" type="text" placeholder="Gender" id="gender" name="gen" >
	
	<label for="Shop Name"><b>Grocery Name</b></label>
	<input class="input-field" type="text" placeholder="Grocoery Name" id="GroceryName" name="gronme">
	
	<label for="gender"><b>Location</b></label>
	<input class="input-field" type="text" placeholder="Location" id="Loctn" name="locaton" >
	
	
	<label for="Shop Name"><b>Availability Time</b></label>
	<input class="input-field" type="text" placeholder="Availability" id="Availability" name="available">
	
	
	<label for="NID NUMBER"><b>NID number</b></label>
	<input class="input-field" type="number" placeholder="NID number" id="NIDNumber" name="nid" maxlength="13"> <br/> <br/>
	
	<label for="mobile number"><b>Mobile Number</b></label>
	<input class="input-field" type="number" placeholder="Mobile number" id="MobileNumber" name="mobilenum" maxlength="13">

    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
	<center>      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
         <button type="submit" class="signupbtn" name= "submit">Sign Up</button>
     </div>
    </div>
  </form>
</div>

<script>

   	function validateForm() {
    var username = document.getElementById("username").value;
    var Email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var RetypePassword = document.getElementById("retypepassword").value;
	var MobileNumber = document.getElementById("MobileNumber").value;
	var NIDNumber = document.getElementById("NIDNumber").value;
	var Available = document.getElementById("Availability").value;
	
    if (username.trim() == "") {
        alert("Username must be filled out");
        return false;
    }
	
	if (NIDNumber.trim() == "") {
        alert("NID number must be filled out");
        return false;
    }
    
    
    if (password.trim() == "") {
        alert("Password must be filled out");
        return false;
    }
	if (RetypePassword.trim() == "") {
        alert("RetypePassword must be filled out");
        return false;
    }
	
	if (MobileNumber.trim() == "") {
        alert("Mobile number must be filled out with digit");
        return false;
    }
	
	if (Available.trim() == "") {
        alert("Availability  must be filled out with digit");
        return false;
    }
	 
	if(password!=RetypePassword ){
	alert('RetypePassword..not matched .')
            return false;
        }
		
		
    else {
       
           return true;
         }
    
   
}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

</script>

</body>
</html>
