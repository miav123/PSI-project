function verifyFieldsLogin() {

    let username = document.getElementById("usernameLogIn").value;
    let password = document.getElementById("passwordLogIn").value;

    let message = "";


    if(username.length == 0 && password.length == 0) {
        message = "Please enter your username and password.";
    } else {
        if(username.length == 0) {
            message = "Please enter your username.";
        }
    
        if(password.length == 0) {
            message = "Please enter your password. ";
        }
    }

    document.getElementById("modalBodyLogIn").innerText=message;

    $('#modalLogIn').modal("show");

}

function verifyFieldsRegister() {
    
    let username = document.getElementById("usernameRegistration").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("passwordRegistration").value;
    let passwordRepeat = document.getElementById("repeatPassword").value;

    let message = "";

   /* 
    Usernames can contain letters (a-z), numbers (0-9), and periods (.).
    Usernames cannot contain an ampersand (&), equals sign (=), underscore (_), apostrophe ('), dash (-), plus sign (+), comma (,), brackets (<,>), or more than one period (.) in a row.
    Usernames can begin or end with non-alphanumeric characters except periods (.)
    */


    /*
    Password must have at least one:

    Uppercase letters: A-Z
    Lowercase letters: a-z
    Numbers: 0-9
    Symbols: ~`!@#$%^&*()_-+={[}]|\:;"'<,>.?/

    */

    if(passwordRepeat != password) {
        message = "Password and repeat password must be same";
    }

    document.getElementById("modalBodyRegisterContinue").innerText=message;

    $('#modalRegisterContinue').modal("show");

}

function verifyFieldsRegisterContinue() {

    let height = document.getElementById("height").value;
    let weight = document.getElementById("weight").value;
    let hours = document.getElementById("hours").value;

    document.getElementById("modalBodyRegister").innerText=message;

    $('#modalRegister').modal("show");

}