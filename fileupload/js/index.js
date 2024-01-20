function login(){

    if(checkform(loginform)){
        document.loginform.method="post";
		document.loginform.loginsub.value="login";
		document.loginform.action="index.php";
		document.loginform.submit();
    }
}

function checkform(TheForm){
   
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