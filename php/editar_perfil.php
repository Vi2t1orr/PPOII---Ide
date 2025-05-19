<?php
include "conexao.php";
session_start();

$id = $_SESSION['usuario_id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha'];

$sql = "UPDATE usuarios SET nome='$nome', email='$email', perfil='$perfil'";
if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $sql .= ", senha='$senha_hash'";
}
$sql .= " WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Perfil atualizado com sucesso. <a href='dashboard.html'>Voltar</a>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>