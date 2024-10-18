<?php
require 'configpdo.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM medicamento WHERE id = :id");
    $sql->bindValue(':id', $id);

    try {
       
        if ($sql->execute()) {
            
            header("Location: lista.php?msg=Produto excluído com sucesso!");
            exit;
        } else {
            echo "Erro ao excluir o produto.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "ID do produto não especificado.";
}
?>
