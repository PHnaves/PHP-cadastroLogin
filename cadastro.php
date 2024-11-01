<?php 

session_start();

// obtendo e gaurdando as informacoes disponibilizados no formulario de cadastro
$email = $_POST['email'];
$nomeCompleto = $_POST['nomeCompleto'];
$telefone = $_POST['telefone'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];

if($senha2 =! $senha1) {
    echo "As senhas não correspondem!";
}
else{
    // criando a conexao com o banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=alunos", 'root', 'root'); 
    $stmt = $pdo->prepare("INSERT INTO informacoesalunos (email, nomeCompleto, telefone, senha) VALUES (:email, :nomeCompleto, :telefone, :senha)");

    $stmt ->bindParam(':email', $email);
    $stmt ->bindParam(':nomeCompleto', $nomeCompleto);
    $stmt ->bindParam(':telefone', $telefone);
    $stmt ->bindParam(':senha', $senha1);

    if ($stmt->execute()) {
        header("Location: login.html");
    }

    else{
        echo "erro ao cadastrar usuario!";
    }
}


?>