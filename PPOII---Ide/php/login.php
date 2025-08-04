<?php
include "conexao.php";
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    header("Location: ../html/dashboard.php");
} else {
    echo "Email ou senha inválidos.";
}
?>