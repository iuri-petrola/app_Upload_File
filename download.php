<?php
// download.php
$caminho = '/mnt/uploads/' . $_GET['file']; // Caminho absoluto no NFS

if (file_exists($caminho)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($caminho) . '"');
    header('Content-Length: ' . filesize($caminho));
    readfile($caminho);
    exit;
} else {
    echo "Arquivo não encontrado.";
}
?>