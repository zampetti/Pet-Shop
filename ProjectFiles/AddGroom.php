<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<title>Submit Request</title>
    <link type="text/css" rel="stylesheet" href="reset.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="styleforms.css">
    <link type="text/css" rel="stylesheet" href="SlickNav-master/dist/slicknav.min.css">
    <script type="text/javascript" src="FormValidation.js"></script>
    <script type="text/javascript" src="lib.js"></script>
    <script type="text/javascript">
    
    function selChanged(sel,data,dependentSel) {
        var selection = sel.options[sel.selectedIndex].value;
        var arrOptions = data[selection];
        var opt;
        dependentSel.options.length = 0;
        for (var i in arrOptions) {
            opt = new Option(arrOptions[i]);
            appendOptionToSelect(dependentSel,opt);
        }
    }
        
    observeEvent(window, "load", function() {
        var breeds = {
            "Dog" : ["Mixed Breed", "Australian Shepherd", "Basset Hound", "Beagle", "Bloodhound", "Boxer", "Bulldog", "Chihuahua", "Collie", "Dachshund", "Dalmation", "Doberman", "German Shepherd", "Golden Retriever", "Great Dane", "Greyhound", "Husky", "Irish Setter", "Labrador", "Maltese", "Pointer", "Poodle", "Pomeranian", "Schnauzer", "Shih Tzu", "Spaniel", "St. Bernard", "Terrier", "Other"],
            "Cat" : ["None"]
        };
        var pettype = document.getElementById("PetType");
        var breed = document.getElementById("Breed");
        observeEvent(pettype,"change",function() {
            selChanged(pettype,breeds,breed);
        });
    });
        
    function validate(form) {
    var rePhone = /^\(?([2-9]\d\d)\)?[\-\. ]?([2-9]\d\d)[\-\. ]?(\d{4})$/;
    var firstName = form.FirstName.value;
    var lastName = form.LastName.value;
    var address = form.Address.value;
    var city = form.City.value;
    var state = form.State.value;
    var zip = form.Zip.value;
    var phone = form.PhoneNumber.value;
    var email = form.Email.value;
    var petname = form.PetName.value;
    var errors = [];
    
    if (!reProperName.test(firstName)) {
		errors[errors.length] = "You must enter a valid first name.";
	}
        
    if (!reProperName.test(lastName)) {
		errors[errors.length] = "You must enter a valid last name.";
	}
    
    if (address == "") {
		errors[errors.length] = "You must enter a valid address.";
	}
        
    if (!reCity.test(city)) {
        errors[errors.length] = "You must enter a valid city name.";
    }
    
    if (!reState.test(state)) {
		errors[errors.length] = "You must enter valid state initials. (If Washington, D.C.- enter 'DC')";
	}
    
    if (!rePostalUS.test(zip)) {
		errors[errors.length] = "You must enter a valid zip code.";
	}
        
    
    if (phone == "") {
        errors[errors.length] = "You must enter a valid phone number.";
    } else if (phone != "") {
        checkPhone(phone);      
    }     
        
    function checkPhone(phone) {    
        if (!rePhone.test(phone)) {
            errors[errors.length] = "You must enter a valid phone number.";
        } else {
            cleanPhone(phone);
        }
    }
        
    function cleanPhone(phone) {
        if (rePhone.test(phone)) {
            var cleanedPhone = phone.replace(rePhone, "($1) $2-$3");
            form.PhoneNumber.value = cleanedPhone;
        }
    }    
        
    if (email != "") {
        checkEmail(email);
    }
        
    if (!checkSelect(form.PetType)) {
        errors[errors.length] = "You must select a pet type.";
    }
        
    if (!reProperName.test(petname)) {
        errors[errors.length] = "You must give your pet's name.";
    }      
        
    function checkEmail(email) {
    if (!reEmail.test(email)) {
		  errors[errors.length] = "The email you entered is not valid.";
	   }
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
    <h1 id="groom">Submit a Grooming Request</h1>
    <form method="post" action="ProcessGroom.php" id="form" onSubmit="return validate(this);">
    <table id="table">
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="FirstName" id="firstName"></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="LastName" id="lastName"></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type="text" name="Address"></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><input type="text" name="City"></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><input type="text" name="State"></td>
        </tr>
        <tr>
            <td>Zip Code:</td>
            <td><input type="text" name="Zip"></td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type="text" name="PhoneNumber"></td>
        </tr>
        <tr>
            <td>Email (optional):</td>
            <td><input type="text" name="Email" id="email"></td>
        </tr>
        <tr>
            <td>Type of Pet:</td>
            <td>
                <select name="PetType" id="PetType">
                    <option value="">Please select:</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                </select>
            Breed:
                <select name="Breed" id="Breed" value=""></select>
            </td> <!--adv java p.189--> 
        </tr>
        <tr>
            <td>Pet's Name:</td>
            <td><input type="text" name="PetName"></td>
        </tr>
        <tr>
            <td>Neutered/Spayed:</td>
            <td>
                <input type="checkbox" name="NeuteredOrSpayed" value="1"> (check if yes)
            </td>
        </tr>
        <tr>
            <td>Pet's Birthday (optional):</td>
            <td colspan="2">
                <select name="BirthMonth">
                    <option value="0">Select Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="BirthDay">
                    <option value="0">Select Day</option>
                    <?php
                        for($i=1; $i<=31; $i++)
                        {
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select>
                <select name="BirthYear">
                    <option value="0">Select Year</option>
                    <?php
                        for($i=date('Y'); $i>=(date('Y') - 25); $i=$i-1)
                        {
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit" onclick="this.form.PhoneNumber.value = cleanPhone(this.form.PhoneNumber.value);"></td>
        </tr>
    </table>
</form>
</div>
<aside id="container2">
    <ul id="slideshow">
        <li id="no">
            <h2>Give Your Best Friend a Makeover!</h2>
            <img src="Images/preening.jpg" height="40%" width="60%">
        </li>
        <li id="services">
            <h2>Our Services Include: </h2>   
                <table>
                    <tr><td>&#8226;Shampoo</td></tr>
                    <tr><td>&#8226;Hair Trimming</td></tr>
                    <tr><td>&#8226;Nail Clipping</td></tr>
                    <tr><td>&#8226;And More!</td></tr>
                </table>
        </li>
        <li id="no">
            <h2>Call Today or Fill Out Our Form to Request an Appointment!</h2>
            <h1 style="color: blue; margin: auto;">(555) 517-SANDY</h1>
        </li>
    </ul>
</aside>
    <?php require 'Includes/Footer.php' ?>
    <script src="slideshow.js"></script>
</body>
</html>
















