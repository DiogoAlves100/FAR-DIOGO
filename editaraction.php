<?php
require 'configPDO.php';

$id = $_GET['id']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeProduto = $_POST['produto'];
    $quantidadeProtudo = $_POST['quantidade'];
    $precoProduto = $_POST['preco'];
    $categoriaProduto = $_POST['categoria'];
    $dataValidadeProduto = $_POST['data_validade'];

    $sql = $pdo->prepare("UPDATE estoque SET 
        produto = :produto, 
        preco = :preco, 
        quantidade = :quantidade, 
        categoria = :categoria, 
        data_validade = :data_validade
        WHERE id = :id");

    $sql->bindValue(':produto', $nomeProduto);
    $sql->bindValue(':preco', $precoProduto);
    $sql->bindValue(':quantidade', $quantidadeProtudo);
    $sql->bindValue(':categoria', $categoriaProduto);
    $sql->bindValue(':data_validade', $dataValidadeProduto);
    $sql->bindValue(':id', $id);

    $sql->execute();

   
    header("Location: listar.php");
    exit;
}
?>
