window.onload = function() {
    signin();
};
function signin() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("login-form").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", "includes/login.php", true);
    xhttp.send();
}
function signup() {
    if(document.getElementById("dummy"))
        document.getElementById("dummy").style.display="none";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("login-form").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", "includes/registration.php", true);
    xhttp.send();
}