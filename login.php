<?php
require 'cadastro.php';

$dsn = 'mysql:host=localhost;dbname=alunos';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
    exit;
}

$email = $_POST['email'];
$senha = $_POST['password'];

$stmt = $pdo->prepare("SELECT email, senha FROM informacoesalunos WHERE email = :email AND senha = :senha");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);

$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($email == $userData['email'] && $senha == $userData['senha']) {
    session_start();
    $_SESSION['user_name'] = $user['nomeCompleto'];
    // Armazena o IP do usuário no cookie
    setcookie("user_ip", $_SERVER['REMOTE_ADDR'], time() + (86400 * 30)); 
    header("Location: conteudo.phtml");
} else {
    echo "Login ou senha inválidos!";
}
?>