<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.11.2017
 * Time: 22:38
 */
require_once 'db/conect.php';

Class UpdateComment extends Connect {

    public function __construct()
    {
        parent::__construct("root", "");
    }

    public function selectCommentFormDB(){
        $stmt = $this->link->prepare('SELECT * FROM `comment` WHERE `id` = :id ');
        $stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $commentOne = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->displayComment($commentOne);
    }

    public function displayComment($commentOne) {
          foreach ($commentOne as $comment) {
              echo '<br>';
              echo '<label for="usr">' . 'Імя та ініціали:' . '</label>';
              echo '<input type="text" class="form-control"' . 'name="name"' . 'value=' . $comment['name'] . '>';
              echo '<br>';
              echo '<label for="email">' . 'Email:' . '</label>';
              echo '<input type="text" class="form-control"' . 'name="email"' . 'value=' . $comment['email'] . '>';
              echo '<br>';
              echo '<label for="email">' . 'Опис:' . '</label>';
              echo '<textarea class="form-control" rows="5" name="description"' . '>' . $comment['description'] . '</textarea>';
              echo '<br>';
          }
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<div class="container">


<div class="form-group">
    <form action="controller/Updatecontroller.php?id=<?=(int)$_GET['id']?>" id="update" method="post">
        <?php
        $model = new UpdateComment();
        $model->selectCommentFormDB();
        ?>
        <button class="btn btn-primary btn-md" id="update">Надіслати</button>
    </form>

</div>

</div>