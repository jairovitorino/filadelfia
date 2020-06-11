 // Valida a data quanto ao número e tipo válido dos caracteres
function validaData(campo)
 {
   if(campo.value.length <  10)
   {
    alert("Preencha campo Data corretamente - DD/MM/AAAA");
    campo.select();
    return false;
   }
   else
   {
     tam=campo.value.length;
     nval="0123456789/";
     tamnv=nval.length;
     for(i=0;i<tam;i++)
     {
	    erro=1;
      for(j=0;j<tamnv;j++)
      {
       if(campo.value.charAt(i) == nval.charAt(j))
	     {
	       erro=0;
         break;
	     }
	    }
	    if(erro == 1)
	    {
        alert("Campo  possui caracteres não compativeis!");
        campo.select();
        return false;
	    }
     }
    }
 }

 // Adiciona Barras em tempo de digitação
 function mascaraData(campo)
 {
	       if (campo.value.length == 2)
           campo.value = campo.value + '/';
            
         if (campo.value.length == 5)
           campo.value = campo.value + '/'; 
 }