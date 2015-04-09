<!DOCTYPE html>
<html lang="pt-br">
<?php
// Incluir aquivo de conex�o
include("busca/conn.php");
$valor = $_GET['valor'];
$sql = mysql_query("SELECT * FROM aluno WHERE id LIKE '".$valor."'");

 ?>	
	
	<head>
		<meta charset="UTF-8">
		<title>Sistema de Acesso Locked</title>
		<meta name="viewport" content="width=device-width, initia-scale=1">
		<script src="js/bootstrap.js"type="text/javascript"></script>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
<form name="pesq">
	
	
	
	
</form>		
		
		
<?php
while ($noticias = mysql_fetch_object($sql)) {
	echo $noticia->nome;
	
}
?>


	
	</body>

</html>