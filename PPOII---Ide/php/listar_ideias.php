<?php
include "conexao.php";
$stmt = $conn->query("SELECT ideias.*, usuarios.nome FROM ideias JOIN usuarios ON ideias.usuario_id = usuarios.id ORDER BY data_criacao DESC");
$ideias = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($ideias as $ideia) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px'>";
    echo "<strong>" . htmlspecialchars($ideia['titulo']) . "</strong><br>";
    echo "Por: " . htmlspecialchars($ideia['nome']) . "<br>";
    echo "<p>" . nl2br(htmlspecialchars($ideia['descricao'])) . "</p>";
    if ($ideia['anexo']) {
        echo "<a href='" . htmlspecialchars($ideia['anexo']) . "' target='_blank'>Ver anexo</a><br>";
    }
    echo "<small>Postado em: " . $ideia['data_criacao'] . "</small>";
    echo "</div>";
}
?>