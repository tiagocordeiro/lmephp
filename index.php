<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <title>LME Testes</title>

	<script src="jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="highcharts.js"></script>
	<script src="jquery.highchartTable.js"></script>
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- extra style --> 
	<style type="text/css">
	#container { margin-left: auto; margin-right: auto; width: 400px;}
	td, th { padding: 5px; }
	</style>
</head>
<body>
<table id="tabela" class="highchart table-striped table-responsive" data-graph-container-before="1" data-graph-type="line" width="100%">
<?php
$row = 1;
$lmecu = fopen("https://www.quandl.com/api/v3/datasets/LME/PR_CU.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
$lmezi = fopen("https://www.quandl.com/api/v3/datasets/LME/PR_ZI.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
$lmeal = fopen("https://www.quandl.com/api/v3/datasets/LME/PR_AL.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
$lmepb = fopen("https://www.quandl.com/api/v3/datasets/LME/PR_PB.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
$lmetn = fopen("https://www.quandl.com/api/v3/datasets/LME/PR_TN.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
$lmeni = fopen("https://www.quandl.com/api/v3/datasets/LME/PR_NI.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
$usdbrl = fopen("https://www.quandl.com/api/v3/datasets/BUNDESBANK/BBEX3_D_BRL_USD_CA_AC_000.csv?order=asc&start_date=2016-10-01&end_date=2016-10-31&api_key=xXxXxXxXxXxXxX", "r");
// $ptax = fopen("https://ptax.bcb.gov.br/ptax_internet/consultaBoletim.do?method=gerarCSVFechamentoMoedaNoPeriodo&ChkMoeda=61&DATAINI=01/10/2016&DATAFIM=31/10/2016", "r");
$columnscu = array(1,2);
$columnszi = array(2);
$columnsal = array(2);
$columnspb = array(2);
$columnstn = array(2);
$columnsni = array(2);
$columnsdollar = array(1,2);
while (($cobre = fgetcsv($lmecu, 1000, ",")) !== FALSE) {
		$zinco = fgetcsv($lmezi);
		$aluminio = fgetcsv($lmeal);
		$chumbo = fgetcsv($lmepb);
		$estanho = fgetcsv($lmetn);
		$niquel = fgetcsv($lmeni);
		$dollar = fgetcsv($usdbrl);
        if ($row == 1) {
	       		echo '<thead>';
                echo '<th>Data</th>';
                echo '<th>Cobre</th>';
                echo '<th data-graph-hidden="1">Zinco</th>';
                echo '<th data-graph-hidden="1">Aluminio</th>';
                echo '<th data-graph-hidden="1">Chumbo</th>';
                echo '<th data-graph-hidden="1">Estanho</th>';
                echo '<th data-graph-hidden="1">Niquel</th>';
                echo '<th data-graph-skip="1">Data USD BRL</th>';
                echo '<th data-graph-hidden="1">Dolar</th>';
                echo '</thead>';
                echo '<tbody>';
                $row++; continue;
            }else{
                
            }
        echo("<tr>");
        foreach ($cobre as $index=>$val) {
                if (in_array($index+1, $columnscu)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        foreach ($zinco as $index=>$val) {
                if (in_array($index+1, $columnszi)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        foreach ($aluminio as $index=>$val) {
                if (in_array($index+1, $columnsal)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        foreach ($chumbo as $index=>$val) {
                if (in_array($index+1, $columnspb)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        foreach ($estanho as $index=>$val) {
                if (in_array($index+1, $columnstn)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        foreach ($niquel as $index=>$val) {
                if (in_array($index+1, $columnsni)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        foreach ($dollar as $index=>$val) {
                if (in_array($index+1, $columnsdollar)) {
                        echo("\t<td>$val</td>\r\n");
                }
        }
        echo("</tr>");
} //end while
echo "</tbody>";
?>
</table>
<script type="text/javascript">
$(document).ready(function() {
  $('table.highchart').highchartTable();
});
</script>	

</body>
</html>
