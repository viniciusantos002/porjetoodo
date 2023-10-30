<?php

 $id = filter_input(INPUT_GET , 'id' , FILTER_SANITIZE_NUMBER_INT);
 
 echo 'Certeza que quer excluir o usuário ?';
 echo"<a href ='delete.php?id=$id'>Sim</a>";
 echo"<a href='paginaadm.php'>Não</a>";
 
 ?>