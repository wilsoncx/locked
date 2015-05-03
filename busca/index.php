<!DOCTYPE HTML>
<html>
	
	
	
	<head>
	
		
		
		<meta charset="utf-8">
		<title>Sistema de Controle de Acesso</title>
		<meta name="viewport" content="width=device-width, initia-scale=1">
		<script src="../js/bootstrap.js"type="text/javascript"></script>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/pesquisa.js"></script>
	</head>
	
	<body onload="document.frmbusca.pesquisa.focus();">
	
	
	<div class="container">
	<h1>Colégio Adventista de São Luís</h1>
<br />
	<div class="resultados">
	
	</div>
	
	</div>

</body>

<footer>
	
	<form id="form-pesquisa" action="busca.php" method="post" name="frmbusca">
	<input type="text" name="pesquisa" id="pesquisa" autocomplete="off">
    <input type="submit" name="enviar" value="Pesquisar" class="hide">
    
    
	</form>
	
</footer>
</html>