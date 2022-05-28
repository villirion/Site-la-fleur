    <div class="menu">
        <ul>
            <form action="" method="post">
                <li><input type="submit" name="index" class="button" value="acceuil" /></li>
                <li><input type="submit" name="bulbes" class="button" value="bulbes" /></li>
                <li><input type="submit" name="rosiers" class="button" value="rosiers" /></li>
                <li><input type="submit" name="massif" class="button" value="massif" /></li>
                <li><input type="submit" name="contact" class="button" value="contact" /></li>
            </form>
        </ul>
    </div>
    <?php 
        $content = "index";
        if(array_key_exists('acceuil', $_POST)) {
            $content = "index";
        }
        if(array_key_exists('bulbes', $_POST)) {
            $content = "bulbes";
        }
        if(array_key_exists('rosiers', $_POST)) {
            $content = "rosiers";
        }
        if(array_key_exists('massif', $_POST)) {
            $content = "massif";
        }
        if(array_key_exists('contact', $_POST)) {
            $content = "contact";
        }
    ?>