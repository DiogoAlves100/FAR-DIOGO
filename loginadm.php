<?php
require 'configpdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

 
    $sql = "SELECT * FROM admin WHERE usuario = :usuario LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($senha, $admin['senha'])) {
   
        session_start();
        $_SESSION['admin'] = $admin['usuario'];
        header('Location: login.php'); 
    } else {
   
        echo "Usuário ou senha incorretos.";
    }
}
?>
