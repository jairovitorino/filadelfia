<?php 
class Metodos{

public function redirect($url){
print"
		<script language=\"JavaScript\">
		<!-- 
			ns4 = (document.layers)? true:false
			ie4 = (document.all)? true:false
			
			if(ie4) { 
				location.href=\"$url\";
			}
			else
				window.location.href=\"$url\";
		//-->
		</script>
	";


}



}



?>