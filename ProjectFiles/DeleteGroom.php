<?php 
	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
    require 'GroomData.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">
<link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
    <title>Delete</title>
</head>
<body>
    <?php require 'Includes/Header.php'; ?>
<h1 align="center">Request Details</h1>
<form method="post" action="EditGroom.php">
<input type="hidden" name="Delete" value="true">
<?php
if (array_key_exists('GroomingID',$_POST))
{
	echo "<input type='hidden' name='GroomingID' value='$groomingID'>";
}
?>
<table align="center" border="1" width="500">
	<?php
    function textEntry($display,$name,$entries)
    {
        $returnVal = "
        <tr>
            <td>$display:</td>
            <td>
                <input type='text' name='$name' 
                value=\"" . nl2br(trim(htmlentities($entries[$name]))) . "\">";
        $returnVal .= "</td></tr>";
        
        return $returnVal;
    }
		echo textEntry('First name','FirstName',$dbEntries);
		echo textEntry('Last name','LastName',$dbEntries);
        echo textEntry('Address','Address',$dbEntries);
        echo textEntry('City','City',$dbEntries);
        echo textEntry('State','State',$dbEntries);	
        echo textEntry('Zip Code','Zip',$dbEntries);
        echo textEntry('Phone Number','PhoneNumber',$dbEntries);
        echo textEntry('Email','Email',$dbEntries);
        echo textEntry('Pet Type','PetType',$dbEntries);
        echo textEntry('Breed','Breed',$dbEntries);
        echo textEntry('Pet\'s Name','PetName',$dbEntries);
		echo textEntry('Neutered/Spayed','NeuteredOrSpayed',
			$dbEntries);
		echo textEntry('Pet\'s Birthday','PetBirthday',$dbEntries);
		
	?>
	<tr>
		<td colspan="2"><input type="submit" value="Delete"></td>
	</tr>
</table>
</form>
    <?php require "Includes/Footer.php" ?>
</body>
</html>