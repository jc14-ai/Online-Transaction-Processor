const signUpForm = document.getElementById("sign-up-page");
const signUpAlert = document.getElementById("sign-up-alert");

const signInForm = document.getElementById("sign-in-page");
const signInAlert = document.getElementById("sign-in-alert");

function showSignUp(){
    if(!isSignInShown && isSignUpShown){
        return;
    }

    signUpAlert.innerHTML = '';
    if(isSignUpShown){
        signUpForm.style.display = 'flex';
    }else{
        signUpForm.style.display = 'none';
    }

    isSignUpShown = !isSignUpShown;
}

function closeSignUp(){
    signUpForm.style.display = 'none';
    isSignUpShown = true;
}

function showSignIn(){
    if(isSignInShown && !isSignUpShown){
        return;
    }

    signInAlert.innerHTML = '';
    if(isSignInShown){
        signInForm.style.display = 'flex';
    }else{
        signInForm.style.display = 'none';
    }

    isSignInShown = !isSignInShown;
}

function closeSignIn(){
    signInForm.style.display = 'none';
    isSignInShown = true;
}