
function validateLogin(){
	var form = document.getElementById('loginform');
	form.style.backgroundColor = '';
	
	var passwd = form.password.value;
	var email = form.email.value;
	// alert(email);
	//var letter = email.substring(0,1);
	// alert(letter);

	//var capitalregex = /[A-Z]/;
	//var matches = letter.match(capitalregex);
	
	var atregex = /@/;
	var matchesat = email.match(atregex);
	if(matchesat == null){
		alert('You dont have an @ sign on your email.');
		colorize(form.email);
		return false;
	}
	
	// var numberregex = /\d/; /* /\d/ = /[0-9]/ */
	// var numMatch = email.match(numberregex)
	
	
	if(passwd == ""){
		alert('Your passwpord is invalid. Hint: cannot be empty!');
		colorize(form.password);
		return false;
	}
	
	return true;
}

function colorize(x){
	x.style.backgroundColor='Red';
}