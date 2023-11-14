<?php

require_once ('index.php');

$id = filter_input(INPUT_GET , 'id', FILTER_SANITIZE_NUMBER_INT);
$delete  = $conexao->query("DELETE FROM finan WHERE id='$id'");

if (mysqli_affected_rows($conexao)>0);
    echo'<script>alert("Produto excluido com sucesso");window.location.href="financeiro.php";</script>';
  
   
   ?>