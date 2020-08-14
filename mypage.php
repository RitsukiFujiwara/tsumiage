<?php
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　マイページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

require('auth.php');
?>

<?php
$siteTitle = 'マイページ';
require('head.php');
?>
<?php
require('header.php');
?>
<body>
    <section>


        <?php
        require('sidebar.php');
        ?>
    </section>

<?php
require('footer.php');
?>