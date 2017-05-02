<form class="login-form" id="login_form" action="controller/login.php" method="post">
    <div class="error" id="usernameerror"></div>
    <p>Username</p>
    <input type="text" name="username" id="username"  onkeyup="namecheck(this)"/>
    <div id="firstnameerror" class="error"></div>
    <p>First Name</p>
    <input type="text" name="firstname" id="firstname" onkeyup="namecheck(this)"/>
    <div id="lastnameerror" class="error"></div>
    <p>Last Name</p>
    <input type="text" name="lastname" id="lastname" onkeyup="namecheck(this)"/>
    <div id="phoneerror" class="error"></div>
    <p>Phone</p>
    <input type="text" name="phone" id="phone" onkeyup="phonecheck(this)"/>
    <div id="emailerror" class="error"></div>
    <p>Email</p>
    <input type="text" name="email" id="email" onkeyup="emailcheck(this)"/>
    <div id="passwordoneerror" class="error"></div>
    <p>Password</p>
    <input type="password" name="passone" id="passone" onkeyup="passonecheck(this)"/>
    <div id="passwordtwoerror" class="error"></div>
    <p>Confirm Password</p>
    <input type="password" name="passtwo" id="passtwo" onkeyup="passtwocheck(this)"/>
    <button name="submit" value="signup" id="signup" onclick="submitcheck()">SIGN UP</button>
    <p class="message" onclick="signin()">Already registered? <a href="#">Sign In</a></p>
</form>