<?php
include "conexao.php";
session_start();
$id = $_SESSION['usuario_id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$perfil = $_POST['perfil'];
$senha = $_POST['senha'];
if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, perfil = ?, senha = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $perfil, $senha_hash, $id]);
} else {
    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, perfil = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $perfil, $id]);
}
echo "Perfil atualizado com sucesso. <a href='../html/dashboard.php'>Voltar</a>";
?>