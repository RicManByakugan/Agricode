<?php 
		if (isset($_POST['infoinfo'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();

			$type = $_POST['infoinfo'];
			$region = $_POST['region'];
			$cycle = $_POST['cycle'];

			$donne = $modeleAgro->GetInformationRegionR($type,$region,$cycle,$_SESSION['langue']);	
			if ($donne != NULL) {
				echo $donne;
			}else{
				echo "";
			}
		}

		if (isset($_POST['paysRecherche'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "Anio";
				$ln2 = "Rahampitso";
				$ln3 = "Afaka ny hampitso";
				$ln4 = "Hijery";
				$ln5 = "Kinova tsy marin-toerana ho an'ny";
				$ln6 = "KALANDRIE VOLY (telo andro)";
				$ln7 = "Vokatra";
				$ln8 = "Safidio ny karazana vokatra";
				$ln9 = "TOETR'ANDRO (telo andro)";
				$ln10 = "RIVOTRA (telo andro)";
				$ln11 = "Fohy";
				$ln12 = "Kafa";
				$ln13 = "Maharitra";
				$ln80 = "Vary";
				$ln81 = "Katsaka";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "Today";
				$ln2 = "Tomorrow";
				$ln3 = "After Tomorrow";
				$ln4 = "Watch";
				$ln5 = "Shaky version";
				$ln6 = "CROP CALENDAR (for your three days)";
				$ln7 = "Crop";
				$ln8 = "Choose the type of crop";
				$ln9 = "WEATHER (for your three days)";
				$ln10 = "WIND (for your three days)";
				$ln11 = "Short";
				$ln12 = "Intermediate";
				$ln13 = "Long";
				$ln80 = "Rice";
				$ln81 = "Corn";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "Aujourd'hui";
				$ln2 = "Demain";
				$ln3 = "Après Demain";
				$ln4 = "Voir";
				$ln5 = "Version instable pour";
				$ln6 = "CALENDRIER CULTURAL (pour vos trois jours)";
				$ln7 = "Culture";
				$ln8 = "Choisissez le type de culture";
				$ln9 = "METEO (pour vos trois jours)";
				$ln10 = "VENT (pour vos trois jours)";
				$ln11 = "Courte";
				$ln12 = "Intermediaire";
				$ln13 = "Long";
				$ln80 = "Riz";
				$ln81 = "Maïs";
			}

			$pays = $_POST['paysRecherche'];
			$region = $_POST['region'];
			$district = $_POST['district'];

			$donne1 = $modeleAgro->GetClimatPeriodeRegion("Today",$pays,$district);
			$donne2 = $modeleAgro->GetClimatPeriodeRegion("Tomorrow",$pays,$district);
			$donne3 = $modeleAgro->GetClimatPeriodeRegion("Next",$pays,$district);


			if ($donne1) {
				if ($donne1['imageCl']=="" || $donne1['imageCl']==NULL) {
					$url = "data/zz.jpg";
				}else{
					$url = "data/climat/".$donne1['imageCl'];
				}

				$valeur1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'><span>".$ln1."</span></p><hr>
			                  <h3 align='center'><img src='".$url."' width='90' height='90'></h3>
			                </div>
			                <a class='small-box-footer' data-toggle='modal' data-target='#donneClimat' style='color: black;' onclick='RecupDetailleClimat(".$donne1['idClimat'].")'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";

				$calendrier1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  ".$modeleAgro->CalendrierAff(0,$donne1['idClimat'],$_SESSION['langue'])."
			                  	</div>
			                  </div>
			                </div>
			                <a class='small-box-footer' data-toggle='modal' data-target='#donneCalendar' style='color: black;' onclick='RecupDetailleCalendar(0,".$donne1['idClimat'].")'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";

				$ventUrl = $modeleAgro->VentControl($donne1['vent']);
				$vent1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='".$ventUrl."' width='70' height='70'>
			                  	</div>
			                  </div>
			                  <p align='center'>".$donne1['vent']." km/h</p><hr>
			                </div>
			              </div>
			            </div>
				";
			}else{
				$valeur1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'><span>".$ln1."</span></p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			                <a class='small-box-footer'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$calendrier1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			                <a class='small-box-footer'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$vent1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='data/attente.jpg' width='70' height='70'>
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
			}

			if ($donne2) {
				if ($donne2['imageCl']=="" || $donne2['imageCl']==NULL) {
					$url = "data/zz.jpg";
				}else{
					$url = "data/climat/".$donne2['imageCl'];
				}
				$valeur2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <h3 align='center'><img src='".$url."' width='90' height='90'></h3>
			                </div>
			                <a class='small-box-footer' data-toggle='modal' data-target='#donneClimat' style='color: black;' onclick='RecupDetailleClimat(".$donne2['idClimat'].")'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$calendrier2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  ".$modeleAgro->CalendrierAff(1,$donne2['idClimat'],$_SESSION['langue'])."
			                  	</div>
			                  </div>
			                </div>
			                <a class='small-box-footer' data-toggle='modal' data-target='#donneCalendar' style='color: black;' onclick='RecupDetailleCalendar(1,".$donne2['idClimat'].")'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$ventUrl2 = $modeleAgro->VentControl($donne2['vent']);
				$vent2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='".$ventUrl2."' width='70' height='70'>
			                   </div>
			                  	</div>
			                    <p align='center'>".$donne2['vent']." km/h</p><hr>
			                </div>
			              </div>
			            </div>
				";
			}else{
				$valeur2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			                <a class='small-box-footer'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$calendrier2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			                <a class='small-box-footer'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$vent2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='data/attente.jpg' width='70' height='70'>
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
			}

			if ($donne3) {
				if ($donne3['imageCl']=="" || $donne3['imageCl']==NULL) {
					$url = "data/zz.jpg";
				}else{
					$url = "data/climat/".$donne3['imageCl'];
				}
				$valeur3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <h3 align='center'><img src='".$url."' width='90' height='90'></h3>
			                </div>
			                <a class='small-box-footer' data-toggle='modal' data-target='#donneClimat' style='color: black;' onclick='RecupDetailleClimat(".$donne3['idClimat'].")'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$calendrier3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  ".$modeleAgro->CalendrierAff(2,$donne3['idClimat'],$_SESSION['langue'])."
			                  	</div>
			                  </div>
			                </div>
			                <a class='small-box-footer' data-toggle='modal' data-target='#donneCalendar' style='color: black;' onclick='RecupDetailleCalendar(2,".$donne3['idClimat'].")'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$ventUrl3 = $modeleAgro->VentControl($donne3['vent']);
				$vent3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='".$ventUrl3."' width='70' height='70'>
			                  	</div>
			                  </div>
			                  <p align='center'>".$donne3['vent']." km/h</p><hr>
			                </div>
			              </div>
			            </div>
				";

			}else{
				$valeur3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			                <a class='small-box-footer'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$calendrier3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			                <a class='small-box-footer'>".$ln4." <i class='fas fa-arrow-circle-right'></i></a>
			              </div>
			            </div>
				";
				$vent3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='data/attente.jpg' width='70' height='70'>
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
			}

			if ($pays!="MADAGASCAR") {
				$instable = "
					<label class='small text-muted'>(".$ln5." ".$pays.")</label>
				";
			}else{
				$instable = "";
			}

			echo "
	        	<div class='card'>
					<div class='card-header'>
	        			<h4 class='card-title text-muted'>".$pays." | ".$region." | ".$district."</h4>
	        			<div class='card-tools'>
		                  <a class='btn btn-tool btn-sm' style='color:#28a745;cursor:pointer;' onclick=\"LoadPdfCalendar('".$district."');\">
		                    PDF <i class='fas fa-download'></i>
		                  </a>
		                </div>
		        	</div>
	        	</div>

	        	<div class='card card-success card-outline'>
		        	<div class='card-header'>
	        			<h4 class='card-title text-muted'><span>".$ln7."</span> ".$region."</h4>	
			        	<div class='card-tools'>
			        		<button class='btn btn-sm btn-success' data-target='#maisriz' data-toggle='collapse'>".$ln4."</button>
			        	</div>
		        	</div>
		        	<div class='card-body container collapse' id='maisriz'>
			        	<div class='row container' id='maisriz'>
			        		<div class='col-sm-6'>
			        			<div class='form-group'>
	        						<label class='text-muted'>".$ln8."</label>	
			        				<select class='form-control' id='culchoice' onchange=\"Renialize('cycleChoice')\">
			        					<option></option>
			        					<option value='Riz'>".$ln80."</option>
			        					<option value='Mais'>".$ln81."</option>
			        				</select>
			        			</div>
			        		</div>
			        		<div class='col-sm-6'>
			        			<div class='form-group'>
	        						<label class='text-muted'>Cycle</label>	
			        				<select class='form-control' id='cycleChoice' onchange=\"AfficheInfoInfo('culchoice',this.value,'".$region."')\">
			        					<option></option>
			        					<option value='Courte'>".$ln11."</option>
			        					<option value='Intermediaire'>".$ln12."</option>
			        					<option value='Long'>".$ln13."</option>
			        				</select>
			        			</div>
			        		</div>
			        	</div>
			       		<span id='afficheInfooof'></span>
		        	</div>
	        	</div>


	        	<div class='card card-success card-outline' id='threeDa'>
		        	<div class='card-header'>
	        			<h4 class='card-title text-muted'><span>".$ln6."</span> ".$instable."</h4>	 
	        			<div class='card-tools'>
			        		<button class='btn btn-sm btn-success' data-target='#calcalll' data-toggle='collapse'>".$ln4."</button>
			        	</div>       			
		        	</div>
		        	<div class='card-body collapse' id='calcalll'>
		        		<div class='row'>
		        			".$calendrier1."
		        			".$calendrier2."
		        			".$calendrier3."
		        		</div>	
		        	</div>
	        	</div>



	        	<div class='card card-success card-outline'>
					<div class='card-header'>
	        			<h4 class='card-title text-muted'>".$ln9."</h4>
	        			<div class='card-tools'>
			        		<button class='btn btn-sm btn-success' data-target='#meoeoro' data-toggle='collapse'>".$ln4."</button>
			        	</div> 
		        	</div>
		        	<div class='card-body collapse' id='meoeoro'>
		        		<div class='row'>
		        			".$valeur1."
		        			".$valeur2."
		        			".$valeur3."
		        		</div>	
		        	</div>
	        	</div>

	        	<div class='card card-success card-outline'>
		        	<div class='card-header'>
	        			<h4 class='card-title text-muted'>".$ln10."</h4>	        		
	        			<div class='card-tools'>
			        		<button class='btn btn-sm btn-success' data-target='#acljhaxa' data-toggle='collapse'>".$ln4."</button>
			        	</div> 	
		        	</div>
		        	<div class='card-body collapse' id='acljhaxa'>
		        		<div class='row'>
		        			".$vent1."
		        			".$vent2."
		        			".$vent3."
		        		</div>	
		        	</div>
	        	</div>
			";

		}

		if (isset($_POST['dRecherchePDF'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "Anio";
				$ln2 = "Rahampitso";
				$ln3 = "Afaka ny hampitso";
				$ln4 = "Hijery";
				$ln5 = "Tsy mbola ampy ny momban'ny ";
				$ln6 = "KALANDRIE VOLY (telo andro)";
				$ln7 = "Vokatra";
				$ln8 = "Daty";
				$ln9 = "TOETR'ANDRO (telo andro)";
				$ln10 = "RIVOTRA (telo andro)";
				$ln11 = "";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "Today";
				$ln2 = "Tomorrow";
				$ln3 = "After Tomorrow";
				$ln4 = "Watch";
				$ln5 = "Shaky version for";
				$ln6 = "CROP CALENDAR (for your three days)";
				$ln7 = "Crop";
				$ln8 = "Date";
				$ln9 = "WEATHER (for your three days)";
				$ln10 = "WIND (for your three days)";
				$ln11 = "";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "Aujourd'hui";
				$ln2 = "Demain";
				$ln3 = "Apres Demain";
				$ln4 = "Voir";
				$ln5 = "Version instable pour";
				$ln6 = "CALENDRIER CULTURAL (pour vos trois jours)";
				$ln7 = "Culture";
				$ln8 = "Date";
				$ln9 = "METEO (pour vos trois jours)";
				$ln10 = "VENT (pour vos trois jours)";
				$ln11 = "";
			}

			$pays = $_POST['pRecherchePDF'];
			$district = $_POST['dRecherchePDF'];
			$region = $_POST['region'];

			$donne1 = $modeleAgro->GetClimatPeriodeRegion("Today",$pays,$district);
			$donne2 = $modeleAgro->GetClimatPeriodeRegion("Tomorrow",$pays,$district);
			$donne3 = $modeleAgro->GetClimatPeriodeRegion("Next",$pays,$district);


			if ($donne1) {
				if ($donne1['imageCl']=="" || $donne1['imageCl']==NULL) {
					$url = "data/zz.jpg";
				}else{
					$url = "data/climat/".$donne1['imageCl'];
				}

				$valeur1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'><span>".$ln1."</span></p><hr>
			                  <h3 align='center'><img src='".$url."' width='90' height='90'></h3>
			                </div>
			              </div>
			            </div>
				";

				$calendrier1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  ".$modeleAgro->CalendrierAff(0,$donne1['idClimat'],$_SESSION['langue'])."
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";

				$ventUrl = $modeleAgro->VentControl($donne1['vent']);
				$vent1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='".$ventUrl."' width='70' height='70'>
			                  	</div>
			                  </div>
			                  <p align='center'>".$donne1['vent']." km/h</p><hr>
			                </div>
			              </div>
			            </div>
				";
			}else{
				$valeur1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'><span>".$ln1."</span></p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			              </div>
			            </div>
				";
				$calendrier1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			              </div>
			            </div>
				";
				$vent1 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln1."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='data/attente.jpg' width='70' height='70'>
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
			}

			if ($donne2) {
				if ($donne2['imageCl']=="" || $donne2['imageCl']==NULL) {
					$url = "data/zz.jpg";
				}else{
					$url = "data/climat/".$donne2['imageCl'];
				}
				$valeur2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <h3 align='center'><img src='".$url."' width='90' height='90'></h3>
			                </div>
			              </div>
			            </div>
				";
				$calendrier2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  ".$modeleAgro->CalendrierAff(1,$donne2['idClimat'],$_SESSION['langue'])."
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
				$ventUrl2 = $modeleAgro->VentControl($donne2['vent']);
				$vent2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='".$ventUrl2."' width='70' height='70'>
			                   </div>
			                  	</div>
			                    <p align='center'>".$donne2['vent']." km/h</p><hr>
			                </div>
			              </div>
			            </div>
				";
			}else{
				$valeur2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			              </div>
			            </div>
				";
				$calendrier2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			              </div>
			            </div>
				";
				$vent2 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln2."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='data/attente.jpg' width='70' height='70'>
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
			}

			if ($donne3) {
				if ($donne3['imageCl']=="" || $donne3['imageCl']==NULL) {
					$url = "data/zz.jpg";
				}else{
					$url = "data/climat/".$donne3['imageCl'];
				}
				$valeur3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <h3 align='center'><img src='".$url."' width='90' height='90'></h3>
			                </div>
			              </div>
			            </div>
				";
				$calendrier3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  ".$modeleAgro->CalendrierAff(2,$donne2['idClimat'],$_SESSION['langue'])."
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
				$ventUrl3 = $modeleAgro->VentControl($donne3['vent']);
				$vent3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='".$ventUrl3."' width='70' height='70'>
			                  	</div>
			                  </div>
			                  <p align='center'>".$donne3['vent']." km/h</p><hr>
			                </div>
			              </div>
			            </div>
				";

			}else{
				$valeur3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			              </div>
			            </div>
				";
				$calendrier3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <h3 align='center'><img src='data/attente.jpg' width='70' height='70'></h3>
			                </div>
			              </div>
			            </div>
				";
				$vent3 = "
						<div class='col-lg-4 col-6'>
			              <div class='small-box'>
			                <div class='inner'>
			                  <p align='center'>".$ln3."</p><hr>
			                  <div class='row'>
			                  	<div class='col text-center'>
			                  	  <img src='data/attente.jpg' width='70' height='70'>
			                  	</div>
			                  </div>
			                </div>
			              </div>
			            </div>
				";
			}

			echo "
	        	<div class='row'>
		        	<div class='col'>
				        <h4 class='text-muted float-left small'>AGRICODE</h4>
		        	</div>
		        	<div class='col'>
			        	<h4 class='text-muted float-right small'>".$ln8." : ".date("d/m/Y")."</h4>
		        	</div>
	        	</div>  

	        	<hr>
	        	<span class='container'>
		        	<div class='card card-success card-outline'>
						<div class='card-header'>
		        			<h4 class='card-title text-muted'>".$pays." | ".$district."</h4>
			        	</div>
		        	</div>

		        	<div class='card card-success card-outline'>
			        	<div class='card-header'>
		        			<h4 class='card-title text-muted'>".$ln6."</h4>	        			
			        	</div>
			        	<div class='card-body'>
			        		<div class='row'>
			        			".$calendrier1."
			        			".$calendrier2."
			        			".$calendrier3."
			        		</div>	
			        	</div>
		        	</div>


		        	<div class='card card-success card-outline'>
						<div class='card-header'>
		        			<h4 class='card-title text-muted'>".$ln9."</h4>
			        	</div>
			        	<div class='card-body'>
			        		<div class='row'>
			        			".$valeur1."
			        			".$valeur2."
			        			".$valeur3."
			        		</div>	
			        	</div>
		        	</div>

		        	<div class='card card-success card-outline'>
			        	<div class='card-header'>
		        			<h4 class='card-title text-muted'>".$ln10."</h4>	        			
			        	</div>
			        	<div class='card-body'>
			        		<div class='row'>
			        			".$vent1."
			        			".$vent2."
			        			".$vent3."
			        		</div>	
			        	</div>
		        	</div>

		        	<!--<div class='card card-success card-outline'>
			        	<div class='card-header'>
		        			<h4 class='card-title text-muted'>".$ln7." ".$region."</h4>	
			        	</div>
			        	<div class='card-body'>
			        		".$modeleAgro->InformationRegion($region,$_SESSION['langue'])."
			        	</div>
		        	</div>-->
	        	</span>	   	
			";

		}


		if (isset($_POST['recupDetailleC'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();
			$idClimat = $_POST['recupDetailleC'];

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "Datin'ny";
				$ln2 = "Firenena";
				$ln3 = "Faritany";
				$ln4 = "Faritra";
				$ln5 = "Distrika";
				$ln6 = "Rotsak'orana";
				$ln7 = "Hafanana";
				$ln8 = "Rivotra";
				$ln9 = "Tombatombana";
				$ln10 = "Avandra";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "For the date";
				$ln2 = "Country";
				$ln3 = "Province";
				$ln4 = "Region";
				$ln5 = "District";
				$ln6 = "Precipitation";
				$ln7 = "Temperature";
				$ln8 = "Wind";
				$ln9 = "Probability";
				$ln10 = "Hail";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "Pour la date";
				$ln2 = "Pays";
				$ln3 = "Province";
				$ln4 = "Region";
				$ln5 = "District";
				$ln6 = "Precipitation";
				$ln7 = "Temperature";
				$ln8 = "Vent";
				$ln9 = "Probabilité";
				$ln10 = "Grêle";
			}

			$donne = $modeleAgro->GetClimatId($idClimat);	
			if ($donne) {

				// if ($now == $donne['Periode']) {
				// 	$pa = "Aujourd'hui";
				// }elseif ($donne['Periode'] == $ym.$date2){
				// 	$pa = "Demain";
				// }elseif ($donne['Periode'] == $ym.$date3){
				// 	$pa = "Après Demain";
				// }else{
				// }
				$pa = $donne['Periode'];

				if($donne['pays']=="MADAGASCAR"){
					$flags = "data/pays/mada.png";
				}elseif ($donne['pays']=="AFRIQUE DU SUD") {
					$flags = "data/pays/afriqueduSud.png";
				}else{
					$flags = "data/logo.jpg";
				}

				$donneC = $modeleAgro->GetValueGC($donne['cyclone']);	
				$donneG = $modeleAgro->GetValueGC($donne['grele']);	

				$cycloneV = $modeleAgro->GetValueGCAffiche($donneC);
				$greleV = $modeleAgro->GetValueGCAffiche($donneG);

				list($yy,$mm,$dd) = explode("-", $pa);
				echo "
					<div class='modal-header'>	
				        <h4 class='modal-title'>AGRICODE</h4>
				        <button type='button' class='close' data-dismiss='modal'>×</button>
			        </div>
			        <div class='modal-body'>
			        	<h6 class='text-muted'>".$ln1." : ".$dd."  ".$modeleAgro->AfficheDateL($mm,$_SESSION['langue'])."  ".$yy."</h6><hr>
			        	<div class='row'>
			        		<div class='col'>
					        	<div class='row'>
					        		<div class='col text-center'>
			        					<ul class='ml-4 mb-0 fa-ul text-muted'>
											<li><b>".$ln2." : </b>".$donne['pays']."</li>
										</ul>
										<br>
										<div class='text-center'>
											<img src='".$flags."' width='90' height='50' style='box-shadow:0 0 2px gray;' />
										</div>
					        		</div>
					        		<div class='col text-left'>
			        					<ul class='ml-4 mb-0 fa-ul text-muted'>
			        						<li><b>".$ln3." : </b>".$donne['province']."</li>
											<li><b>".$ln4." : </b>".$donne['region']."</li>
											<li><b>".$ln5." : </b>".$donne['district']."</li>
										</ul>
					        		</div>
					        	</div>
								<hr>
					        	<table class='table table-bordered text-center'>
					        		<thead>
					        			<tr>
						        			<td>".$ln6."</td>
						        			<td>".$ln7."</td>
						        			<td>".$ln8."</td>
					        			</tr>
					        		</thead>
					        		<tbody>
						        		<tr>
						        			<td>".$donne['precipitation']." mm</td>
						        			<td>".$donne['temperature']." °C</td>
						        			<td>".$donne['vent']." km/h</td>
						        		</tr>
					        		</tbody>
					        	</table>
					        	<hr>
					        	<h4 class='text-muted small'>".$ln9."</h4>
					        	<hr>
					        	<table class='table table-bordered text-center'>
					        		<thead>
					        			<tr>
						        			<td>".$ln10."</td>
					        			</tr>
					        		</thead>
					        		<tbody>
						        		<tr>
						        			<td>".$greleV."</td>
						        		</tr>
					        		</tbody>
					        	</table>
				        	</div>
			        		<div class='col text-center'>
				        		<img src='data/climat/".$donne['imageCl']."' width='250' height='250'>
				        	</div>
				        </div>
			        </div>
				";
			}
		}
		if (isset($_POST['recupDetailleCale'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();
			$idClimat = $_POST['recupDetailleCale'];
			$andro = $_POST['andro'];

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "KALANDRIE VOLY";
				$ln2 = "Faritany";
				$ln3 = "Faritra";
				$ln4 = "DISTRIKA";
				$ln5 = "Rotsak'orana";
				$ln6 = "Hafanana";
				$ln7 = "Rivotra";
				$ln8 = "Datin'ny : ";
				$ln9 = "Firenena";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "CROP CALENDAR";
				$ln2 = "Province";
				$ln3 = "Region";
				$ln4 = "District";
				$ln5 = "Precipitation";
				$ln6 = "Temperature";
				$ln7 = "Wind";
				$ln8 = "Date : ";
				$ln9 = "Country";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "CALENDRIER CULTURAL";
				$ln2 = "Province";
				$ln3 = "Region";
				$ln4 = "District";
				$ln5 = "Precipitation";
				$ln6 = "Température";
				$ln7 = "Vent";
				$ln8 = "Date : ";
				$ln9 = "Pays";
			}

			$donne = $modeleAgro->GetClimatId($idClimat);	
			if ($donne) {

				// if ($now == $donne['Periode']) {
				// 	$pa = "Aujourd'hui";
				// }elseif ($donne['Periode'] == $ym.$date2){
				// 	$pa = "Demain";
				// }elseif ($donne['Periode'] == $ym.$date3){
				// 	$pa = "Après Demain";
				// }else{
				// }
					$pa = $donne['Periode'];

				if($donne['pays']=="MADAGASCAR"){
					$flags = "data/pays/mada.png";
				}elseif ($donne['pays']=="AFRIQUE DU SUD") {
					$flags = "data/pays/afriqueduSud.png";
				}else{
					$flags = "data/logo.jpg";
				}

				if ($donne['imageCl'] == NULL || $donne['imageCl'] == "") {
					$imgC = "<img src='data/logo.jpg' width='250' height='250'>";
				}else{
					$imgC = "<img src='data/climat/".$donne['imageCl']."' width='250' height='250'>";
				}
				list($yy,$mm,$dd) = explode("-", $pa);

				echo "
					<div class='modal-header'>	
				        <h4 class='modal-title'>AGRICODE</h4>
				        <button type='button' class='close' data-dismiss='modal'>×</button>
			        </div>
			        <div class='modal-body'>
			        	<div class='row'>
			        		<div class='col'>
				        		<h6 class='text-muted float-left'>".$ln8." ".$dd."  ".$modeleAgro->AfficheDateL($mm,$_SESSION['langue'])."  ".$yy."</h6>
			        		</div>
			        		<div class='col'>
				        		<h6 class='text-muted float-right'>".$ln1."</h6>
			        		</div>
			        	</div>
			        	<hr>
			        	<div class='row'>
			        		<div class='col'>
					        	<div class='row'>
					        		<div class='col text-center'>
			        					<ul class='ml-4 mb-0 fa-ul text-muted'>
											<li><b>".$ln9." : </b>".$donne['pays']."</li>
										</ul>
										<br>
										<div class='text-center'>
											<img src='".$flags."' width='90' height='50' style='box-shadow:0 0 2px gray;' />
										</div>
					        		</div>
					        		<div class='col text-left'>
			        					<ul class='ml-4 mb-0 fa-ul text-muted'>
			        						<li><b>".$ln2." : </b>".$donne['province']."</li>
											<li><b>".$ln3." : </b>".$donne['region']."</li>
											<li><b>".$ln4." : </b>".$donne['district']."</li>
										</ul>
					        		</div>
					        	</div>
								<hr>
					        	<table class='table table-bordered text-center'>
					        		<thead>
					        			<tr>
						        			<td>".$ln5."</td>
						        			<td>".$ln6."</td>
						        			<td>".$ln7."</td>
					        			</tr>
					        		</thead>
					        		<tbody>
						        		<tr>
						        			<td>".$donne['precipitation']." mm</td>
						        			<td>".$donne['temperature']." °C</td>
						        			<td>".$donne['vent']." km/h</td>
						        		</tr>
					        		</tbody>
					        	</table>
					        	<div class='text-center pt-0'>
				                    ".$imgC."
				                </div>
				        	</div>
			        		<div class='col text-center'>
			        			".$modeleAgro->CalendrierAffDetaille(0,$donne['idClimat'],$_SESSION['langue'])."
				        	</div>
				        </div>
			        </div>
				";
			}
		}

		if (isset($_POST['districtCN'])) {
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();
			$district = $_POST['districtCN'];

			$donne = $modeleAgro->GetClimatDistrict($district);
			$somme = 0;
			foreach ($donne as $key => $value) {
				$donneC = $modeleAgro->GetAlertIdCOUNT($value['idClimat']);
				$somme += $donneC['nombre'];
			}
			if ($somme==0) {
				echo "";
			}else{
				echo $somme;
			}
		}
		if (isset($_POST['districtCNValue'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();
			$district = $_POST['districtCNValue'];

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "Vaovao | ".$district;
				$ln2 = "Miandry fampandrenesana momba";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "New | ".$district;
				$ln2 = "Awaiting notification for";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "Nouveau | ".$district;
				$ln2 = "En attente de notification pour";
			}

			$donne = $modeleAgro->GetClimatDistrict($district);
			$donneC = $modeleAgro->GetAlertNotif($district);
			
			if ($donneC) {
				foreach ($donneC as $key => $value) {
					$donneCN = $modeleAgro->GetAlertIdC($value['idClimatAl']);
					list($y,$m,$d) = explode("-", $donneCN['dateAlert']);

					list($pr,$datea) = explode(":", $donneCN['descAlert']);
					if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
						// if ($pr == "NOUVEAU CLIMAT POUR") {
							$prpr = "TOETR'ANDRO Vaovao ny";
						// }
						$lndesc = $prpr." : ".$datea;
					}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
						// if ($pr == "NOUVEAU CLIMAT POUR") {
							$prpr = "New weather for";
						// }
						$lndesc = $prpr." : ".$datea;
					}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
						$lndesc = "Nouveau";
						// if ($pr == "NOUVEAU CLIMAT POUR") {
							$prpr = "Nouveau climat pour";
						// }
						$lndesc = $prpr." : ".$datea;
					}
					echo "
						<a data-toggle='modal' data-target='#donneClimat' onclick='RecupDetailleClimat(".$donneCN['idClimatAl'].")' class='dropdown-item'>
						    <i class='fas fa-bell mr-2'></i> ".$ln1."
						    <span class='float-right text-muted text-sm'>".$y."/".$m."/".$d." </span><hr>
						    <h6 class='small'>".$lndesc."</h6>
						</a><hr>
					";	
				}
			}else{
				echo "
						<h4 class='text-muted small col' align='center'>AGRICODE</h4><hr>
			          	<div class='col text-center'>
			          		<span class='badge badge-danger'>".$ln2." ".$district."</span>
			          	</div>
			    ";
			}
		}
		if (isset($_POST['districtCNVatana'])) {
			session_start();
			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();
			$district = $_POST['districtCNVatana'];

			$donne = $modeleAgro->GetClimatDistrict($district);

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "Daty";
				$ln2 = "Vokatra";
				$ln3 = "Rotsak'orana";
				$ln4 = "Hafanana";
				$ln5 = "Rivotra";
				$ln6 = "Atao";
				$ln7 = "Anio";
				$ln8 = "Hijery";
				$ln9 = "DISTRIKA";
				$ln10 = "Eto am-piandrasana, mijanona hifandray mba handray Fanairana";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "Date";
				$ln2 = "Description";
				$ln3 = "Precipitation";
				$ln4 = "Temperature";
				$ln5 = "Wind";
				$ln6 = "Action";
				$ln7 = "Today";
				$ln8 = "Watch";
				$ln9 = "District";
				$ln10 = "On hold, Stay connected to receive Alerts";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "Date";
				$ln2 = "Description";
				$ln3 = "Précipitation";
				$ln4 = "Température";
				$ln5 = "Vent";
				$ln6 = "Action";
				$ln7 = "Aujourd'hui";
				$ln8 = "Voir";
				$ln9 = "District";
				$ln10 = "En attente, Restez connecté pour recevoir les Alertes";
			}

			if ($donne) {
				$p = "";
				$r = "";
				$d = "";
				$id = 0;
				foreach ($donne as $key => $value) {
					$id = $value['idClimat'];
				}

				$donneCN = $modeleAgro->GetAlertIdC($id);
					if ($donneCN) {
						foreach ($donne as $key => $value) {
							$donneCN = $modeleAgro->GetAlertIdC($value['idClimat']);
							$p = $value['pays'];
							$r = $value['region'];
						}
						echo "
							<div class='card-header'>
						          <h4 class='card-title'>".$p." | ".$r." | ".$district."</h4>
						        </div>
						        <div class='card-body'>
						          <table class='table table-bordered'>
						            <thead>
						                <tr>
						                  <th>".$ln1."</th>
						                  <th>".$ln2."</th>
						                  <th>".$ln3."</th>
						                  <th>".$ln4."</th>
						                  <th>".$ln5."</th>
						                  <th>".$ln6."</th>
						                </tr>
						              </thead>
						              <tbody>
						";
						foreach ($donne as $key => $value) {
							$donneCN = $modeleAgro->GetAlertIdC($value['idClimat']);
							list($y,$m,$d) = explode("-", $donneCN['dateAlert']);
							if ($donneCN['dateAlert']==date("Y-m-d")) {
								$affp = $ln7;
							}else{
								$affp = $donneCN['dateAlert'];	
							}

								list($pr,$datea) = explode(":", $donneCN['descAlert']);
								if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
									// if ($pr == "NOUVEAU CLIMAT POUR") {
										$prpr = "TOETR'ANDRO Vaovao ny";
									// }
									$lndesc = $prpr." : ".$datea;
								}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
									// if ($pr == "NOUVEAU CLIMAT POUR") {
										$prpr = "New weather for";
									// }
									$lndesc = $prpr." : ".$datea;
								}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
									$lndesc = "Nouveau";
									// if ($pr == "NOUVEAU CLIMAT POUR") {
										$prpr = "Nouveau climat pour";
									// }
									$lndesc = $prpr." : ".$datea;
								}

							echo "
						                <tr>
						                  <td>".$affp."</td>
						                  <td>".$lndesc."</td>
						                  <td>".$donneCN['precipitation']."</td>
						                  <td>".$donneCN['temperature']."</td>
						                  <td>".$donneCN['vent']."</td>
						                  <td><button data-toggle='modal' data-target='#donneClimat'  onclick='RecupDetailleClimat(".$donneCN['idClimat'].")' class='btn btn-secondary btn-sm'>".$ln8."</button></td>
						                </tr>
							";
						}
						echo "
										</tbody>
						          </table>
						        </div>
						";
					}else{
						echo "";
					}
			}else{
				echo "
			        	<div class='card-header'>
				          <h4 class='card-title'>".$ln9." : ".$district."</h4>
				        </div>
				        <div class='card-body'>
				          <h6 align='center' class='small badge badge-danger'>".$ln10." </h6>
				        </div>
			    ";
			}
		}

		if (isset($_POST['districtAAVAVatana'])) {
			session_start();

			include '../../config/connex.php';
			include '../../modele/agricode/modele.agro.php';
			$modeleAgro = new Agro();
			$district = $_POST['districtAAVAVatana'];

			if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") {
				$ln1 = "Hijery ny";
				$ln2 = "Date";
				$ln3 = "Rotsak'orana";
				$ln4 = "Hafainganan'ny rivotra";
				$ln5 = "Fijinjana tsy azo atao";
				$ln6 = "Kaodin'ny voly";
				$ln7 = "Rivo-doza";
				$ln8 = "Tsy misy vaovao amin'izao fotoana izao";
				$ln9 = "Fijinjana azo atao";
				$ln10 = "";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais"){
				$ln1 = "To watch for";
				$ln2 = "Date";
				$ln3 = "Precipitation";
				$ln4 = "Wind speed";
				$ln5 = "Harvest unauthorized";
				$ln6 = "Culture code";
				$ln7 = "Cyclone";
				$ln8 = "No data for the moment";
				$ln9 = "Harvest Authorized";
				$ln10 = "";
			}elseif(isset($_SESSION['langue']) && $_SESSION['langue']=="Francais"){
				$ln1 = "A surveiller pour";
				$ln2 = "Date";
				$ln3 = "Precipitation";
				$ln4 = "Vitesse de vent";
				$ln5 = "Récolte non autorisé";
				$ln6 = "Code de culture";
				$ln7 = "Cyclone";
				$ln8 = "Aucune donnée pour l'instant";
				$ln9 = "Récolte autorisé";
				$ln10 = "";
			}


			$donne = $modeleAgro->GetClimatDistrict($district);
			$pays = "";
			foreach ($donne as $key => $value) {
				$pays = $value['pays'];
			}
			
			$donneC = $modeleAgro->GetCyclonePays($pays);
			if ($donneC) {
				list($y,$m,$d) = explode("-", $donneC['dateCy']);
				$donneMois = $modeleAgro->AfficheDateL($m,$_SESSION['langue']);
				echo "
					<div class='card card-success card-outline'>
			          <div class='card-header'>
			            <h1 class='card-title'>".$ln1." ".$pays."</h1>
			          </div>
			          <div class='card-body'>
			            <div class='row'>
			              <div class='col'>
			                <div class='small-box bg-danger'>
			                  <div class='inner'>
			                    <div class='row'>
			                      <div class='col-sm-6 text-center'>
			                        <h3>Cyclone</h3>
			                        <p>".$donneC['directionC']."</p>
			                      </div>
			                      <div class='col-sm-6 text-right'>
			                        <small>".$ln2." : ".$d." ".$donneMois." ".$y."</small><br>
			                        <small>".$ln3." : ".$donneC['precipitationC']."</small><br>
			                        <small>".$ln4." : ".$donneC['ventC']."</small><br>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			              <div class='col'>
			                <div class='small-box bg-'>
			                  <div class='inner'>
			                    <div class='row'>
			                      <div class='col text-center'>
			                        <small class='text-center'>".$ln5."</small><br>
			                        <img src='data/calendrier/J.jpg' width='70' height='70'>
			                      </div>
			                    </div><hr>
			                    <div class='row'>
			                      <div class='col text-center'>
			                        <small class='text-center'>".$ln6."</small><br>
			                        <img src='data/calendrier/B.jpg' width='70' height='70'>
			                        <img src='data/calendrier/D.jpg' width='70' height='70'>
			                        <img src='data/calendrier/F.jpg' width='70' height='70'>
			                        <img src='data/calendrier/H.jpg' width='70' height='70'>
			                        <img src='data/calendrier/N.jpg' width='70' height='70'>
			                        <img src='data/calendrier/S.jpg' width='70' height='70'>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>
				";
			}else{
				echo "
					<div class='card card-success card-outline'>
			          <div class='card-header'>
			            <h1 class='card-title'>".$ln1." ".$pays."</h1>
			          </div>
			          <div class='card-body'>
			            <div class='row'>
			              <div class='col'>
			                <div class='small-box bg-success'>
			                  <div class='inner'>
			                    <div class='row'>
			                      <div class='col text-center'>
			                        <h3>".$ln7."</h3>
			                        <p>".$ln8."</p>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			              <div class='col'>
			                <div class='small-box bg-'>
			                  <div class='inner'>
			                    <div class='row'>
			                      <div class='col text-center'>
			                        <small class='text-center'>".$ln9."</small><br>
			                        <img src='data/calendrier/I.jpg' width='70' height='70'>
			                      </div>
			                    </div><hr>
			                    <div class='row'>
			                      <div class='col text-center'>
			                        <small class='text-center'>".$ln6."</small><br>
			                        <img src='data/calendrier/A.jpg' width='70' height='70'>
			                        <img src='data/calendrier/C.jpg' width='70' height='70'>
			                        <img src='data/calendrier/E.jpg' width='70' height='70'>
			                        <img src='data/calendrier/G.jpg' width='70' height='70'>
			                        <img src='data/calendrier/M.jpg' width='70' height='70'>
			                      </div>
			                    </div>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>
				";
			}
		}
	


 ?>