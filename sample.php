<?php

    $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8','root','');

    $sql = 'SELECT * FROM players';
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $results = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row;
    }

    $statement = null;
    $pdo = null;

    $message = 'hello world';
    require_once 'views/content.tpl.php';