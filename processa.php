<?php

if(!$_POST) exit;

$email = $_POST['email'];


//$error[] = preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $_POST['email']) ? '' : 'Preencha corretamente';
if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email )){
	$error.="Preencha corretamente o email";
	$errors=1;
}
if($errors==1) echo $error;
else{
	$values = array ('nome','email','telefone','mensagem');
	$required = array('nome','email','telefone','mensagem');
	 
	$your_email = "contato@natureblow.com.br";
	$email_subject = "Nova Mensagem do site: ".$_POST['subject'];
	$email_content = "Nova Mensagem do site:\n";
	
	foreach($values as $key => $value){
	  if(in_array($value,$required)){
	    if( empty($_POST["$value"]) ) { echo 'Preencha corretamente '. $value; exit; }
	  }
	$email_content .= $value.': '.$_POST[$value]."\n";
	}
	 
	if(@mail($your_email,$email_subject,$email_content)) {
		echo 'Mensagem Enviada!'; 
	} else {
		echo 'ERROR!';
	}
}
?>