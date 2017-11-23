<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15.11.2017
 * Time: 18:49
 */
require_once __DIR__ . '/vendor/autoload.php';
$siteKey = '6LfD4zgUAAAAABDSWbEcXWQF9RaZLHTDgS82Yfdn';
$lang = 'ua';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Вивід коментарів</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="JS/sendDataFromCommentForm.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<script>

</script>

<div class="container">
    <fieldset>
        <legend align="right">Форма залишення коментарію</legend>

        <div class="form-group">
            <label for="nameSubname">Прізвище та ініціали</label>
            <input type="text" class="form-control" id="nameSubname" placeholder="Введіть ваше прізвище та ініціали">
        </div>
        <div class="form-group">
            <label for="nameSubname">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Введіть ваш емейл">
        </div>

        <div class="form-group">
            <label for="Description">Коментарій</label>
            <textarea class="form-control" id="description" rows="5"></textarea>
        </div>

        <div class="g-recaptcha" data-sitekey="<?= $siteKey; ?>"></div>
        <script type="text/javascript"
                src="https://www.google.com/recaptcha/api.js?hl=<?= $lang; ?>">
        </script>
    </fieldset>

    <button class="btn btn-primary btn-md" id="enter" onclick="ValidateCaptch()">Надіслати</button>

</div>

</html>