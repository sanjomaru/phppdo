<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'phppdo';

//SET DSN
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

//Create PDO Instanse
$pdo = new PDO ($dsn, $user, $password);

//PDO Query
$stmnt = $pdo->query('SELECT * FROM post');

while($row = $stmnt->fetch(PDO::FETCH_ASSOC)){
    echo 'ID : '.$row['id'].'</br>';
    echo 'title : '.$row['title'].'</br>';
    echo 'body : '.$row['body'].'</br>';
    echo 'author : '.$row['author'].'</br>';
    echo 'is_published : '.$row['is_published'].'</br>';
    echo 'created_at : '.$row['created_at'].'</br></br>';
}