const signUpForm = document.getElementById("sign-up-page");

let isSignUpShown = true;
function showSignUp(){
    if(!isSignUpShown){
        signUpForm.style.display = 'flex';
    }else{
        signUpForm.style.display = 'none';
    }

    isSignUpShown = !isSignUpShown;
}