//----------------for otp---------------------------
console.log("Ok running2")
function sendOTP()
{
    document.getElementById("btn-verifyUser").style.display="none"
    setTimeout(()=>{document.getElementById("btn-verifyUser").style.display="block"},5000)

    var xmlreq = new XMLHttpRequest();
    xmlreq.open("POST","/shareAll/php/sendotp.php")
    xmlreq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlreq.onload=()=>{
        
        if(xmlreq.responseText.includes("Error")){document.getElementById("error_OTP").innerText ="Error Sending OPT Please Retry"} 
        // console.log(xmlreq.responseText)     
    }
    xmlreq.send("Email="+document.getElementById("email").value);
       
}



// ------------for login register-------------------------- 
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const loginRegistercontainer = document.getElementById('container-loginRegister-id');

signUpButton.addEventListener('click', () => {
	loginRegistercontainer.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	loginRegistercontainer.classList.remove("right-panel-active");
});

