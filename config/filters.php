<?
if (isset($_GET['search']) && $_GET['search'] !== '') {
    $search = '%' . $_GET['search'] . '%';
    $searchStr = " (
        `NAME` LIKE '$search' or 
        `CODE` LIKE '$search')";
} else $searchStr = '';

if (isset($_GET['catid']) && $_GET['catid'] !== '' && !preg_match('/\s/', $_GET['catid'])) {
    if ($_GET['catid'] !== '0') {
        $catidStr = "AND `CATID` = '" . $_GET['catid'] . "'";
    } else {
        $catidStr = '';
    }
} else $catidStr = '';

if (isset($_GET['brand']) && $_GET['brand'] !== '' && !preg_match('/\s/', $_GET['brand'])) {
    $brandStr = "AND `BRAND` = '" . $_GET['brand'] . "'";
} else $brandStr = '';

if (isset($_GET['min_price']) && ($_GET['min_price'] !== '' && !preg_match('/\s/', $_GET['min_price']))) {
    $min_prod_mass = $_GET['min_price'];;
} else {
    $min_prod_mass = 0;
}

if (isset($_GET['max_price']) && ($_GET['max_price'] !== '') && !preg_match('/\s/', $_GET['max_price'])) {
    $max_prod_mass = $_GET['max_price'];
} else {
    $max_prod_mass = 3000000000;
}

if (isset($_GET['sort']) && $_GET['sort'] !== '') {
    $sort = 'ORDER BY `ID` ' . $_GET['sort'];
} else $sort = '';
