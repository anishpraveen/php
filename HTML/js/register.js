var checkName = /^[a-zA-Z0-9]{6,12}$/;
var checkEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
var checkPassword = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,}$/;

function Validate(form) {
    var username = form.username.value;
    var password = form.password.value;
    var confirmPassword = form.confirmPassword.value;
    var email = form.email.value;
    var country = form.Country.value;
    //var nameErr = '';var emailErr = '';var passwordErr = '';var confirmPasswordErr = '';var CountryErr='';
    document.getElementById("spanNameErr").innerHTML = "";
    document.getElementById("spanEmailErr").innerHTML = "";
    document.getElementById("spanPassErr").innerHTML = "";
    document.getElementById("spanConfirmPassErr").innerHTML = "";

    if (form.username.value === '' || form.username.value === null) {
        //alert("Input name");
        document.getElementById("spanNameErr").innerHTML = "<br>*Input name";
        return false;
    }

    else if (!checkName.test(username)) {
        //alert("Input proper name (Only alphanumeric between 6 and 12)");
        document.getElementById("spanNameErr").innerHTML = "<br>*Only alphanumeric between 6 and 12";
        return false;
    }

    if (form.email.value === '' || form.email.value === null) {
        // alert("Input email");
        document.getElementById("spanEmailErr").innerHTML = "<br>*Input email";
        return false;
    }
    else if (!checkEmail.test(email)) {
        //alert("Input proper email format (abc@xyz.ac)");
        document.getElementById("spanEmailErr").innerHTML = "<br>*Input proper email format (abc@xyz.ac)";
        return false;
    }

    if (form.password.value === '' || form.password.value === null) {
        // alert("Input password");
        document.getElementById("spanPassErr").innerHTML = "<br>*Input password";
        return false;
    }
    else if (!checkPassword.test(password)) {
        // alert("Input proper password \n Atleast one \n1.Uppercase \n2.Lowercase \n3.Digit \n4.Special character");
        document.getElementById("spanPassErr").innerHTML = "<br>*Input  proper password \n Atleast one \n1.Uppercase \n2.Lowercase \n3.Digit \n4.Special character";
        return false;
    }


    if (form.confirmPassword.value === '' || form.confirmPassword.value === null) {
        //alert("Confirm password");
        document.getElementById("spanConfirmPassErr").innerHTML = "<br>*Input password";
        return false;
    }
    if (password !== confirmPassword) {
        //alert("Password mismatch");
        document.getElementById("spanPassErr").innerHTML = "<br>*Password mismatch";
        document.getElementById("spanConfirmPassErr").innerHTML = "<br>*Password mismatch";
        return false;
    }

    if (country === 'Country') {
        //alert("Select Countrty");
        document.getElementById("spanCountryErr").innerHTML = "<br><br>*Select Countrty";
        return false;
    }



    //alert("working");
    return true;
}
function DisplayState(value) {
    document.getElementById("spanCountryErr").innerHTML = "";
    if (value === 'US') {
        document.getElementById('selState').style.visibility = 'visible';
        document.getElementById('selCountry').style.margin = 'initial 0 0 0';
        document.getElementById('selState').style.margin = '1% 0 1% 0';
    }
    if (value !== 'US') {
        document.getElementById('selState').style.visibility = 'hidden';
        document.getElementById('selCountry').style.margin = 'initial 0 -35% 0';
        document.getElementById('selState').style.margin = '1% 0 -35% 0';
    }
}
