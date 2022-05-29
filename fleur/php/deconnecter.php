<form action="" method="post">
    <input type="text" placeholder="Username" name="username">
    <input type="text" placeholder="Password" name="pwd">
    <input type="submit" name="Login" value="Login" />
</form>
<form action="" method="post">
    <input type="submit" name="register" value="register"/>
</form>
<?php
    if(array_key_exists('register', $_POST)) {
        $_SESSION['content'] = "register";
    }
?>