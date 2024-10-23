<?php
require 'configpdo.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_medicamento = $_POST['nome_medicamento'];

 
    $sql = "SELECT * FROM medicamento WHERE produto LIKE :nome_medicamento";
    $stmt = $pdo->prepare($sql);
    $nome_medicamento_param = '%' . $nome_medicamento . '%'; 
    $stmt->bindParam(':nome_medicamento', $nome_medicamento_param);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados) {
        echo "<h2>Resultados da Busca:</h2>";
        echo "<ul>";
        foreach ($resultados as $medicamento) {
       
            echo "<li>Produto: " . htmlspecialchars($medicamento['produto']) . 
                 " | Preço: R$" . htmlspecialchars($medicamento['preco']) . 
                 " | Quantidade: " . htmlspecialchars($medicamento['quantidade']) . 
                 " | Categoria: " . htmlspecialchars($medicamento['categoria']) . 
                 " | Data de Validade: " . htmlspecialchars($medicamento['data_validade']) . 
                 "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum medicamento encontrado com esse nome.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
