<form class="login-form" id="login_form" action="controller/login.php" method="post">
    <div class="error" id="usernameerror"></div>
    <input type="text" name="username" id="username" placeholder="Username" onkeyup="namecheck(this)"/>
    <div id="firstnameerror" class="error"></div>
    <input type="text" name="firstname" id="firstname" placeholder="Firstname" onkeyup="namecheck(this)"/>
    <div id="lastnameerror" class="error"></div>
    <input type="text" name="lastname" id="lastname" placeholder="Lastname" onkeyup="namecheck(this)"/>
    <div id="phoneerror" class="error"></div>
    <input type="text" name="phone" id="phone" placeholder="Phone" onkeyup="phonecheck(this)"/>
    <div id="emailerror" class="error"></div>
    <input type="text" name="email" id="email" placeholder="Email address" onkeyup="emailcheck(this)"/>
    <div id="passwordoneerror" class="error"></div>
    <input type="password" name="passone" id="passone" placeholder="Password" onkeyup="passonecheck(this)"/>
    <div id="passwordtwoerror" class="error"></div>
    <input type="password" name="passtwo" id="passtwo" placeholder="Confirm Password" onkeyup="passtwocheck(this)"/>
    <button name="submit" value="signup" id="signup" onclick="submitcheck()">SIGN UP</button>
    <p class="message" onclick="signin()">Already registered? <a href="#">Sign In</a></p>
</form>