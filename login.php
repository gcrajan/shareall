<?php

require("php/Classes.php");
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
{
    if($_POST["Action"] == "Signin")
    {
        $U->Login($_POST["Email"],trim($_POST["Password"]," "));
    }
    else if($_POST["Action"] == "Signup")
    {
        if(isset($_SESSION["OTP"]))
        {
            if( $_SESSION["OTP"] == $_POST["OTP"])
            {
                if($U->Create($_POST["Email"],$_POST["Uname"],trim($_POST["Password"]," "),$_POST["Location"],$_POST["Location1"],$_POST["Contact"],$_FILES["Pic"])){ echo "User created you can login"; }
            }
            else{ echo "OTP doesnt match"; }
        }
        else{ echo "No Otp Sent"; }
        unset($_SESSION["OTP"]);
    }

    unset($_POST);
}
if($U->Is_loggedin()){header("Location:profile.php");}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <title>ShareAll</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background: #f6f5f7;Overflow:hidden;">
    <nav id="navbar" class="navbar-login">
        <a href="index.php"><button class="btnAll">Go back</button></a>
    </nav>
    <section id="loginRegister">
        <div class="container-loginRegister" id="container-loginRegister-id">
            <div class="form-container sign-up-container" style="Overflow:auto;">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-loginRegister" style="height:fit-content;" method="post" enctype="multipart/form-data">
                    <h1 id="main-text-loginRegister">Create Account</h1>

                    <input type="hidden" name="Action" value="Signup">

                    <input type="text" placeholder="Name" name="Uname" required/>

                    <input type="email" id="email" placeholder="Email" name="Email" required/>

                    <input type="password" placeholder="Password" name="Password" required/>

                    <input type="text" placeholder="Permanent Location" name="Location" required/>

                    <input type="text" placeholder="Temporary Location" name="Location1" required/>

                    <input type="text" placeholder="Contact" name="Contact" required/>

                    <input type="file" id="img"  name="Pic" required/>

                    <button type="button" class="btn-loginRegister" id="btn-verifyUser" onclick="sendOTP();">Send OTP</button>

                    <input type="text" placeholder="Enter OTP" id="modal-verifyPin" name="OTP" required/>

                    <button type="submit" class="btn-loginRegister" name="submit">SIGN UP</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-loginRegister" method="post">

                    <h1 id="main-text-loginRegister">Sign in</h1>

                    <input type="hidden" name="Action" value="Signin" />

                    <input type="email" placeholder="Email" name="Email"/>

                    <input type="password" placeholder="Password" name="Password"/>

                    <button type="submit" name="submit" class="btn-loginRegister">Sign In</button>

                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1 id="main-text-loginRegister">Welcome Back!</h1>
                        <p id="para-text-loginRegister">To keep connected with us please login with your personal info
                        </p>
                        <button class="ghost btn-loginRegister" id="signUp">Sign Up</button>
                    </div>
                    <div class="overlay-panel overlay-left">
                        <h1 id="main-text-loginRegister">Hello, Friend!</h1>
                        <p id="para-text-loginRegister">Enter your personal details and start journey with us</p>
                        <button class="ghost btn-loginRegister" id="signIn">Sign In</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="js/loginScript.js"></script>
    
</body>

</html>