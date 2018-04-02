<?php
	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Appointment</title>
<link type="text/css" rel="stylesheet" href="style.css">
<link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
<style type="text/css">
	.Error {color:red; font-size:smaller;}
</style>
</head>
<body>
<?php
    require 'Includes/Header.php';
    
    if(array_key_exists('Update',$_POST))
    {
        require 'Includes/AdminUpdate.php';
    }
    
    if(array_key_exists('Delete',$_POST))
    {
        require 'Includes/AdminDelete.php';
    }
    
	require 'GroomData.php'; 
    require 'GroomForm.php';
    
    require 'Includes/Footer.php';
    
    $db->close();
?>
</body>
</html>
