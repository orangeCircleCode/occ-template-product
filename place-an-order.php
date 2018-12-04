<?php
if ($_POST["submit"]) {
	if (!$_POST['name']) {
		$error = "<br />Please enter your name";
	}
	if (!$_POST['email']) {
		$error .= "<br />Please enter your email address";
	}
	if (!$_POST['phone']) {
		$error .= "<br /> Please enter your phone number";
	}
	if (!$_POST['delivery-address']) {
		$error .= "<br /> Please enter your delivery address";
	}
	if (!$_POST['product-name']) {
		$error .= "<br /> Please enter the product's name";
	}
	if (!$_POST['product-quantity']) {
		$error .= "<br /> Please enter the quantity of the products you want";
	}
	if (!$_POST['comments']) {
		$error .= "<br />Please enter a comments";
	}
	if (!$_POST['checkbox']) {
		$error .= "<br /> Please tick the checkbox";
	}
	if ($_POST['email'] != "" and !filter_var(
		$_POST['email'],
		FILTER_VALIDATE_EMAIL
	)) {
		$error .= "<br />Please enter a valid email address";
	}
	if ($error) {
		$result = '<div class="alert alert-danger"><strong>There were error(s)
in your form:</strong>' . $error . '</div>';
	} else {
      /* THE EMAIL WHERE YOU WANT TO RECIEVE THE CONTACT MESSAGES */
		if (mail(
			"info@youremailaddress.com",
			"New Order from Website Name",
			"Name: " . $_POST['name'] . "
Email: " . $_POST['email'] . "
Phone: " . $_POST['phone'] . "
Delivery Address: " . $_POST['delivery-address'] . "
Product's Name: " . $_POST['product-name'] . "
Product's Quantity: " . $_POST['product-quantity'] . "
checkbox: " . $_POST['1'] . "
Comments: " . $_POST['comments']
		)) {
			$result = '<div class="alert alert-success"> <strong> Thank
you!</strong> We\'ll get back to you shortly.</div>';
		} else {
			$result = '<div class="alert alert-danger">Sorry, there was
an error sending your message. Please try again later.</div>';
		}
	}
}
?>
