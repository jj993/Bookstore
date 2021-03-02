<?php
session_start();	
if (isset($_GET['name'])) {
    $_SESSION['name'] = $_GET['name'];
    $book_name = $_SESSION['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The BookPlace</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="wrapper">
<div class="wrapper-holder">
<header>
<h1>THE BOOKPLACE</h1><br></header>
<nav id="nav">
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="store.php">Book List</a></li>
</ul>
    
</nav>
	<main>
	<?php
require('mysqli_connect.php');
?>

<form id="formcheckout" method="post" action="checkout.php">
 <div>
        <label>First Name:</label> 
     <input type="text" name="FirstName" id="FirstName" class="InputBox" 
            value="<?php if(isset($_POST['FirstName'])) 
            echo $_POST['FirstName'];?>">
    </div>
	<div>
        <label>Last Name:</label> 
        <input type="text" name="LastName" id="LastName" class="InputBox" 
               value="<?php if(isset($_POST['LastName'])) 
               echo $_POST['LastName'];?>">
    </div>
    <div>
        <label>Payment Options:</label>
        <input type="radio" name="payment_option" id="PaymentOption"
               value="Debit"<?php if(isset($_POST['PaymentOption'])) 
               echo $_POST['PaymentOption'];?>>
			  <label> Debit </label>
        <input type="radio" name="payment_option" id="PaymentOption" 
               value="Credit"<?php if(isset($_POST['PaymentOption'])) 
               echo $_POST['PaymentOption'];?>>
			  <label> Credit </label>
        <input type="radio" name="payment_option" id="PaymentOption" 
               value="Cash"<?php if(isset($_POST['PaymentOption'])) 
               echo $_POST['PaymentOption'];?>>
			  <label> Cash </label>
	<div>
        <input type="submit" value="Check Out" class="btnAction" />
    </div>
    </div>
</form>
</main>
    
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$book_name = $_SESSION['name'];
	$errors = true;
	if(empty($FirstName)) {
		echo "first name is required. </br>";
		$errors = false;
	}
	if(empty($LastName)) {
		echo "last name is required. </br>";
		$errors = false;
	}
	if(!isset($_POST['payment_option'])) {
		echo "payment is required. </br>";
		$errors = false;
	}
	if($errors==true) {
		echo "submitted sucessfully! </br>";
		$FirstName = $dbc -> real_escape_string($_POST['FirstName']);
		$LastName = $dbc -> real_escape_string($_POST['LastName']);
		$payment_option = $dbc -> real_escape_string($_POST['payment_option']);
		$book_name = $dbc -> real_escape_string($_SESSION['name']);
		
	
		$query = "INSERT INTO `bookinventoryorder`(`FirstName`, `LastName`, `PaymentOption`,`BookName`) VALUES ('$FirstName','$LastName','$payment_option','$book_name')";
		$insert = mysqli_query($dbc, $query);
		$update_inventory = "Update bookinventory SET Quantity= Quantity-1 where BookName='$book_name'";
	    mysqli_query($dbc, $update_inventory);
	}
	
	
	mysqli_close($dbc);
}
?>

<footer id="footer">
<div class="footer-content">
<ul class="left_side">
<li>
    <p>The BookPlace<br>
        8945 Bramalea Road <br>
        Brampton, ON, Canada</p>
    <p>Tel. (421) 524 534<br></p>
</li></ul>
<ul class="right_side">
<li>
<div class="social">
<a href="#" class="fb">Facebook</a>
<a href="#" class="tw">Twitter</a></div>
<div class="social">
<a href="#" class="pn">Pinterest</a>
<a href="#" class="gl">Google+</a></div></li></ul>
<div class="clear"></div>
<h5 class="copy">TheBookPlace &copy; 2021</h5>
</div>
        </footer>
    </div>   
    </div>
    </body>
</html>