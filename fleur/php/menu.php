    <div class="menu">
        <ul>
            <form action="" method="post">
                <li><input type="submit" name="accueil" value="accueil" /></li>
                <li><input type="submit" name="bulbes" value="bulbes" /></li>
                <li><input type="submit" name="rosiers" value="rosiers" /></li>
                <li><input type="submit" name="massif" value="massif" /></li>
                <li><input type="submit" name="contact" value="contact" /></li>
            </form>
        </ul>
    </div>
    <?php 
        if(array_key_exists('accueil', $_POST)) {
            $_SESSION['content'] = "index";
        }
        if(array_key_exists('bulbes', $_POST)) {
            $_SESSION['content'] = "bulbes";
        }
        if(array_key_exists('rosiers', $_POST)) {
            $_SESSION['content'] = "rosiers";
        }
        if(array_key_exists('massif', $_POST)) {
            $_SESSION['content'] = "massif";
        }
        if(array_key_exists('contact', $_POST)) {
            $_SESSION['content'] = "contact";
        }
    ?>