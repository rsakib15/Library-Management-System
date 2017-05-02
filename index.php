<?php
    session_start();
    ob_start();
    if(!empty($_SESSION['user'])){
        if($_SESSION['user_type']=='admin')
            header('location: dashboardadmin.php');
        else
            header('location: dashboard.php');
    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <noscript>
        <META HTTP-EQUIV="Refresh" CONTENT="0;URL=nojs.php">
    </noscript>
</head>

<body>
    <div class="container">
        <div class="info">
            <h1>Library Management System</h1>
        </div>
    </div>
    <div class="form login-form">
        <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
        <?php
        if (isset($_SESSION['loginerror'])){
            echo '
                 <div class="loginerror" id="dummy">
                     <p class="errortxt">Incorrect Username and Password</p>
                  </div>
                     ';
            unset($_SESSION['loginerror']);
        }
        ?>
        <div id="login-form">
            <form class="login-form"  method="post" action="controller/login.php">
                <input type="text" name="user"/>
                <input type="password"  name="password"/>
                <button name="submit" value="login">SIGN IN</button>
                <p class="message">Already registered? <a href="#" onclick="signup()">Sign Up</a></p>
            </form>
        </div>
    </div>
    <script src="js/sc.js"></script>

    <script>
        var fn=false,ln=false,un=false,ps=false,em=false,ph=false,p1=false,p2=false;


        function is_valid_mobile(mobile){
            mobile=mobile.replace(" ","");
            mobile=mobile.replace("-","");
            if( /^(0088|\+88)?(01)[156789]{1}[0-9]{8}$/.test(mobile)){
                return true;
            }
            else{
                return false;
            }
        }

        function is_valid_email(email){
            if(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/.test(email)){
                return true;
            }
            else{
                return false;
            }
        }

        function passwordcheck(p1){
            len=p1.length;
            if(len<9){
                return false;
            }
            if(/[\'^£$%&*()}{@#~?><>,|=_+¬-]/.test(p1)){
                return true;
            }
            else {
                return false;
            }
        }

        function namecheck(elm){
            if(elm.getAttribute("name")=="username"){

                if(elm.value=="") {
                    document.getElementById("usernameerror").style.display = "block";
                    document.getElementById("usernameerror").innerHTML = "Username cannot be blank";
                    document.getElementById("usernameerror").style.color = "red";
                    document.getElementById("usernameerror").style.textAlign = "left";
                    un=true;
                }
                else{
                    document.getElementById("usernameerror").style.display="none";
                    un=true;
                }
            }

            if(elm.getAttribute("name")=="firstname"){
                if(elm.value=="") {
                    document.getElementById("firstnameerror").style.display = "block";
                    document.getElementById("firstnameerror").innerHTML = "Firstname cannot be blank";
                    document.getElementById("firstnameerror").style.color = "red";
                    document.getElementById("firstnameerror").style.textAlign = "left";
                    fn=false;
                }
                else{
                    document.getElementById("firstnameerror").style.display="none";
                    fn=true;
                }
            }

            if(elm.getAttribute("name")=="lastname"){
                if(elm.value=="") {
                    document.getElementById("lastnameerror").style.display = "block";
                    document.getElementById("lastnameerror").innerHTML = "Lastname cannot be blank";
                    document.getElementById("lastnameerror").style.color = "red";
                    document.getElementById("lastnameerror").style.textAlign = "left";
                    ln=false;
                }
                else{
                    document.getElementById("lastnameerror").style.display="none";
                    ln=true;
                }
            }
        }


        function emailcheck(elm) {
            if(!is_valid_email(elm.value)){
                document.getElementById("emailerror").style.display = "block";
                document.getElementById("emailerror").innerHTML = "Email Not Valid";
                document.getElementById("emailerror").style.color = "red";
                document.getElementById("emailerror").style.textAlign = "left";
                em=false;
            }
            else {
                document.getElementById("emailerror").style.display = "none";
                //checkAvailable('email',elm.value);
                em=true;
            }
        }

        function phonecheck(elm) {
            if(!is_valid_mobile(elm.value)){
                document.getElementById("phoneerror").style.display = "block";
                document.getElementById("phoneerror").innerHTML = "Phone Number is not Valid";
                document.getElementById("phoneerror").style.color = "red";
                document.getElementById("phoneerror").style.textAlign = "left";
                ph=false;
            }
            else {
                document.getElementById("phoneerror").style.display = "none";
                ph=true;
            }
        }


        function passonecheck(elm){
            if(!passwordcheck(elm.value)){
                document.getElementById("passwordoneerror").style.display = "block";
                document.getElementById("passwordoneerror").innerHTML = "Password is not Valid";
                document.getElementById("passwordoneerror").style.color = "red";
                document.getElementById("passwordoneerror").style.textAlign = "left";
                p1=false;
            }
            else{
                document.getElementById("passwordoneerror").style.display = "none";
                p1=true;
            }
        }

        function passtwocheck(elm){
            if(document.getElementById("passtwo").value!=document.getElementById("passone").value){
                document.getElementById("passwordtwoerror").style.display = "block";
                document.getElementById("passwordtwoerror").innerHTML = "Password did no match";
                document.getElementById("passwordtwoerror").style.color = "red";
                document.getElementById("passwordtwoerror").style.textAlign = "left";
                p2=false;
            }
            else{
                document.getElementById("passwordtwoerror").style.display = "none";
                p2=true;
            }
        }

        function submitcheck() {
            namecheck(document.forms[0].elements[0]);
            namecheck(document.forms[0].elements[1]);
            namecheck(document.forms[0].elements[2]);
            phonecheck(document.forms[0].elements[3]);
            emailcheck(document.forms[0].elements[4]);
            passonecheck(document.forms[0].elements[5]);
            passtwocheck(document.forms[0].elements[6]);
            if(un=true && fn==true && ln==true && ph==true && em==true && p1==true && p2==true) {
                document.getElementById("signup").style.disabled = false;
            }

            else alert("Reqired Data Missing");
        }

    </script>


    <script>
        xmlHttp=new XMLHttpRequest();
        function checkAvailable(id,val) {
            xmlHttp.onreadystatechange=function(){
                if(xmlHttp.readyState==4 && xmlHttp.status==200) {
                    var ret=xmlHttp.responseText;
                    if(ret=='true') {
                        if(id=='email') {
                            document.getElementById("uerr").style.visibility="visible";
                            document.getElementById("uerr").innerHTML = "User Name already in use!!";
                            document.forms[0].elements[3].style.borderColor="red";
                            un="";
                        }
                        else {
                            document.getElementById("eerr").style.visibility="visible";
                            document.getElementById("eerr").innerHTML = "Email Address already in use!!";
                            document.forms[0].elements[4].style.borderColor="red";
                            em="";
                        }
                    }
                    else {
                        if(id=='uname') {
                            document.getElementById("uerr").style.visibility="hidden";
                            document.forms[0].elements[3].style.borderColor="#f8efe9";
                            un="ok";
                        }
                        else {
                            document.getElementById("eerr").style.visibility="hidden";
                            document.forms[0].elements[2].style.borderColor="#f8efe9";
                            em="ok";
                        }
                    }
                }
            };
            var url="avail_check.php?id="+id+"&val="+val;
            console.log(url);
            xmlHttp.open("GET",url,true);
            xmlHttp.send();
        }
    </script>



</body>
</html>
