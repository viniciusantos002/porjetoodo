<?php

require_once ('index.php');

$id = filter_input(INPUT_GET , 'id', FILTER_SANITIZE_NUMBER_INT);
$delete  = $conexao->query("DELETE FROM usuarios WHERE id='$id'");

if (mysqli_affected_rows($conexao)>0);
   header("Location:paginaadm.php");
   
   ?>