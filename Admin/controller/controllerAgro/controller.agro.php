<?php 
	if (isset($_POST['valideCalendarAdd'])) {
		session_start();
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		$modeleAgro = new Agro();

		$pays = $_POST['paysaddC'];
		$region = $_POST['regionaddC'];
		$nomCulture = $_POST['nomCulture'];
		$typeCulture = $_POST['typeCulture'];
		$varieteCulture = $_POST['varieteCulture'];

		$prearationCultureD1 = (int) $_POST['prearationCultureD1'];
		$prearationCultureD2 = (int) $_POST['prearationCultureD2'];
		$prearationCultureF1 = (int) $_POST['prearationCultureF1'];
		$prearationCultureF2 =(int)  $_POST['prearationCultureF2'];
		$prearationCulture = $modeleAgro->TraiteDonneAtsofoka($prearationCultureD1,$prearationCultureD2,$prearationCultureF1,$prearationCultureF2);

		$semiplD1 = (int) $_POST['semiplD1'];
		$semiplD2 = (int) $_POST['semiplD2'];
		$semiplF1 = (int) $_POST['semiplF1'];
		$semiplF2 = (int) $_POST['semiplF2'];
		$semiPlCulture = $modeleAgro->TraiteDonneAtsofoka($semiplD1,$semiplD2,$semiplF1,$semiplF2);

		$F1FCultureD1 = (int) $_POST['1FCultureD1'];
		$F1FCultureD2 = (int) $_POST['1FCultureD2'];
		$F1FCultureF1 = (int) $_POST['1FCultureF1'];
		$F1FCultureF2 = (int) $_POST['1FCultureF2'];
		$FCulture1 = $modeleAgro->TraiteDonneAtsofoka($F1FCultureD1,$F1FCultureD2,$F1FCultureF1,$F1FCultureF2);

		$F2FCultureD1 = (int) $_POST['2FCultureD1'];
		$F2FCultureD2 = (int) $_POST['2FCultureD2'];
		$F2FCultureF1 = (int) $_POST['2FCultureF1'];
		$F2FCultureF2 = (int) $_POST['2FCultureF2'];
		$FCulture2 = $modeleAgro->TraiteDonneAtsofoka($F2FCultureD1,$F2FCultureD2,$F2FCultureF1,$F2FCultureF2);

		$F3FCultureD1 = (int) $_POST['3FCultureD1'];
		$F3FCultureD2 = (int) $_POST['3FCultureD2'];
		$F3FCultureD2 = (int) $_POST['3FCultureF1'];
		$F3FCultureD2 = (int) $_POST['3FCultureF2'];
		$FCulture3 = $modeleAgro->TraiteDonneAtsofoka($F3FCultureD1,$F2FCultureD2,$F2FCultureF1,$F2FCultureF2);

		$S1SCultureD1 = (int) $_POST['1SCultureD1'];
		$S1SCultureD2 = (int) $_POST['1SCultureD2'];
		$S1SCultureF1 = (int) $_POST['1SCultureF1'];
		$S1SCultureF2 = (int) $_POST['1SCultureF2'];
		$SCulture1 = $modeleAgro->TraiteDonneAtsofoka($S1SCultureD1,$S1SCultureD2,$S1SCultureF1,$S1SCultureF2);

		$S2SCultureD1 = (int) $_POST['2SCultureD1'];
		$S2SCultureD2 = (int) $_POST['2SCultureD2'];
		$S2SCultureF1 = (int) $_POST['2SCultureF1'];
		$S2SCultureF2 = (int) $_POST['2SCultureF2'];
		$SCulture2 = $modeleAgro->TraiteDonneAtsofoka($S2SCultureD1,$S2SCultureD2,$S2SCultureF1,$S2SCultureF2);

		$B1BCultureD1 = (int) $_POST['1BCultureD1'];
		$B1BCultureD2 = (int) $_POST['1BCultureD2'];
		$B1BCultureF1 = (int) $_POST['1BCultureF1'];
		$B1BCultureF2 = (int) $_POST['1BCultureF2'];
		$BCulture1 = $modeleAgro->TraiteDonneAtsofoka($B1BCultureD1,$B1BCultureD2,$B1BCultureF1,$B1BCultureF2);

		$B2BCultureD1 = (int) $_POST['2BCultureD1'];
		$B2BCultureD2 = (int) $_POST['2BCultureD2'];
		$B2BCultureF1 = (int) $_POST['2BCultureF1'];
		$B2BCultureF2 = (int) $_POST['2BCultureF2'];
		$BCulture2 = $modeleAgro->TraiteDonneAtsofoka($B2BCultureD1,$B2BCultureD2,$B2BCultureF1,$B2BCultureF2);

		$RecoldeCultureD1 = (int) $_POST['RecoldeCultureD1'];
		$RecoldeCultureD2 = (int) $_POST['RecoldeCultureD2'];
		$RecoldeCultureF1 = (int) $_POST['RecoldeCultureF1'];
		$RecoldeCultureF2 = (int) $_POST['RecoldeCultureF2'];
		$RecoldeCulture = $modeleAgro->TraiteDonneAtsofoka($RecoldeCultureD1,$RecoldeCultureD2,$RecoldeCultureF1,$RecoldeCultureF2);


		if ($region=="Analamanga (Antananarivo)" || $region=="Bongolava (Antananarivo)" || $region=="Itasy (Antananarivo)" || $region=="Vakinankaratra (Antananarivo)" ) {
			$province = "Antananarivo";
		}elseif ($region=="Amoron i Mania (Fianarantsoa)" || $region=="Atsimo-Atsinanana (Fianarantsoa)" || $region=="Haute Matsiatra (Fianarantsoa)" || $region=="Vatovavy-Fitovinany (Fianarantsoa)" || $region=="Ihorombe (Fianarantsoa)") {
			$province = "Fianarantsoa";
		}elseif ($region == "Alaotra Mangoro (Toamasina)" || $region == "Analanjirofo (Toamasina)" || $region == "Atsinanana (Toamasina)") {
			$province = "Toamasina";
		}elseif ($region == "Betsiboka (Mahajanga)" || $region == "Boeny (Mahajanga)" || $region == "Melaky (Mahajanga)" || $region == "Sofia (Mahajanga)") {
			$province = "Mahajanga";
		}elseif ($region == "Androy (Toliara)" || $region == "Anosy (Toliara)" || $region == "Atsimo-Andrefana (Toliara)" || $region == "Menabe (Toliara)") {
			$province = "Toliara";
		}elseif ($region == "Diana (Antsiranana)" || $region == "Sava (Antsiranana)") {
			$province = "Antsiranana";
		}else{
			$province = $_POST['regionaddC'];
		}

		if ($province!=NULL) {
					$idPerso = $_SESSION['idPerso'];
					$modeleAgro->AddCalendar($idPerso,$nomCulture,$varieteCulture,$typeCulture,$pays,$province,$_POST['regionaddC']);
					$donne = $modeleAgro->GetMaxCalendar();
					$modeleAgro->AddCalendarKatsaka($donne['maxId'],$prearationCulture,$semiPlCulture,$FCulture1,$FCulture2,$FCulture3,$SCulture1,$SCulture2,$BCulture1,$BCulture2,$RecoldeCulture);
 ?>
	 	<script type="text/javascript">
			window.top.window.GetListeCalendar();
			window.top.window.ResetForm('AddCalendar');
			window.top.window.alert('Effectuer');
	 	</script>
<?php 
		}else{
?>
		<script type="text/javascript">
			window.top.window.alert("Erreur");
	 	</script>
<?php 
		}
}

	if (isset($_POST['recCalecal'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();

		$donne = $modeleAgro->GetCalendarListe();
				if ($donne) {
							foreach ($donne as $key => $value) {
								echo "
											<tr>
	                      <td>".$value['nom_culture']."</td>
	                      <td>".$value['variete']."</td>
	                      <td>".$value['type_culture']."</td>
	                      <td>".$value['pays']."</td>
	                      <td>".$value['province']."</td>
	                      <td>".$value['region']."</td>
	                      <td><button class='btn btn-sm btn-secondary' data-toggle='modal' data-target='#detailleCcc' onclick='DetailleCalendarB(".$value['id_culture'].")'>Détaille</button></td>
	                    </tr>
								";
							}
				}
	}
	if (isset($_POST['deleteCCCCC'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		$idCale = $_POST['deleteCCCCC'];
		$modeleAgro->DeleteCalendar($idCale);
		echo "ok";
	}

	if (isset($_POST['detailleCCCCC'])) {
			include '../../config/connex.php';
			include '../../modele/agro/modele.agro.php';
			include '../../modele/personnel/modele.personnel.php';
			$modelePerso = new Personnel();
			$modeleAgro = new Agro();
			$idC = $_POST['detailleCCCCC'];
			$donne = $modeleAgro->GetCalendarListeId($idC);
			if ($donne) {
					$donneAlgo = $modeleAgro->RecupDonneeAlgo($donne['id_culture']);
					$resFinal = "";
					for ($i=1; $i <=12 ; $i++) { 
				    	if (!empty($donneAlgo[$i])) {
				    		$resFinal = $resFinal.$donneAlgo[$i];
				    	}    	
				  }
			    list($var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10) = explode("<br>", $resFinal);
					echo "
							<div class='modal-header'>	
				        <h4 class='modal-title'>AGRICODE</h4>
				        <button type='button' class='close' data-dismiss='modal'>×</button>
			        </div>
			        <div class='modal-body'>
			        	<div class='row'>
			        		<div class='col-sm-6'>
				        		<h6 class='text-muted' align='left'>".$donne['nom_culture']."</h6>
			        		</div>
			        		<div class='col-sm-6'>
				        		<h6 class='text-muted' align='right'>".$donne['pays']." | ".$donne['region']."</h6>
			        		</div>
			        	</div>
				        <hr>
				        <div class='row'>
				        	<div class='col'>
				        		<li class='text-muted small'>".$var1."</li><br>
				        		<li class='text-muted small'>".$var2."</li><br>
				        		<li class='text-muted small'>".$var3."</li><br>
				        		<li class='text-muted small'>".$var4."</li><br>
				        		<li class='text-muted small'>".$var5."</li><br>
				        		<li class='text-muted small'>".$var6."</li><br>
				        		<li class='text-muted small'>".$var7."</li><br>
				        		<li class='text-muted small'>".$var8."</li><br>
				        		<li class='text-muted small'>".$var9."</li><br>
				        		<li class='text-muted small'>".$var10."</li><br>
				        	</div>
				        </div>
				        <hr>
				        <div class='row'>
				        	<div class='col'>
				        		<button class='btn btn-sm btn-secondary btn-block' onclick='DeleteCalendarB(".$donne['id_culture'].")'>Supprimer</button>
				        	</div>
				        </div>

			        </div>
					";
			}else{
				echo "ko";
			}
	}

	if (isset($_POST['addCyclone'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();

		$idPerso = $_POST['idPerso'];
		$datee = $_POST['addCyclone'];
		$precipitation = (int) $_POST['preC'];
		$vent = (int) $_POST['ventC'];
		$pays = $_POST['pays'];
		$direction = $_POST['direction'];

		$dateNow = date("Y-m-d");

		if ($datee < $dateNow) {
			echo "Date incorrecte";
		}else{
			if (is_int($precipitation) && is_int($vent)) {
					$modeleAgro->AddCyclone($idPerso,$datee,$precipitation,$vent,$pays,$direction);
					echo "ok";
			}else{
				echo "Erreur";
			}
		}
	}

	if (isset($_POST['listeCyclone'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		$idPerso = $_POST['idPerso'];
		$donne = $modeleAgro->GetCyclone();
		if ($donne) {
			echo "
				<table class='table'>
					<thead class='thead-dark'>
				      <tr>
				        <th>Personnel</th>
				        <th>Pays</th>
				        <th>Date</th>
				        <th>Precipitation</th>
				        <th>Température</th>
				        <th>Direction</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
			";
			foreach ($donne as $key => $value) {
				$user = $modelePerso->GetPersonneBySomething('idPerso',$value['idPersoC']);
				if ($value['idPersoC']==$idPerso) {
					$control = "<button class='btn btn-block btn-outline-secondary' onclick=\"SupCyclone(".$value['idCyclone'].");\">Suppirmer</button>";
				}else{
					$control = "";
				}
				echo "
								<tr>
									<td>".$user['nom']." ".$user['prenom']."</td>
									<td>".$value['paysC']."</td>
									<td>".$value['dateCy']."</td>
									<td>".$value['precipitationC']."</td>
									<td>".$value['ventC']."</td>
					      	<td>".$value['directionC']."</td>
					      	<td>".$control."</td>
					    </tr>
				";
			}
			echo "
					</tbody>
				    <tbody>
				</table>
			";
		}else{
			echo "
				<table class='table'>
					<thead class='thead-dark'>
				      <tr>
				        <th>Personnel</th>
				        <th>Pays</th>
				        <th>Date</th>
				        <th>Precipitation</th>
				        <th>Température</th>
				        <th>Direction</th>
				      </tr>
				    </thead>
					</tbody>
						<tr>
								<th>Vide</th>
				        <th>Vide</th>
				        <th>Vide</th>
				        <th>Vide</th>
				        <th>Vide</th>
				        <th>Vide</th>
					    </tr>
				    <tbody>
				</table>
			";
		}
	}

	if (isset($_POST['delCyl'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		
		$idCyclone = $_POST['delCyl'];
		$idPerso = $_POST['idPerso'];
		
		$modeleAgro->DelCyclone($idCyclone);

		echo "ok";
	}


	if (isset($_POST['analyse'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		
		$idPerso = $_POST['idPerso'];
		$periode = $_POST['periode'];
		$precipitation = (int) $_POST['precipitation'];
		$temperature = (int) $_POST['temperature'];
		$vent = (int) $_POST['vent'];
		$region = $_POST['region'];
		$pays = $_POST['pays'];
		$district = $_POST['district'];

		$grele = $_POST['grele'];
		$cyclone = $_POST['cyclone'];
		$greleV = $modeleAgro->GetValueGC($grele);
		$cycloneV = $modeleAgro->GetValueGC($cyclone);

		if (empty($pays) || empty($region) || empty($district) || empty($periode) || empty($precipitation) || empty($temperature) || empty($vent)) {
			echo "ko";
		}else{
			if (is_int($precipitation) && is_int($temperature) && is_int($vent)) {
				$user = $modelePerso->GetPersonneBySomething('idPerso',$idPerso);
				$dateNow = date("Y-m-d");
				if ($periode < $dateNow) {
					$periodeA = NULL;
				}else{
					$periodeA = $periode;
				}

				if ($periodeA == NULL) {
					echo "koko";
				}else{
					$res = $modeleAgro->AnalyseDonne($precipitation,$temperature,$vent);
					$resimg = $modeleAgro->ImageCo($res);
					if ($resimg == NULL) {
						$imgA = "<img src='data/logo.jpg' width='250' height='250'>";
					}else{
						$imgA = "<img src='data/climat/".$resimg."' width='250' height='250'>";
					}

					echo "
			                <div class='row'>
			                  <div class='col'>
			                    <h4 class='small' align='left'>".$periodeA."</h4>
			                  </div>
			                  <div class='col'>
			                    <h4 class='small' align='right'>".$user['nom']." ".$user['prenom']."</h4>
			                  </div>
			                </div>
			                <hr>
			                <div class='row'>
			                  <div class='col'>
			                  	<label class='text-muted small'>Pays : </label> <label>".$pays."</label><br>
			                  	<label class='text-muted small'>Région | Province : </label> <label>".$region."</label><br>
			                  	<label class='text-muted small'>District : </label> <label>".$district."</label>
			                  </div>
			                </div>
			                <table class='table table-lg'>
			                  <thead class='thead-dark'>
			                    <tr>
			                      <th>Débit de précipitation</th>
			                      <th>Température</th>
			                      <th>Vitesse de vent</th>
			                    </tr>
			                  </thead>
			                  <tbody class='text-center table-secondary'>
			                    <tr>
			                      <td>".$precipitation."</td>
			                      <td>".$temperature." °C</td>
			                      <td>".$vent." km/h</td>
			                    </tr>
			                  </tbody>
			                </table><hr>
			                <div class='text-center pt-0'>
			                    ".$imgA."
			                </div>
			                <table class='table table-lg'>
			                  <thead class='thead-dark text-center'>
			                    <tr>
			                      <th>Grêle</th>
			                    </tr>
			                  </thead>
			                  <tbody class='text-center table-secondary'>
			                    <tr>
			                      <td>".$greleV."</td>
			                    </tr>
			                  </tbody>
			                </table>
			                <div>
			                    <button class='btn btn-block btn-outline-secondary' onclick=\"EnvoieDonne('".$periode."',".$precipitation.",".$temperature.",".$vent.",'".$region."','".$pays."','".$district."',".$idPerso.",$cyclone,$grele);\">Valider</button>
			                </div>
					";
				}
			}else{
				echo "koko";
			}
		}
	}
	if (isset($_POST['confirmAnalyse'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/notification/modele.notification.php';
		$modeleAgro = new Agro();
		$modeleNotif = new Notif();

		$periode = $_POST['periode'];
		$pays = $_POST['pays'];
		$district = $_POST['district'];
		$region = $_POST['region'];
		$idPerso = (int) $_POST['idPerso'];
		$precipitation = (int) $_POST['precipitation'];
		$temperature = (int) $_POST['temperature'];
		$vent = (int) $_POST['vent'];

		$cyclone = $_POST['cyclone'];
		$grele = $_POST['grele'];

		if (empty($pays) || empty($district) || empty($region) || empty($periode) || empty($idPerso) || empty($precipitation) || empty($temperature) || empty($vent)) {
			echo "Erreur";
		}else{
			if (is_int($precipitation) && is_int($temperature) && is_int($vent)) {
				$donneVer = $modeleAgro->GetClimatToday($pays,$region,$district,$periode);

				if ($region == "Analamanga (Antananarivo)" || $region == "Bongolava (Antananarivo)" || $region == "Itasy (Antananarivo)" || $region == "Vakinankaratra (Antananarivo)") {
					$province = "Antananarivo";
				}elseif ($region == "Amoron i Mania (Fianarantsoa)" || $region == "Atsimo-Atsinanana (Fianarantsoa)" || $region == "Haute Matsiatra (Fianarantsoa)" || $region == "Vatovavy-Fitovinany (Fianarantsoa)" || $region == "Ihorombe (Fianarantsoa)") {
					$province = "Fianarantsoa";
				}elseif ($region == "Alaotra Mangoro (Toamasina)" || $region == "Analanjirofo (Toamasina)" || $region == "Atsinanana (Toamasina)") {
					$province = "Toamasina";
				}elseif ($region == "Betsiboka (Mahajanga)" || $region == "Boeny (Mahajanga)" || $region == "Melaky (Mahajanga)" || $region == "Sofia (Mahajanga)") {
					$province = "Mahajanga";
				}elseif ($region == "Androy (Toliara)" || $region == "Anosy (Toliara)" || $region == "Atsimo-Andrefana (Toliara)" || $region == "Menabe (Toliara)") {
					$province = "Toliara";
				}elseif ($region == "Diana (Antsiranana)" || $region == "Sava (Antsiranana)") {
					$province = "Antsiranana";
				}else{
					$province = $region;
				}

				$dateNow = date("Y-m-d");
				if ($donneVer) {
					echo "Il y a déjà un climat pour cette district ".$district." pour la date de ".$periode;	
				}else{
					$res = $modeleAgro->AnalyseDonne($precipitation,$temperature,$vent);
					$resimg = $modeleAgro->ImageCo($res);
					$modeleAgro->AddClimat($idPerso,$pays,$province,$region,$district,$periode,$precipitation,$temperature,$vent,$resimg,$cyclone,$grele);
					$text = "AJOUT NOUVEAU CLIMAT | ".$pays." | ".$province." | ".$region." | ".$district." | ".$periode;
					$modeleNotif->AddNotif($idPerso,$text);
					
					$donneLast = $modeleAgro->GetLastId();
					$Desc = "NOUVEAU CLIMAT POUR : ".$periode;
					$modeleAgro->AddAlert($idPerso,$donneLast['lastId'],$Desc);
					echo "ok";
				}
			}else{
				echo "Erreur";
			}
		}

	}


	if (isset($_POST['recupDonne'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		$modeleAgro = new Agro();
		$donne1 = $modeleAgro->GetClimatCountPeriode("Today");				
		$donne2 = $modeleAgro->GetClimatCountPeriode("Tomorrow");				
		$donne3 = $modeleAgro->GetClimatCountPeriode("Next");				

		if ($donne1['nombre']){
			$one = $donne1['nombre'];
		}else{
			$one = "Vide";
		}
		if ($donne2['nombre']){
			$two = $donne2['nombre'];
		}else{
			$two = "Vide";
		}
		if ($donne3['nombre']){
			$three = $donne3['nombre'];
		}else{
			$three = "Vide";
		}

		echo "
			<div class='col-lg-4 col-6'>
              <div class='small-box bg-secondary'>
                <div class='inner'>
                  <p>Aujourd'hui</p>
                  <h3>".$one."</h3>
                </div>
                <div class='icon'>
                  <i class='ion ion-bag'></i>
                </div>
                <a class='small-box-footer' data-toggle='modal' data-target='#donneClimat' onclick=\"RecupListeClimat('Today')\">Voir <i class='fas fa-arrow-circle-right'></i></a>
              </div>
            </div>

            <div class='col-lg-4 col-6'>
              <div class='small-box bg-secondary'>
                <div class='inner'>
                  <p>Demain</p>
                  <h3>".$two."</h3>
                </div>
                <div class='icon'>
                  <i class='ion ion-bag'></i>
                </div>
                <a class='small-box-footer' data-toggle='modal' data-target='#donneClimat' onclick=\"RecupListeClimat('Tomorrow')\">Voir <i class='fas fa-arrow-circle-right'></i></a>
              </div>
            </div>

            <div class='col-lg-4 col-6'>
              <div class='small-box bg-secondary'>
                <div class='inner'>
                  <p>Après demain</p>
                  <h3>".$three."</h3>
                </div>
                <div class='icon'>
                  <i class='ion ion-bag'></i>
                </div>
                <a class='small-box-footer' data-toggle='modal' data-target='#donneClimat' onclick=\"RecupListeClimat('Next')\">Voir <i class='fas fa-arrow-circle-right'></i></a>
              </div>
            </div>

		";
	}

	if (isset($_POST['recupListeC'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		$periode = $_POST['recupListeC'];
		$donne = $modeleAgro->GetClimatPeriode($periode);				
		if ($donne) {
			echo "
				<table class='table'>
					<thead class='thead-dark'>
				      <tr>
				        <th>Personnel</th>
				        <th>Pays</th>
				        <th>Province</th>
				        <th>Région</th>
				        <th>District</th>
				        <th>Date</th>
				        <th>Precipitation</th>
				        <th>Température</th>
				        <th>Vent</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
			";
			foreach ($donne as $key => $value) {
				$user = $modelePerso->GetPersonneBySomething('idPerso',$value['idPersonnel']);
				echo "
						<tr>
							<td>".$user['nom']." ".$user['prenom']."</td>
							<td>".$value['pays']."</td>
							<td>".$value['province']."</td>
							<td>".$value['region']."</td>
							<td>".$value['district']."</td>
							<td>".$value['Periode']."</td>
					      	<td>".$value['precipitation']."</td>
					      	<td>".$value['precipitation']."</td>
					      	<td>".$value['vent']."</td>
					      	<td><button class='btn btn-outline-secondary btn-sm btn-block' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$value['idClimat'].")'>Voir</button></td>
					    </tr>
				";
			}
			echo "
					</tbody>
				    <tbody>
				</table>
			";
		}else{
			echo "
				<table class='table'>
					<thead class='thead-dark'>
				      <tr>
				        <th>Personnel</th>
				        <th>Pays</th>
				        <th>Province</th>
				        <th>Région</th>
				        <th>District</th>
				        <th>Date</th>
				        <th>Precipitation</th>
				        <th>Température</th>
				        <th>Vent</th>
				        <th>Action</th>
				      </tr>
				    </thead>
					</tbody>
						<tr>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
							<td>Vide</td>
					    </tr>
				    <tbody>
				</table>
			";
		}

	}

	if (isset($_POST['recupDetailleC'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		$idClimat = $_POST['recupDetailleC'];
		$idPerso = $_POST['idPerso'];
		$donne = $modeleAgro->GetClimatId($idClimat);	
		if ($donne) {
			$user = $modelePerso->GetPersonneBySomething('idPerso',$donne['idPersonnel']);

			if ($idPerso == $donne['idPersonnel']) {
				$control = "
							<hr>
							<div class='row'>
								<div class='col'>
									<button class='btn btn-block btn-outline-secondary btn-block' data-toggle='modal' data-target='#modifCA' onclick='MoodifClimat(".$idClimat.")'>Modifier</button>
								</div>
								<div class='col'>
									<button class='btn btn-block btn-outline-secondary btn-block' onclick='DeleteClimat(".$idClimat.")'>Suppirmer</button>
								</div>
								<div class='col'>
									<button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#detailleDistrict' onclick=\"RecupDetailleDistrict('".$donne['pays']."','".$donne['district']."','".$donne['region']."')\">".$donne['district']."</button>
								</div>
							</div>
				";
			}else{
				$control = "";
			}

			echo "
						<div class='modal-header'>	
			        <h4 class='modal-title'>AGRICODE</h4>
			        <button type='button' class='close' data-dismiss='modal'>×</button>
		        </div>
		        <div class='modal-body'>
		        	<div class='row'>
		        		<div class='col'>
				        	<h3 class='small text-muted'>Ajouté par ".$user['nom']." ".$user['prenom']."</h3>
				        	<hr>
				        	<div class='row'>
				        		<div class='col'>
		        					<ul class='ml-4 mb-0 fa-ul text-muted'>
										<li><b>Pays : </b>".$donne['pays']."</li>
										<li><b>Province : </b>".$donne['province']."</li>
										<li><b>Région : </b>".$donne['region']."</li>
										<li><b>District : </b>".$donne['district']."</li>
									</ul>
				        		</div>
				        		<div class='col'>
		        					<ul class='ml-4 mb-0 fa-ul text-muted'>
										<li><b>Date : </b>".$donne['Periode']."</li>
										<li><b>Precipitation : </b>".$donne['precipitation']."</li>
										<li><b>Température : </b>".$donne['temperature']."</li>
										<li><b>Vent : </b>".$donne['vent']."</li>
									</ul>
				        		</div>
				        	</div>
							".$control."
							<hr>
			        	</div>
		        		<div class='col text-center'>
			        		<img src='data/climat/".$donne['imageCl']."' width='250' height='250'>
			        	</div>
			        </div>
		        </div>
			";
		}
	}

	if (isset($_POST['modifEleme'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modelePerso = new Personnel();
		$modeleAgro = new Agro();
		$idClimat = $_POST['modifEleme'];
		$donne = $modeleAgro->GetClimatId($idClimat);	
		if ($donne) {
			$user = $modelePerso->GetPersonneBySomething('idPerso',$donne['idPersonnel']);
			$greleV = $modeleAgro->GetValueGC($donne['grele']);	
			$cycloneV = $modeleAgro->GetValueGC($donne['cyclone']);	

			echo "
				<div class='modal-header'>
			        <h4 class='modal-title'>AGRICODE</h4>
			        <button type='button' class='close' data-dismiss='modal'>×</button>
		        </div>
		        <div class='modal-body'>
		        	<div class='row'>
		        		<div class='col'>
				        	<h3 class='small text-muted'>Ajouté par ".$user['nom']." ".$user['prenom']."</h3>
							<hr>
							<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Pays : ".$donne['pays']."</label>
											<input type='text' class='form-control' id='paysModif' readonly value='".$donne['pays']."'>
										</div>
										<div class='form-group'>
											<label>Région : ".$donne['region']."</label>
											<input type='text' class='form-control' id='regModif' readonly value='".$donne['region']."'>
										</div>
										<div class='form-group'>
											<label>District : ".$donne['district']."</label>
											<input type='text' class='form-control' id='descModif' readonly value='".$donne['district']."'>
										</div>
										<div class='form-group'>
											<label>Date : ".$donne['Periode']."</label>
				                          	<input type='date' class='form-control' id='preModif' value='".$donne['Periode']."' readonly>
										</div>
									</div>
									<div class='col'>
																<div class='form-group'>
				                          <label>Débit de précipitation</label>
				                          <input type='number' class='form-control' id='preciModif' value='".$donne['precipitation']."'>
				                        </div>
				                        <div class='form-group'>
				                          <label>Température (°C)</label>
				                          <input type='number' class='form-control' id='tempModif' value='".$donne['temperature']."'>
				                        </div>
				                        <div class='form-group'>
				                          <label>Vitesse de vent (km/h)</label>
				                          <input type='number' class='form-control' id='ventModif' value='".$donne['vent']."'>
				                        </div><hr>
				                         <input type='number' class='form-control' id='cycloneModif' value='0' hidden>
				                        <div class='form-group'>
				                        	<label>Grêle : ".$greleV."</label>
				                          <select class='form-control' id='greleModif'>
				                            <option></option>
				                            <option value='0'>0%</option>
				                            <option value='1'>10%</option>
				                            <option value='2'>20%</option>
				                            <option value='3'>30%</option>
				                            <option value='4'>40%</option>
				                            <option value='5'>50%</option>
				                            <option value='6'>60%</option>
				                            <option value='7'>70%</option>
				                            <option value='8'>80%</option>
				                            <option value='9'>90%</option>
				                            <option value='10'>100%</option>
				                          </select>
				                        </div>
									</div>
							</div>
							<div>
				                <button class='btn btn-block btn-outline-secondary' onclick='ModifConfirm(".$idClimat.");'>Modifier</button>
				            </div>
			        	</div>
		        		<div class='col text-center'>
			        		<img src='data/climat/".$donne['imageCl']."' width='250' height='250'>
			        	</div>
			        </div>
		        </div>
			";
		}
	}
	if (isset($_POST['modifC'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$modeleAgro = new Agro();

		$idClimat = $_POST['modifC'];
		$periodeModif = $_POST['periodeModif'];
		$paysModif = $_POST['paysModif'];
		$regModif = $_POST['regModif'];
		$descModif = $_POST['descModif'];

		$greleModif = $_POST['greleModif'];
		$cycloneModif = $_POST['cycloneModif'];

		$precipitationModif = $_POST['precipitationModif'];
		$temperatureModif = $_POST['temperatureModif'];
		$ventModif = $_POST['ventModif'];

		$dateNow = date("d/m/Y");
		if (!empty($periodeModif) && $periodeModif < $dateNow) {
			echo "Date incorrecte";
		}else{
			if (!empty($regModif)) {
				if ($regModif == "Analamanga (Antananarivo)" || $regModif == "Bongolava (Antananarivo)" || $regModif == "Itasy (Antananarivo)" || $regModif == "Vakinankaratra (Antananarivo)") {
					$province = "Antananarivo";
				}elseif ($regModif == "Amoron i Mania (Fianarantsoa)" || $regModif == "Atsimo-Atsinanana (Fianarantsoa)" || $regModif == "Haute Matsiatra (Fianarantsoa)" || $regModif == "Vatovavy-Fitovinany (Fianarantsoa)" || $regModif == "Ihorombe (Fianarantsoa)") {
					$province = "Fianarantsoa";
				}elseif ($regModif == "Alaotra Mangoro (Toamasina)" || $regModif == "Analanjirofo (Toamasina)" || $regModif == "Atsinanana (Toamasina)") {
					$province = "Toamasina";
				}elseif ($regModif == "Betsiboka (Mahajanga)" || $regModif == "Boeny (Mahajanga)" || $regModif == "Melaky (Mahajanga)" || $regModif == "Sofia (Mahajanga)") {
					$province = "Mahajanga";
				}elseif ($regModif == "Androy (Toliara)" || $regModif == "Anosy (Toliara)" || $regModif == "Atsimo-Andrefana (Toliara)" || $regModif == "Menabe (Toliara)") {
					$province = "Toliara";
				}elseif ($regModif == "Diana (Antsiranana)" || $regModif == "Sava (Antsiranana)") {
					$province = "Antsiranana";
				}
			}else{
				$province = "";
			}


			$res = $modeleAgro->AnalyseDonne($precipitationModif,$temperatureModif,$ventModif);
			$resimg = $modeleAgro->ImageCo($res);

			$modeleAgro->UpdateClimatUser($idClimat,$paysModif,$province,$regModif,$descModif,$periodeModif,$precipitationModif,$temperatureModif,$ventModif,$resimg,$greleModif,$cycloneModif);	
			
			$donneUser = $modeleAgro->GetClimatId($idClimat);
			$text = "MODIFICATION CLIMAT | ".$donneUser['pays']." | ".$donneUser['province']." | ".$donneUser['region']." | ".$donneUser['district']." | ".$donneUser['Periode'];
			$modeleNotif->AddNotif($donneUser['idPersonnel'],$text);

			$Desc = "MISE A JOUR POUR LE CLIMAT DU : ".$donneUser['Periode'];
			$modeleAgro->AddAlert($donneUser['idPersonnel'],$idClimat,$Desc);

			echo "ok";
		}

	}
	if (isset($_POST['supIt'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$modeleAgro = new Agro();
		$idClimat = $_POST['supIt'];

		$donneClimat = $modeleAgro->GetClimatId($idClimat);
		$text = "SUPPRESSION CLIMAT | ".$donneClimat['pays']." | ".$donneClimat['province']." | ".$donneClimat['region']." | ".$donneClimat['district']." | ".$donneClimat['Periode'];
		$modeleNotif->AddNotif($donneClimat['idPersonnel'],$text);
		
		$modeleAgro->DeleteClimat($idClimat);	

		echo "ok";
	}

	if (isset($_POST['hsitoBabe'])) {
		include '../../config/connex.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$donne = $modeleNotif->GetNotifLimit();	
		if ($donne) {
			foreach ($donne as $key => $value) {
				echo "
					<tr>
                      <td>".$value['nom']." ".$value['prenom']."</td>
                      <td>".$value['DescNotif']."</td>
                      <td>".$value['DateNotif']."</td>
                      <td>".$value['HeureNotif']."</td>
                    </tr>
				";
			}
		}
	}

	if (isset($_POST['hsitoBabeall'])) {
		include '../../config/connex.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$donne = $modeleNotif->GetNotif();	
		if ($donne) {
			foreach ($donne as $key => $value) {
				echo "
					<tr>
                      <td>".$value['nom']." ".$value['prenom']."</td>
                      <td>".$value['DescNotif']."</td>
                      <td>".$value['DateNotif']."</td>
                      <td>".$value['HeureNotif']."</td>
                    </tr>
				";
			}
		}
	}

	if (isset($_POST['recheAnalyse'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		$modeleAgro = new Agro();
		$search = $_POST['recheAnalyse'];
		$idPerso = $_POST['idPerso'];
		if (!empty($search)) {
			$donne = $modeleAgro->GetClimatPeriodeRegion("Today",$search);
			$donne2 = $modeleAgro->GetClimatPeriodeRegion("Tomorrow",$search);
			$donne3 = $modeleAgro->GetClimatPeriodeRegion("Next",$search);
			if ($donne) {
					if ($donne['imageCl']==NULL || $donne['imageCl']=="") {
						$img = "data/climat/profile.png";
					}else{
						$img = "data/climat/".$donne['imageCl'];
					}
					if ($idPerso == $donne['idPersonnel']) {
						$control = "
									<br>
									<div class='row'>
										<div class='col'>
											<button class='btn btn-block btn-outline-secondary btn-block' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$donne['idClimat'].")'>Voir</button>
										</div>
									</div>
						";
					}else{
						$control = "";
					}

					list($Y,$m,$d) = explode("-", $donne['Periode']);

					$auj = "Aujourd'hui";
					$demain = "Demain";
					$apS = "Après demain";

					echo "
						<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col-auto'>
	                                    <img class='img-fluid' src='".$img."' alt='Photo' style='max-height: 160px;'>
	                                </div>
	                                <div class='col px-4'>
	                                    <div>
	                                        <div class='badge badge-secondary float-right'>Aujourd'hui : ".$d."-".$m."-".$Y."</div>
	                                        <h3>".$donne['district']."</h3>
	                                        <p class='mb-0'>Précipitation : ".$donne['precipitation']." <br> Température : ".$donne['temperature']." <br> Vent : ".$donne['vent']."</p>
	                                    </div>
	                            		".$control."
	                                </div>
	                            </div>
	                    </div>
					";	

			}else{
				echo "
						<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col px-4'>
	                                    <div>
	                                        <h3 class='text-muted' align='left'>Aujourd'hui :  Aucune donnée pour ".$search."</h3>
	                                    </div>
	                                </div>
	                            </div>
	                    </div>
				";
			}
			if ($donne2) {
					if ($donne2['imageCl']==NULL || $donne2['imageCl']=="") {
						$img = "data/climat/profile.png";
					}else{
						$img = "data/climat/".$donne2['imageCl'];
					}
					if ($idPerso == $donne2['idPersonnel']) {
						$control = "
									<br>
									<div class='row'>
										<div class='col'>
											<button class='btn btn-block btn-outline-secondary btn-block' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$donne2['idClimat'].")'>Voir</button>
										</div>
									</div>
						";
					}else{
						$control = "";
					}

					list($Y,$m,$d) = explode("-", $donne2['Periode']);

					$auj = "Aujourd'hui";
					$demain = "Demain";
					$apS = "Après demain";

					echo "
						<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col-auto'>
	                                    <img class='img-fluid' src='".$img."' alt='Photo' style='max-height: 160px;'>
	                                </div>
	                                <div class='col px-4'>
	                                    <div>
	                                        <div class='badge badge-secondary float-right'>Demain : ".$d."-".$m."-".$Y."</div>
	                                        <h3>".$donne2['district']."</h3>
	                                        <p class='mb-0'>Précipitation : ".$donne2['precipitation']." <br> Température : ".$donne2['temperature']." <br> Vent : ".$donne2['vent']."</p>
	                                    </div>
	                            		".$control."
	                                </div>
	                            </div>
	                    </div>
					";	

			}else{
				echo "
						<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col px-4'>
	                                    <div>
	                                        <h3 class='text-muted' align='left'>Demain :  Aucune donnée pour ".$search."</h3>
	                                    </div>
	                                </div>
	                            </div>
	                    </div>
				";
			}
			if ($donne3) {
					if ($donne3['imageCl']==NULL || $donne3['imageCl']=="") {
						$img = "data/climat/profile.png";
					}else{
						$img = "data/climat/".$donne3['imageCl'];
					}
					if ($idPerso == $donne3['idPersonnel']) {
						$control = "
									<br>
									<div class='row'>
										<div class='col'>
											<button class='btn btn-block btn-outline-secondary btn-block' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$donne3['idClimat'].")'>Voir</button>
										</div>
									</div>
						";
					}else{
						$control = "";
					}

					list($Y,$m,$d) = explode("-", $donne3['Periode']);

					echo "
						<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col-auto'>
	                                    <img class='img-fluid' src='".$img."' alt='Photo' style='max-height: 160px;'>
	                                </div>
	                                <div class='col px-4'>
	                                    <div>
	                                        <div class='badge badge-secondary float-right'>Après demain : ".$d."-".$m."-".$Y."</div>
	                                        <h3>".$donne3['district']."</h3>
	                                        <p class='mb-0'>Précipitation : ".$donne3['precipitation']." <br> Température : ".$donne3['temperature']." <br> Vent : ".$donne3['vent']."</p>
	                                    </div>
	                            		".$control."
	                                </div>
	                            </div>
	                    </div>
					";	

			}else{
				echo "
						<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col px-4'>
	                                    <div>
	                                        <h3 class='text-muted' align='left'>Après demain :  Aucune donnée pour ".$search."</h3>
	                                    </div>
	                                </div>
	                            </div>
	                    </div>
				";
			}
		}else{
			echo "
				<div class='list-group-item'>
	                            <div class='row'>
	                                <div class='col px-4'>
	                                    <div>
	                                        <h3 class='text-muted' align='left'>Recherche vide</h3>
	                                    </div>
	                                </div>
	                            </div>
	                    </div>
			";
		}
	}

	if (isset($_POST['listeRDAA'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		$pays = $_POST['listeRDAA'];
		$idPerso = $_POST['idPerso'];
			function AfficheDonne($p,$r,$d)
			{
				$modeleAgro = new Agro();
				$donne = $modeleAgro->GetRegionDistrictDD($p,$r,$d);
				$nb1 = $modeleAgro->GetRegionDistrictDCount("Today",$p,$r,$d);
				$nb2 = $modeleAgro->GetRegionDistrictDCount("Tomorrow",$p,$r,$d);
				$nb3 = $modeleAgro->GetRegionDistrictDCount("Next",$p,$r,$d);
				$res = $nb1['nombre']+$nb2['nombre']+$nb3['nombre'];
				$st = 3-$res;
				if ($st==0) {
					$sta = "<span class='badge badge-success'>".$st."</span>";
					$resa = "<span class='badge badge-success'>".$res."/3</span>";
				}elseif ($st==1) {
					$sta = "<span class='badge badge-secondary'>".$st."</span>";
					$resa = "<span class='badge badge-secondary'>".$res."/3</span>";
				}elseif ($st==2) {
					$sta = "<span class='badge badge-primary'>".$st."</span>";
					$resa = "<span class='badge badge-primary'>".$res."/3</span>";
				}elseif ($st==3) {
					$sta = "<span class='badge badge-danger'>".$st."</span>";
					$resa = "<span class='badge badge-danger'>".$res."/3</span>";
				}
				if ($res == 0) {
					echo "
						<tr>
			                <td>".$resa."</td>
			                <td>".$st."</td>
			                <td>".$p."</td>
			                <td>".$d."</td>
			                <td>".$r."</td>
			                <td><button class='btn btn-outline-secondary btn-sm' data-toggle='modal' data-target='#detailleDistrict' onclick=\"RecupDetailleDistrict('".$p."','".$d."','".$r."')\">Détaille</button></td>
			            </tr>
					";
				}else{
					echo "
						<tr>
			                <td>".$resa."</td>
			                <td>".$st."</td>
			                <td>".$donne['pays']."</td>
			                <td>".$donne['district']."</td>
			                <td>".$donne['region']."</td>
			                <td><button class='btn btn-outline-secondary btn-sm' data-toggle='modal' data-target='#detailleDistrict' onclick=\"RecupDetailleDistrict('".$p."','".$d."','".$r."')\">Détaille</button></td>
			            </tr>
					";
				}
			}
		if ($pays=="MADAGASCAR") {
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Ambohidratrimo");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Andramasina");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Anjozorobe");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Ankazobe");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Antananarivo Atsimondrano");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Antananarivo Avaradrano");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Antananarivo Renivohitra");
			AfficheDonne("MADAGASCAR","Analamanga (Antananarivo)","Manjakandriana");

			AfficheDonne("MADAGASCAR","Bongolava (Antananarivo)","Fenoarivobe");
			AfficheDonne("MADAGASCAR","Bongolava (Antananarivo)","Tsiroanomandidy");

			AfficheDonne("MADAGASCAR","Itasy (Antananarivo)","Arivonimamo");
			AfficheDonne("MADAGASCAR","Itasy (Antananarivo)","Miarinarivo");
			AfficheDonne("MADAGASCAR","Itasy (Antananarivo)","Soavinandriana");

			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Ambatolampy");
			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Antanifotsy");
			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Betafo");
			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Faratsiho");
			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Mandoto");
			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Antsirabe I");
			AfficheDonne("MADAGASCAR","Vakinankaratra (Antananarivo)","Antsirabe II");

			AfficheDonne("MADAGASCAR","Amoron i Mania (Fianarantsoa)","Ambatofinandrahana");
			AfficheDonne("MADAGASCAR","Amoron i Mania (Fianarantsoa)","Ambositra");
			AfficheDonne("MADAGASCAR","Amoron i Mania (Fianarantsoa)","Fandriana");
			AfficheDonne("MADAGASCAR","Amoron i Mania (Fianarantsoa)","Manandriana");

			AfficheDonne("MADAGASCAR","Atsimo-Atsinanana (Fianarantsoa)","Befotaka");
			AfficheDonne("MADAGASCAR","Atsimo-Atsinanana (Fianarantsoa)","Farafangana");
			AfficheDonne("MADAGASCAR","Atsimo-Atsinanana (Fianarantsoa)","Midongy Atsimo");
			AfficheDonne("MADAGASCAR","Atsimo-Atsinanana (Fianarantsoa)","Vangaindrano");
			AfficheDonne("MADAGASCAR","Atsimo-Atsinanana (Fianarantsoa)","Vondrozo");

			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Ambalavao");
			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Ambohimahasoa");
			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Vohibato");
			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Lalangina");
			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Isandra");
			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Ikalamavony");
			AfficheDonne("MADAGASCAR","Haute Matsiatra (Fianarantsoa)","Fianarantsoa");

			AfficheDonne("MADAGASCAR","Vatovavy-Fitovinany (Fianarantsoa)","Ifanadiana");
			AfficheDonne("MADAGASCAR","Vatovavy-Fitovinany (Fianarantsoa)","Ikongo");
			AfficheDonne("MADAGASCAR","Vatovavy-Fitovinany (Fianarantsoa)","Manakara");
			AfficheDonne("MADAGASCAR","Vatovavy-Fitovinany (Fianarantsoa)","Mananjary");
			AfficheDonne("MADAGASCAR","Vatovavy-Fitovinany (Fianarantsoa)","Nosy Varika");
			AfficheDonne("MADAGASCAR","Vatovavy-Fitovinany (Fianarantsoa)","Vohipeno");

			AfficheDonne("MADAGASCAR","Ihorombe (Fianarantsoa)","Iakora");
			AfficheDonne("MADAGASCAR","Ihorombe (Fianarantsoa)","Ihosy");
			AfficheDonne("MADAGASCAR","Ihorombe (Fianarantsoa)","Ivohibe");
			
			AfficheDonne("MADAGASCAR","Alaotra Mangoro (Toamasina)","Ambatondrazaka");
			AfficheDonne("MADAGASCAR","Alaotra Mangoro (Toamasina)","Amparafaravola");
			AfficheDonne("MADAGASCAR","Alaotra Mangoro (Toamasina)","Andilamena");
			AfficheDonne("MADAGASCAR","Alaotra Mangoro (Toamasina)","Anosibe An ala");
			AfficheDonne("MADAGASCAR","Alaotra Mangoro (Toamasina)","Moramanga");

			AfficheDonne("MADAGASCAR","Analanjirofo (Toamasina)","Fenoarivo Atsinanana (Est)");
			AfficheDonne("MADAGASCAR","Analanjirofo (Toamasina)","Mananara Avaratra (Nord)");
			AfficheDonne("MADAGASCAR","Analanjirofo (Toamasina)","Maroantsetra");
			AfficheDonne("MADAGASCAR","Analanjirofo (Toamasina)","Nosy Boraha (Sainte Marie)");
			AfficheDonne("MADAGASCAR","Analanjirofo (Toamasina)","Soanierana Ivongo");
			AfficheDonne("MADAGASCAR","Analanjirofo (Toamasina)","Vavatenina");

			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Antanambao Manampotsy");
			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Mahanoro");
			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Marolambo");
			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Toamasina I");
			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Toamasina II");
			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Vatomandry");
			AfficheDonne("MADAGASCAR","Atsinanana (Toamasina)","Vohibinany (Brickaville)");

			AfficheDonne("MADAGASCAR","Betsiboka (Mahajanga)","Kandreho");
			AfficheDonne("MADAGASCAR","Betsiboka (Mahajanga)","Maevatanana");
			AfficheDonne("MADAGASCAR","Betsiboka (Mahajanga)","Tsaratanana");

			AfficheDonne("MADAGASCAR","Boeny (Mahajanga)","Ambato-Boeny");
			AfficheDonne("MADAGASCAR","Boeny (Mahajanga)","Mahajanga I");
			AfficheDonne("MADAGASCAR","Boeny (Mahajanga)","Mahajanga II");
			AfficheDonne("MADAGASCAR","Boeny (Mahajanga)","Marovoay");
			AfficheDonne("MADAGASCAR","Boeny (Mahajanga)","Misinjo");
			AfficheDonne("MADAGASCAR","Boeny (Mahajanga)","Soalala");

			AfficheDonne("MADAGASCAR","Melaky (Mahajanga)","Ambatomainty");
			AfficheDonne("MADAGASCAR","Melaky (Mahajanga)","Antsalova");
			AfficheDonne("MADAGASCAR","Melaky (Mahajanga)","Besalampy");
			AfficheDonne("MADAGASCAR","Melaky (Mahajanga)","Maintirano");
			AfficheDonne("MADAGASCAR","Melaky (Mahajanga)","Morafenobe");

			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Ananalava");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Andapa");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Antsohihy");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Bealanana");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Befandriana Avaratra (Nord)");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Boriziny (Ancienne Port Bergé)");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Mampikony");
			AfficheDonne("MADAGASCAR","Sofia (Mahajanga)","Mandritsara");

			AfficheDonne("MADAGASCAR","Androy (Toliara)","Ambovombe-Androy");
			AfficheDonne("MADAGASCAR","Androy (Toliara)","Bekily");
			AfficheDonne("MADAGASCAR","Androy (Toliara)","Beloha");

			AfficheDonne("MADAGASCAR","Anosy (Toliara)","Amboasary-Atsimo");
			AfficheDonne("MADAGASCAR","Anosy (Toliara)","Betroka");
			AfficheDonne("MADAGASCAR","Anosy (Toliara)","Taolanaro (Taolagnaro)");
			AfficheDonne("MADAGASCAR","Anosy (Toliara)","Tsihombe");

			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Ampanihy");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Ankazoabo");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Benenitra");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Beroroha");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Betioky-Atsimo");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Morombe");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Sakaraha");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Toliara I");
			AfficheDonne("MADAGASCAR","Atsimo-Andrefana (Toliara)","Toliara II");

			AfficheDonne("MADAGASCAR","Menabe (Toliara)","Belo sur Tsiribihina");
			AfficheDonne("MADAGASCAR","Menabe (Toliara)","Mahabo");
			AfficheDonne("MADAGASCAR","Menabe (Toliara)","Manja");
			AfficheDonne("MADAGASCAR","Menabe (Toliara)","Miandrivazo");
			AfficheDonne("MADAGASCAR","Menabe (Toliara)","Morondava");

			AfficheDonne("MADAGASCAR","Diana (Antsiranana)","Ambanja");
			AfficheDonne("MADAGASCAR","Diana (Antsiranana)","Ambilobe");
			AfficheDonne("MADAGASCAR","Diana (Antsiranana)","Antsiranana I");
			AfficheDonne("MADAGASCAR","Diana (Antsiranana)","Antsiranana II");
			AfficheDonne("MADAGASCAR","Diana (Antsiranana)","Nosy Be");

			AfficheDonne("MADAGASCAR","Sava (Antsiranana)","Antalaha");
			AfficheDonne("MADAGASCAR","Sava (Antsiranana)","Sambava");
			AfficheDonne("MADAGASCAR","Sava (Antsiranana)","Vohemar");
		}elseif ($pays == "AFRIQUE DU SUD") {
			AfficheDonne("AFRIQUE DU SUD","Cap-Occidental","Cape Winelands District Municipality");
			AfficheDonne("AFRIQUE DU SUD","Cap-Occidental","Central Karoo District Municipality");
			AfficheDonne("AFRIQUE DU SUD","Cap-Occidental","City of Cape Town Metropolitan Municipality");
			AfficheDonne("AFRIQUE DU SUD","Cap-Occidental","Eden District Municipality");
			AfficheDonne("AFRIQUE DU SUD","Cap-Occidental","Overberg District Municipality");
			AfficheDonne("AFRIQUE DU SUD","Cap-Occidental","West Coast District Municipality");


		}

	}


	if (isset($_POST['recupDistridetaille'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		$modeleAgro = new Agro();

		$district = $_POST['recupDistridetaille'];
		$region = $_POST['recupRegiondetaille'];
		$pays = $_POST['recupPaysdetaille'];

		$donne1 = $modeleAgro->GetRegionDistrictD("Today",$pays,$region,$district);
		$donne2 = $modeleAgro->GetRegionDistrictD("Tomorrow",$pays,$region,$district);
		$donne3 = $modeleAgro->GetRegionDistrictD("Next",$pays,$region,$district);

		$nb1 = $modeleAgro->GetRegionDistrictDCount("Today",$pays,$region,$district);
		$nb2 = $modeleAgro->GetRegionDistrictDCount("Tomorrow",$pays,$region,$district);
		$nb3 = $modeleAgro->GetRegionDistrictDCount("Next",$pays,$region,$district);

		if ($nb1['nombre']){
			$one = $nb1['nombre'];
		}else{
			$one = "Vide";
		}
		if ($nb2['nombre']){
			$two = $nb2['nombre'];
		}else{
			$two = "Vide";
		}
		if ($nb3['nombre']){
			$three = $nb3['nombre'];
		}else{
			$three = "Vide";
		}

		echo "
				<div class='modal-header'>	
			        <h4 class='modal-title'>AGRICODE</h4>
			        <button type='button' class='close' data-dismiss='modal'>×</button>
		        </div>
		        <div class='modal-body'>
				    <h6 class='text-muted'>PAYS : ".$pays."</h6><hr>
		        	<div class='row'>
		        		<div class='col'>
				        	<h6 class='text-muted float-left'>District : ".$district."</h6>
		        		</div>
		        		<div class='col'>
				        	<h6 class='text-muted float-right'>Province | Region : ".$region."</h6>
		        		</div>
		        	</div><hr>
		        	<div class='row'>
		        		<div class='col-lg-4 col-6 text-center'>
			              <div class='small-box bg-secondary'>
			                <div class='inner'>
			                  <p>Aujourd'hui</p>
			                  <h3>".$one."</h3>
			                </div>
			                <div class='icon'>
			                  <i class='ion ion-bag'></i>
			                </div>
			              </div>
			            </div>

			            <div class='col-lg-4 col-6 text-center'>
			              <div class='small-box bg-secondary'>
			                <div class='inner'>
			                  <p>Demain</p>
			                  <h3>".$two."</h3>
			                </div>
			                <div class='icon'>
			                  <i class='ion ion-bag'></i>
			                </div>
			              </div>
			            </div>

			            <div class='col-lg-4 col-6 text-center'>
			              <div class='small-box bg-secondary'>
			                <div class='inner'>
			                  <p>Après demain</p>
			                  <h3>".$three."</h3>
			                </div>
			                <div class='icon'>
			                  <i class='ion ion-bag'></i>
			                </div>
			              </div>
			            </div>
		        	</div><hr>
		        	<div class='row'>
		        		<table class='table table-bordered text-center'>
	                      <thead>
	                        <tr>
	                          <th style='width: 40px'>Période</th>
	                          <th style='width: 80px'>Précipitation</th>
	                          <th style='width: 80px'>Température</th>
	                          <th style='width: 80px'>Vent</th>
	                          <th style='width: 40px'>Action</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	    ";

	                    if ($donne1) {
						echo "			        
	                      	<tr>
						        <td>Aujourd'hui</td>
						        <td>".$donne1['precipitation']."</td>
						        <td>".$donne1['temperature']."</td>
						        <td>".$donne1['vent']."</td>
						        <td><button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$donne1['idClimat'].")'>Voir</button></td>
							</tr>
						";
						}else{
							echo "
								<tr>
							        <td>Aujourd'hui</td>
							        <td>Vide</td>
							        <td>Vide</td>
							        <td>Vide</td>
							        <td><button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#AddClimatPlus' onclick=\"AddClimatPlus(1,'".$district."','".$region."')\">Ajouter</button></td>
								</tr>
							";
						}
						if ($donne2) {
						echo "			        
	                      	<tr>
						        <td>Demain</td>
						        <td>".$donne2['precipitation']."</td>
						        <td>".$donne2['temperature']."</td>
						        <td>".$donne2['vent']."</td>
						        <td><button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$donne2['idClimat'].")'>Voir</button></td>
							</tr>
						";
						}else{
							echo "
								<tr>
							        <td>Demain</td>
							        <td>Vide</td>
							        <td>Vide</td>
							        <td>Vide</td>
							        <td><button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#AddClimatPlus' onclick=\"AddClimatPlus(2,'".$district."','".$region."')\">Ajouter</button></td>
								</tr>
							";
						}
						if ($donne3) {
						echo "			        
	                      	<tr>
						        <td>Après demain</td>
						        <td>".$donne3['precipitation']."</td>
						        <td>".$donne3['temperature']."</td>
						        <td>".$donne3['vent']."</td>
						        <td><button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#detailleClimat' onclick='RecupDetailleClimat(".$donne3['idClimat'].")'>Voir</button></td>
							</tr>
						";
						}else{
							echo "
								<tr>
							        <td>Après demain</td>
							        <td>Vide</td>
							        <td>Vide</td>
							        <td>Vide</td>
							        <td><button class='btn btn-block btn-outline-secondary btn-block' data-dismiss='modal' data-toggle='modal' data-target='#AddClimatPlus' onclick=\"AddClimatPlus(3,'".$district."','".$region."')\">Ajouter</button></td>
								</tr>
							";
						}
		echo "			        
	                      </tbody>
	                    </table>
		        	</div>
		        </div>
		";

	}

	if (isset($_POST['addDistridetaille'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/personnel/modele.personnel.php';
		$modeleAgro = new Agro();
		$modelePerso = new Personnel();

		$district = $_POST['addDistridetaille'];
		$region = $_POST['addRegiondetaille'];
		$periode = $_POST['periode'];
		$idPerso = $_POST['idPerso'];

		if ($periode == 1) {
			$date = date("d");
		}elseif ($periode == 2) {
			$date = date("d")+1;
		}
		elseif ($periode == 3) {
			$date = date("d")+2;
		}
		$ym = date("Y-m-");
		$ass = $ym.$date;

		$user = $modelePerso->GetPersonneBySomething('idPerso',$idPerso);
		
		echo "
				<div class='modal-header'>	
			        <h4 class='modal-title'>AGRICODE</h4>
			        <button type='button' class='close' data-dismiss='modal'>×</button>
		        </div>
		        <div class='modal-body'>
		        	<div class='row'>
		        		<div class='col'>
				        	<h3 class='small text-muted'>Sera ajouté par ".$user['nom']." ".$user['prenom']." (Vous)</h3>
							<hr>
							<div class='row'>
									<div class='col'>
										<div class='form-group'>
											<label>Pays : MADAGASCAR</label>
											<select class='form-control' id='paysadd'>
												<option selected>MADAGASCAR</option>
											</select>
										</div>
										<div class='form-group'>
											<label>Région : ".$region."</label>
											<select class='form-control' id='regadd'>
												<option selected>".$region."</option>
											</select>
										</div>
										<div class='form-group'>
											<label>District : ".$district."</label>
											<select class='form-control' id='descadd'>
												<option selected>".$district."</option>
											</select>
										</div>
										<div class='form-group'>
											<label>Date : ".$ass."</label>
				                          	<input type='date' class='form-control' value='".$ass."' id='preadd' readonly>
										</div>
									</div>
									<div class='col'>
										<div class='form-group'>
				                          <label>Débit de précipitation</label>
				                          <input type='number' class='form-control' id='preciAdd'>
				                        </div>
				                        <div class='form-group'>
				                          <label>Température (°C)</label>
				                          <input type='number' class='form-control' id='tempAdd'>
				                        </div>
				                        <div class='form-group'>
				                          <label>Vitesse de vent (km/h)</label>
				                          <input type='number' class='form-control' id='ventAdd'>
				                        </div>
									</div>
							</div>
							<div>
				                <button class='btn btn-block btn-outline-secondary' onclick=\"AnalyseAddClimat();\">Analyser</button>
				            </div>
			        	</div>
		        		<div class='col text-center' id='analyseaddclimaat'></div>
			        </div>


		        </div>
		";


	}

	if (isset($_POST['listeRegionDok'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		$modeleCal = new Calendrier();
		$modeleAgro = new Agro();

		$idPerso = $_POST['idPerso'];
		$donne = $modeleAgro->GetRegionDistrict();
		$now = date("Y-m-d");
		$date2 = date("d")+1;
		$date3 = date("d")+2;
		$ym = date("Y-m-");

		if ($donne) {
			foreach ($donne as $key => $value) {
				$donneC = $modeleCal->GetCalendrierIdClimat($value['idClimat']);
				if ($donneC) {
					$okC = "<span class='badge badge-success btn-block'>Remplis</span>";
				}else{
					$okC = "<span class='badge badge-danger btn-block'>Vide</span>";
				}

				if ($now == $value['Periode']) {
					$pa = "<span class='badge badge-success btn-block'>Aujourd'hui</span>";
				}elseif ($value['Periode'] == $ym.$date2){
					$pa = "<span class='badge badge-primary btn-block'>Demain</span>";
				}elseif ($value['Periode'] == $ym.$date3){
					$pa = "<span class='badge badge-secondary btn-block'>Après Demain</span>";
				}
				echo "	
					<tr>
		                <td style='width: 40px'>".$okC."</td>
		                <td>".$value['district']."</td>
		                <td>".$value['region']."</td>
		                <td style='width: 40px'>".$pa."</td>
		                <td style='width: 40px'><button class='btn btn-sm btn-secondary' onclick='AfficheDteilleC(".$value['idClimat'].")'>Voir</button></td>
		            </tr>
				";
			}
		}
	}

	if (isset($_POST['DetailleRegionDok'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		$modeleAgro = new Agro();
		$modeleCal = new Calendrier();

		$idClimat = $_POST['DetailleRegionDok'];
		$idPerso = $_POST['idPerso'];

		$donneC = $modeleCal->GetCalendrierIdClimat($idClimat);

		if ($donneC) {
					if ($donneC['idPersonnel']==$idPerso) {
						$modifBtn = "
							<div class='row'>
								<button class='btn btn-secondary btn-block' onclick=\"ModifierCalenndrier(".$idClimat.");\">Modifier</button>
								<button class='btn btn-secondary btn-block' onclick=\"SupprimerCalenndrier(".$idClimat.");\">Vider</button>
							</div>
						";
					}else{
						$modifBtn = "<button class='btn btn-secondary float-right' disabeld>Modifier</button>";
					}

					if ($donneC['imageCl'] == NULL || $donneC['imageCl'] == "") {
						$imgA = "<img src='data/logo.jpg' width='100' height='100'>";
					}else{
						$imgA = "<img src='data/climat/".$donneC['imageCl']."' width='100' height='100' class='text-center'>";
					}
					$c1 = "";
					$c2 = "";
					if ($donneC['Riz']=="OK") {
						$c1 = "<input type='checkbox' id='rizm' name='rizm' checked>";
					}else{
						$c1 = "<input type='checkbox' id='rizm' name='rizm'>";
					}
					if ($donneC['Manioc']=="OK") {
						$c2 = "<input type='checkbox' id='maniocm' name='maniocm' checked>";
					}else{
						$c2 = "<input type='checkbox' id='maniocm' name='maniocm'>";
					}
					echo "
						<div class='card-header'>
				          <h4 class='card-title'>Calendrier pour : ".$donneC['district']." | ".$donneC['region']."</h4>
				        </div>
				        <div class='card-body'>
				          <div class='row'>
				            <div class='col-sm-2 text-center'>
				            	".$imgA."
				            </div>
				            <div class='col'>
				              <table class='table table-bordered text-center'>
				                <thead>
				                  <tr>
				                    <th>Précipitation</th>
				                    <th>Température</th>
				                    <th>Vent</th>
				                  </tr>
				                </thead>
				                <tbody>
				                  <tr>
				                    <td>".$donneC['precipitation']."</td>
				                    <td>".$donneC['temperature']."</td>
				                    <td>".$donneC['vent']."</td>
				                  </tr>
				                </tbody>
				              </table>
				            </div>
				          </div>
				          <div class='card'>
				            <div class='card-header'>
				              <h4 class='card-title'>Culture possible</h4>
				            </div>
				            <div class='card-body'>
				              <div class='row'>
				                <div class='col-sm-4'>
				                  <div class='form-group'>
				                    ".$c1."
				                    <label for='rizm'>Riz</label>
				                  </div>
				                </div>
				                <div class='col-sm-4'>
				                  <div class='form-group'>
				                    ".$c2."
				                    <label for='maniocm'>Manioc</label>
				                  </div>
				                </div>
				                <div class='col-sm-4'>
				                  <div class='form-group'>
				                    <input type='checkbox' id='autrem' name='autrem'>
				                    <label for='autre'>Autre</label>
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
				          <div class='col'>
				              ".$modifBtn."
				          </div>
				        </div>
					";
			
		}else{
				$donne = $modeleAgro->GetClimatId($idClimat);
				if ($donne) {
					if ($donne['idPersonnel']==$idPerso) {
						$modifBtn = "<button class='btn btn-secondary btn-block' onclick=\"ValiderCalenndrier(".$idClimat.");\">Ajouter</button>";
					}else{
						$modifBtn = "<button class='btn btn-secondary btn-block' disabeld>Ajouter</button>";
					}

					if ($donne['imageCl'] == NULL || $donne['imageCl'] == "") {
						$imgA = "<img src='data/logo.jpg' width='100' height='100'  class='text-center'>";
					}else{
						$imgA = "<img src='data/climat/".$donne['imageCl']."' width='100' height='100' class='text-center'>";
					}
					echo "
						<div class='card-header'>
				          <h4 class='card-title'>Calendrier pour : ".$donne['district']." | ".$donne['region']."</h4>
				        </div>
				        <div class='card-body'>
				          <div class='row'>
				            <div class='col-sm-2 text-center'>
				            	".$imgA."
				            </div>
				            <div class='col'>
				              <table class='table table-bordered text-center'>
				                <thead>
				            		<tr>
					                    <th>Précipitation</th>
					                    <th>Température</th>
					                    <th>Vent</th>
					                </tr>
				                </thead>
				                <tbody>
				                  <tr>
				                    <td>".$donne['precipitation']."</td>
				                    <td>".$donne['temperature']."</td>
				                    <td>".$donne['vent']."</td>
				                  </tr>
				                </tbody>
				              </table>
				            </div>
				          </div>
				          <div class='card'>
				            <div class='card-header'>
				              <h4 class='card-title'>Culture possible</h4>
				            </div>
				            <div class='card-body'>
				              <div class='row'>
				                <div class='col-sm-4'>
				                  <div class='form-group'>
				                    <input type='checkbox' id='riz' name='riz'>
				                    <label for='riz'>Riz</label>
				                  </div>
				                </div>
				                <div class='col-sm-4'>
				                  <div class='form-group'>
				                    <input type='checkbox' id='manioc' name='manioc'>
				                    <label for='manioc'>Manioc</label>
				                  </div>
				                </div>
				                <div class='col-sm-4'>
				                  <div class='form-group'>
				                    <input type='checkbox' id='autre' name='autre'>
				                    <label for='autre'>Autre</label>
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
				          <div class='col'>
				          	  ".$modifBtn."
				          </div>
				        </div>
					";
				}
		}	

	}

	if (isset($_POST['valideCalendrier'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$modeleAgro = new Agro();
		$modeleCal = new Calendrier();

		$idClimat = $_POST['valideCalendrier'];
		$idPerso = $_POST['idPerso'];
		
 		isset($_POST['c1']) ? $c1 = "OK" : $c1 = "NO";
 		isset($_POST['c2']) ? $c2 = "OK" : $c2 = "NO";
 		isset($_POST['c3']) ? $c3 = "OK" : $c3 = "NO";

		$donne = $modeleCal->GetCalendrierIdClimat($idClimat);
 		if ($donne) {
 			echo "Déjà remplis";
 		}else{
			$modeleCal->AddCalendrier($idPerso,$idClimat,$c1,$c2);
			
			$donneUser = $modeleAgro->GetClimatId($idClimat);
			$text = "AJOUT CALENDRIER | ".$donneUser['pays']." | ".$donneUser['province']." | ".$donneUser['region']." | ".$donneUser['district']." | ".$donneUser['Periode'];
			$modeleNotif->AddNotif($donneUser['idPersonnel'],$text);
			echo "ok";
 		}

	}

	if (isset($_POST['modifCalendrier'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$modeleAgro = new Agro();
		$modeleCal = new Calendrier();

		$idClimat = $_POST['modifCalendrier'];
		$idPerso = $_POST['idPerso'];
		
 		isset($_POST['c1']) ? $c1 = "OK" : $c1 = "NO";
 		isset($_POST['c2']) ? $c2 = "OK" : $c2 = "NO";
 		isset($_POST['c3']) ? $c3 = "OK" : $c3 = "NO";

		$modeleCal->UpdateCalendrier($idClimat,$c1,$c2);

		$donneUser = $modeleAgro->GetClimatId($idClimat);
		$text = "MODIFICATION CALENDRIER | ".$donneUser['pays']." | ".$donneUser['province']." | ".$donneUser['region']." | ".$donneUser['district']." | ".$donneUser['Periode'];
		$modeleNotif->AddNotif($donneUser['idPersonnel'],$text);
		echo "ok";
	}

	if (isset($_POST['supCalendrier'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		include '../../modele/notification/modele.notification.php';
		$modeleNotif = new Notif();
		$modeleAgro = new Agro();
		$modeleCal = new Calendrier();

		$idClimat = $_POST['supCalendrier'];
		$idPerso = $_POST['idPerso'];
		
		$donneUser = $modeleAgro->GetClimatId($idClimat);
		$text = "SUPPRESSION CALENDRIER | ".$donneUser['pays']." | ".$donneUser['province']." | ".$donneUser['region']." | ".$donneUser['district']." | ".$donneUser['Periode'];
		$modeleNotif->AddNotif($donneUser['idPersonnel'],$text);
		
		$modeleCal->DeleteCalendrier($idClimat);
		echo "ok";
	}

	if (isset($_POST['listeCRDKAZ'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		$modeleCal = new Calendrier();
		$modeleAgro = new Agro();

		$idPerso = $_POST['idPerso'];
		$donne = $modeleAgro->GetRegionDistrictDDD("Ambohidratrimo");
		$now = date("Y-m-d");
		$date2 = date("d")+1;
		$date3 = date("d")+2;
		$ym = date("Y-m-");

		if ($donne) {
			foreach ($donne as $key => $value) {
				$donneC = $modeleCal->GetCalendrierIdClimat($value['idClimat']);
				if ($donneC) {
					$okC = "<span class='badge badge-success btn-block'>Remplis</span>";
				}else{
					$okC = "<span class='badge badge-danger btn-block'>Vide</span>";
				}

				if ($now == $value['Periode']) {
					$pa = "<span class='badge badge-success btn-block'>Aujourd'hui</span>";
				}elseif ($value['Periode'] == $ym.$date2){
					$pa = "<span class='badge badge-primary btn-block'>Demain</span>";
				}elseif ($value['Periode'] == $ym.$date3){
					$pa = "<span class='badge badge-secondary btn-block'>Après Demain</span>";
				}
				echo "	
					<tr>
		                <td style='width: 40px'>".$okC."</td>
		                <td style='width: 40px'>".$pa."</td>
		                <td>".$value['district']."</td>
		                <td>".$value['region']."</td>
		                <td style='width: 40px'><button class='btn btn-sm btn-secondary' onclick='AfficheDteilleC(".$value['idClimat'].")'>Voir</button></td>
		            </tr>
				";
			}
		}

	}

	if (isset($_POST['afficheCRDRRE'])) {
		include '../../config/connex.php';
		include '../../modele/agro/modele.agro.php';
		include '../../modele/calendrier/modele.calendrier.php';
		$modeleCal = new Calendrier();

		$idClimat = $_POST['afficheCRDRRE'];
		$idPerso = $_POST['idPerso'];
		
		$donne = $modeleCal->GetCalendrierIdClimat($idClimat);;
					if ($donne) {
							echo "
								<div class='modal-header'>
                                  <h4 class='modal-title'>AGRICODE</h4>
                                  <button type='button' class='close' data-dismiss='modal'>×</button>
                                </div>
                                <div class='modal-body'>
                                  <h5 class='text-muted'>Calendrier cultural</h5><hr>
                                </div>
							";
					}
	}


 ?>