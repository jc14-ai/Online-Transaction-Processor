const username = document.getElementById("username-input");
const email = document.getElementById("email-input");
const contact = document.getElementById("contact-input");
const password = document.getElementById("password-input");
const confirmPass = document.getElementById("confirm-password-input");

const myForm = document.getElementById("sign-up-form");

myForm.addEventListener('submit', function(event){
    if((!isValidUsername() || !isValidContactNumber() || !isValidPassword())){
      event.preventDefault();
      console.log("not submitted");
    }
});

function turnRed(textInput){
    textInput.style.border = '3px solid rgb(231, 105, 85)';
}

function defaultBorder(textInput){
    textInput.style.border = 'none';
}

function isValidUsername(){
     //USERNAME VALIDATOR THREAD
     let isValid = true;
     const inputBoxes = [username,email,contact,password,confirmPass];
     for(let i = 0; i < inputBoxes.length; i++){
             defaultBorder(inputBoxes[i]);
     }
 
     for(let i = 0; i < inputBoxes.length; i++){
         if(inputBoxes[i].value.trim() === ""){
             //WILL ADD A PROMPT
             turnRed(inputBoxes[i]);
             isValid = false;
         }
     }

     if(username.value.length < 6 || username.value.length > 15){
        turnRed(username);
        isValid = false;
    }

    return isValid;
}

function isValidContactNumber(){
    //CONTACT VALIDATOR THREAD
    let isValid = true;
    const phoneRegex = /^(?:\+63|0)9\d{9}$/;

    if(!phoneRegex.test(contact.value)){
        turnRed(contact);
        isValid = false;
    }

    return isValid;
}

function isValidPassword(){
    //PASSWORD VALIDATOR THREAD
    let isValid = true;

    if(password.value.length < 8 || password.value.length > 25){
        turnRed(password);
        isValid = false;
    }

    let digits = "0123456789";
    let hasDigit = false, hasUpper = false, hasSpecial = false, hasLower = false;
    const regex = /[^a-zA-Z0-9]/;
    
    if(regex.test(password.value)){
        hasSpecial = true;
    }

    for(let i = 0; i < password.value.length; i++){
        if(digits.includes(password.value.charAt(i))){
            hasDigit = true;
        }
        if(password.value.charAt(i) === password.value.charAt(i).toUpperCase()){
            hasUpper = true;
        }
        if(password.value.charAt(i) === password.value.charAt(i).toLowerCase()){
            hasLower = true;
        }
    }
    if(!hasDigit || !hasLower || !hasSpecial || !hasUpper){
        turnRed(password);
        isValid = false;
    }

    if(password.value !== confirmPass.value){
        turnRed(confirmPass);
        isValid = false;
    }

    return isValid;
}

