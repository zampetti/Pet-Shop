<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Request Confirmation</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
</head>
<body>
<?php
    require 'Includes/Header.php';
    $dbEntries = $_POST;

    @$db = new mysqli('localhost', 'root', 'pwdpwd', 'pet_shop');
    if(mysqli_connect_errno())
    {
        echo 'Cannot connect to database: ' . mysqli_connect_error();
    }
    
    $query = "INSERT INTO grooming
        (FirstName, LastName, Address, City,
        State, Zip, PhoneNumber, Email, PetType,
        Breed, PetName, NeuteredOrSpayed, PetBirthday)
        VALUES ('" . $dbEntries['FirstName'] . "','" .
                    $dbEntries['LastName'] . "','" .
                    $dbEntries['Address'] . "','" .
                    $dbEntries['City'] . "','" .
                    $dbEntries['State'] . "','" .
                    $dbEntries['Zip'] . "','" .
                    $dbEntries['PhoneNumber'] . "','" .
                    $dbEntries['Email'] . "','" .
                    $dbEntries['PetType'] . "','" .
                    $dbEntries['Breed'] . "','" .
                    $dbEntries['PetName'] . "','" .
                    $dbEntries['NeuteredOrSpayed'] . "','" .
                    $dbEntries['PetBirthday'] . "')";

if ($db->query($query))
{
    echo '<div id="response">Request Submitted</div>
    <div id="followUp">You Will Receive a Follow-up E-mail in 1-5 Business Days.<br><a href="index.php">Go Back to the Home Page</a></div>';
}
else
{
    echo '<div align="center">Insert Failed</div>';        
}
require 'Includes/Footer.php';
?>
    </body>
</html>