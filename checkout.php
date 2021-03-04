<?php
session_start();	
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
    if (isset($_GET['name'])) {
    $_SESSION['name'] = $_GET['name'];
    $book_name = $_SESSION['name'];
}
    
 require('mysqli_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$book_name = $_SESSION['name'];
	$errors = true;
	if(empty($_POST['FirstName'])) {
		$err1 = "First name is required.";
		$errors = false;
	}
	if(empty($_POST['LastName'])) {
		$err2 = "Last name is required.";
		$errors = false;
	}
	if(!isset($_POST['payment_option'])) {
		$err3 = "You must select a payment option.";
		$errors = false;
	}
	if($errors==true) {
		
		$FirstName = $dbc -> real_escape_string($_POST['FirstName']);
		$LastName = $dbc -> real_escape_string($_POST['LastName']);
		$payment_option = $dbc -> real_escape_string($_POST['payment_option']);
		$book_name = $dbc -> real_escape_string($_SESSION['name']);
		
		$query = "INSERT INTO `bookinventoryorder`(`FirstName`, `LastName`, `PaymentOption`,`BookName`) VALUES ('$FirstName','$LastName','$payment_option','$book_name')";
		$insert = mysqli_query($dbc, $query);
        if($insert) {
            echo '<script>alert("Your Order has been placed Successfully. Thank You!")</script>';
        }
		$update_inventory = "Update bookinventory SET Quantity= Quantity-1 where BookName='$book_name'";
	    mysqli_query($dbc, $update_inventory);
        
        session_unset();
        session_destroy();
	}
	mysqli_close($dbc);
}
?>

<form id="formcheckout" method="post" action="checkout.php">
 <div>
        <label>First Name<span class="note">*</span>:</label> 
        <input type="text" name="FirstName" class="InputBox" value="<?php if(isset($_POST['FirstName'])) 
        echo $_POST['FirstName'];?>">
        <?php if(isset($err1)) { echo "<p class='note'>".$err1."</p>";}?>
    </div>
	<div>
        <label>Last Name<span class="note">*</span>:</label> 
        <input type="text" name="LastName" class="InputBox" value="<?php if(isset($_POST['LastName'])) 
        echo $_POST['LastName'];?>">
        <?php if(isset($err2)) { echo "<p class='note'>".$err2."</p>";}?>
    </div>
    <div>
        <label>Payment Options<span class="note">*</span>:</label>
        <input type="radio" name="payment_option" value="Debit"<?php if(isset($_POST['PaymentOption'])) 
               echo $_POST['PaymentOption'];?>>
			  <label> Debit </label>
        <input type="radio" name="payment_option" value="Credit"<?php if(isset($_POST['PaymentOption'])) 
               echo $_POST['PaymentOption'];?>>
			  <label> Credit </label>
        <input type="radio" name="payment_option" value="Cash"<?php if(isset($_POST['PaymentOption'])) 
               echo $_POST['PaymentOption'];?>>
			  <label> Cash </label>
        <?php if(isset($err3)) { echo "<p class='note'>".$err3."</p>";}?>
        </div>
	<div>
        <input type="submit" value="Check Out" class="btnAction" />
        
    </div>
    
</form>
</main>

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