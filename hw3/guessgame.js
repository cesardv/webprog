function guess(){
    var inputbox = document.getElementById("guessinput");
    var guessnum = parseInt(inputbox.value);
    if (guessnum.toString() == "NaN" || guessnum > 100 || guessnum < 1) {
        alert("Invalid Guess input! Did you type a number from 1-100? Try Again...");
    }


    /* TODO: I noticed this code breaks when you hit cancel on the prompt...
    document.body.insertAdjacentHTML("afterbegin", "<h1>Payroll JS App</h1><br/><input type=\"button\" value='Start Payroll' onClick=\"payroll()\" /> ");
	document.body.insertAdjacentHTML("beforeend", "<p><a href='./js2.html'>Part C</a></p>"); */
}