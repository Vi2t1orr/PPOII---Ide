<?php
include "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: dashboard.html");
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
$conn->close();
?>