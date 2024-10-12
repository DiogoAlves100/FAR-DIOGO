<?php
require 'configPDO.php';

$id = $_GET['id'];

if ($id) {
    
    $sql = $pdo->prepare("DELETE FROM estoque WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

  
    header("Location: listar.php");
    exit;
}
?>
