<?php include('php/setCatalogue.php'); ?>
<?php include('php/function.php'); ?>
<?php include('php/header.php'); ?>
    <div class="content">
        <?php include('php/menu.php'); ?>
        <?php include('php/'.$_SESSION['content'].'.html'); ?>
    </div>
<?php include('php/footer.php'); ?>
