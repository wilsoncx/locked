<!DOCTYPE html>
<?php
include("conn.php");
$id = $_GET['id'];
 
// Seleciona a noticia que tem essa ID
$sql = mysql_query("SELECT * FROM aluno WHERE id = '".$id."'");
$noticia = mysql_fetch_object($sql);
?>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Sistema de Acesso Locked</title>
		<meta name="viewport" content="width=device-width, initia-scale=1">
		<script src="js/bootstrap.js"type="text/javascript"></script>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>


<div class="row">
  <div class="col-xs-8 col-md-5">
  	<img src="<?php $noticia->foto?>" class="img-thumbnail" alt="Responsive image" width="100%"  height="100%" >
</div>
  <div class="col-xs-4 col-md-7 ">
  	<div class="alert-success">
  <h1><?php echo $noticia->nome;?></h1>
  </div>
  <div class="alert-success">
  <h1>SERIE: 7º ANO</h1>
  </div>
   <div class="alert-success">
  <h1>TURMA: C</h1>
  </div>
  
  
</div>
</div>


<div class="row">
  <div class="col-xs-4 col-md-12 ">
  	<div class="alert-success">
  <h1>ALUNO ESTÁ LIBERADO PARA IR PARA CASA COM ACOMPANHANTE MARIA VILANICE</h1>
  </div>
</div>
</div>

</html>