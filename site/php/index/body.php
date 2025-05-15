<?php
session_start();
include("header.php");
?>

<!-- SIGN UP PAGE -->
<div class="float-page" id="sign-up-page">
    <div class="sign-up-alert" id="sign-up-alert">
        <?php
        if (isset($_SESSION['sign-up-status'])) {
            echo "  
            <div id=\"page-status\" style=\"
            background-color: #3e3232; 
            padding-left: 20px; 
            padding-right: 20px; 
            padding-top: 1px; 
            padding-bottom: 1px; 
            border-radius: 8px; 
            margin-bottom: 5px;\">
                <h4 style='color: white;'>" .
                $_SESSION['sign-up-status'] .
                "</h4>
            </div>";
            ?>

            <script>
                document.getElementById("sign-up-page").style.display = 'flex';
                // isSignUpShown = !isSignUpShown;
                setTimeout(() => {
                    document.getElementById("page-status").style.display = 'none';
                }, 3000);
            </script>

            <?php
            unset($_SESSION["sign-up-status"]);
        }
        ?>
    </div>
    <form class="sign-up-form" id="sign-up-form" action="/site/backend/code.php" method="POST">
        <div class="header-box">
            <div class="close-box">
                <img onclick="closeSignUp()" class="close-button" id="close-button" src="/src/close-white.png" />
            </div>
            <label class="header-sign-up">SIGN UP</label>
        </div>
        <div class="form-input-box">
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-up">Username:</label>
                </div>
                <div class="input-box">
                    <input id="username-input" class="input-sign-up" type="text" placeholder="Username" name="username"
                        required />
                </div>
            </div>
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-up">Email:</label>
                </div>
                <div class="input-box">
                    <input id="email-input" class="input-sign-up" type="email" placeholder="Email" name="email"
                        required />
                </div>
            </div>
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-up" id="contact-label">Contact Number:</label>
                </div>
                <div class="input-box">
                    <input id="contact-input" class="input-sign-up" type="text" placeholder="Contact no." name="contact"
                        required />
                </div>
            </div>
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-up">Password:</label>
                </div>
                <div class="input-box">
                    <input id="password-input" class="input-sign-up" type="password" placeholder="Password"
                        name="password" required />
                </div>
            </div>
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-up" id="confirm-pass-label">Confirm Password:</label>
                </div>
                <div class="input-box">
                    <input id="confirm-password-input" class="input-sign-up" type="password"
                        placeholder="Confirm Password" required />
                </div>
            </div>
        </div>
        <button class="sign-up-button" name="sign-up-button" type="submit">
            Create
        </button>
    </form>
</div>

<!-- SIGN IN PAGE -->
<div class="float-page" id="sign-in-page">
    <div class="sign-in-alert" id="sign-in-alert">
        <?php
        if (isset($_SESSION['sign-in-status'])) {
            echo "
            <div id=\"page-status\" style=\"
            background-color: #3e3232; 
            padding-left: 20px; 
            padding-right: 20px; 
            padding-top: 1px; 
            padding-bottom: 1px; 
            border-radius: 8px; 
            margin-bottom: 5px;\">
                <h4 style='color: white;'>" .
                $_SESSION['sign-in-status'] .
                "</h4>
            </div>
            ";
            ?>

            <script>
                document.getElementById("sign-in-page").style.display = 'flex';
                // isSignInShown = !isSignInShown;
                setTimeout(() => {
                    document.getElementById("page-status").style.display = 'none';
                }, 3000);
            </script>

            <?php
            unset($_SESSION["sign-in-status"]);
        }
        ?>
    </div>
    <form class="sign-in-form" id="sign-in-form" action="/site/backend/login_backend.php" method="POST">
        <div class="header-box">
            <div class="close-box">
                <img onclick="closeSignIn()" class="close-button" id="close-button" src="/src/close-white.png" />
            </div>
            <label class="header-sign-in">SIGN IN</label>
        </div>
        <div class="form-input-box">
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-in">Username:</label>
                </div>
                <div class="input-box">
                    <input id="username-input" class="input-sign-in" type="text" placeholder="Username"
                        name="sign-in-username" required />
                </div>
            </div>
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-in">Email:</label>
                </div>
                <div class="input-box">
                    <input id="email-input" class="input-sign-in" type="email" placeholder="Email" name="sign-in-email"
                        required />
                </div>
            </div>
            <div class="sub-input-box">
                <div class="label-box">
                    <label class="label-sign-in">Password:</label>
                </div>
                <div class="input-box">
                    <input id="password-input" class="input-sign-in" type="password" placeholder="Password"
                        name="sign-in-password" required />
                </div>
            </div>
        </div>
        <a class="forgot-password" href="">forgot password?</a>
        <button class="sign-in-button" name="sign-in-button" type="submit">
            LOGIN
        </button>
    </form>

</div>
<!-- HOME PAGE -->
<div class="pages" id="home-page"></div>
<!-- ABOUT US PAGE -->
<div class="pages" id="about-us-page"></div>
<!-- ABOUT DONUT PAGE -->
<div class="pages" id="donut-page"></div>
<!-- COFFEE PAGE -->
<div class="pages" id="coffee-page"></div>
<!-- REVIEWS PAGE -->
<div class="pages" id="reviews-page"></div>
<!-- CONTACT PAGE -->
<div class="pages" id="contact-page"></div>

<ul class="nav-bar">
    <div class="home-page" class="home-link">
        <a href="#home-page">
            <img class="store-home" src="/src/store.png" />
        </a>
    </div>
    <li class="nav-section" id="menu">
        Menu
        <div class="product-container">
            <a href="#donut-page" class="products">Donut</a>
            <a href="#coffee-page" class="products">Coffee</a>
        </div>
    </li>
    <li class="nav-section" id="about">
        <a href="#about-us-page">About Us</a>
    </li>
    <li class="nav-section" id="reviews">
        <a href="#reviews-page">Reviews</a>
    </li>
    <li class="nav-section" id="contact">
        <a href="#contact-page">Contact</a>
    </li>
    <li class="nav-section" id="sign-up" onclick="showSignUp()">Sign Up</li>
    <li class="nav-section" id="sign-in" onclick="showSignIn()">Sign In</li>
</ul>

<?php
include("footer.php");
?>