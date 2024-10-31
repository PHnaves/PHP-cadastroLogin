<?php 

session_start();

// obtendo e gaurdando as informacoes disponibilizados no formulario de cadastro
$email = $_POST['email'];
$nomeCompleto = $_POST['nome-completo'];
$telefone = $_POST['telefone'];
$senha1 = $_POST['senha1'];
$senhaConfirmada = $_POST['senha2'];

if($senhaCriada == $senhaConfirmada) {
    echo "As senhas não correspondem!";
    header("Refresh: 2; url=cadastro.html");
    exit();
}
else{
    // criando a conexao com o banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=alunos", "root", ""); 
    $stmt = $pdo->prepare("INSERT INTO alunos (email, nomeCompleto, telefone, senha) VALUES (:email, :nomeCompleto, :telefone, :senhaConfirmada)");

    $stmt ->bindParam(':email', $email);
    $stmt ->bindParam(':nomeCompleto', $nomeCompleto);
    $stmt ->bindParam(':telefone', $telefone);
    $stmt ->bindParam(':senhaConfirmada', $senhaConfirmada);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    }

    else{
        echo "erro ao cadastrar usuario!";
    }
}


?>