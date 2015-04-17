		<!DOCTYPE HTML>
<html>
		
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initia-scale=1">
		<script src="../js/bootstrap.js"type="text/javascript"></script>
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>
<?php
	date_default_timezone_set('America/Sao_Paulo');
	
	$data = date('Y-m-d');
	$hora = date('H:i:s');
	include('diaDaSemana.php');
	$dsemana = diasemana($data);
	//Faz a conexão com o banco de dados
	mysql_connect('127.0.0.1', 'root', '123') or die("Erro ao Conectar");
	mysql_select_db('locked') or die("Erro ao Selecionar Banco");
	
	//Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');
	
	//Recupera a pesquisa feita
	$pesquisa 	= mysql_real_escape_string($_POST['palavra']);
	//Recupera oque foi selecionado
//	$campo 		= mysql_real_escape_string($_POST['campo']);

	//Cria a SQL para fazer a consulta no banco, e onde se poe o nome do campo, trocamos pela váriavel '$campo'
	/*Exemplo: se for selecionado o campo titulo, então ele pequisa na tabela no campo titulo,
	se for selecionado o campo categoria ele faz a pesquisa no campo categoria da tabela*/
$sql = "SELECT
   a.nome as nome,
   a.foto,
   a.idcarteira,
   t.nome as turma,
   t.idturma,
   t.turno,
   h.h_entrada as entrada,
   h.h_saida as saida,
   h.idhorario
FROM
   aluno a INNER JOIN turma t ON a.turma = t.idturma
   INNER JOIN horario_x_turma ht ON t.idturma = ht.idturma
   LEFT OUTER JOIN horario h ON ht.horario = h.idhorario
  WHERE  idcarteira LIKE '$pesquisa' ";

 
  	
	
//	 "SELECT * FROM aluno WHERE idaluno LIKE '$pesquisa'";

	//Excuta a SQL
	$query	= mysql_query($sql) or die("Erro ao Pesquisar");
	
	//Se não for encontrado nada, então diz: 'Nada Encontrado...', se não retorna o resultado
	if(mysql_num_rows($query) <= 0){
		echo 'Aluno não cadastrado';
	}else{
		//Como é retornado um array, então precisamos colocar novamente a váriavel '$campo' onde colocamos a nome do campo a ser exibido
		while($res = mysql_fetch_assoc($query)){ ?>
<div class="row">
  <div class="col-xs-8 col-md-3">
  	<?php
	if ($res['foto'] == null) {
		$foto = "aluno.png";
	} else {
		$foto = $res['foto'];
	}

	///verifica se aluno esta liberado no dia da semana
	$semturma = $res['idturma'];
	//$semdia = $res['dia'];

	$sqlsemana = mysql_query("SELECT
   hd.dia,
   ht.idturma
FROM
   horario_x_turma ht INNER JOIN horaio_x_diaseman hd ON ht.horario = hd.horario
WHERE 
   ht.idturma = '$semturma' and hd.dia = '$dsemana'");

	$countsemanaaluno = mysql_num_rows($sqlsemana);

	//fim da verificação se o aluno tem dia da semana

	//criar sql que consulta se o aluno já entrou na escola nesta data
	$hentrada = $res['entrada'];
	$v_entrada = mysql_query("SELECT * FROM entrada WHERE data = '$data' and hora > '$hentrada' and aluno LIKE '$pesquisa' ") or die(mysql_error());

	$count = mysql_num_rows($v_entrada);
	
		//criar sql que consulta se o aluno já saiu na escola nesta data
	$hsaida = $res['saida'];
	$v_saida = mysql_query("SELECT * FROM saida WHERE data = '$data' and hora > '$hsaida' and aluno LIKE '$pesquisa' ") or die(mysql_error());

	$countsaida = mysql_num_rows($v_saida);
	
	
//select que verifica se aluno tem alguma liberação
	$v_libAluno = "SELECT
   AL.aluno as aluno,
   L.hora as hora,
   L.dia as dia,
   L.motivo,
   L.tipo,
   L.idliberacao as liber,
   AL.status
FROM
   liberacao_X_aluno AL INNER JOIN liberacao L ON AL.liberacao = L.idliberacao 
   WHERE 
   (AL.aluno LIKE '$pesquisa') AND
   (l.tipo = 'E' ) AND
   (Al.status = 'N') AND
   (L.hora <= '$hora') AND
   (L.dia = '$data') " or die(mysql_error());
   $v_liberacaoAluno = mysql_query($v_libAluno);
	$countLibAluno = mysql_num_rows($v_liberacaoAluno);
	if ($countLibAluno > 0) {
	while($reslib = mysql_fetch_assoc($v_liberacaoAluno)){
		 $libstatus = $reslib['liber'];	
		}
	}
	else {
		 $libstatus = 0;
	}
	
// select para saber se aluno tem alguma liberação de saida
$v_libAlunoSaida = "SELECT
   AL.aluno as aluno,
   L.hora as hora,
   L.dia as dia,
   L.motivo,
   L.tipo,
   L.idliberacao as liberSaida,
   AL.status
FROM
   liberacao_X_aluno AL INNER JOIN liberacao L ON AL.liberacao = L.idliberacao 
   WHERE 
   (AL.aluno LIKE '$pesquisa') AND
   (l.tipo = 'S' ) AND
   (Al.status = 'N') AND
   (L.hora <= '$hora') AND
   (L.dia = '$data') " or die(mysql_error());
   $v_liberacaoAlunoSaida = mysql_query($v_libAlunoSaida);
	$countLibAlunoSaida = mysql_num_rows($v_liberacaoAlunoSaida);
	if ($countLibAlunoSaida > 0) {
	while($reslibSaida = mysql_fetch_assoc($v_liberacaoAlunoSaida)){
		 $libstatussaida = $reslibSaida['liberSaida'];	
		}
	}
	else {
		 $libstatussaida = 0;
	}
	
	echo "$hora + $data";
//	select que verifica se a turma do aluno tem alguma liberação
$turmalib = $res['idturma'];
$v_libturma = "SELECT
   a.idcarteira as carteira,
   lt.status,
   a.turma as alunoturma,
   L.hora as horaturma,
   L.dia,
    L.idliberacao as liberturma
FROM
   liberacao_x_turma lt INNER JOIN liberacao L ON lt.idliberacao = L.idliberacao,
   aluno a INNER JOIN liberacao_x_turma lt1 ON a.turma = lt1.idturma
   WHERE
   (a.idcarteira LIKE '$pesquisa') AND
   (l.tipo = 'E' ) AND
   (LT.status = 'N') AND
   (L.hora <= '$hora') AND
   (L.dia = '$data') " or die(mysql_error());

 $v_liberacaoturma = mysql_query($v_libturma);
	$countLibturma = mysql_num_rows($v_liberacaoturma);
	if ($countLibturma > 0) {
	while($reslibturma = mysql_fetch_assoc($v_liberacaoturma)){
		 $libturmastatus = $reslibturma['liberturma'];
		$libturmaturma = $reslibturma['alunoturma'];	
		$libturmaaluno = $reslibturma['carteira'];
		$libturmahora = $reslibturma['horaturma'];
		}
	$v_alunoturma = "SELECT 
at.aluno,
at.liberacao
FROM
aluno_turma_liberacao at
WHERE
at.aluno = '$libturmaaluno' AND at.liberacao = '$libturmastatus' and at.data = '$data' and at.hora > '$libturmahora' AND at.tipo = 'E'";
$queryAturma = mysql_query($v_alunoturma);
$countAturma = mysql_num_rows($queryAturma);
	}
	else {
			$countAturma = 1;
		
		 $libturmastatus = 0;
		$libturmaturma=0;
		
		$libturmaaluno =0;
		$libturmahora = 0;
	}
	

	
//================
				
//verifica se o turma tem liberação para sair
$turmalibsaida = $res['idturma'];
$v_libturmasaida = "SELECT
   a.idcarteira as carteira,
   lt.status,
   a.turma as alunoturma,
   L.hora as horaturma,
   L.dia,
    L.idliberacao as liberturma
FROM
   liberacao_x_turma lt INNER JOIN liberacao L ON lt.idliberacao = L.idliberacao,
   aluno a INNER JOIN liberacao_x_turma lt1 ON a.turma = lt1.idturma
   WHERE
   (a.idcarteira LIKE '$pesquisa') AND
   (l.tipo = 'S' ) AND
   (LT.status = 'N') AND
   (L.hora >= '$hora') AND
   (L.dia = '$data') " or die(mysql_error());
	$v_liberacaoturmasaida = mysql_query($v_libturmasaida);
	$countLibturmasaida = mysql_num_rows($v_liberacaoturmasaida);
	if ($countLibturmasaida > 0) {
	while($reslibturmasaida = mysql_fetch_assoc($v_liberacaoturmasaida)){
		 $libturmastatussaida = $reslibturmasaida['liberturma'];
		$libturmaturmasaida= $reslibturmasaida['alunoturma'];	
		$libturmaalunosaida = $reslibturmasaida['carteira'];
		$libturmahorasaida = $reslibturmasaida['horaturma'];
		}
	$v_alunoturmasaida = "SELECT 
at.aluno,
at.liberacao
FROM
aluno_turma_liberacao at
WHERE
at.aluno = $libturmaaluno AND at.liberacao = '$libturmastatus' and at.data = '$data' and at.hora > '$libturmahora' AND at.tipo = 'S'";
$queryAturmasaida = mysql_query($v_alunoturmasaida);
$countAturmasaida = mysql_num_rows($queryAturmasaida);
	}
	else {
			$countAturmasaida = 1;
		
		 $libturmastatussaida = 0;
		$libturmaturmasaida=0;
		
		$libturmaalunosaida =0;
		$libturmahorasaida = 0;
	}
	
//=============================================
	
?>
  	
  	
  	<img src="../img/<?php echo $foto ?>" class="img-thumbnail" alt="Responsive image" width="100%"  height="100%" >
  	
  	</div>
  <div class="col-xs-4 col-md-9 ">
	 <div class="bg-primary"> <h2>Nome do Aluno:</h2></div>
  	<h2><?php echo $res['nome']; ?></h2>
  	</div>
  	 <div class="col-xs-2 col-md-5 ">
  	 <div class="bg-primary"> <h2>Serie:</h2></div>
  	
  	 </div>
 <div class="col-xs-2 col-md-2 ">
  	 <div class="bg-primary"> <h2>Turma:</h2></div>
  	<h2><?php echo $res['turma']; ?></h2>
  	</div>
  	 <div class="col-xs-2 col-md-2 ">
  	 <div class="bg-primary"> <h2>Turno:</h2></div>
  	<h2><?php echo $res['turno']; ?></h2>
  	</div>
  	</div>
 <br/>

 
 <div class="row">
 	<div class="col-xs-2 col-md-3"> </div>
  	 <div class="col-xs-2 col-md-2">
  	 <div class="bg-primary"> <h2>Entrada:</h2></div>
  	<h2><?php echo $res['entrada']; ?></h2>
  	</div>
  	
  	 <div class="col-xs-2 col-md-2">
  	 <div class="bg-primary"> <h2>Saida:</div>
  	<h2><?php echo $res['saida']; ?></h2>
  	</div>
  	
  	 <div class="col-xs-2 col-md-5">
  	 <div class="alert-danger">
  	<h1><?php 
 
 $aluNome =  $res['idcarteira'];
 
 
 $insertEntrada = "INSERT INTO entrada( aluno,data,hora)
VALUES
( '$aluNome',
'$data',
'$hora'
)";

///insert da saida
 $insertSaida = "INSERT INTO saida( aluno,data,hora)
VALUES
( '$aluNome',
'$data',
'$hora'
)";

//update na tabela leberacao_x_turma
$updateliberacaosaida = "UPDATE liberacao_X_aluno
SET status = 'S'
WHERE liberacao = '$libstatussaida' AND aluno LIKE '$pesquisa'";

//======================================
$updateliberacao = "UPDATE liberacao_X_aluno
SET status = 'S'
WHERE liberacao = '$libstatus' AND aluno LIKE '$pesquisa'";

//======================================
$updateliberacaoturma = "INSERT INTO aluno_turma_liberacao( aluno,liberacao,data,hora,status) 
VALUES ('$pesquisa', '$libturmastatus', '$data', '$hora',  'E')" ;
//=====================================

$updateliberacaoturmasaida = "INSERT INTO aluno_turma_liberacao( aluno,liberacao,data,hora,status) 
VALUES ('$pesquisa', '$libturmastatus', '$data', '$hora',  'S')" ;
//======================================

 // incio se aluno está no dia da semana
	if($countsemanaaluno > 0){

		// inicio se o aluno ja entrou
		if($count > 0){
		    // verifica se a turma do aluno tem autorização para entrar
		    if ($countAturma == 0) {
				
			echo "O aluno está liberado pela orientadora";
						mysql_query($insertEntrada);
						mysql_query($updateliberacaoturma);

						} 
						else {
						
						//verificar se o aluno tem liberação
								if ($countLibAluno > 0) {
									echo "O aluno está liberado pela orientadora 1 ";
									mysql_query($insertEntrada);
									mysql_query($updateliberacao);
	
									} 
										
										else {
										//verfica se o aluno já saiu	
											if ($countsaida > 0) {
													
												
												//verifica se a turma tem autorização para sair
																							
												if ($countAturmasaida == 0) {
														echo "O aluno está liberado pela orientadora para sair turma1";
														mysql_query($insertSaida);
														mysql_query($updateliberacaoturmasaida);
																		}
																			
												
																	else{
																		//verificar se o aluno tem liberaçõ para sair
																			if ($countLibAlunoSaida > 0){
																				echo "O aluno está liberado pela orientadora para sair aluno1" ;
																				mysql_query($insertSaida);
																				mysql_query($updateliberacaosaida);
				
																						}
																				else{
																					//verifica se ao aluno está detro do horario de saida
																						if ($countsaida == 0) {
													
																							if( $hora > $res['saida']) {
																							echo "Aluno está dentro do horariode saida";
																							mysql_query($insertSaida);
																							}
														
														
																								else{
																									if ($countAturmasaida == 0) {
																									echo "O aluno está liberado pela orientadora para sair turma";
																									mysql_query($insertSaida);
																									mysql_query($updateliberacaoturmasaida);
													
																									}			
																			
																										else{
																											if ($countLibAlunoSaida > 0) {
																												echo "O aluno está liberado pela orientadora para sair aluno";
																												mysql_query($insertSaida);
																												mysql_query($updateliberacaosaida);
				
																																		}	
																											else{
																											//inicio da verificação se aluno está liberado pela orientadora
																													if ($countAturma == 0) {
																														echo "O aluno está liberado pela orientadora turma";
																														mysql_query($insertEntrada);
																														mysql_query($updateliberacaoturma);
																																} 
																																	else {
																																			if ($countLibAluno > 0) {
																																				echo "O aluno está liberado pela orientadora";
																																				mysql_query($insertEntrada);
																																				mysql_query($updateliberacao);

																																			} 
																																				else {

																																							// VERIFICA SE O ALUNO ESTÁ NO HORARIO
																																						if ($hora > $res['entrada'] and $hora < $res['saida']) {
																																							echo "Aluno está dentro do horario";
																																							mysql_query($insertEntrada);
																																								}
																																									else{
																																										// verifica se ele tem autorização para entrar
																																												if ($countLibAluno > 0) {
																																														echo "O aluno está liberado pela orientadora";
																																														mysql_query($insertEntrada);
																																														mysql_query($updateliberacao);
																																											
																																												}
																																												else {
																																										
																																													
																																										if ($countAturma == 0) {
																																												mysql_query($insertEntrada) or die (mysql_error());
																																												mysql_query($updateliberacaoturma) or die(mysql_error());
																																												echo "O aluno está liberado pela orientadora turma fim";
																																												
																																													
																																										}
																																													else {
																																														echo "entranda  não permitida fim";
																																										
																																														}
																																													
																																												}			
																																									}
																																					//FIM DA VERIFICAÇÃO SE O ALUNO ESTÁ NO SEU HORARIO
																																				}
																																		}	
							
							
			
																													}																			
													  	
													
																											}
												
																									}
						
																							}
										
												
																					} 
																			}
																		}
																}
														}
												}
										}
	
	
?>
</h1>
		</div>
	</div>
</div>

<?php
		
		
//ultimo
		}
}

?>
</html>	