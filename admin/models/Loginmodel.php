<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15.11.2017
 * Time: 21:30
 */

require '../db/conect.php';
class loginsite extends Connect
{
    public $password;
    public $login;
    public $validate;

    public function __construct()
    {
        parent::__construct("root", "");

        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
    }

    public function SelectUserFromDB()
    {
        $queryToUser = "SELECT `login`, `password` FROM user WHERE `login` = '$this->login'";
        $row = $this->link->query($queryToUser);
        $this->validate = $row->fetch(PDO::FETCH_ASSOC);
        $this->Enter();
    }

    public function Enter()
    {
            if (password_verify($this->password, $this->validate['password'])) {
                $_SESSION['user'] = $this->validate['login'];
                echo "Вітаєм вас " . $_SESSION['user'];
                return TRUE;
            } else {
               echo "Не вірно введений логін або пароль";
                return FALSE;
            }

    }

    public function location()
    {
        if ($this->Enter() == TRUE) {
            return header('Location: ../selectAll.php');
        } else {
            echo "bad";
        }
    }


}

$user = new loginsite();
$user->SelectUserFromDB();
$user->location();

