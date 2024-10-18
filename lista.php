<?php
require 'configpdo.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lista de Medicamentos</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Lista de Medicamentos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome do Medicamento</th>
                <th>Preço Unitário</th>
                <th>Quantidade em Estoque</th>
                <th>Categoria</th>
                <th>Data de Validade</th>
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $stmt = $pdo->query("SELECT * FROM medicamento");

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['produto']) . "</td>";
                    echo "<td>R$ " . htmlspecialchars($row['preco']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['quantidade']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['data_validade']) . "</td>";
                    echo "<td>"; 
                    echo "<a href='editar.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Editar</a> ";
                    echo "<a href='exluir.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Excluir</a> ";
                
                    echo "</td>"; 
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Erro ao buscar medicamentos: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</body>
</html>


