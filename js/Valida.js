/*
 * Esta função limita o tamanho máximo de um campo textarea.
 * Exemplo de uso: 
 * <textArea size="50" id="cpTA" rows=5 >
 * </textArea>
 * <script>
 *   tamanhoMaximo(document.getElementById("cpTA"), 10)
 * </script>
 */
function tamanhoMaximo(campo, tamanho)
{
  if (campo)
  {
    campo.onkeyupOriginal = campo.onkeyup;
    campo.onkeyup = function(e)
    {
      if (campo.value != null && campo.value.length > tamanho)
      {
        campo.value = campo.value.substring(0, tamanho);
        alert("Tamanho máximo atingido: " + tamanho);
      }
      if (campo.onkeyupOriginal)
      {
        campo.onkeyupOriginal(e);
      }
    };
  }
}

 function limpaIdent()
{
  var form0=document.forms[0];
  form0.elements[3].value = "";
  form0.elements[2].focus()
}

function FormataCep(objeto){
	if (objeto.value.indexOf("-") == -1 && objeto.value.length > 5){ objeto.value = ""; }
	if (objeto.value.length == 5){
		objeto.value += "-";
	}
}


function verTamCNPJCEI()
 { 
	  var form0=document.forms[0];
    if (form0.elements[0].checked & form0.elements[2].value.length > 11){
          form0.elements[3].focus();
    }else{
        if (form0.elements[1].checked & form0.elements[2].value.length > 10){
            form0.elements[3].focus();
        }
    }  
 }
 function verTamGeral(elem,tam)
 {    
 	var form0=document.forms[0];
    if (form0.elements[elem].value.length > tam-1){
          form0.elements[elem+1].focus();
    }  
 }
function verificaNumerico (obj, aceitaVirgula) 
{ 
   var inputKey = event.keyCode; 
   var returnCode = true; 
  
   if (( inputKey > 47 && inputKey < 58 ) || (inputKey == 44 && aceitaVirgula && obj.value.indexOf(",") == -1))
   { 
      return; 
   }
   else 
   { 
      returnCode = false;
      event.keyCode = 0; 
   } 
   event.returnValue = returnCode; 
}


/*
 * [Esta função formata a data no padrão dd/mm/aaaa incluindo as barras]
 * [na medida em que vai sendo digitada
 *
 * @param obj [contém a referencia ao objeto corrente]
 *
 */


 
function formataDatax(obj) 
{ 
   var currValue = obj.value;
   var ultimoChar = obj.value.charAt(obj.value.length-1);
   var a = currValue.split ("/").join("");
   
   // Backspace
   if (event.keyCode == 8 && (obj.value.length == 2 || obj.value.length == 5))
   {  
     // Este if eh assim mesmo, para tratar o caso do BackSpace
   } 
   else 
     if  (a.length > 3 )
     { 
       obj.value = a.substr(0,2) + "/" + a.substr(2,2) + "/" + a.substr(4);
     }   
     else
     {
       if ( a.length > 1 ) 
        {
          obj.value = a.substr(0,2) + "/" + a.substr(2) ;
        }  
     }   
}

function FormataCPF(Campo, teclapres){ 
  var tecla = teclapres.keyCode;
  var browser=navigator.appName;
  if(browser == "Microsoft Internet Explorer" && (tecla < 48 || tecla > 57))
  {
   alert("Caractere inválido!");
   return false;
  }
  else
  {
   var vr = new String(Campo.value);
   vr = vr.replace(".", ""); 
   vr = vr.replace(".", ""); 
   vr = vr.replace("-", ""); 
   tam = vr.length + 1; 
   if(tecla != 9 && tecla !=8)
   { 
     if(tam > 3 && tam < 7) 
       Campo.value = vr.substr(0, 3) + '.' + vr.substr(3, tam); 
     if(tam >= 7 && tam <10) 
       Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,tam-6); 
     if(tam >= 10 && tam < 12)
       Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,3) + '-' + vr.substr(9,tam-9);
   }
  }
} 


function FormataNIT(Campo, teclapres){ 
  var tecla = teclapres.keyCode;
  var vr = new String(Campo.value);
  var browser=navigator.appName;
  if(browser == "Microsoft Internet Explorer" && (tecla < 48 || tecla > 57))
  {
   alert("Caractere inválido!");
   return false;
  }
  else
  {
    vr = vr.replace(".", ""); 
    vr = vr.replace(".", ""); 
    vr = vr.replace(".", ""); 
    vr = vr.replace("-", ""); 
    tam = vr.length + 1; 
    if(tecla != 9 && tecla !=8)
    { 
      if(tam > 3 && tam < 7) 
       Campo.value = vr.substr(0, 3) + '.' + vr.substr(3, tam); 
      if(tam >= 7 && tam <10) 
       Campo.value = vr.substr(0,3) + '.' + vr.substr(3,3) + '.' + vr.substr(6,tam-6); 
      if(tam >= 10 && tam < 12) 
       Campo.value = vr.substr(0,1) + '.' + vr.substr(1,3) + '.' + vr.substr(4,3) + '.' + vr.substr(7,3) + '-' + vr.substr(10,tam-9); 
    }
  }
} 

function FormataCNPJ(Campo, teclapres){
  
	var tecla = teclapres.keyCode;
  var browser=navigator.appName;
  if(browser == "Microsoft Internet Explorer" && (tecla < 48 || tecla > 57))
  {
   alert("Caractere inválido!");
   return false;
  }
  else
  {
	  var vr = new String(Campo.value);
	  vr = vr.replace(".", "");
	  vr = vr.replace(".", "");
	  vr = vr.replace("/", "");
	  vr = vr.replace("-", "");

	  tam = vr.length + 1 ;

	
	  if (tecla != 9 && tecla != 8)
    {
		  if (tam > 2 && tam < 6)
			  Campo.value = vr.substr(0, 2) + '.' + vr.substr(2, tam);
		  if (tam >= 6 && tam < 9)
			  Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,tam-5);
		  if (tam >= 9 && tam < 13)
			  Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,tam-8);
		  if (tam >= 13 && tam < 15)
			  Campo.value = vr.substr(0,2) + '.' + vr.substr(2,3) + '.' + vr.substr(5,3) + '/' + vr.substr(8,4)+ '-' + vr.substr(12,tam-12);
		}
  }
}

 function formataData(periodo,ind){
	  var form0=document.forms[0];
 	  var cmp=ind
 	  mes = periodo.substring(0,2)
    ano = periodo.substring(2,6)
    
    if (mes > 13 || mes == 0){
        alert ("Periodo inválido");
        return false;
    }
    else
       {
         // alert ("entrei na formtacao do Periodo");
           form0.elements[cmp].value = mes+"/"+ano;
           form0.elements[cmp+1].focus();
           
       }     
 }
function validaDV()
{
	var form0=document.forms[0];
    if (form0.elements[0].checked){
      csInd=1;
    }else{
      csInd=2
    }
    //alert ("csInd=" && csInd);
    nuIdent = form0.elements[2].value+form0.elements[3].value;
    //alert ('nuIdent=' && nuIdent);
    compr=nuIdent.length;
    //alert ("compr="+compr);
    if (csInd == 1){ 
       if (compr<14){
            for (x=0;x<14-compr;x++){
                nuIdent="0"+nuIdent;
            }
       }    
      //alert("CNPJ="+nuIdent);
        if (!DvCNPJ(nuIdent)) { 
        			limpaIdent();}
    }else{
        
        if (compr<12){
            for (x=0;x<12-compr;x++){
                nuIdent="0"+nuIdent;
            }
       }    
     //  alert("CEI="+nuIdent);
     
        if (!DvCEI(nuIdent)) { limpaIdent();}              
      }     
}

function formataCampos(){ 
    
    var form0=document.forms[0];
	if (form0.elements[2].value == ""){
        alert ("CNPJ/CEI são campos de preenchimento obrigatório.")
        form0.elements[2].focus();
     }else{
            if (form0.elements[3].value == ""){
               alert ("O dígito verificador do Identificador é campo de preenchimento obrigatório.")
               form0.elements[3].focus(); 
           }else{
                  if (form0.elements[4].value == ""){
                    alert ("O período é campo de preenchimento obrigatório.")
                    form0.elements[4].focus();
                    
                  }else
                        {
                            if (form0.elements[5].value=="")
                              {form0.elements[5].value=0; }
                            if (form0.elements[6].value=="")
                              {form0.elements[6].value=0;}
                            document.form0.action = "EmpresaParametrosGfip.srv";     
                            document.form0.submit();
                           
                      }
                }
      }
}
function DvCNPJ(CNPJ){
   // alert ("entrei en DvCNPJ");
    
    compr=CNPJ.length;  
    if (compr<12){
	    for (x=0;x<14-compr;x++){
	    	CNPJ="0"+CNPJ;
	        }
    }else{
	   if (CNPJ == "00000000000000")
	      {
	    	 alert("CNPJ Inválido");
	    	 return false;
              }		
    	 }
   var Numero=new Array(14);
   Numero[1] = CNPJ.substring(0,1);
   Numero[2] = CNPJ.substring(1,2);
   Numero[3] = CNPJ.substring(2,3);
   Numero[4] = CNPJ.substring(3,4);
   Numero[5] = CNPJ.substring(4,5);
   Numero[6] = CNPJ.substring(5,6);
   Numero[7] = CNPJ.substring(6,7);
   Numero[8] = CNPJ.substring(7,8);
   Numero[9] = CNPJ.substring(8,9);
   Numero[10] =CNPJ.substring(9,10);
   Numero[11] =CNPJ.substring(10,11);
   Numero[12] =CNPJ.substring(11,12);
   Numero[13] =CNPJ.substring(12,13);
   Numero[14] =CNPJ.substring(13,14);   
   soma = 5*Numero[1]+4*Numero[2]+3*Numero[3]+2*Numero[4]+9*Numero[5]+8*Numero[6]+7*Numero[7]+6*Numero[8]+5*Numero[9]+4*Numero[10]+3*Numero[11]+2*Numero[12];
   soma = soma%11;
   if (soma < 2){
	     resultado1 = 0;
   }else{
	     resultado1 = 11 - soma;
	}
   if (resultado1 != Numero[13]){
      alert("Dígito verificador inválido"); 
      return false;
   }else{
          soma = 6*Numero[1]+5*Numero[2]+4*Numero[3]+3*Numero[4]+2*Numero[5]+9*Numero[6]+8*Numero[7]+7*Numero[8]+6*Numero[9]+5*Numero[10]+4*Numero[11]+3*Numero[12]+2*Numero[13];
          soma = soma%11;
          if (soma < 2){
	      resultado2 = 0;
          }else{
	        resultado2 = 11 - soma;
               }         
          if (resultado2 != Numero[14]){
	      alert("Dígito verificador inválido.");
              return false;
          }else{
      	 	 return true;	
      	       }
       }     
}


