<?php
    $errors = false;
    if ($_POST['FirstName'] == '')
    {
        $firstName = '<span style="color:red;">First name ommitted.</span>';
        $errors = true;
    }
    else if (get_magic_quotes_gpc())
    {
        return trim ($firstName);
    }
    else
    {
        $firstName = addslashes(ucwords(trim(htmlentities($_POST['FirstName']))));
    }

    if ($_POST['LastName'] == '')
    {
        $lastName = '<span style="color:red;">Last name ommitted.</span>';
        $errors = true;
    }
    else if (get_magic_quotes_gpc())
    {
        return trim ($lastName);
    }
    else
    {
        $lastName = addslashes(ucwords(trim(htmlentities($_POST['LastName']))));
    }

    if ($_POST['Address'] == '')
    {
        $address = '<span style="color:red;">Address ommitted.</span>';
        $errors = true;
    }
    else
    {
        $address = ucwords(trim(htmlentities($_POST['Address'])));
    }

    if ($_POST['City'] == '')
    {
        $city = '<span style="color:red;">City ommitted</span>';
        $errors = true;
    }
    else
    {
        $city = ucwords(trim(htmlentities($_POST['City'])));
    }

    if ($_POST['State'] == '')
    {
        $state = '<span style="color:red;">State ommitted.</span>';
        $errors = true;
    }
    else
    {
        $state = strtoupper(trim(htmlentities($_POST['State'])));
    }

    if ($_POST['Zip'] == '')
    {
        $zip = '<span style="color:red;">Zip Code ommitted.</span>';
        $errors = true;
    }
    else
    {
        $zip = trim(htmlentities($_POST['Zip']));
    }

    if ($_POST['PhoneNumber'] == '')
        {
            $phoneNumber = '<span style="color:red;">Phone Number ommitted.</span>';
            $errors = true;
        }
        else
        {
            $phoneNumber = trim(htmlentities($_POST['PhoneNumber']));
        }

    if ($_POST['Email'] == '')
    {
        $email = '<span>Email ommitted.</span>';
        $errors = false;
    }
    else
    {
        $email = trim(htmlentities($_POST['Email']));
    }

    if ($_POST['PetType'] == '')
    {
        $petType = '<span style="color:red;">Type of Pet not specified.</span>';
        $errors = true;
    }
    else
    {
        $petType = trim(htmlentities($_POST['PetType']));
    }

    if(array_key_exists('Breed', $_POST))
    {
        $breed = trim(htmlentities($_POST['Breed']));
    }
    else
    {
        $breed = null;
    }
    
    if ($_POST['PetName'] == '')
    {
        $petName = '<span style="color:red;">Pet\'s name ommitted.</span>';
        $errors = true;
    }
    else
    {
        $petName = ucwords(trim(htmlentities($_POST['PetName'])));
    }

    if (array_key_exists('NeuteredOrSpayed', $_POST))
    {
        $neuteredOrSpayed = $_POST['NeuteredOrSpayed'];
        $confirmation = '<span>Yes</span>';
    }
    else
    {
        $neuteredOrSpayed = 0;
        $confirmation = '<span>No/No Response</span>';
    }

    if($_POST['BirthYear'] . '-' . $_POST['BirthMonth'] . '-' . $_POST['BirthDay'] == '0-0-0') {
        $petBirthday = '0-0-0';
        $confirm = '<span>No Response</span>';
    } else {
        $petBirthday = $_POST['BirthYear'] . '-' . $_POST['BirthMonth'] . '-' . $_POST['BirthDay'];
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Confirm Request</title> 
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
</head>
<body>
    <?php require "Includes/Header.php" ?>
    <h1>Confirm Request</h1>
        <ul>
            <?php            
                echo "<li><b>Name:</b> $firstName $lastName</li>";
                echo "<li><b>Address:</b> $address</li>";
                echo "<li><b>City, State Zip:</b> $city, $state $zip</li>";
                echo "<li><b>Phone Number:</b> $phoneNumber</li>";
                echo "<li><b>Email:</b> $email</li>";
                echo "<li><b>Type of Pet:</b> $petType</li>";
                echo "<li><b>Breed:</b> $breed</li>";
                echo "<li><b>Pet's Name:</b> $petName</li>";
                echo "<li><b>Neutered/Spayed:</b> $confirmation</li>";
                echo "<li><b>Pet's Birthday:</b> $confirm</li>";
	        ?>
        </ul>
        <?php if ($errors)
	{
		echo '<a href="javascript:history.go(-1)">Please go back to the	form and try again.</a>';
	}
	else
	{
	?>
	<form method="post" action="InsertGroom.php">
    <input type="hidden" name="Confirmed" value="true">
        <input type="hidden" name="FirstName" value="<?php echo $firstName ?>">
        <input type="hidden" name="LastName" value="<?php echo $lastName ?>">
        <input type="hidden" name="Address" value="<?php echo $address ?>">
        <input type="hidden" name="City"	value="<?php echo $city ?>">
        <input type="hidden" name="State" value="<?php echo $state ?>">
        <input type="hidden" name="Zip" value="<?php echo $zip ?>">
        <input type="hidden" name="PhoneNumber" value="<?php echo $phoneNumber ?>">
        <input type="hidden" name="Email" value="<?php echo $email ?>">
        <input type="hidden" name="PetType" value="<?php echo $petType ?>">
        <input type="hidden" name="Breed" value="<?php echo $breed ?>">
        <input type="hidden" name="PetName" value="<?php echo $petName ?>">
        <input type="hidden" name="NeuteredOrSpayed" value="<?php echo $neuteredOrSpayed ?>">
        <input type="hidden" name="PetBirthday" value="<?php echo $petBirthday ?>">
        <input type="submit" value="Confirm">
	</form>
	<?php
	}
	?>
    <?php require "Includes/Footer.php" ?>
</body>
</html>















