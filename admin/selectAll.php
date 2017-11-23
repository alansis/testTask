<?php
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use admin\config\Connect;
use admin\config\SimPageNav;


Class AllComent extends Connect {

function __construct()
{
parent::__construct("root", "");
}

public function selectPageToPagination(){
$count = isset($_GET['count']) ? $_GET['count'] : 2;
$start = isset($_GET['start']) ? $_GET['start'] : 0;

$all = $this->link->query('SELECT COUNT(*) FROM `comment`')->fetchColumn();
$stmt = $this->link->prepare('SELECT * FROM `comment` LIMIT  :limit OFFSET :offset');
$stmt->bindValue(':limit', (int)$count, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$start, PDO::PARAM_INT);
$stmt->execute();
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
$this->showPage($pages);
$this->Pagination($all, $count, $start);

if(isset($_GET['del'])){
$one = $this->link->prepare('DELETE FROM `comment` WHERE `comment` . `id` = :id');
$one->bindValue(':id', (int)$_GET['del'], PDO::PARAM_INT);
$one->execute();
header("Location:" . $_SERVER['PHP_SELF']);
}

if(isset($_GET['rename'])){
header("Location: update.php?id=" . $_GET['rename']);
}

}

public function Pagination($all, $count, $start){
$pagenav = new SimPageNav();
echo $pagenav->getLinks($all, $count, $start, 2, 'start' );
}


public function showPage($pages){
foreach ($pages AS $page) {
echo '<tr>';
    echo '<td>' . $page['Data'] . '</td>';
    echo '<td>' . $page['name'] . '</td>';
    echo '<td>' . $page['email'] . '</td>';
    echo '<td>' . $page['description'] . '</td>';
    echo '<td>' . $page['user_IP'] . '</td>';
    echo '<td>' . $page['browser'] . '</td>';
    echo '<td>' . '<a href="' . $_SERVER['PHP_SELF'] . '?del=' . $page['id'] .  '"' . '/>' . 'Видалити' . '</td>';
    echo '<td>' . '<a href="' . $_SERVER['PHP_SELF'] . '?rename=' . $page['id'] .  '"' . '/>' . 'Редагувати' . '</td>';
    echo '</tr>';
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Вивід коментарів</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <table class="table table-bordered">
        <thead>
        <tr>
            <th><a href="<?php $_SERVER['PHP_SELF'] ?>?sort=">Дата</a></th>
            <th>Імя</th>
            <th>Емейл</th>
            <th>Опис</th>
            <th>IP адресса</th>
            <th>Браузер</th>
            <th>Видалити</th>
            <th>Редагувати</th>
        </tr>
        </thead>
        <tbody>
            <?php

            $all = new AllComent();
            $all->selectPageToPagination(); ?>
        </tbody>
</div>
</body>
</html>
