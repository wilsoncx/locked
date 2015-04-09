<?php

function closeConnect($conn){
    
    // tenta fechar a conexão com o servidor
    $close = mysql_close($conn);
    
    // conseguiu fechar ?
    if(!$close){
       
        echo "<br>Impossivel Fechar Conexao !!!<br>";
           
        return false;
           
    }else{
       
        return true;
    }
    
}