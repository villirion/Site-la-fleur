<form action="" method="post">
    <input type="submit" name="logOf" value="logOf"/>
</form>
<?php 
    echo "Bonjour, " . $_SESSION["username"];
    if(array_key_exists('logOf', $_POST)) {
        $_SESSION['status'] = "deconnecter";
        session_destroy();
        header("Refresh:0");
    }
?>