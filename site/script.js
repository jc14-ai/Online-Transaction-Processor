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

function showSolo() {
    const container = document.getElementById("donut-container");
    fetch("/site/pages/show_donut.php?show=1")
    .then(res => res.json())
    .then(data => {
        container.innerHTML = "";

        data.forEach(donut => {
            container.innerHTML += 
            `<div class=\"donut\">
            <img src=\"/src/${donut.image}\" width=\"40%\" />
            <h2 class=\"donut-name-label\">${donut.donut_name}</h2>
            <p class=\"donut-price-label\">P${donut.donut_price}</p>
            <div style=\"text-align: center\">
                <button class=\"order-button\" onclick=\"showSignUp()\">
                    <img src=\"/src/order-now.png\" />
                </button>
            </div>
            </div>`; 
        });
    });
}

function showBundle() {
    const container = document.getElementById("donut-container");
    fetch("/site/pages/show_bundle.php?show=1")
    .then(res => res.json())
    .then(data => {
        container.innerHTML = "";

        data.forEach(bundle => {
            container.innerHTML += 
            `<div class=\"donut\">
            <img src=\"/src/${bundle.image}\" width=\"40%\" />
            <h2 class=\"donut-name-label\">${bundle.bundle_name}</h2>
            <p class=\"donut-price-label\" >P${bundle.bundle_price}</p>
            <div style=\"text-align: center\">
                <button class=\"order-button\" onclick=\"showSignUp()\">
                    <img src=\"/src/order-now.png\" />
                </button>
            </div>
            </div>`; 
        });
    });
    // soloContainer.style.display = 'none';
    // bundleContainer.style.display = 'flex';
    // bundleContainer.classList.remove('slide-in-left');
    // void bundleContainer.offsetWidth;
    // bundleContainer.classList.add('slide-in-right');
}

function showForgotPass(){
    
}