<?php session_start(); ?>
<h2>Bem-vindo, <?php echo $_SESSION['nome'] ?? 'Visitante'; ?></h2>
<a href="nova_ideia.html">Nova Ideia</a> | <a href="perfil.html">Meu Perfil</a> | <a href="login.html">Sair</a>
<div>
  <?php include("../php/listar_ideias.php"); ?>
</div>