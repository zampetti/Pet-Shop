<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Sandy's Pet Shop</title>
<link type="text/css" rel="stylesheet" href="reset.css">
<link type="text/css" rel="stylesheet" href="style.css">
<link type="text/css" rel="stylesheet" href="styleforms.css">
<link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="FormValidation.js"></script>
    
<script>
    function validate(form) {
    var firstName = form.FirstName.value;
    var lastName = form.LastName.value;
    var email = form.Email.value;
    var errors = [];
        
    if (!reProperName.test(firstName)) {
		errors[errors.length] = "You must enter a valid first name.";
	}
        
    if (!reProperName.test(lastName)) {
		errors[errors.length] = "You must enter a valid last name.";
	}
        
    if (!reEmail.test(email)) {
		errors[errors.length] = "You must enter a valid email address.";
	}
        
    if (errors.length > 0) {
		reportErrors(errors);
		return false;
	}

	return true;
}
        
</script>
    
</head>
<body>
    <?php require 'Includes/Header.php' ?>
<div id="container1">
    <h1>Contact Us</h1> 
    <form id="form" onSubmit="return validate(this);" method="post" action="customerMsg2.php" id="form">
    <input type="hidden" name="submitted" value="">
    <table id="table">
        <tr>
            <td>First Name: </td>
            <td><input type="text" name="FirstName" id="FirstName" autofocus></td>
        </tr>
        <tr>
            <td>Last Name: </td>
            <td><input type="text" name="LastName" id="LastName"></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="Email" id="Email"></td>
        </tr>
        <tr>
            <td>Leave a message: </td>
            <td><textarea name="Message" id="Message"></textarea></td>
        </tr>
		<tr>
            <td><input type="submit" id="sendEmail" value="Send Email"></td>
        </tr>
    </table>
    </form>
    <div id="ajax-message"></div>
</div>
<div id="container2">
    <ul id="slideshow">
        <li id="services"><h2>Make a Donation!</h2><br>
            Our pets need lots of love and attention while they wait for new homes.  Why not give today?<br><input type="button" value="Donate"></li>
        <li id="services"><h2>Check Out Our Podcast!</h2><br>
            Tune in weekly as Josh gives his unique perspective on pet-ownership and dutifully regulated capitalism.</li>
    </ul>
</div>
    <script src="slideshow.js"></script>
    <script src="ajaxsubmit.js"></script>
    <?php require 'Includes/Footer.php' ?>
</body>
</html>