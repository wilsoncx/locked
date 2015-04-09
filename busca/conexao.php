<?php

//função para conectar o Banco
// vamos deixar as variáveis com valores padrão
function connect($db="clientes",$user="root",$pass="",$host="localhost"){
    
        // tenta estabelecer uma conexão com o servidor
        $connect = mysql_connect($host,$user,$pass);
       
        // conseguiu conectar ?
        if(!$connect){
           
            // termina a execução do script e mostra uma mensagem de erro personalizada
            die(trigger_error("<br>Não foi possível estabelecer conexão usando:<br>HOST: {$host}<br>USER: {$user}<br>SENHA: {$pass}<br>"));
           
            return false;
           
        }else{
           
            // tenta Selecionar um banco de dados
            $banco = mysql_select_db($db,$connect);
           
            // conseguiu selecionar o banco de dados ?
            if(!$banco){
               
                // termina a execução do script e mostra uma mensagem de erro personalizada
                die(trigger_error("<br>Não foi possível selecionar o banco de dados {$db}<br>"));
               
                return false;
               
            }else{
               
                // se tudo der certo, retorna um identificador de conexão
                return $connect;
            }

        }

    }
