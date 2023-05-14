<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form action="zadanie5.php" method="post">
        <fieldset>
            <legend>
                Login
            </legend>
            <label>Login</label>
            <input name="login">
            <label>Password</label>
            <input name="password">
            <input type="submit" value="Log in">
        </fieldset>
    </form>
</body>
</html>


<?php
    if($_POST["login"] == "userlogin" && $_POST["password"] == "userpassword"){
        echo "Succesful login";
    }
    else
    {
        echo "Invalid login or password";
    }

?>