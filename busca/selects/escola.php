<?php
//Faz a conexão com o banco de dados
	mysql_connect('127.0.0.1', 'root', '123') or die("Erro ao Conectar");
	mysql_select_db('locked') or die("Erro ao Selecionar Banco");
	
	//Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');
	
	