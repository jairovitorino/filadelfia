// JavaScript Document
TipoNavegador = navigator.appName;
tamanhoheight = 0;
if (TipoNavegador=="Netscape")
{
	tamanhoheight=195;
}
else
{
    tamanhoheight=210;
}                    
function calendario(campo)
{
 var cal;
 cal = window.open("calendario.php?campo="+campo,"Calendario","height="+tamanhoheight+",width=192,status=no,top=350,left=550,toolbar=no,location=no,directories=no,menubar=no");
}