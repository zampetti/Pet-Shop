<?php

    $dbEntries = $_POST;
	/*foreach ($dbEntries as &$entry)
	{
		$entry = trim($entry);
        if (get_magic_quotes_gpc())
        {
            return $entry;
        }
        else
        {
            return addslashes($entry);
        }
	}*/

    @$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}

	if (array_key_exists('Update',$_POST))
	{
		$groomingID = $_POST['GroomingID'];
		$query = "UPDATE grooming
				SET FirstName='" . $dbEntries['FirstName'] . "',
				LastName='" . $dbEntries['LastName'] . "',
				Address='" . $dbEntries['Address'] . "',
				City='" . $dbEntries['City'] . "',
				State='" . $dbEntries['State'] . "',
				Zip='" . $dbEntries['Zip'] . "',
				PhoneNumber='" . $dbEntries['PhoneNumber'] . "',
				Email='" . $dbEntries['Email'] . "',
				PetType='" . $dbEntries['PetType'] . "',
				Breed='" . $dbEntries['Breed'] . "',
				PetName='" . $dbEntries['PetName'] . "',
				NeuteredOrSpayed='" . $dbEntries['NeuteredOrSpayed'] . "',
				PetBirthday='" . $dbEntries['PetBirthday'] . "'
                WHERE GroomingID = $groomingID";

		if ($db->query($query))
		{
			echo '<div align="center">Record Updated</div>
                <div align="center"><a href="http://localhost/pet-shop/projectfiles/admin.php">Back to Appointment Listing.</a></div>';
		}
		else
		{
			echo '<div align="center">Update Failed</div>';
		}
	}
?>