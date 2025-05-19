<?php
include "conexao.php";
session_start();

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$anexo = "";

if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] == 0) {
    $anexo = "uploads/" . basename($_FILES['anexo']['name']);
    move_uploaded_file($_FILES['anexo']['tmp_name'], $anexo);
}

$usuario_id = $_SESSION['usuario_id'];
$sql = "INSERT INTO ideias (usuario_id, titulo, descricao, anexo) VALUES ('$usuario_id', '$titulo', '$descricao', '$anexo')";

if ($conn->query($sql) === TRUE) {
    echo "Ideia publicada com sucesso. <a href='dashboard.html'>Voltar</a>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>