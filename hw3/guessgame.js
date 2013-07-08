/* globals */
var maxGuesses = 5;
var stat;
var secret = 0;
var inputbox;

function guess() {
    
    if (maxGuesses == 5) { /* init config */
        secret = getRandom();
        inputbox = document.getElementById("guessinput")
        stat = document.getElementById('status');
    }
    if (maxGuesses < 1) {
        stat.innerHTML = "Game Over... The secret number was: " + secret;
        alert("restarting game...");
        secret = getRandom();
        maxGuesses = 5;
        document.getElementById('triesleft').innerHTML = "Tries left: " + maxGuesses;
        stat.innerHTML = "";
        /*inputbox.focus();*/
        inputbox.value = "";

    }
    
    var guessnum = parseInt(inputbox.value);
    if (guessnum.toString() == "NaN" || guessnum > 100 || guessnum < 1) {
        alert("Invalid Guess input! Did you type a number from 1-100? Try Again...");
        return false;
    }
    /* at this point input is validated - guess is used up */
    maxGuesses--;
    if(guessnum == secret){
        stat.innerHTML = "Correct! The secret number was " + secret;
        alert("restarting game...");
        window.location.href = window.location.href; /* refresh */
    }
    else if(guessnum < secret){
        stat.innerHTML = "Your guess was too low... Try again!";
    }
    else if(guessnum > secret){
        stat.innerHTML = "Your guess was too high... Try again";
    }

    document.getElementById('triesleft').innerHTML = "Tries left: " + maxGuesses;
}

function getRandom() {
    return 1 + Math.floor(Math.random() * (100 - 1 + 1));
}