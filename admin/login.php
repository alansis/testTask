<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.11.2017
 * Time: 0:04
 */

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
<form method="POST" action="models/Loginmodel.php">
    Login: <br /><input type="text" name="login"/><br />
    Password: <br /><input type="password" name="password" /><br />
    <button type="submit" name="enter">Вхід</button>
</form>
</div>
</body>