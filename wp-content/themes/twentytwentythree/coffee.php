<?php
/* Template Name: Coffee */
?>
<?php
if (function_exists('hs_give_me_coffee'))
{
    $src = hs_give_me_coffee();
    ?>
    <h1>Your random coffee cup</h1>

    <img src="<?= $src ?>">
    <?php
}
?>