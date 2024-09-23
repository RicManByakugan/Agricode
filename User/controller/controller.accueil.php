<?php 
	session_start();
	if (isset($_GET['langue']) && $_GET['langue']=="en") {
		$_SESSION['langue'] = "Anglais";
	}elseif (isset($_GET['langue']) && $_GET['langue']=="fr") {
		$_SESSION['langue'] = "Francais";		
	}elseif (isset($_GET['langue']) && $_GET['langue']=="mg") {
		$_SESSION['langue'] = "Malagasy";		
	}else{
		$_SESSION['langue'] = "Francais";		
	}
	include 'modele/agricode/modele.agro.php';
	$modeleAgro = new Agro();
	$donne = $modeleAgro->GetClimatAll();
	require_once('view/accueil.php');
 ?>