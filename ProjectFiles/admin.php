<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Administrative Report</title>
<link type="text/css" rel="stylesheet" href="style.css">
<link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
</head>
<body>
<?php
    require 'Includes/Header.php';
    @$db = new mysqli('localhost','root','pwdpwd','pet_shop');
    if (mysqli_connect_errno())
    {
        echo 'Cannot connect to database: ' .
        mysqli_connect_error();
    }
    else
    {
        $query = 'SELECT * FROM grooming';
        $result = $db->query($query);
        $numResults = $result->num_rows;
        
        echo "<b>$numResults New Requests</b>";
    }
?>
  <a href="AddGroom.php" style="font-size: large;">+Grooming Request</a>  
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Type of Pet</th>
            <th>Breed</th>
            <th>Pet's Name</th>
            <th>Neutered/Spayed</th>
            <th>Pet's Birthday</th>
            <th>Edit</th>
        </tr>
    <?php
          while ($row = $result->fetch_assoc())
          {
              echo '<tr>';
              echo '<td>' . $row['FirstName'] . '</td>';
              echo '<td>' . $row['LastName'] . '</td>';
              echo '<td>' . $row['Address'] . '</td>';
              echo '<td>' . $row['City'] . '</td>';
              echo '<td>' . $row['State'] . '</td>';
              echo '<td>' . $row['Zip'] . '</td>';
              echo '<td>' . $row['PhoneNumber'] . '</td>';
              echo '<td>' . $row['Email'] . '</td>';
              echo '<td>' . $row['PetType'] . '</td>';
              echo '<td>' . $row['Breed'] . '</td>';
              echo '<td>' . $row['PetName'] . '</td>';
              echo '<td>' . $row['NeuteredOrSpayed'] . '</td>';
              echo '<td>' . $row['PetBirthday'] . '</td>';
              echo '<td><form method="post" action="EditGroom.php">
                    <input type="hidden" name="GroomingID"
                        value="' . $row['GroomingID'] . '">
                    <input type="submit" value="Edit">
                        </form></td>';
              echo '<td><form method="post" action="DeleteGroom.php">
                    <input type="hidden" name="GroomingID"
                        value="' . $row['GroomingID'] . '">
                    <input type="submit" value="Delete">
                        </form></td>';
              echo '</tr>';
          }
        ?>
    </table>
    
    <?php
        require 'Includes/Footer.php';
    
        $result->free();
        $db->close();
    ?>
</body>
</html>












