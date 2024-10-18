<?php
require 'configpdo.php';

$email=$_GET['email'];
$senha=$_GET['senha'];


$sql = $pdo->prepare("INSERT INTO usuario(email,senha) VALUES (:email,:senha)");

$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $senha);


$sql->execute();
?>