<?php 
	/**
	 * 
	 */
	class Agro
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddCalendar($idPerso,$nom_culture,$varieteCulture,$type_culture,$pays,$province,$region)
		{
			$sql = "INSERT INTO culture(idPerso,nom_culture,variete,type_culture,pays,province,region) VALUES('$idPerso','$nom_culture','$varieteCulture','$type_culture','$pays','$province','$region')";
			$this->bdd->exec($sql);
		}
		public function AddCalendarKatsaka($id_table,$preparation,$semis_plantation,$fertilisation_1,$fertilisation_2,$fertilisation_3,$sarclage_1,$sarclage_2,$buttage_1,$buttage_2,$recolte)
		{
			$sql = "INSERT INTO katsaka(id_table,preparation,semis_plantation,fertilisation_1,fertilisation_2,fertilisation_3,sarclage_1,sarclage_2,buttage_1,buttage_2,recolte) VALUES('$id_table','$preparation','$semis_plantation','$fertilisation_1','$fertilisation_2','$fertilisation_3','$sarclage_1','$sarclage_2','$buttage_1','$buttage_2','$recolte')";
			$this->bdd->exec($sql);
		}

		public function AddClimat($idPerso,$pays,$province,$region,$district,$periode,$precipitation,$temperature,$vent,$image,$cyclone,$grele)
		{
			$sql = "INSERT INTO climat(idPersonnel,pays,province,region,district,Periode,precipitation,temperature,vent,imageCl,grele,cyclone,dateAdd,timeAdd) VALUES('$idPerso','$pays','$province','$region','$district','$periode','$precipitation','$temperature','$vent','$image','$grele','$cyclone',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function AddCyclone($idPerso,$dateCy,$precipitationC,$ventC,$pays,$direction)
		{
			$sql = "INSERT INTO cyclone(idPersoC,paysC,directionC,dateCy,precipitationC,ventC,dateAC,heureAC) VALUES('$idPerso','$pays','$direction','$dateCy','$precipitationC','$ventC',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function AddAlert($idPerso,$idClimat,$Desc)
		{
			$sql = "INSERT INTO alert(idPersoA,idClimatAl,descAlert,dateAlert,heureAlert) VALUES('$idPerso','$idClimat','$Desc',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function DeleteCalendar($idCa)
		{
			$sql = "DELETE FROM culture WHERE id_culture='$idCa'";
			$this->bdd->exec($sql);
		}
		public function GetMaxCalendar()
		{
			$sql = "SELECT MAX(id_culture) AS maxId FROM culture";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetCalendarListe()
		{
			$sql = "SELECT * FROM culture INNER JOIN personnel ON culture.idPerso=personnel.idPerso ORDER BY id_culture DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetCalendarListeId($idid)
		{
			$sql = "SELECT * FROM culture INNER JOIN katsaka ON culture.id_culture=katsaka.id_table WHERE culture.id_culture='$idid'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetCyclone()
		{
			$sql = "SELECT * FROM cyclone ORDER BY idCyclone DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function DelCyclone($idC)
		{
			$sql = "DELETE FROM cyclone WHERE idCyclone='$idC'";
			$this->bdd->exec($sql);
		}

		public function UpdateClimatUser($idClimat,$paysModif,$provinceModif,$regModif,$descModif,$periodeModif,$precipitationModif,$temperatureModif,$ventModif,$image,$greleModif,$cycloneModif)
		{
			if ($greleModif!="" || $greleModif!=NULL) {
				$sql = "UPDATE climat SET grele='$greleModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($cycloneModif!="" || $cycloneModif!=NULL) {
				$sql = "UPDATE climat SET cyclone='$cycloneModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($periodeModif!="" || $periodeModif!=NULL) {
				$sql = "UPDATE climat SET Periode='$periodeModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($regModif!="" || $regModif!=NULL) {
				$sql = "UPDATE climat SET region='$regModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($descModif!="" || $descModif!=NULL) {
				$sql = "UPDATE climat SET district='$descModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($paysModif!="" || $paysModif!=NULL) {
				$sql = "UPDATE climat SET pays='$paysModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($provinceModif!="" || $provinceModif!=NULL) {
				$sql = "UPDATE climat SET province='$provinceModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($precipitationModif!="" || $precipitationModif!=NULL) {
				$sql = "UPDATE climat SET precipitation='$precipitationModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($temperatureModif!="" || $temperatureModif!=NULL) {
				$sql = "UPDATE climat SET temperature='$temperatureModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($ventModif!="" || $ventModif!=NULL) {
				$sql = "UPDATE climat SET vent='$ventModif' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($image!="" || $image!=NULL) {
				$sql = "UPDATE climat SET imageCl='$image' WHERE idClimat='$idClimat'";
				$this->bdd->exec($sql);
			}

		}

		public function DeleteClimat($idClimat)
		{
			$sql = "DELETE FROM climat WHERE idClimat='$idClimat'";
			$this->bdd->exec($sql);
		}

		public function GetLastId()
		{
			$sql = "SELECT MAX(idClimat) AS lastId FROM climat";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetClimatToday($pays,$region,$district,$periode)
		{
			$today = date("Y-m-d");
			$sql = "SELECT * FROM climat WHERE pays='$pays' AND region='$region' AND district='$district' AND periode='$periode'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetClimatRegion($search)
		{
			$sql = "SELECT * FROM climat WHERE district='$search'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetClimatPeriodeRegion($periode,$search)
		{
			$date = date("Y-m-d");
			$date1 = $this->AlgoDate($date,"1 day");			
			$date2 = $this->AlgoDate($date,"2 day");			
			$date3 = $this->AlgoDate($date2,"3 day");
			if ($periode == "Today") {
				$sql = "SELECT * FROM climat WHERE periode='$date' AND district='$search'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Tomorrow") {
				$sql = "SELECT * FROM climat WHERE periode='".$date1."' AND district='$search'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Next") {
				$sql = "SELECT * FROM climat WHERE periode='".$date2."' AND district='$search'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}else{
				return NULL;
			}
		}
		public function GetClimatCountPeriode($periode)
		{
			$date = date("Y-m-d");
			$date1 = $this->AlgoDate($date,"1 day");			
			$date2 = $this->AlgoDate($date,"2 day");			
			$date3 = $this->AlgoDate($date2,"3 day");
			if ($periode == "Today") {
				$sql = "SELECT COUNT(idClimat) AS nombre FROM climat WHERE periode='$date'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Tomorrow") {
				$sql = "SELECT COUNT(idClimat) AS nombre FROM climat WHERE periode='".$date1."'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Next") {
				$sql = "SELECT COUNT(idClimat) AS nombre FROM climat WHERE periode='".$date2."'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}else{
				return NULL;
			}
		}
		public function GetClimatPeriode($periode)
		{
			$date = date("Y-m-d");
			$date1 = $this->AlgoDate($date,"1 day");			
			$date2 = $this->AlgoDate($date,"2 day");			
			$date3 = $this->AlgoDate($date2,"3 day");
			if ($periode == "Today") {
				$sql = "SELECT * FROM climat WHERE periode='$date'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($periode == "Tomorrow") {
				$sql = "SELECT * FROM climat WHERE periode='".$date1."'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}elseif ($periode == "Next") {
				$sql = "SELECT * FROM climat WHERE periode='".$date2."'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetchall();
			}else{
				return NULL;
			}
		}
		public function GetRegionDistrictDD($pays,$region,$district)
		{
			$sql = "SELECT * FROM climat WHERE pays='$pays' AND region='$region' AND district='$district'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetRegionDistrictD($periode,$pays,$region,$district)
		{
			$date = date("Y-m-d");
			$date1 = $this->AlgoDate($date,"1 day");			
			$date2 = $this->AlgoDate($date,"2 day");			
			$date3 = $this->AlgoDate($date2,"3 day");
			if ($periode == "Today") {
				$sql = "SELECT * FROM climat WHERE periode='$date' AND pays='$pays' AND region='$region' AND district='$district'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Tomorrow") {
				$sql = "SELECT * FROM climat WHERE periode='".$date1."' AND pays='$pays' AND region='$region' AND district='$district'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Next") {
				$sql = "SELECT * FROM climat WHERE periode='".$date2."' AND pays='$pays' AND region='$region' AND district='$district'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}else{
				return NULL;
			}
		}
		public function GetRegionDistrictDCount($periode,$pays,$region,$district)
		{
			$date = date("Y-m-d");
			$date1 = $this->AlgoDate($date,"1 day");			
			$date2 = $this->AlgoDate($date,"2 day");			
			$date3 = $this->AlgoDate($date2,"3 day");

			if ($periode == "Today") {
				$sql = "SELECT COUNT(idClimat) AS nombre FROM climat WHERE periode='$date' AND pays='$pays' AND region='$region' AND district='$district'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Tomorrow") {
				$sql = "SELECT COUNT(idClimat) AS nombre FROM climat WHERE periode='".$date1."' AND pays='$pays' AND region='$region' AND district='$district'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Next") {
				$sql = "SELECT COUNT(idClimat) AS nombre FROM climat WHERE periode='".$date2."' AND pays='$pays' AND region='$region' AND district='$district'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}else{
				return NULL;
			}
		}	

		public function AlgoDate($dateA,$nombre)
		{
			$date = date_create("$dateA");
			date_add($date,date_interval_create_from_date_string("$nombre"));
			return $new= date_format($date,"Y-m-d");
		}

		public function GetRegionDistrict()
		{
			$date = date("Y-m-d");
			$sql = "SELECT * FROM climat WHERE periode >= '$date'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetRegionDistrictDDD($district)
		{
			$date = date("Y-m-d");
			$sql = "SELECT * FROM climat WHERE periode >= '$date' AND district='$district'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetClimatId($idC)
		{
			$sql = "SELECT * FROM climat WHERE idClimat='$idC'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function AnalyseDonne($precipitation,$temperature,$vent)
		{

			if ($precipitation < 100) {

				if ($vent<20) {
					
					if ($temperature < 20 ) {
						$image = "17.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="tsara.jpg";
					}else if($temperature>35){
						$image ="1.png"; 
					}

				}
				else if(($vent>=20)&&($vent<40)){
					if ($temperature < 20 ) {
						$image = "22.png";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="7.jpg";
					}else if($temperature>35){
						$image ="4.jpg"; 
					}
				}else if ($vent>40) {
					
					if ($temperature < 20 ) {
						$image = "17.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="tsara.jpg";
					}else if($temperature>35){
						$image ="65.jpg"; 
					}

				}

			}
			else if(($precipitation>=100)&&($precipitation<=200)){

				if ($vent<20) {
					
					if ($temperature < 20 ) {
						$image = "11.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="herika.jpg";
					}else if($temperature>35){
						$image ="herika.jpg"; 
					}

				}
				else if(($vent>=20)&&($vent<40)){
					if ($temperature < 20 ) {
						$image = "13.png";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="7.jpg";
					}else if($temperature>35){
						$image ="4.jpg"; 
					}
				}else if ($vent>40) {
					
					if ($temperature < 20 ) {
						$image = "17.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="tsara.jpg";
					}else if($temperature>35){
						$image ="9.jpg"; 
					}

				}

			} 
			else if(($precipitation>=200)&&($precipitation<=300)){

				if ($vent<20) {
					
					if ($temperature < 20 ) {
						$image = "herika.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="herika.jpg";
					}else if($temperature>35){
						$image ="herika.jpg"; 
					}

				}
				else if(($vent>=20)&&($vent<40)){
					if ($temperature < 20 ) {
						$image = "herika.png";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="herika.jpg";
					}else if($temperature>35){
						$image ="herika.jpg"; 
					}
				}else if ($vent>40) {
					
					if ($temperature < 20 ) {
						$image = "orana.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="orana.jpg";
					}else if($temperature>35){
						$image ="9.jpg"; 
					}

				}

			} 
			else if($precipitation>300){

				if ($vent<30) {
					
					if ($temperature < 20 ) {
						$image = "orana.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="orana.jpg";
					}else if($temperature>35){
						$image ="orana.jpg"; 
					}

				}
				else if(($vent>=30)&&($vent<50)){
					if ($temperature < 20 ) {
						$image = "orana.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="orana.jpg";
					}else if($temperature>35){
						$image ="orana.jpg"; 
					}
				}else if ($vent>=50) {
					if ($temperature < 20 ) {
						$image = "oram_baratra.jpg";

					}else if(($temperature>=20)&&($temperature<=35)){
						$image ="oram_baratra.jpg";
					}else if($temperature>35){
						$image ="oram_baratra.jpg"; 
					}

				}

			}
			return $image;
		}

		public function ImageCo($donne)
		{
			return $donne;
		}


		public function AfficheDate($donne)
		{
			$year = date("Y");
			$month = date("m");
			$date = date("d");
			switch ($month) {
				case 1:
					$m = "Janvier";
					break;
				case 2:
					$m = "Février";
					break;
				case 3:
					$m = "Mars";
					break;
				case 4:
					$m = "Avril";
					break;
				case 5:
					$m = "Mai";
					break;
				case 6:
					$m = "Juin";
					break;
				case 7:
					$m = "Juillet";
					break;
				case 8:
					$m = "Août";
					break;
				case 9:
					$m = "Septembre";
					break;
				case 10:
					$m = "Octobre";
					break;			
				case 11:
					$m = "Novembre";
					break;
				case 12:
					$m = "Decembre";
					break;
				default:
					$m = NULL;
					break;
			}

			if ($donne=="Mois") {
				return $m;
			}elseif ($donne=="Jour") {
				return $date;
			}elseif ($donne=="An") {
				return $year;
			}else{
				return date("d-m-Y");
			}
		}

		public function GetValueGC($gc)
		{
			if ($gc == 0) {
				$val = "0%";
			}elseif($gc == 1){
				$val = "10%";
			}elseif($gc == 2){
				$val = "20%";
			}elseif($gc == 3){
				$val = "30%";
			}elseif($gc == 4){
				$val = "40%";
			}elseif($gc == 5){
				$val = "50%";
			}elseif($gc == 6){
				$val = "60%";
			}elseif($gc == 7){
				$val = "70%";
			}elseif($gc == 8){
				$val = "80%";
			}elseif($gc == 9){
				$val = "90%";
			}elseif($gc == 10){
				$val = "100%";
			}else{
				$val = "Aucun";
			}
			return $val;
		}

		public function recuperationdebut($mois,$div)
		{
			$dateajout=10;
			$date=0;
			for ($i=1; $i<=12 ; $i++) { 
				for ($j=1; $j<=3 ; $j++) { 
					
					if (($mois==$i)&&($div==$j)) {
						$date=$dateajout;
					}
					$dateajout=$dateajout+1;
					if ($dateajout==37) {
						$dateajout=1;
					}
				}
			}
			return $date;
		}


		public function recuperationfin($mois,$div)
		{
			$dateajout=10;
			$date=0;
				for ($i=1; $i<=12 ; $i++) { 
				for ($j=1; $j<=3 ; $j++) { 
					
					if (($mois==$i)&&($div==$j)) {
						$date=$dateajout;
					}
					$dateajout=$dateajout+1;
					if ($dateajout==37) {
						$dateajout=1;
					}
				}
			}
			return $date;
		}


		public function assemblage($date1,$date2){
			$periode ="D".$date1."_D".$date2;
			return $periode;
		}

		public function TraiteDonneAtsofoka($moisD,$divD,$moisF,$divF)
		{
			$val1 = $this->recuperationdebut($moisD,$divD);
			$val2 = $this->recuperationdebut($moisF,$divF);
			$res = $this->assemblage($val1,$val2);
			return $res;
		}

		function RecupDonneeAlgo($culture){
		 	$tableau=array();
			$sql =" SELECT * from katsaka where id_table='$culture'";
			$result =$this->bdd->query($sql);
			$donne= $result->fetch();	
			
			$result = $this->bdd->query("SHOW COLUMNS FROM katsaka");
			if (!$result) {
			   echo "Impossible d'exécuter la requête : " . mysql_error();
			   exit;
			}
			$nombre=0;


		    while ($row = $result->fetch()) {

		    	$activite = (string)$row['Field'];
		    	
		    	$sql1= " SELECT $activite from katsaka where id_table='$culture'";
		    	$result1 =$this->bdd->query($sql1);
		    	// echo $nombre;
		    	while ($requete= $result1->fetch()) {
		    		$periode =$requete[$activite];
		    		
		    		if (($nombre!=0)){

		    			if(($nombre!=11)){
		 				if (!empty($periode)) {
					list($debut,$fin)= explode("_", $periode);
					list(,$avant) = explode("D", $debut);
					list(,$dernier) = explode("D", $fin);

					// echo " <br> Activite est :".$activite. "commencement est :: ".$avant." et fin::: ".$dernier."<br>";
					switch ($avant) {

									case 1:
										$moi =10;
										$autorised= strtoupper($activite)." Peut commencer a partir de debut de mois octobre ";

										break;
									case 2:
										$moi =10;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois octobre ";
										break;
									case 3:
										$moi =10;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois octobre ";
										break;
							 		case 4:
							 			$moi =11;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois novembre ";
										break;
									case 5:
										$moi =11;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois novembre ";
										break;
									case 6:
										$moi=11;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois novembre ";
										break;


									case 7:
										$moi =12;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois decembre ";
										break;
									case 8:
										$moi =12;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois decembre ";
										break;
									case 9:
										$moi =12;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois decembre ";
										break;
																		
							 		case 10:
							 			$moi =1;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois janvier ";
										break;
									case 11:
										$moi =1;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois janvier ";
										break;
									case 12:
										$moi=1;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois janvier ";
										break;


									case 13:
										$moi =2;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois fevrier ";
										break;
									case 14:
										$moi =2;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois fevrier ";
										break;
									case 15:
										$moi =2;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois fevrier ";
										break;
							 		case 16:
							 			$moi =3;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois mars ";
										break;
									case 17:
										$moi =3;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois mars ";
										break;
									case 18:
										$moi=3;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois mars ";
										break;
									
									case 19:
										$moi =4;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois avril ";
										break;
									case 20:
										$moi =4;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois avril ";
										break;
									case 21:
										$moi =4;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois avril ";
										break;
						
							 		case 22:
							 			$moi =5;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois mai ";
										break;
									case 23:
										$moi =5;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois mai ";
										break;
									case 24:
										$moi=5;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois mai ";
										break;
								
									case 25:
										$moi =6;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois juin ";
										break;
									case 26:
										$moi =6;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois juin ";
										break;
									case 27:
										$moi =6;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois juin ";
										break;
						
							 		case 28:
							 			$moi =7;
										$autorised= strtoupper($activite)." : Peut commencer a partir de debut de mois juillet ";
										break;
									case 29:
										$moi =7;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 10 de mois juillet ";
										break;
									case 30:
										$moi=7;
										$autorised= strtoupper($activite)." : Peut commencer a partir du 20 de mois juillet ";
										break;

									default :
										$autorised= "Pas de : ".strtoupper($activite)."<br>";
										break;

									}

								// enregistrement dans le tableau
									if (!empty($dernier)&&!empty($avant)) {
											$duree =($dernier-$avant+1)*10;
											$tableau[$nombre]=$autorised." et pendant ".$duree." JOURS <br>";
									}else{
										$tableau[$nombre]=$autorised." <br>";
									}

									
									
								}
		    				}
		    			}
		    			
		    		}		
				$nombre=$nombre+1;
		    }
		    return $tableau;	
		}



	}



 ?>