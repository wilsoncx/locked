<?
function diasemana($data) {
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = "1";  break;
		case"1": $diasemana = "2"; break;
		case"2": $diasemana = "3";   break;
		case"3": $diasemana = "4";  break;
		case"4": $diasemana = "5";  break;
		case"5": $diasemana = "6";   break;
		case"6": $diasemana = "7";        break;
	}

  return $diasemana;
}


?>