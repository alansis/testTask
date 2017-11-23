<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.11.2017
 * Time: 19:07
 */
namespace admin\controller;

require_once dirname(dirname(__FILE__)) . '../vendor/autoload.php';
use admin\config\Connect;
Class UpdateControler extends Connect {
    public $name;
    public $email;
    public $description;

    public function __construct()
    {
        parent::__construct("root", "");
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->description = $_POST['description'];
    }

    public function updateComment(){
        $sql  = 'UPDATE `comment` SET `name`= :name,`email`= :email,`description`= :description WHERE `id` = :id';
        $stmt = $this->link->prepare($sql);
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_LOB);
        $stmt->execute();
    }

    public function redirect(){
        header("Location: ../selectAll.php");
    }
}

$newUpdate = new UpdateControler();
$newUpdate->updateComment();
$newUpdate->redirect();