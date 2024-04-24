<?php
require_once('../../config/connect.php');
session_start();

$userid = $_SESSION['accountId'];

$usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$userid'");
$usersData = mysqli_fetch_assoc($usersData);

$username = $usersData['NAME'];

$prodid = htmlentities(mysqli_real_escape_string($ConnectDatabase, $_POST['prodid']));
$rateit = htmlentities(mysqli_real_escape_string($ConnectDatabase, $_POST['rateit']));
$commtext = htmlentities(mysqli_real_escape_string($ConnectDatabase, $_POST['commtext']));

mysqli_query($ConnectDatabase, "INSERT INTO `reviews` (`ID`, `PRODID`, `NAME`, `RATEIT`, `TEXT`) VALUES (NULL, '$prodid', '$username', '$rateit', '$commtext')");

require_once('../../config/reviews.php');

$reviewsList = mysqli_query($ConnectDatabase, "SELECT * FROM `reviews` WHERE PRODID = '$prodid'");
$reviewsList = mysqli_fetch_all($reviewsList, MYSQLI_ASSOC);
if (isset($reviewsList)) {
    $countReview = count($reviewsList);
    $finalRateit = 0;
    if ($countReview !== 0) {
        foreach ($reviewsList as $item) {
            $finalRateit += $item['RATEIT'];
        }
        $finalRateit = $finalRateit  / $countReview;
        $finalRateit = round($finalRateit);
    }
} else {
    $countReview = 0;
    $finalRateit = 0;
}
?>

<div id="reviews-list" class="reviews-list-block">
    <?php
    addReviewsListUser($reviewsList);
    ?>
</div>

<div id="main-star-review" class="line-main-char">
    <?php
    for ($i = 0; $i < $finalRateit; $i++) {
    ?>
        <div class="star-review-item fill-star"></div>
    <?php
    }
    for ($i = 0; $i < 5 - $finalRateit; $i++) {
    ?>
        <div class="star-review-item clear-star"></div>
    <?php
    }
    ?>
</div>

<div id="review-tub" class="tab-item">Отзывы (<?= $countReview ?>)</div>