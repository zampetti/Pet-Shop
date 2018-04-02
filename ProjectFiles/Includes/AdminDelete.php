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

	if (array_key_exists('Delete',$_POST))
	{
		$groomingID = $_POST['GroomingID'];
		$query = "DELETE FROM grooming
                    WHERE GroomingID = $groomingID";

		if ($db->query($query))
		{
			echo '<div align="center">Record Deleted</div>
                <div align="center"><a href="http://localhost/pet-shop/projectfiles/admin.php">Back to Appointment Listing.</a></div>';
		}
		else
		{
			echo '<div align="center">Delete Failed</div>';
		}
	}
?>