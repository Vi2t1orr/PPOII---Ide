<?php
include "conexao.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$perfil = $_POST['perfil'];
try {
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $senha, $perfil]);
    echo "Cadastro realizado com sucesso. <a href='../html/login.html'>Login</a>";
} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
?>