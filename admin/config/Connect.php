<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15.11.2017
 * Time: 21:46
 */
namespace admin\config;
    //require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
    use PDO;
    use PDOException;

    class Connect {
        public $link;
        public function __construct($username, $password) {
            try {
                $this -> link = new PDO('mysql:host=localhost;dbname=testTask;charset=utf8', $username, $password);
                echo "OK";
            } catch (PDOException $e) {
                echo $e -> getMessage() . "" . "<br>";
                die();
            }
        }
    }



