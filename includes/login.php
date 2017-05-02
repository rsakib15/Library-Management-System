<form class="login-form"  method="post" action="controller/login.php">
    <p>Username</p>
    <input type="text" name="user"/>
    <p>Password</p>
    <input type="password" name="password"/>

    <button name="submit" value="login">SIGN IN</button>
    <p class="message" onclick="signup()">Already registered? <a href="#">Sign Up</a></p>
</form>
