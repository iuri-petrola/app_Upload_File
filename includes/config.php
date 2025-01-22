<?php
// Configuração do banco de dados Mysql
//$host = 'mysql57'; // Servidor do banco de dados
//$dbname = 'upload_app'; // Nome do banco de dados
//$user = 'root'; // Usuário do banco de dados
//$password = 'secretMysql'; // Senha do banco de dados

/*
try {
    // Criando a conexão com o banco de dados Mysql
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
*/


// Configuração do banco de dados Postgres direto
$host = '104.154.175.19'; // Servidor do banco de dados
$dbname = 'upload_app'; // Nome do banco de dados
$user = 'postgres'; // Usuário do banco de dados
#$password = 'P0stgr3s4dm1n|2o23'; // Senha do banco de dados
$password = getenv('DB_PASS'); // Senha do banco de dados

try {
    // Conexão com o PostgreSQL
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    // Configurar PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Exibir mensagem de erro em caso de falha
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>