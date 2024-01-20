function addUpload(){

    if(checkform(fileupload)){
        document.fileupload.method="post";
		document.fileupload.filesub.value="fileupload";
		document.fileupload.action="fileupload.php";
		document.fileupload.submit();
    }
}

function checkform(TheForm){
   
    if(isEmpty(TheForm.fileuploadcheck.value,"Please Select a Document")==false)
		{
			TheForm.fileuploadcheck.focus();
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
window.addEventListener("popstate", onBackButtonClicked);
function onBackButtonClicked() {
    // Use AJAX to notify the server to destroy the session
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "logout.php", true);
    xhr.send();
}