<?php
include "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$perfil = $_POST['perfil'];

$sql = "INSERT INTO usuarios (nome, email, senha, perfil) VALUES ('$nome', '$email', '$senha', '$perfil')";
if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso. <a href='login.html'>Login</a>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>