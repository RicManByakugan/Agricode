<?php 
	include 'modele/personnel/modele.personnel.php';
	include 'modele/agro/modele.agro.php';
	
	$modelePerso = new Personnel();
	$modeleAgro = new Agro();

	if (isset($_SESSION['idPerso'])) {
		
		$idPerso = $_SESSION['idPerso'];
		$user = $modelePerso->GetPersonneBySomething('idPerso',$idPerso);
		if ($user['image']==NULL || $user['image']=="") {
			$img = "data/user/profile.png";
		}else{
			$img = "data/user/".$user['imageA'];
		}

		$d = $modeleAgro->AfficheDate('Jour');
		$m = $modeleAgro->AfficheDate('Mois');
		$y = $modeleAgro->AfficheDate('An');
	
		require_once('view/accueil.php');
	}else{
		require_once('view/login.php');
	}
 ?>