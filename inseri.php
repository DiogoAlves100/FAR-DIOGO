<?php

require 'configPDO.php';

$nomeProduto=$_POST['produto'];
$quantidadeProtudo=$_POST['quantidade'];
$precoProduto=$_POST['preco'];
$categoriaProduto=$_POST['categoria'];
$dataValidadeProduto=$_POST['data_validade'];

$sql = $pdo->prepare("INSERT INTO estoque (produto, preco, quantidade, categoria, data_validade) VALUES (:produto, :preco, :quantidade, :categoria, :data_validade)");


$sql->bindValue(':produto', $nomeProduto);
$sql->bindValue(':preco', $precoProduto);
$sql->bindValue(':quantidade', $quantidadeProtudo);
$sql->bindValue(':categoria', $categoriaProduto);
$sql->bindValue(':data_validade', $dataValidadeProduto);


$sql->execute();
?>

