<?php
require_once 'includes/config.php';

// Processar o envio do arquivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];
    $uploadDir = '/mnt/uploads/';

    // Verifica se o diretório de uploads existe; se não, cria.
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadPath = $uploadDir . basename($arquivo['name']);

    // Tenta mover o arquivo para o diretório de uploads
    if (move_uploaded_file($arquivo['tmp_name'], $uploadPath)) {
        // Salva as informações no banco de dados
        $stmt = $pdo->prepare("INSERT INTO arquivos (nome_arquivo, caminho) VALUES (:nome, :caminho)");
        $stmt->execute([
            ':nome' => $arquivo['name'],
            ':caminho' => $uploadPath
        ]);

        $mensagem = "Arquivo enviado e salvo com sucesso!";
    } else {
        $mensagem = "Erro ao mover o arquivo para o diretório de uploads.";
    }
}

// Listar os arquivos do banco de dados
$stmt = $pdo->query("SELECT * FROM arquivos");
$arquivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
print_r(getenv());
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Upload de Arquivos-test</h1>

    <?php if (isset($mensagem)) : ?>
        <p><?= htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>

    <!-- Formulário de Upload -->
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <label for="arquivo">Escolha um arquivo:</label>
        <input type="file" name="arquivo" id="arquivo" required>
        <button type="submit">Enviar Arquivo</button>
    </form>

    <!-- Tabela de Arquivos -->
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Caminho do Arquivo</th>
            <th>Data de Upload</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arquivos as $arquivo) : ?>
            <tr>
                <td><?= $arquivo['id']; ?></td>
                <td><?= htmlspecialchars($arquivo['caminho']); ?></td>
                <td><?= $arquivo['data_upload']; ?></td>
                <td><a href="download.php?file=<?= basename($arquivo['caminho']); ?>" target="_blank">Baixar</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>