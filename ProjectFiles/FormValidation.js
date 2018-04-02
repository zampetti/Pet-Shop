var reProperName = /^([A-Za-z']+ )*[A-Za-z']+$/;
var reCity = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
var reState = /^[a-zA-Z]{2}$/;
var rePostalUS = /^\d{5}(\-\d{4})?$/;
var reEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;

function checkSelect(select) {
    return (select.selectedIndex > 0);
}  

function reportErrors(errors){
	var msg = "There were some problems...\n";
	for (var i = 0; i<errors.length; i++) {
		var numError = i + 1;
		msg += "\n" + numError + ". " + errors[i];
	}
	alert(msg);
}
    



