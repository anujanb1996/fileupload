function register(){

    if(checkform(registerform)){
        document.registerform.method="post";
		document.registerform.regsub.value="Save";
		document.registerform.action="register.php";
		document.registerform.submit();
    }
}

function checkform(TheForm){
    if(isEmpty(TheForm.applicantname.value,"Enter Applicat Name")==false)
		{
			TheForm.applicantname.focus();
			return false;
		}
	else if (isLettersOnly(TheForm.applicantname.value, "Applicant Name should contain only letters") == false) {
			TheForm.applicantname.focus();
			return false;
		}
	
    if(isEmpty(TheForm.username.value,"Please Enter Username")==false)
		{
			TheForm.username.focus();
			return false;
		}
    if(isEmpty(TheForm.password.value,"Enter Applicant Password")==false)
		{
			TheForm.password.focus();
			return false;
		}
	else if (isAlphanumericMixedCase(TheForm.password.value, "Password should be a mixture of alphanumeric characters with both upper and lower case") == false) {
			TheForm.password.focus();
			return false;
		}
        return true;
}

function isEmpty(v,msg)
{
  var p=trim(v);
	if (p.length == 0){
		alert(msg);	
		return false;
	}
	return true;
}

function LTrim(value)
{

	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");

}

// Removes ending whitespaces
function RTrim(value) {

	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");

}

// Removes leading and ending whitespaces
function trim(value) {

	return LTrim(RTrim(value));

}
  // Helper function to check if a string contains only letters
  function isLettersOnly(value, errorMessage) {
	if (!/^[a-zA-Z]+$/.test(value)) {
		alert(errorMessage);
		return false;
	}
	return true;
}

// Helper function to check if a string is a mixture of alphanumeric characters with both upper and lower case
function isAlphanumericMixedCase(value, errorMessage) {
	if (!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]+$/.test(value)) {
		alert(errorMessage);
		return false;
	}
	return true;
}
