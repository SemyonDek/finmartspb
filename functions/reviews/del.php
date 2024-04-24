<?php
require_once('../../config/connect.php');

$reviewid = $_POST['reviewid'];

mysqli_query($ConnectDatabase, "DELETE FROM reviews WHERE `reviews`.`ID` = $reviewid");

require_once('../../config/reviews.php');

?>

<div id="reviews-list" class="reviews-main-block">
    <?php
    addReviewsListAdm($reviews, $productList);
    ?>
</div>