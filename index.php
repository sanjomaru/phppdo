<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'phppdo';

//SET DSN
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

//Create PDO Instanse
$pdo = new PDO ($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//PDO Query
// $stmnt = $pdo->query('SELECT * FROM post');

// while($row = $stmnt->fetch()){
//     echo 'ID : '.$row['id'].'</br>';
//     echo 'title : '.$row['title'].'</br>';
//     echo 'body : '.$row['body'].'</br>';
//     echo 'author : '.$row['author'].'</br>';
//     echo 'is_published : '.$row['is_published'].'</br>';
//     echo 'created_at : '.$row['created_at'].'</br></br>';
// }

//PREPARED STATEMENTS
$id = 1;
$author = 'sanjo';

//Positional Parameters on the statement
echo 'This is a Positional Parameter</br>';
echo $sql = 'SELECT * FROM post WHERE id = ?';
echo '<br><br>';
$stmnt = $pdo->prepare($sql);
$stmnt->execute([$id]);
$posts = $stmnt->fetch();


//Fetch Dont need to loop

echo 'ID : '.$posts['id'].'</br>';
echo 'title : '.$posts['title'].'</br>';
echo 'body : '.$posts['body'].'</br>';
echo 'author : '.$posts['author'].'</br>';
echo 'is_published : '.$posts['is_published'].'</br>';
echo 'created_at : '.$posts['created_at'].'</br></br>';

//Fetch all needs to loop
$sql = 'SELECT * FROM post WHERE author = ?';
$stmnt = $pdo->prepare($sql);
$stmnt->execute([$author]);
$posts = $stmnt->fetchAll();

foreach($posts as $post){
    echo 'ID : '.$post['id'].'</br>';
    echo 'title : '.$post['title'].'</br>';
    echo 'body : '.$post['body'].'</br>';
    echo 'author : '.$post['author'].'</br>';
    echo 'is_published : '.$post['is_published'].'</br>';
    echo 'created_at : '.$post['created_at'].'</br></br>';
}

//Named Parameters on the statement
echo 'This is a Named Parameter</br>';
echo $sql = 'SELECT * FROM post WHERE id = :id';
echo '<br><br>';
$stmnt = $pdo->prepare($sql);
$stmnt->execute(['id' => $id]);
$post = $stmnt->fetch();

echo 'ID : '.$post['id'].'</br>';
echo 'title : '.$post['title'].'</br>';
echo 'body : '.$post['body'].'</br>';
echo 'author : '.$post['author'].'</br>';
echo 'is_published : '.$post['is_published'].'</br>';
echo 'created_at : '.$post['created_at'].'</br></br>';