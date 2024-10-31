<?php 
require 'cadastro.php';

$email = $_POST['email'];
$senha = $_post['password'];

$stmt = $pdo->prepare("SELECT id, email, nomeCompleto, telefone, senha FROM users WHERE email = :email AND senha = :senha ");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if($email == $userData['email'] && $senha == $userData['senha']){
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header("location: conteudo.php");
}
else{
    echo "login ou senha invalidos!";
}


?>