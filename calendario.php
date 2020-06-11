<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Calend&aacute;rio</title>
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
</head>
<body style="font-size:11px;font-family:arial;" bottommargin="5" leftmargin="5" rightmargin="2" topmargin="5">
<center>
<?
	require 'classes/calendario.php';
	$calendar = new calendario;	
	$calendar->nome_campo=$_GET["campo"];
	$calendar->cria($_GET["data"]); 
?>
</center>
</body>
</html>