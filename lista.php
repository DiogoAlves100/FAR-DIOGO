<?php
require 'configpdo.php';


$sql = "SELECT * FROM medicamento";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lista de Medicamentos</title>
    <link rel="stylesheet" href="./lista.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Medicamentos Cadastrados</h1>
        <div class="text-center mb-4">
            <form action="./pesquisar.php" method="POST" class="form-inline justify-content-center">
                <input type="text" name="nome_medicamento" placeholder="Nome do Medicamento" required class="form-control mr-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['produto']; ?></td>
                    <td><?php echo number_format($row['preco'], 2, ',', '.'); ?></td> <!-- Formatação de preço -->
                    <td><?php echo $row['quantidade']; ?></td>
                    <td><?php echo $row['categoria']; ?></td>
                    <td><?php echo $row['data_validade']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este medicamento?');">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
