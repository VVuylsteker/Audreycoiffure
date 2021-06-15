<?php


	$nom_prenom = $_POST['nom_prenom'];
	$description = $_POST['description'];
	$mail = $_POST['mail'];
	
	$header="MIME-Version: 1.0\r\n";
	$header.='From:"AudreyCoiffure"<contact@audreycoiffure59.fr>'."\n";
	$header.='Content-Type:text/html; charset="uft-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';
	
	$message=''.$nom_prenom.' '.$description.' '.$mail;
	
	$send = mail("dylan.decool14@gmail.com", "Contact Audrey Coiffure", $message, $header);
  
	if($send)
  {
	  $msg = "Le message vient d'être envoyé, vous recevrez une réponse sous 48 heures.";
  
  }
  else
  {
	  $msg = "ERREUR : Le message ne s'est pas envoyé";
	  
  }


?>