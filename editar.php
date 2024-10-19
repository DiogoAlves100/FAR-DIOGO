<?php
require 'configpdo.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $sql = "SELECT * FROM medicamento WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $medicamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$medicamento) {
        die("Medicamento não encontrado.");
    }

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $produto = $_POST['produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $categoria = $_POST['categoria'];
        $data_validade = $_POST['data_validade'];


        $sql = "UPDATE medicamento SET produto = :produto, preco = :preco, quantidade = :quantidade, categoria = :categoria, data_validade = :data_validade WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':data_validade', $data_validade);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        
        if ($stmt->execute()) {
            header("Location: listar.php"); 
            exit(); 
        } else {
           
            echo "Erro ao atualizar o medicamento: " . implode(", ", $stmt->errorInfo());
        }
    }
} else {
    echo "ID de medicamento não fornecido.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Medicamento</title>
    <link rel="stylesheet" href="./stylea.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Medicamento</h1>
        <form method="post" >
            <div class="form-group">
                <label for="nome">Nome do Medicamento:</label>
                <input type="text" class="form-control" id="produto" name="produto" value="<?php echo htmlspecialchars($medicamento['produto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço Unitário:</label>
                <input type="text" class="form-control" id="preco" name="preco" value="<?php echo htmlspecialchars($medicamento['preco']); ?>" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade em Estoque:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($medicamento['quantidade']); ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="Analgésico" <?php echo ($medicamento['categoria'] == 'Analgésico') ? 'selected' : ''; ?>>Analgésico</option>
                    <option value="Antibiótico" <?php echo ($medicamento['categoria'] == 'Antibiótico') ? 'selected' : ''; ?>>Antibiótico</option>
                    <option value="Anti-inflamatório" <?php echo ($medicamento['categoria'] == 'Anti-inflamatório') ? 'selected' : ''; ?>>Anti-inflamatório</option>
                    <option value="Antidepressivo" <?php echo ($medicamento['categoria'] == 'Antidepressivo') ? 'selected' : ''; ?>>Antidepressivo</option>
                    <option value="Outros" <?php echo ($medicamento['categoria'] == 'Outros') ? 'selected' : ''; ?>>Outros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data_validade">Data de Validade:</label>
                <input type="date" class="form-control" id="data_validade" name="data_validade" value="<?php echo htmlspecialchars($medicamento['data_validade']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>
