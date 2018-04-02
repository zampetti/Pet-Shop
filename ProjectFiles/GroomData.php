<?php
	$groomingID = $_POST['GroomingID'];

	$query = "SELECT FirstName, LastName, Address, 
			City, State, Zip, PhoneNumber, Email,
            PetType, Breed, PetName, NeuteredOrSpayed,
            PetBirthday
			FROM grooming
			WHERE GroomingID = $groomingID";
	$result = $db->query($query);
	$dbEntries = $result->fetch_assoc();
						
	$result->free();
?>