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

		public function AlgoDate($dateA,$nombre)
		{
			$date = date_create("$dateA");
			date_add($date,date_interval_create_from_date_string("$nombre"));
			return $new= date_format($date,"Y-m-d");
		}

		public function GetClimatPeriodeRegion($periode,$pays,$search)
		{
				
			$date = date("Y-m-d");
			$date1 = $this->AlgoDate($date,"1 day");
			$date2 = $this->AlgoDate($date,"2 day");			
			$date3 = $this->AlgoDate($date,"3 day");

			if ($periode == "Today") {
				$sql = "SELECT * FROM climat WHERE periode='$date' AND pays='$pays' AND district='$search'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Tomorrow") {
				$sql = "SELECT * FROM climat WHERE periode='$date1' AND pays='$pays' AND district='$search'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}elseif ($periode == "Next") {
				$sql = "SELECT * FROM climat WHERE periode='$date2' AND pays='$pays' AND district='$search'";
				$recup = $this->bdd->query($sql);
				return $donne = $recup->fetch();
			}else{
				return NULL;
			}
		}

		public function GetClimatId($idC)
		{
			$sql = "SELECT * FROM climat WHERE idClimat='$idC'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetClimatAll()
		{
			$sql = "SELECT * FROM climat";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetAlertIdC($idClimat)
		{
			$sql = "SELECT * FROM alert INNER JOIN climat ON alert.idClimatAl=climat.idClimat WHERE alert.idClimatAl='$idClimat' LIMIT 5";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetAlertIdCSimple($idClimat)
		{
			$sql = "SELECT * FROM alert WHERE idClimatAl='$idClimat' LIMIT 5";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetAlertNotif($idClimat)
		{
			$sql = "SELECT * FROM alert LIMIT 5";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAlertIdCOUNT($idClimat)
		{
			$date = date("Y-m-d");
			$sql = "SELECT COUNT(idAlert) AS nombre FROM alert WHERE idClimatAl='$idClimat' AND alert.dateAlert >= '$date'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		public function GetClimatDistrict($district)
		{
			$sql = "SELECT * FROM climat WHERE district='$district'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function GetCyclonePays($pays)
		{
			$sql = "SELECT * FROM cyclone WHERE paysC='$pays'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}


		public function GetAlgoCalendrier($nb)
		{
			$tableau=  array(); 
			$annee = date("y");
			$mois = date("m");
			$jours = date("d")+$nb;
			$numero = date("z")+$nb;	                                      
			$travail="";

			// mois de janvier
			 if(($mois==1)&&(($jours>=10)&&($jours<=24))){
			 	$travail="A";
			 } 
			// mois de fevrier
			 else if (($mois==2)&&(($jours>=8)&&($jours<=19))){
			$travail="A";
			 }
			 // mois de mars
			 else if (($mois==3)&&(($jours>=4)&&($jours<17))) {
			 	$travail="A";
			 }
			 // mois d'avril
			 else if(($mois==4)&&(($jours<13)||($jours>27))){
			 	$travail="A";
			 }
			 // mois de mai
			 else if(($mois==5)&&(($jours<9)||($jours>23))){
			 	$travail="A";
			 }
			 // mois de juin
			 else if (($mois==6)&&(($jours<6)||($jours>19))) {
			 	$travail="A";
			 }
			 //mois de juillet
			 else if (($mois==7)&&(($jours<5)||(($jours>16)&&($jours<31)))) {
			 	$travail="A";
			 }
			 //mois d'aout
			 else if(($mois==8)&&(($jours>11)&&($jours<27))){
			 	$travail="A";
			 }
			 //mois de septembre
			 else if (($mois==9)&&(($jours<8)&&($jours<23))) {
			 	$travail="A";
			 }
			 //mois d'octobre
			 else if (($mois==10)&&(($jours>4)&&($jours<20))) {
			 	$travail="A";
			 }
			 // mois de novembre
			 else if(($mois==11)&&((($jours>2)&&($jours<17)))){
			 	$travail="A";
			 }
			// mois de Décembre
			else if(($mois==12)&&(($jours<15)||($jours>29))){
				$travail="A";
			}else{
				$travail="B";
			}


			//insertion de donnée en tableau
			//JANVIER
			$tableau[1]= "MR";$tableau[2]= "MRS";$tableau[3]= "MM";$tableau[4]= "MM";$tableau[5]= "MD";$tableau[6]= "ML";
			$tableau[7]= "ML";$tableau[8]= "MLS";$tableau[9]= "MRS";$tableau[10]= "MR";$tableau[11]= "MR";$tableau[12]= "MM";
			$tableau[13]= "MM";$tableau[14]= "MM";$tableau[15]= "MD";$tableau[16]= "ML";$tableau[17]= "ML";$tableau[18]= "ML";
			$tableau[19]= "MR";$tableau[20]= "MR";$tableau[21]= "MM";$tableau[22]= "MM";$tableau[23]= "MD";$tableau[24]= "MMS";
			$tableau[25]= "ML";$tableau[26]= "ML";$tableau[27]= "MR";$tableau[28]= "MR";$tableau[29]= "MR";$tableau[30]= "MM";
			$tableau[31]= "MM";
			// FEVRIER
			$tableau[32]= "MD";$tableau[33]= "MD";$tableau[34]= "ML";$tableau[35]= "ML";$tableau[36]= "MLS";$tableau[37]= "MR";
			$tableau[38]= "MR";$tableau[39]= "MR";$tableau[40]= "MM";$tableau[41]= "MM";$tableau[42]= "MD";$tableau[43]= "MD";
			$tableau[44]= "ML";$tableau[45]= "ML";$tableau[46]= "MR";$tableau[47]= "MR";$tableau[48]= "MR";$tableau[49]= "MM";
			$tableau[50]= "MM";$tableau[51]= "MD";$tableau[52]= "MD";$tableau[53]= "MLS";$tableau[54]= "ML";$tableau[55]= "MRS";
			$tableau[56]= "MR";$tableau[57]= "MR";$tableau[58]= "MR";$tableau[59]= "MM";$tableau[60]= "MM";
			//MARS
			$tableau[61]= "MD";$tableau[62]= "MD";$tableau[63]= "ML";$tableau[64]= "MLS";$tableau[65]= "MRS";$tableau[66]= "MR";
			$tableau[67]= "MR";$tableau[68]= "MM";$tableau[69]= "MMS";$tableau[70]= "MD";$tableau[71]= "MD";$tableau[72]= "MD";
			$tableau[73]= "ML";$tableau[74]= "ML";$tableau[75]= "MM";$tableau[76]= "MM";$tableau[77]= "MD";$tableau[79]= "MDS";
			$tableau[79]= "MLS";$tableau[80]= "ML";$tableau[81]= "MRS";$tableau[82]= "MR";$tableau[83]= "MR";$tableau[84]= "MM";
			$tableau[85]= "MM";$tableau[86]= "MD";$tableau[87]= "MD";$tableau[88]= "ML";$tableau[89]= "ML";$tableau[90]= "MR";
			$tableau[91]= "MRS";
			// AVRIL
			$tableau[92]= "MRS";$tableau[93]= "MM";$tableau[94]="MM";$tableau[95]= "MMS";$tableau[96]= "MM";$tableau[97]= "MD";
			$tableau[98]= "ML";$tableau[99]= "ML";$tableau[100]="MR";$tableau[101]= "MR";$tableau[102]= "MR";$tableau[103]= "MMS";
			$tableau[104]= "MMS";$tableau[105]= "MD";$tableau[106]="MD";$tableau[107]= "ML";$tableau[108]= "MLS";$tableau[109]= "ML";
			$tableau[110]= "MR";$tableau[111]= "MM";$tableau[112]= "MM";$tableau[113]= "MM";$tableau[114]= "MD";$tableau[115]= "ML";
			$tableau[116]= "ML";$tableau[117]= "ML";$tableau[118]= "MR";$tableau[119]= "MRS";$tableau[120]="MRS";$tableau[121]="MMS";//MAI
			$tableau[122]="MM";$tableau[123]="MD";$tableau[124]="MD";$tableau[125]="MD";$tableau[126]="ML";$tableau[127]="ML";
			$tableau[128]="MR";$tableau[129]="MR";$tableau[130]="MM";$tableau[131]="MMS";$tableau[132]="MDS";$tableau[133]="MD";
			$tableau[134]="MD";$tableau[135]="MLS";$tableau[136]="MR";$tableau[137]="MR";$tableau[138]="MR";$tableau[139]="MM";
			$tableau[140]="MM";$tableau[141]="MD";$tableau[142]="MD";$tableau[143]="MD";$tableau[144]="ML";$tableau[145]="ML";
			$tableau[146]="MR";$tableau[147]="MRS";$tableau[148]="MRS";$tableau[149]="MMS";$tableau[152]="MD";$tableau[151]="MD";
			$tableau[152]="MD";
			//JUIN
			$tableau[153]="MD";$tableau[154]="ML";$tableau[155]="ML";$tableau[156]="MR";$tableau[157]="MR";$tableau[158]="MM";
			$tableau[159]="MM";$tableau[160]="MMS";$tableau[161]="MDS";$tableau[162]="MD";$tableau[163]="MDS";$tableau[164]="ML";
			$tableau[165]="MR";$tableau[166]="MR";$tableau[167]="MM";$tableau[168]="MM";$tableau[169]="MD";$tableau[170]="MD";
			$tableau[171]="ML";$tableau[172]="MLS";$tableau[173]="MLS";$tableau[174]="MR";$tableau[175]="MR";$tableau[176]="MM";
			$tableau[177]="MM";$tableau[178]="MMS";$tableau[179]="MD";$tableau[180]="MD";$tableau[181]="MD";$tableau[182]="ML";
			// JUILLET
			$tableau[183]="ML";$tableau[184]="MR";$tableau[185]="MM";$tableau[186]="MM";$tableau[187]="MMS";$tableau[188]="MDS";
			$tableau[189]="MD";$tableau[190]="MD";$tableau[191]="MD";$tableau[192]="MLS";$tableau[193]="MR";$tableau[192]="MR";
			$tableau[195]="MM";$tableau[196]="MM";$tableau[197]="MM";$tableau[198]="MD";$tableau[199]="ML";$tableau[200]="ML";
			$tableau[201]="MLS";$tableau[202]="MR";$tableau[203]="MR";$tableau[204]="MR";$tableau[205]="MM";$tableau[206]="MM";
			$tableau[207]="MD";$tableau[208]="MD";$tableau[209]="MD";$tableau[210]="ML";$tableau[211]="ML";$tableau[212]="MM";
			$tableau[213]="MMS";
			//AOUT
			$table1au[214]="MMS";$tableau[215]="MD";$tableau[216]="MD";$tableau[217]="MD";$tableau[218]="ML";$tableau[220]="MLS";
			$tableau[220]= "MR";$tableau[221]="MR";$tableau[222]= "MM";$tableau[223]= "MM";$tableau[224]= "MD";$tableau[226]= "MD";
			$tableau[226]= "ML";$tableau[227]= "MLS";$tableau[228]="MLS";$tableau[239]= "MR";$tableau[230]="MR";$tableau[232]="MR";
			$tableau[232]= "MM";$tableau[233]= "MM";$tableau[234]= "MDS";$tableau[235]="MD";$tableau[236]="ML";$tableau[238]="ML";
			$tableau[238]= "MR";$tableau[239]= "MMS";$tableau[240]= "MMS";$tableau[241]= "MM";$tableau[242]= "MD";$tableau[243]="MD";
			$tableau[244]= "MD";
			// SEPTEMBRE
			$tableau[245]="ML";$tableau[246]="ML";$tableau[247]="MR";$tableau[248]="MM";$tableau[249]="MM";$tableau[250]="MM";
			$tableau[251]="MM";$tableau[252]="MD";$tableau[253]="ML";$tableau[252]="ML";$tableau[255]="MRS";$tableau[256]="MRS";
			$tableau[257]="MR";$tableau[258]="MR";$tableau[259]="MM";$tableau[260]="MM";$tableau[261]="MDS";$tableau[262]="MD";
			$tableau[263]="MD";$tableau[264]="ML";$tableau[263]="ML";$tableau[266]="MR";$tableau[267]="MMS";$tableau[268]="MMS";
			$tableau[269]="MD";$tableau[270]="MD";$tableau[271]="MD";$tableau[272]="MD";$tableau[273]="ML";$tableau[274]="ML";
			// OCTOBRE
			$tableau[275]="MR";$tableau[276]="MR";$tableau[277]="MM";$tableau[278]="MD";$tableau[279]="MD";$tableau[280]="ML";
			$tableau[281]="ML";$tableau[282]="ML";$tableau[283]="MRS";$tableau[284]="MRS";$tableau[285]="MRS";$tableau[286]="MR";$tableau[286]= "MM";
			$tableau[287]="MM";$tableau[288]="MM";$tableau[289]="MDS";$tableau[290]="MD";$tableau[291]="MD";$tableau[292]="ML";
			$tableau[293]="MR";$tableau[294]="MR";$tableau[295]="MM";$tableau[296]="MM";$tableau[297]="MMS";$tableau[298]="MD";
			$tableau[299]="MD";$tableau[300]="ML";$tableau[301]="MR";$tableau[302]="MR";$tableau[303]="MRS";$tableau[304]="MM";
			$tableau[305]= "MM";
			// NOVEMBRE
			$tableau[306]="MM";$tableau[307]="MD";$tableau[308]="ML";$tableau[309]="ML";$tableau[310]="MLS";$tableau[311]="MRS";
			$tableau[312]="MR";$tableau[313]="MM";$tableau[314]="MM";$tableau[315]="MMS";$tableau[316]="MD";$tableau[317]="MD";
			$tableau[318]="ML";$tableau[329]="ML";$tableau[320]="MR";$tableau[321]="MR";$tableau[322]="MM";$tableau[323]="MM";
			$tableau[324]="MDS";$tableau[325]="MD";$tableau[326]="MD";$tableau[327]="MD";$tableau[328]="MLS";$tableau[329]="MR";
			$tableau[330]="MR";$tableau[331]="MR";$tableau[332]="MM";$tableau[333]="MM";$tableau[334]="MM";$tableau[335]="MD";
			//DECEMBRE
			$tableau[336]="MD";$tableau[337]="MD";$tableau[338]="MD";$tableau[339]="ML";$tableau[340]="MR";$tableau[341]="MR";
			$tableau[342]="MM";$tableau[343]="MD";$tableau[344]="MD";$tableau[345]="ML";$tableau[346]="MLS";$tableau[347]="MLS";
			$tableau[348]="MR";$tableau[349]="MR";$tableau[350]="MM";$tableau[351]="MM";$tableau[352]="MMS";$tableau[353]="MD";
			$tableau[354]="MD";$tableau[355]="MD";$tableau[356]="ML";$tableau[357]="ML";$tableau[358]="MR";$tableau[359]="MM";
			$tableau[360]="MM";$tableau[361]="MM";$tableau[362]="MDS";$tableau[363]="MD";$tableau[364]="MD";$tableau[365]= "MR";
			$tableau[366]="MR";

			$voly =$tableau[$numero];
			switch ($voly) {
				case 'MM':
					$volll = "voly mamoany afaka miasa"; 
					break;
				
				case 'Ml':
					$volll =  "voly mamelana";
					break;
				
				case 'MD':
					$volll =  "voly mamody (misy vodiny)";
					break;
				
				case 'MR':
					$volll =  "voly mandravina";
					break;
				
				case 'MlS':
					$volll =  "voly mamelana tsy afaka miasa";
					break;
				case 'MRS':
					$volll =  "voly mandravina tsy afaka miasa";
					break;
				case 'MDS':
					$volll =  "voly mamody tsy afaka miasa";
					break;
				case 'MMS':
					$volll =  "voly mamony tsy afaka miasa";
					break;
				
				default:
					$volll = NULL;
					break;
			}
			return $volll;
		}

		public function GetAsaCalendrier($nb)
		{
			$tableau=  array(); 
			$annee = date("y");
			$mois = date("m");
			$jours = date("d")+$nb;
			$numero = date("z")+$nb;	                                      
			$travail="";

			// mois de janvier
			 if(($mois==1)&&(($jours>=10)&&($jours<=24))){
			 	$travail="A";
			 } 
			// mois de fevrier
			 else if (($mois==2)&&(($jours>=8)&&($jours<=19))){
			$travail="A";
			 }
			 // mois de mars
			 else if (($mois==3)&&(($jours>=4)&&($jours<17))) {
			 	$travail="A";
			 }
			 // mois d'avril
			 else if(($mois==4)&&(($jours<13)||($jours>27))){
			 	$travail="A";
			 }
			 // mois de mai
			 else if(($mois==5)&&(($jours<9)||($jours>23))){
			 	$travail="A";
			 }
			 // mois de juin
			 else if (($mois==6)&&(($jours<6)||($jours>19))) {
			 	$travail="A";
			 }
			 //mois de juillet
			 else if (($mois==7)&&(($jours<5)||(($jours>16)&&($jours<31)))) {
			 	$travail="A";
			 }
			 //mois d'aout
			 else if(($mois==8)&&(($jours>11)&&($jours<27))){
			 	$travail="A";
			 }
			 //mois de septembre
			 else if (($mois==9)&&(($jours<8)&&($jours<23))) {
			 	$travail="A";
			 }
			 //mois d'octobre
			 else if (($mois==10)&&(($jours>4)&&($jours<20))) {
			 	$travail="A";
			 }
			 // mois de novembre
			 else if(($mois==11)&&((($jours>2)&&($jours<17)))){
			 	$travail="A";
			 }
			// mois de Décembre
			else if(($mois==12)&&(($jours<15)||($jours>29))){
				$travail="A";
			}else{
				$travail="B";
			}


			//insertion de donnée en tableau
			//JANVIER
			$tableau[1]= "MR";$tableau[2]= "MRS";$tableau[3]= "MM";$tableau[4]= "MM";$tableau[5]= "MD";$tableau[6]= "ML";
			$tableau[7]= "ML";$tableau[8]= "MLS";$tableau[9]= "MRS";$tableau[10]= "MR";$tableau[11]= "MR";$tableau[12]= "MM";
			$tableau[13]= "MM";$tableau[14]= "MM";$tableau[15]= "MD";$tableau[16]= "ML";$tableau[17]= "ML";$tableau[18]= "ML";
			$tableau[19]= "MR";$tableau[20]= "MR";$tableau[21]= "MM";$tableau[22]= "MM";$tableau[23]= "MD";$tableau[24]= "MMS";
			$tableau[25]= "ML";$tableau[26]= "ML";$tableau[27]= "MR";$tableau[28]= "MR";$tableau[29]= "MR";$tableau[30]= "MM";
			$tableau[31]= "MM";
			// FEVRIER
			$tableau[32]= "MD";$tableau[33]= "MD";$tableau[34]= "ML";$tableau[35]= "ML";$tableau[36]= "MLS";$tableau[37]= "MR";
			$tableau[38]= "MR";$tableau[39]= "MR";$tableau[40]= "MM";$tableau[41]= "MM";$tableau[42]= "MD";$tableau[43]= "MD";
			$tableau[44]= "ML";$tableau[45]= "ML";$tableau[46]= "MR";$tableau[47]= "MR";$tableau[48]= "MR";$tableau[49]= "MM";
			$tableau[50]= "MM";$tableau[51]= "MD";$tableau[52]= "MD";$tableau[53]= "MLS";$tableau[54]= "ML";$tableau[55]= "MRS";
			$tableau[56]= "MR";$tableau[57]= "MR";$tableau[58]= "MR";$tableau[59]= "MM";$tableau[60]= "MM";
			//MARS
			$tableau[61]= "MD";$tableau[62]= "MD";$tableau[63]= "ML";$tableau[64]= "MLS";$tableau[65]= "MRS";$tableau[66]= "MR";
			$tableau[67]= "MR";$tableau[68]= "MM";$tableau[69]= "MMS";$tableau[70]= "MD";$tableau[71]= "MD";$tableau[72]= "MD";
			$tableau[73]= "ML";$tableau[74]= "ML";$tableau[75]= "MM";$tableau[76]= "MM";$tableau[77]= "MD";$tableau[79]= "MDS";
			$tableau[79]= "MLS";$tableau[80]= "ML";$tableau[81]= "MRS";$tableau[82]= "MR";$tableau[83]= "MR";$tableau[84]= "MM";
			$tableau[85]= "MM";$tableau[86]= "MD";$tableau[87]= "MD";$tableau[88]= "ML";$tableau[89]= "ML";$tableau[90]= "MR";
			$tableau[91]= "MRS";
			// AVRIL
			$tableau[92]= "MRS";$tableau[93]= "MM";$tableau[94]="MM";$tableau[95]= "MMS";$tableau[96]= "MM";$tableau[97]= "MD";
			$tableau[98]= "ML";$tableau[99]= "ML";$tableau[100]="MR";$tableau[101]= "MR";$tableau[102]= "MR";$tableau[103]= "MMS";
			$tableau[104]= "MMS";$tableau[105]= "MD";$tableau[106]="MD";$tableau[107]= "ML";$tableau[108]= "MLS";$tableau[109]= "ML";
			$tableau[110]= "MR";$tableau[111]= "MM";$tableau[112]= "MM";$tableau[113]= "MM";$tableau[114]= "MD";$tableau[115]= "ML";
			$tableau[116]= "ML";$tableau[117]= "ML";$tableau[118]= "MR";$tableau[119]= "MRS";$tableau[120]="MRS";$tableau[121]="MMS";//MAI
			$tableau[122]="MM";$tableau[123]="MD";$tableau[124]="MD";$tableau[125]="MD";$tableau[126]="ML";$tableau[127]="ML";
			$tableau[128]="MR";$tableau[129]="MR";$tableau[130]="MM";$tableau[131]="MMS";$tableau[132]="MDS";$tableau[133]="MD";
			$tableau[134]="MD";$tableau[135]="MLS";$tableau[136]="MR";$tableau[137]="MR";$tableau[138]="MR";$tableau[139]="MM";
			$tableau[140]="MM";$tableau[141]="MD";$tableau[142]="MD";$tableau[143]="MD";$tableau[144]="ML";$tableau[145]="ML";
			$tableau[146]="MR";$tableau[147]="MRS";$tableau[148]="MRS";$tableau[149]="MMS";$tableau[152]="MD";$tableau[151]="MD";
			$tableau[152]="MD";
			//JUIN
			$tableau[153]="MD";$tableau[154]="ML";$tableau[155]="ML";$tableau[156]="MR";$tableau[157]="MR";$tableau[158]="MM";
			$tableau[159]="MM";$tableau[160]="MMS";$tableau[161]="MDS";$tableau[162]="MD";$tableau[163]="MDS";$tableau[164]="ML";
			$tableau[165]="MR";$tableau[166]="MR";$tableau[167]="MM";$tableau[168]="MM";$tableau[169]="MD";$tableau[170]="MD";
			$tableau[171]="ML";$tableau[172]="MLS";$tableau[173]="MLS";$tableau[174]="MR";$tableau[175]="MR";$tableau[176]="MM";
			$tableau[177]="MM";$tableau[178]="MMS";$tableau[179]="MD";$tableau[180]="MD";$tableau[181]="MD";$tableau[182]="ML";
			// JUILLET
			$tableau[183]="ML";$tableau[184]="MR";$tableau[185]="MM";$tableau[186]="MM";$tableau[187]="MMS";$tableau[188]="MDS";
			$tableau[189]="MD";$tableau[190]="MD";$tableau[191]="MD";$tableau[192]="MLS";$tableau[193]="MR";$tableau[192]="MR";
			$tableau[195]="MM";$tableau[196]="MM";$tableau[197]="MM";$tableau[198]="MD";$tableau[199]="ML";$tableau[200]="ML";
			$tableau[201]="MLS";$tableau[202]="MR";$tableau[203]="MR";$tableau[204]="MR";$tableau[205]="MM";$tableau[206]="MM";
			$tableau[207]="MD";$tableau[208]="MD";$tableau[209]="MD";$tableau[210]="ML";$tableau[211]="ML";$tableau[212]="MM";
			$tableau[213]="MMS";
			//AOUT
			$table1au[214]="MMS";$tableau[215]="MD";$tableau[216]="MD";$tableau[217]="MD";$tableau[218]="ML";$tableau[220]="MLS";
			$tableau[220]= "MR";$tableau[221]="MR";$tableau[222]= "MM";$tableau[223]= "MM";$tableau[224]= "MD";$tableau[226]= "MD";
			$tableau[226]= "ML";$tableau[227]= "MLS";$tableau[228]="MLS";$tableau[239]= "MR";$tableau[230]="MR";$tableau[232]="MR";
			$tableau[232]= "MM";$tableau[233]= "MM";$tableau[234]= "MDS";$tableau[235]="MD";$tableau[236]="ML";$tableau[238]="ML";
			$tableau[238]= "MR";$tableau[239]= "MMS";$tableau[240]= "MMS";$tableau[241]= "MM";$tableau[242]= "MD";$tableau[243]="MD";
			$tableau[244]= "MD";
			// SEPTEMBRE
			$tableau[245]="ML";$tableau[246]="ML";$tableau[247]="MR";$tableau[248]="MM";$tableau[249]="MM";$tableau[250]="MM";
			$tableau[251]="MM";$tableau[252]="MD";$tableau[253]="ML";$tableau[252]="ML";$tableau[255]="MRS";$tableau[256]="MRS";
			$tableau[257]="MR";$tableau[258]="MR";$tableau[259]="MM";$tableau[260]="MM";$tableau[261]="MDS";$tableau[262]="MD";
			$tableau[263]="MD";$tableau[264]="ML";$tableau[263]="ML";$tableau[266]="MR";$tableau[267]="MMS";$tableau[268]="MMS";
			$tableau[269]="MD";$tableau[270]="MD";$tableau[271]="MD";$tableau[272]="MD";$tableau[273]="ML";$tableau[274]="ML";
			// OCTOBRE
			$tableau[275]="MR";$tableau[276]="MR";$tableau[277]="MM";$tableau[278]="MD";$tableau[279]="MD";$tableau[280]="ML";
			$tableau[281]="ML";$tableau[282]="ML";$tableau[283]="MRS";$tableau[284]="MRS";$tableau[285]="MRS";$tableau[286]="MR";$tableau[286]= "MM";
			$tableau[287]="MM";$tableau[288]="MM";$tableau[289]="MDS";$tableau[290]="MD";$tableau[291]="MD";$tableau[292]="ML";
			$tableau[293]="MR";$tableau[294]="MR";$tableau[295]="MM";$tableau[296]="MM";$tableau[297]="MMS";$tableau[298]="MD";
			$tableau[299]="MD";$tableau[300]="ML";$tableau[301]="MR";$tableau[302]="MR";$tableau[303]="MRS";$tableau[304]="MM";
			$tableau[305]= "MM";
			// NOVEMBRE
			$tableau[306]="MM";$tableau[307]="MD";$tableau[308]="ML";$tableau[309]="ML";$tableau[310]="MLS";$tableau[311]="MRS";
			$tableau[312]="MR";$tableau[313]="MM";$tableau[314]="MM";$tableau[315]="MMS";$tableau[316]="MD";$tableau[317]="MD";
			$tableau[318]="ML";$tableau[329]="ML";$tableau[320]="MR";$tableau[321]="MR";$tableau[322]="MM";$tableau[323]="MM";
			$tableau[324]="MDS";$tableau[325]="MD";$tableau[326]="MD";$tableau[327]="MD";$tableau[328]="MLS";$tableau[329]="MR";
			$tableau[330]="MR";$tableau[331]="MR";$tableau[332]="MM";$tableau[333]="MM";$tableau[334]="MM";$tableau[335]="MD";
			//DECEMBRE
			$tableau[336]="MD";$tableau[337]="MD";$tableau[338]="MD";$tableau[339]="ML";$tableau[340]="MR";$tableau[341]="MR";
			$tableau[342]="MM";$tableau[343]="MD";$tableau[344]="MD";$tableau[345]="ML";$tableau[346]="MLS";$tableau[347]="MLS";
			$tableau[348]="MR";$tableau[349]="MR";$tableau[350]="MM";$tableau[351]="MM";$tableau[352]="MMS";$tableau[353]="MD";
			$tableau[354]="MD";$tableau[355]="MD";$tableau[356]="ML";$tableau[357]="ML";$tableau[358]="MR";$tableau[359]="MM";
			$tableau[360]="MM";$tableau[361]="MM";$tableau[362]="MDS";$tableau[363]="MD";$tableau[364]="MD";$tableau[365]= "MR";
			$tableau[366]="MR";

			return $travail;
		}
		// switch ($travail) {
		// 	case 'A':
		// 		$asa=" famafazana ny voa, fievoana, fandratsanana zava-maniry"; 
		// 		break;
			
		// 	case 'B':
		// 		$asa=" fiasana ny tany, fanasiana zezika, famindrana na fanetsana..";
		// 		break;
		// 	default:
		// 		# code...
		// 		break;
		// }


		public function VentControl($vent)
		{
				if ($vent < 20) {
					$url = "data/alert/A2.jpg";
				}elseif (($vent >= 20) && ($vent <= 40)) {
					$url = "data/alert/A3.jpg";
				}elseif ($vent > 40) {
					$url = "data/alert/A4.jpg";
				}
				return $url;
		}

		public function RecolteByClimatR($image,$langue)
		{
				if ($image == "17.jpg") {
				 	$andro = "Nuageux";
				}elseif($image == "tsara.jpg"){
				 	$andro = "Nuageux+&Soleil";
				}elseif($image == "1.png"){
				 	$andro = "Soleil";
				}elseif($image == "22.png"){
				 	$andro = "Soleil&Vent&Nuage-";
				}elseif($image == "7.jpg"){
				 	$andro = "Nuageux-&Soleil";
				}elseif($image == "4.jpg"){
				 	$andro = "SoleilChaud";
				}elseif($image == "65.jpg"){
				 	$andro = "Soleil&Vent&Nuage+";
				}elseif($image == "11.jpg"){
				 	$andro = "PluieIntense";
				}elseif($image == "herika.jpg"){
				 	$andro = "Pluie-";
				}elseif($image == "13.png"){
				 	$andro = "PluieAvandra";
				}elseif($image == "9.jpg"){
				 	$andro = "Soleil&Nuage&Pluie";
				}elseif($image == "orana.jpg"){
				 	$andro = "Pluie+";
				}elseif($image == "oram_baratra.jpg"){
				 	$andro = "Orage";
				}else{
					$andro = NULL;
				}

				if ($langue == "Francais") {
					$ln1 = "Recolte autorise";
					$ln2 = "Recolte non autorise";
				}elseif ($langue == "Malagasy") {
					$ln1 = "Fijinjana azo atao";
					$ln2 = "Fijinjana tsy azo atao";
				}elseif ($langue == "Anglais") {
					$ln1 = "Harvest Authorized";
					$ln2 = "Harvest unauthorized";
				}

				if ($andro=="Nuageux" || $andro=="Nuageux+&Soleil" || $andro=="Soleil&Vent&Nuage-" || $andro=="SoleilChaud" || $andro=="Soleil" || $andro=="Nuageux-&Soleil") {
					$recolte = "<label class='text-muted small' style='border-bottom:1px solid gray;'>".$ln1." </label><br><img src='data/calendrier/I.jpg' width='70' height='70'>";				
				}elseif ($andro=="Pluie-" || $andro=="Soleil&Nuage&Pluie") {
					$recolte = "<label class='text-muted small' style='border-bottom:1px solid gray;'>".$ln2." </label><br><img src='data/calendrier/J.jpg' width='70' height='70'>";		
				}else{		
					$recolte = "<label class='text-muted small' style='border-bottom:1px solid gray;'>".$ln2." </label><br><img src='data/calendrier/J.jpg' width='70' height='70'>";		
				}
				return $recolte;
		}
		public function RecolteByClimatCalendrier($image)
		{
				if ($image == "17.jpg") {
				 	$andro = "Nuageux";
				}elseif($image == "tsara.jpg"){
				 	$andro = "Nuageux+&Soleil";
				}elseif($image == "1.png"){
				 	$andro = "Soleil";
				}elseif($image == "22.png"){
				 	$andro = "Soleil&Vent&Nuage-";
				}elseif($image == "7.jpg"){
				 	$andro = "Nuageux-&Soleil";
				}elseif($image == "4.jpg"){
				 	$andro = "SoleilChaud";
				}elseif($image == "65.jpg"){
				 	$andro = "Soleil&Vent&Nuage+";
				}elseif($image == "11.jpg"){
				 	$andro = "PluieIntense";
				}elseif($image == "herika.jpg"){
				 	$andro = "Pluie-";
				}elseif($image == "13.png"){
				 	$andro = "PluieAvandra";
				}elseif($image == "9.jpg"){
				 	$andro = "Soleil&Nuage&Pluie";
				}elseif($image == "orana.jpg"){
				 	$andro = "Pluie+";
				}elseif($image == "oram_baratra.jpg"){
				 	$andro = "Orage";
				}else{
					$andro = NULL;
				}
				if ($andro=="Nuageux" || $andro=="Nuageux+&Soleil" || $andro=="Soleil&Vent&Nuage-" || $andro=="SoleilChaud" || $andro=="Soleil" || $andro=="Nuageux-&Soleil") {
					$valiny = "MAINA ANDRO";		
				}elseif ($andro=="Pluie-" || $andro=="Soleil&Nuage&Pluie") {
					$valiny = "AVY AVY ORANA";		
				}else{
					$valiny = "AVY ORANA";		
				}
				return $valiny;
		}

		public function GetNameVolySary($donne)
		{
					if ($donne == "voly mamoany afaka miasa") {
						$saryV = "<img src='data/4Logo/graine.jpg' width='170' height='150'>";
						//RECOLTE CONFIRME
					}
					elseif ($donne == "voly mamelana") {
						$saryV = "<img src='data/4Logo/floriculture.png' width='170' height='150'>";
					}
					elseif ($donne == "voly mamody (misy vodiny)") {
						$saryV = "<img src='data/4Logo/plante_a_tubercule.png' width='170' height='150'>";
					}
					elseif ($donne == "voly mandravina") {
						$saryV = "<img src='data/4Logo/maraîchere.png' width='170' height='150'>";
					}
					//RECOLTE
					elseif ($donne == "voly mamelana tsy afaka miasa") {
						$saryV = "<img src='data/4Logo/floriculture.png' width='170' height='150'>";
					}
					elseif ($donne == "voly mandravina tsy afaka miasa") {
						$saryV = "<img src='data/4Logo/maraîchere.png' width='170' height='150'>";
					}
					elseif ($donne == "voly mamody tsy afaka miasa") {
						$saryV = "<img src='data/4Logo/plante_a_tubercule.png' width='170' height='150'>";
					}
					elseif ($donne == "voly mamony tsy afaka miasa") {
						$saryV = "<img src='data/4Logo/graine.jpg' width='170' height='150'>";
					}else{
						$saryV = "<img src='data/4Logo/graine.jpg.jpg' width='170' height='150'>";
					}
					return $saryV;
		}
		public function GetNameVoly($donne,$langue)
		{
					if ($langue == "Anglais") {
						$ln1 = "SEED PLANT (Rice, corn,...)";
						$ln2 = "FLORICULTURE (Broccoli, Cauliflower)";
						$ln3 = "TUBER PLANT (Carrot, Potato, ...)";
						$ln4 = "MARAICHERE (Salad, ...)";
					}elseif ($langue == "Francais") {
						$ln1 = "PLANTE A GRAINE (Riz, maïs,...)";
						$ln2 = "FLORICULTURE (Brocoli, Choux fleur)";
						$ln3 = "PLANTE A TUBERCULE (Carotte, Pomme de terre,...)";
						$ln4 = "MARAICHERE (Salade, ...)";
					}elseif ($langue == "Malagasy") {
						$ln1 = "Voly mamoany (Vary, katsaka,...)";
						$ln2 = "Voly mamelana ()";
						$ln3 = "Voly mamody (Karoty, Ovy, ...)";
						$ln4 = "Voly mandravina (Salady)";
					}

					if ($donne == "voly mamoany afaka miasa") {
						$anarana = $ln1;	
					}
					elseif ($donne == "voly mamelana") {
						$anarana = $ln2;
					}
					elseif ($donne == "voly mamody (misy vodiny)") {
						$anarana = $ln3;
					}
					elseif ($donne == "voly mandravina") {
						$anarana = $ln4;
					}
					elseif ($donne == "voly mamelana tsy afaka miasa") {
						$anarana = $ln2;
					}
					elseif ($donne == "voly mandravina tsy afaka miasa") {
						$anarana = $ln4;
					}
					elseif ($donne == "voly mamody tsy afaka miasa") {
						$anarana = $ln3;
					}
					elseif ($donne == "voly mamony tsy afaka miasa") {
						$anarana = $ln1;	
					}else{
						$anarana = $ln1;							
					}
					return $anarana;
		}

		public function InformationRegion($region,$langue)
		{
			if ($langue=="Malagasy") {
				$ln1 = "";
			}elseif ($langue=="Anglais") {
				$ln1 = "";
			}elseif ($langue=="Francais") {
				$ln1 = "";
			}
			if ($region == "Analamanga (Antananarivo)") {
				$donneM = "
								 <div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : Aujourd'hui jusqu'a 20 Novembre 2021</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
				                  		<label class='text-muted small'>Variete : Local</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 20 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
				$donneR = "
								<div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : Aujourd'hui jusqu'a Fin Novembre 2021</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
				                  		<label class='text-muted small'>Variete : X251</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 20 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
			}elseif ($region == "Bongolava (Antananarivo)") {
				$donneM = "
								 <div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : Mois d'Octobre</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Lent</label><br>
				                  		<label class='text-muted small'>Variete : Local</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  	     <label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 20 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
				$donneR = "
								<div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : A partir du mois de Decembre</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Court</label><br>
				                  		<label class='text-muted small'>Variete : Nerica 4</label>
				                  		<label class='text-muted small'>Variete : B22</label>
				                  		<label class='text-muted small'>Variete : Nerica 9</label>
				                  		<label class='text-muted small'>Variete : Nerica 11</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 20 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
			}elseif ($region == "Itasy (Antananarivo)") {
				$donneM = "
								 <div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : 10 Octobre a 10 Novembre</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
				                  		<label class='text-muted small'>Variete : IRAT200</label>
				                  		<label class='text-muted small'>Variete : Volasoa</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  	     <label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 20 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
				$donneR = "
								<div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : Octobre au mois de Decembre</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
				                  		<label class='text-muted small'>Variete : FOFIFA160</label>
				                  		<label class='text-muted small'>Variete : X264</label>
				                  		<label class='text-muted small'>Variete : X243</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col-sm-4 text-center'>
				                  		<label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col-sm-4 text-center'>
				                  		 <label class='text-muted small'>Dans 30 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col-sm-4 text-center'>
				                  		 <label class='text-muted small'>Dans 40 jours</label><br>
				                 		 <img src='data/calendrier/G.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
			}elseif ($region == "Vakinankaratra (Antananarivo)") {
				$donneM = "
								 <div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : 10 Octobre au 20 Novembre</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Lent</label><br>
				                  		<label class='text-muted small'>Variete : Local</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  	     <label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 20 jours</label><br>
				                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
				$donneR = "
								<div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small'>Periode : 10 Novembre au 10 Decembre</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-left'>
				                  		<label class='text-muted small'>Cycle : Court</label><br>
				                  		<label class='text-muted small'>Variete : Nerica4</label>
				                  		<label class='text-muted small'>Variete : B22</label>
				                  	</div>
				                  </div>
				                  <hr>
				                  <div class='row'>
				                  	<div class='col text-center'>
				                  		<label class='text-muted small'>Periode</label><br>
				                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
				                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
				                  	</div>
				                  	<div class='col text-center'>
				                  		 <label class='text-muted small'>Dans 30 jours</label><br>
				                 		 <img src='data/calendrier/G.jpg' width='70' height='70'>
				                  	</div>
				                  </div>
				                  <hr>
				";
			}else{
				$donneM = "
								 <div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small text-center'>Donnees en cours de collection</label>
				                  	</div>
				                </div>
				";
				$donneR = "
								<div class='row'>
				                  	<div class='col'>
				                  		<label class='text-muted small text-center'>Donnees en cours de collection</label>
				                  	</div>
				                </div>
				";
			}

			return "
				<div class='row'>
			        		<div class='col-6'>
				              <div class='small-box'>
				                <div class='inner'>
				                  <p align='center'>Mais</p><hr>
				                  ".$donneM."
				                  <small class='badge badge-success text-center'>NB : suivre le calendrier pour trois jours</small>
				                </div>				                
				              </div>
				            </div>	
				            <div class='col-6'>
				              <div class='small-box'>
				                <div class='inner'>
				                  <p align='center'>Riz</p><hr>
				                  ".$donneR."
				                  <small class='badge badge-success text-center'>NB : suivre le calendrier pour trois jours</small>
				                </div>				                
				              </div>
				            </div>		
		        		</div>	
			";
		}
		public function GetRegionCalendar($culture,$region,$cycle)
		{
			$sql = "SELECT * FROM culture INNER JOIN katsaka ON culture.id_culture=katsaka.id_table WHERE culture.region='$region' AND culture.type_culture='$cycle' AND culture.nom_culture='$culture'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function AffCalendarCBCRicMan($culture,$langue)
		{
				if ($langue == "Anglais") {
					$ln0 = "Start";
					$ln1 = "January";
					$ln2 = "February";
					$ln3 = "March";
					$ln4 = "April";
					$ln5 = "May";
					$ln6 = "June";
					$ln7 = "July";
					$ln8 = "August";
					$ln9 = "September";
					$ln10 = "October";
					$ln11 = "November";
					$ln12 = "December";
					$ln13 = "while";					
					$ln14 = "days";
				}elseif ("Francais") {
					$ln0 = "Debut";
					$ln1 = "Janvier";
					$ln2 = "Fevrier";
					$ln3 = "Mars";
					$ln4 = "Avril";
					$ln5 = "Mai";
					$ln6 = "Juin";
					$ln7 = "Juillet";
					$ln8 = "Août";
					$ln9 = "Septembre";
					$ln10 = "Octobre";
					$ln11 = "Novembre";
					$ln12 = "Decembre";
					$ln13 = "pendant";					
					$ln14 = "jours";
				}elseif ("Malagasy") {
					$ln0 = "Fanombohana";
					$ln1 = "Janoary";
					$ln2 = "Febroary";
					$ln3 = "Martsa";
					$ln4 = "Aprily";
					$ln5 = "May";
					$ln6 = "Jona";
					$ln7 = "Jolay";
					$ln8 = "Aogositra";
					$ln9 = "Septambra";
					$ln10 = "Oktobra";
					$ln11 = "Novembra";
					$ln12 = "Desambra";					
					$ln13 = "mandritra";					
					$ln14 = "andro";					
				}
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
											$autorised= $ln0." ".$ln10;

											break;
										case 2:
											$moi =10;
											$autorised= " 10 ".$ln10;
											break;
										case 3:
											$moi =10;
											$autorised= " 20 ".$ln10;
											break;
								 		case 4:
								 			$moi =11;
											$autorised= $ln0." ".$ln11;
											break;
										case 5:
											$moi =11;
											$autorised= " 10 ".$ln11;
											break;
										case 6:
											$moi=11;
											$autorised= " 20 ".$ln11;
											break;


										case 7:
											$moi =12;
											$autorised= $ln0." ".$ln12;
											break;
										case 8:
											$moi =12;
											$autorised= " 10 ".$ln12;
											break;
										case 9:
											$moi =12;
											$autorised= " 20 ".$ln12;
											break;
																			
								 		case 10:
								 			$moi =1;
											$autorised= $ln0." ".$ln1;
											break;
										case 11:
											$moi =1;
											$autorised= " 10 ".$ln1;
											break;
										case 12:
											$moi=1;
											$autorised= " 20 ".$ln1;
											break;


										case 13:
											$moi =2;
											$autorised= $ln0." ".$ln2;
											break;
										case 14:
											$moi =2;
											$autorised= " 10 ".$ln2;
											break;
										case 15:
											$moi =2;
											$autorised= " 20 ".$ln2;
											break;
								 		case 16:
								 			$moi =3;
											$autorised= $ln0." ".$ln3;
											break;
										case 17:
											$moi =3;
											$autorised= " 10 ".$ln3;
											break;
										case 18:
											$moi=3;
											$autorised= " 20 ".$ln3;
											break;
										
										case 19:
											$moi =4;
											$autorised= $ln0." ".$ln4;
											break;
										case 20:
											$moi =4;
											$autorised= " 10 ".$ln4;
											break;
										case 21:
											$moi =4;
											$autorised= " 20 ".$ln4;
											break;
							
								 		case 22:
								 			$moi =5;
											$autorised= $ln0." ".$ln5;
											break;
										case 23:
											$moi =5;
											$autorised= " 10 ".$ln5;
											break;
										case 24:
											$moi=5;
											$autorised= " 20 ".$ln5;
											break;
									
										case 25:
											$moi =6;
											$autorised= $ln0." ".$ln6;
											break;
										case 26:
											$moi =6;
											$autorised= " 10 ".$ln6;
											break;
										case 27:
											$moi =6;
											$autorised= " 20 ".$ln6;
											break;
							
								 		case 28:
								 			$moi =7;
											$autorised= $ln0." ".$ln7;
											break;
										case 29:
											$moi =7;
											$autorised= " 10 ".$ln7;
											break;
										case 30:
											$moi=7;
											$autorised= " 20 ".$ln7;
											break;

										case 31:
								 			$moi =8;
											$autorised= $ln0." ".$ln8;
											break;
										case 32:
											$moi =8;
											$autorised= " 10 ".$ln8;
											break;
										case 33:
											$moi=8;
											$autorised= " 20 ".$ln8;
											break;
										case 34:
								 			$moi =9;
											$autorised= $ln0." ".$ln9;
											break;
										case 35:
											$moi =9;
											$autorised= " 10 ".$ln9;
											break;
										case 36:
											$moi=9;
											$autorised= " 20 ".$ln9;
											break;


										default :
											$autorised= "Pas de ".strtolower($activite)." <br>";
											break;

										}

									// enregistrement dans le tableau
										if (!empty($dernier)&&!empty($avant)) {
												$duree =($dernier-$avant+1)*10;
												$tableau[$nombre] = $autorised."  ".$ln13." ".$duree." ".$ln14."<br>";
										}else{
											$tableau[$nombre]=$autorised."<br>";
										}

										
										
									}
			    				}
			    			}
			    			
			    		}		
					$nombre=$nombre+1;
			    }
			    return $tableau;
			
		}

		public function DonneCulture($culture,$region,$cycle,$langue)
		{
			if ($langue=="Francais") {
				$ln1 = "numéro";
				$ln2 = "Données en cours de collection par les administrattions";
				$ln3 = "Nom de la culture";
				$ln4 = "Cycle";
				if ($culture == "Riz") {
					$lnC = "Riz";
				}elseif($culture == "Mais"){
					$lnC = "Maïs";
				}
				if ($cycle == "Courte") {
					$lnCycle = "Courte";
				}elseif($cycle == "Intermediaire"){
					$lnCycle = "Intermediaire";
				}elseif($cycle == "Long"){
					$lnCycle = "Long";
				}else{
					$lnCycle = "";
				}
			}elseif ($langue=="Anglais") {
				$ln1 = "number";
				$ln2 = "Data being collected by the administrations";
				$ln3 = "Culture name";
				$ln4 = "Cycle";
				if ($culture == "Riz") {
					$lnC = "Rice";
				}elseif($culture == "Mais"){
					$lnC = "Corn";
				}
				if ($cycle == "Courte") {
					$lnCycle = "Short";
				}elseif($cycle == "Intermediaire"){
					$lnCycle = "Intermediate";
				}elseif($cycle == "Long"){
					$lnCycle = "Long";
				}else{
					$lnCycle = "";
				}
			}elseif ($langue=="Malagasy") {
				$ln1 = "faha";
				$ln2 = "Vaovao an-dàlam-panangonanin'ny mpitantana";
				$ln3 = "Anaranan'ny voly";
				$ln4 = "Tsingerin'ny";
				if ($culture == "Riz") {
					$lnC = "Vary";
				}elseif($culture == "Mais"){
					$lnC = "Katsaka";
				}
				if ($cycle == "Courte") {
					$lnCycle = "Fohy";
				}elseif($cycle == "Intermediaire"){
					$lnCycle = "Kafa";
				}elseif($cycle == "Long"){
					$lnCycle = "Maharitra";
				}else{
					$lnCycle = "";
				}
			}
			$donne = $this->GetRegionCalendar($culture,$region,$cycle);
			if ($donne) {
				$res = $this->AffCalendarCBCRicMan($donne['id_culture'],$langue);
				$resFinal = "";
				for ($i=1; $i <=12 ; $i++) { 
			    	if (!empty($res[$i])) {
			    		$resFinal = $resFinal.$res[$i];
			    	}    	
			    }
			    list($var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10) = explode("<br>", $resFinal);
			    // return var_dump($res);
			    if (substr($var1, 0,6) == "Pas de") {
			    	$var1Aff = "";
			    }else{
			    	$var1Aff = "<img src='data/calendrier/A.jpg' width='70' height='70'><br>".$var1;
			    }
			    if (substr($var2, 0,6) == "Pas de") {
			    	$var2Aff = "";
			    }else{
			    	$var2Aff = "<img src='data/calendrier/G.jpg' width='70' height='70'><br>".$var2;
			    }

			    if (substr($var3, 0,6) == "Pas de") {
			    	$var3Aff = "";
			    }else{
			    	$var3Aff = "<img src='data/calendrier/X.jpg' width='70' height='70'><br>".$var3."<br>(".$ln1." 1)";
			    }
			    if (substr($var4, 0,6) == "Pas de") {
			    	$var4Aff = "";
			    }else{
			    	$var4Aff = "<img src='data/calendrier/X.jpg' width='70' height='70'><br>".$var4."<br>(".$ln1." 2)";
			    }
			    if (substr($var5, 0,6) == "Pas de") {
			    	$var5Aff = "";
			    }else{
			    	$var5Aff = "<img src='data/calendrier/X.jpg' width='70' height='70'><br>".$var5."<br>(".$ln1." 3)";
			    }

			    if (substr($var6, 0,6) == "Pas de") {
			    	$var6Aff = "";
			    }else{
			    	$var6Aff = "<img src='data/calendrier/T.jpg' width='70' height='70'><br>".$var6."<br>(".$ln1." 1)";
			    }
			    if (substr($var7, 0,6) == "Pas de") {
			    	$var7Aff = "";
			    }else{
			    	$var7Aff = "<img src='data/calendrier/T.jpg' width='70' height='70'><br>".$var7."<br>(".$ln1." 2)";
			    }

			    if (substr($var8, 0,6) == "Pas de") {
			    	$var8Aff = "";
			    }else{
			    	$var8Aff = "<img src='data/calendrier/M.jpg' width='70' height='70'><br>".$var8."<br>(".$ln1." 1)";
			    }
			    if (substr($var9, 0,6) == "Pas de") {
			    	$var9Aff = "";
			    }else{
			    	$var9Aff = "<img src='data/calendrier/M.jpg' width='70' height='70'><br>".$var9."<br>(".$ln1." 2)";
			    }

			    if (substr($var10, 0,6) == "Pas de") {
			    	$var10Aff = "";
			    }else{
			    	$var10Aff = "<img src='data/calendrier/I.jpg' width='70' height='70'><br>".$var10;
			    }

				return "
						    	<div class='row'>
							    	<div class='col-sm-12 text-center'>
							    		<label class='text-muted small'>".$var1Aff."</label><br>
							    	</div>
						    	</div>
						    	<hr>
						    	<div class='row'>
							    	<div class='col-sm-12 text-center'>
								        <label class='text-muted small'>".$var2Aff."</label><br>
							    	</div>
						    	</div>
						    	<hr>
						    	<div class='row'>
							    	<div class='col-sm-4 text-center'>
							    		<label class='text-muted small'>".$var3Aff."</label><br>
							    	</div>
							    	<div class='col-sm-4 text-center'>
								        <label class='text-muted small'>".$var4Aff."</label><br>
							    	</div>
							    	<div class='col-sm-4 text-center'>
							    		<label class='text-muted small'>".$var5Aff."</label><br>
							    	</div>
						    	</div>
						    	<hr>
						    	<div class='row'>
							    	<div class='col-sm-6 text-center'>
								        <label class='text-muted small'>".$var6Aff."</label><br>
							    	</div>
							    	<div class='col-sm-6 text-center'>
								        <label class='text-muted small'>".$var7Aff."</label><br>
							    	</div>
						    	</div>
						    	<hr>
						    	<div class='row'>
							    	<div class='col-sm-6 text-center'>
								        <label class='text-muted small'>".$var8Aff."</label><br>
							    	</div>
							    	<div class='col-sm-6 text-center'>
							    		<label class='text-muted small'>".$var9Aff."</label><br>
							    	</div>
						    	</div>
						    	<hr>
						    	<div class='row'>
							    	<div class='col-sm-12 text-center'>
								        <label class='text-muted small'>".$var10Aff."</label><br>
							    	</div>
						    	</div>
						<hr>
				";
			}else{
				return "
					<div class='row'>
						<div class='col'>
							<h6 align='center'>".$ln2."</h6><hr>
							<small class='text-muted'>".$ln3." : ".$lnC."</small><br>
							<small class='text-muted'>".$ln4." : ".$lnCycle."</small>
						</div>
					</div>
					<hr>
				";
			}
		}

		public function GetInformationRegionR($type,$region,$cycle,$langue)
		{
			if ($langue == "Anglais") {
				$ln1 = "Follow the crop calendar for three days";
				$ln2 = "Resume";
				$ln3 = "Rice";
				$ln4 = "Corn";
				$ln5 = "Enter the crop type";
				$ln6 = "No data selected";
				$lnVar = "Variety";
			}elseif ($langue == "Francais") {
				$ln1 = "NB : suivre le calendrier pour trois jours";
				$ln2 = "Poursuivre";
				$ln3 = "Riz";
				$ln4 = "Maïs";
				$ln5 = "Choisissez le type";
				$ln6 = "Aucune donnée choisi";
				$lnVar = "Variete";
			}elseif ($langue == "Malagasy") {
				$ln1 = "Haraho ny kalendrie mandritra ny telo andro";
				$ln2 = "Hanohy";
				$ln3 = "Vary";
				$ln4 = "Katsaka";
				$ln5 = "Safidio ny voly tiana ho jerena";
				$ln6 = "Tsy misy safidy";
				$lnVar = "Karazany";
			}

			if ($type == "Riz") {
				$urlImage = "data/voly/riz-epis.jpg";
				$typea = $ln3;
				$donneR = $this->DonneCulture('Riz',$region,$cycle,$langue);
				$donne = $donneR."<small class='badge badge-success text-center'>".$ln1."</small><small onclick=\"ScrollToTo('calcalll');\" class='btn btn-success btn-sm float-right' data-target='#calcalll' data-toggle='collapse'>".$ln2."</small>";
			}elseif ($type == "Mais") {
				$urlImage = "data/voly/katsakaa.jpg";
				$typea = $ln4;
				$donneM = $this->DonneCulture('Mais',$region,$cycle,$langue);
				$donne = $donneM."<small class='badge badge-success text-center'>".$ln1."</small><small onclick=\"ScrollToTo('calcalll');\" class='btn btn-success btn-sm float-right' data-target='#calcalll' data-toggle='collapse'>".$ln2."</small>";
			}else{
				$urlImage = "data/logo.jpg";
				$typea = $ln6;
				$donne = "<h6 align='center' style='text-muted'>".$ln5."</h6>";
			}

			$donneAct = $this->GetRegionCalendar($type,$region,$cycle);
			if ($donneAct['variete']!=NULL) {
				$affV = strtoupper($lnVar)." : ".$donneAct['variete'];
			}else{
				$affV = "";
			}
			return "
						<div class='row' style='width: 122%;'>
			        		<div class='col-sm-4 text-center'>
				              	<div class='small-box'>
				                	<div class='inner'>
					        			<img src='".$urlImage."' class='img-circle' width='150' height='150' /><hr>
						                <p class='text-muted' align='center'>".strtoupper($region)."</p>
						                <p style='/*background:#cd3846;color:#fff;' class='badge badge-danger' align='center'>".$affV."</p>
				            		</div>		
				            	</div>		
				            </div>		
			        		<div class='col-sm-6'>
				              <div class='small-box'>
				                <div class='inner'>
				                  <p align='center'>".$typea."</p><hr>
				                  ".$donne." 
				                </div>				                
				              </div>
				            </div>		
		        		</div>
			";

		}

		public function InformationRegionR($type,$region)
		{
			if ($type == "Riz") {
				// DEBUT
				if ($region == "Analamanga (Antananarivo)") {
					$donneR = "
									<div class='row'>
					                  	<div class='col'>
					                  		<label class='text-muted small'>Periode : Aujourd'hui jusqu'a Fin Novembre 2021</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-left'>
					                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
					                  		<label class='text-muted small'>Variete : X251</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-center'>
					                  		 <label class='text-muted small'>Periode</label><br>
					                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
					                  	</div>
					                  	<div class='col text-center'>
					                  		 <label class='text-muted small'>Dans 20 jours</label><br>
					                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
					                  	</div>
					                  </div>
					                  <hr>
					";
				}elseif ($region == "Bongolava (Antananarivo)") {
					$donneR = "
									<div class='row'>
					                  	<div class='col'>
					                  		<label class='text-muted small'>Periode : A partir du mois de Decembre</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-left'>
					                  		<label class='text-muted small'>Cycle : Court</label><br>
					                  		<label class='text-muted small'>Variete : Nerica 4</label>
					                  		<label class='text-muted small'>Variete : B22</label>
					                  		<label class='text-muted small'>Variete : Nerica 9</label>
					                  		<label class='text-muted small'>Variete : Nerica 11</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-center'>
					                  		 <label class='text-muted small'>Periode</label><br>
					                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
					                  	</div>
					                  	<div class='col text-center'>
					                  		 <label class='text-muted small'>Dans 20 jours</label><br>
					                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
					                  	</div>
					                  </div>
					                  <hr>
					";
				}elseif ($region == "Itasy (Antananarivo)") {
					$donneR = "
									<div class='row'>
					                  	<div class='col'>
					                  		<label class='text-muted small'>Periode : Octobre au mois de Decembre</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-left'>
					                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
					                  		<label class='text-muted small'>Variete : FOFIFA160</label>
					                  		<label class='text-muted small'>Variete : X264</label>
					                  		<label class='text-muted small'>Variete : X243</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col-sm-4 text-center'>
					                  		<label class='text-muted small'>Periode</label><br>
					                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
					                  	</div>
					                  	<div class='col-sm-4 text-center'>
					                  		 <label class='text-muted small'>Dans 30 jours</label><br>
					                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
					                  	</div>
					                  	<div class='col-sm-4 text-center'>
					                  		 <label class='text-muted small'>Dans 40 jours</label><br>
					                 		 <img src='data/calendrier/G.jpg' width='70' height='70'>
					                  	</div>
					                  </div>
					                  <hr>
					";
				}elseif ($region == "Vakinankaratra (Antananarivo)") {
					$donneR = "
									<div class='row'>
					                  	<div class='col'>
					                  		<label class='text-muted small'>Periode : 10 Novembre au 10 Decembre</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-left'>
					                  		<label class='text-muted small'>Cycle : Court</label><br>
					                  		<label class='text-muted small'>Variete : Nerica4</label>
					                  		<label class='text-muted small'>Variete : B22</label>
					                  	</div>
					                  </div>
					                  <hr>
					                  <div class='row'>
					                  	<div class='col text-center'>
					                  		<label class='text-muted small'>Periode</label><br>
					                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
					                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
					                  	</div>
					                  	<div class='col text-center'>
					                  		 <label class='text-muted small'>Dans 30 jours</label><br>
					                 		 <img src='data/calendrier/G.jpg' width='70' height='70'>
					                  	</div>
					                  </div>
					                  <hr>
					";
				}else{
					$donneR = "
									<div class='row'>
					                  	<div class='col'>
					                  		<label class='text-muted small text-center'>Donnees en cours de collection</label>
					                  	</div>
					                </div>
					";
				}
				$donne = $donneR."<small class='badge badge-success text-center'>NB : suivre le calendrier pour trois jours</small><small class='btn btn-success btn-sm float-right' data-target='#calcalll' data-toggle='collapse' onclick=\"ScrollToTo('calcalll');\">Poursuivre</small>";
			}elseif ($type == "Mais") {
				if ($region == "Analamanga (Antananarivo)") {
						$donneM = "
										 <div class='row'>
						                  	<div class='col'>
						                  		<label class='text-muted small'>Periode : Aujourd'hui jusqu'a 20 Novembre 2021</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-left'>
						                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
						                  		<label class='text-muted small'>Variete : Local</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-center'>
						                  		 <label class='text-muted small'>Periode</label><br>
						                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
						                  	</div>
						                  	<div class='col text-center'>
						                  		 <label class='text-muted small'>Dans 20 jours</label><br>
						                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
						                  	</div>
						                  </div>
						                  <hr>
						";
					}elseif ($region == "Bongolava (Antananarivo)") {
						$donneM = "
										 <div class='row'>
						                  	<div class='col'>
						                  		<label class='text-muted small'>Periode : Mois d'Octobre</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-left'>
						                  		<label class='text-muted small'>Cycle : Lent</label><br>
						                  		<label class='text-muted small'>Variete : Local</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-center'>
						                  	     <label class='text-muted small'>Periode</label><br>
						                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
						                  	</div>
						                  	<div class='col text-center'>
						                  		 <label class='text-muted small'>Dans 20 jours</label><br>
						                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
						                  	</div>
						                  </div>
						                  <hr>
						";
					}elseif ($region == "Itasy (Antananarivo)") {
						$donneM = "
										 <div class='row'>
						                  	<div class='col'>
						                  		<label class='text-muted small'>Periode : 10 Octobre a 10 Novembre</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-left'>
						                  		<label class='text-muted small'>Cycle : Intermediaire</label><br>
						                  		<label class='text-muted small'>Variete : IRAT200</label>
						                  		<label class='text-muted small'>Variete : Volasoa</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-center'>
						                  	     <label class='text-muted small'>Periode</label><br>
						                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
						                  	</div>
						                  	<div class='col text-center'>
						                  		 <label class='text-muted small'>Dans 20 jours</label><br>
						                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
						                  	</div>
						                  </div>
						                  <hr>
						";
					}elseif ($region == "Vakinankaratra (Antananarivo)") {
						$donneM = "
										 <div class='row'>
						                  	<div class='col'>
						                  		<label class='text-muted small'>Periode : 10 Octobre au 20 Novembre</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-left'>
						                  		<label class='text-muted small'>Cycle : Lent</label><br>
						                  		<label class='text-muted small'>Variete : Local</label>
						                  	</div>
						                  </div>
						                  <hr>
						                  <div class='row'>
						                  	<div class='col text-center'>
						                  	     <label class='text-muted small'>Periode</label><br>
						                 		 <img src='data/calendrier/A.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/X.jpg' width='70' height='70'>
						                 		 <img src='data/calendrier/T.jpg' width='70' height='70'>
						                  	</div>
						                  	<div class='col text-center'>
						                  		 <label class='text-muted small'>Dans 20 jours</label><br>
						                 		 <img src='data/calendrier/E.jpg' width='70' height='70'>
						                  	</div>
						                  </div>
						                  <hr>
						";
					}else{
						$donneM = "
										 <div class='row'>
						                  	<div class='col'>
						                  		<label class='text-muted small text-center'>Donnees en cours de collection</label>
						                  	</div>
						                </div>
						";
					}
				$donne = $donneM."<small class='badge badge-success text-center'>NB : suivre le calendrier pour trois jours</small><small onclick=\"ScrollToTo('threeDa');\" class='btn btn-success btn-sm float-right'>Poursuivre</small>";
			}else{
				$donne = NULL;
			}
			return "
						<div class='row container'>
			        		<div class='col'>
				              <div class='small-box'>
				                <div class='inner'>
				                  <p align='center'>".$type."</p><hr>
				                  ".$donne." 
				                </div>				                
				              </div>
				            </div>		
		        		</div>
			";
		}

		public function CalendrierAff($nb1,$idClimat,$langue)
		{
			$donneAsa = $this->GetAsaCalendrier($nb1);
			$donneCalendrier = $this->GetAlgoCalendrier($nb1);
			$donneClimat = $this->GetClimatId($idClimat);
			$recolteClimat= $this->RecolteByClimatR($donneClimat['imageCl'],$langue); 
			$recolteCalendrier= $this->RecolteByClimatCalendrier($donneClimat['imageCl']); 

			if ($recolteClimat!=NULL) {

					$recolte = $recolteClimat;

					$anaraaVoly = $this->GetNameVoly($donneCalendrier,$langue);
					$saryV = $this->GetNameVolySary($donneCalendrier);
					if ($donneAsa=="A") {

						if ($recolteCalendrier == "MAINA ANDRO") {
							$famafazana = "<img src='data/calendrier/E.jpg' width='70' height='70'>";
							$fievoana = "<img src='data/calendrier/T.jpg' width='70' height='70'>";
							$fandratsana = "<img src='data/calendrier/M.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/C.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY ORANA") {
							$famafazana = "<img src='data/calendrier/F.jpg' width='70' height='70'>";
							$fievoana = "<img src='data/calendrier/T.jpg' width='70' height='70'>";
							$fandratsana = "<img src='data/calendrier/N.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY AVY ORANA") {
							$famafazana = "<img src='data/calendrier/F.jpg' width='70' height='70'>";
							$fievoana = "<img src='data/calendrier/S.jpg' width='70' height='70'>";
							$fandratsana = "<img src='data/calendrier/N.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}


						$donneC11 = $famafazana."".$fievoana."".$fandratsana."".$fanondrahana;

					}elseif ($donneAsa=="B") {
						if ($recolteCalendrier == "MAINA ANDRO") {
							$fiasanaTany = "<img src='data/calendrier/A.jpg' width='70' height='70'>";
							$fanasianaZezika = "<img src='data/calendrier/X.jpg' width='70' height='70'>";
							$famindranaFanetsana = "<img src='data/calendrier/G.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/C.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY ORANA") {
							$fiasanaTany = "<img src='data/calendrier/B.jpg' width='70' height='70'>";
							$fanasianaZezika = "<img src='data/calendrier/Y.jpg' width='70' height='70'>";
							$famindranaFanetsana = "<img src='data/calendrier/H.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY AVY ORANA") {
							$fiasanaTany = "<img src='data/calendrier/A.jpg' width='70' height='70'>";
							$fanasianaZezika = "<img src='data/calendrier/Y.jpg' width='70' height='70'>";
							$famindranaFanetsana = "<img src='data/calendrier/G.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}

						$donneC11 = $fiasanaTany."".$fanasianaZezika."".$famindranaFanetsana."".$fanondrahana;
					}

					return $recolte."<hr>".$donneC11;
			}else{
					return "";
			}
		}
		public function CalendrierAffDetaille($nb1,$idClimat,$langue)
		{
			$donneAsa = $this->GetAsaCalendrier($nb1);
			$donneCalendrier = $this->GetAlgoCalendrier($nb1);
			$donneClimat = $this->GetClimatId($idClimat);
			$recolteClimat= $this->RecolteByClimatR($donneClimat['imageCl'],$langue); 
			$recolteCalendrier= $this->RecolteByClimatCalendrier($donneClimat['imageCl']); 

			if ($langue=="Malagasy") {
				$ln1 = "Kaodin'ny voly";
				$ln2 = "Karazan-vokatra";
			}elseif ($langue=="Anglais") {
				$ln1 = "Culture code";
				$ln2 = "Favorable crop type";
			}elseif ($langue=="Francais") {
				$ln1 = "Code de culture";
				$ln2 = "Type de culture favorable";
			}

			if ($recolteClimat!=NULL) {
					$recolte = $recolteClimat;

					$anaraaVoly = $this->GetNameVoly($donneCalendrier,$langue);
					$saryV = $this->GetNameVolySary($donneCalendrier);
					$titre = "<label class='text-muted small' style='border-bottom:1px solid gray;'>".$ln1."</label><br>";
					$volsar = "<label class='text-muted small'>".$ln2." : ".$anaraaVoly."</label><br>";
					if ($donneAsa=="A") {

						if ($recolteCalendrier == "MAINA ANDRO") {
							$famafazana = "<img src='data/calendrier/E.jpg' width='70' height='70'>";
							$fievoana = "<img src='data/calendrier/T.jpg' width='70' height='70'>";
							$fandratsana = "<img src='data/calendrier/M.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/C.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY ORANA") {
							$famafazana = "<img src='data/calendrier/F.jpg' width='70' height='70'>";
							$fievoana = "<img src='data/calendrier/T.jpg' width='70' height='70'>";
							$fandratsana = "<img src='data/calendrier/N.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY AVY ORANA") {
							$famafazana = "<img src='data/calendrier/F.jpg' width='70' height='70'>";
							$fievoana = "<img src='data/calendrier/S.jpg' width='70' height='70'>";
							$fandratsana = "<img src='data/calendrier/N.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}


						$donneC11 = $famafazana."".$fievoana."".$fandratsana."".$fanondrahana;

					}elseif ($donneAsa=="B") {
						if ($recolteCalendrier == "MAINA ANDRO") {
							$fiasanaTany = "<img src='data/calendrier/A.jpg' width='70' height='70'>";
							$fanasianaZezika = "<img src='data/calendrier/X.jpg' width='70' height='70'>";
							$famindranaFanetsana = "<img src='data/calendrier/G.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/C.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY ORANA") {
							$fiasanaTany = "<img src='data/calendrier/B.jpg' width='70' height='70'>";
							$fanasianaZezika = "<img src='data/calendrier/Y.jpg' width='70' height='70'>";
							$famindranaFanetsana = "<img src='data/calendrier/H.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}elseif ($recolteCalendrier == "AVY AVY ORANA") {
							$fiasanaTany = "<img src='data/calendrier/A.jpg' width='70' height='70'>";
							$fanasianaZezika = "<img src='data/calendrier/Y.jpg' width='70' height='70'>";
							$famindranaFanetsana = "<img src='data/calendrier/G.jpg' width='70' height='70'>";
							$fanondrahana = "<img src='data/calendrier/D.jpg' width='70' height='70'>";
						}

						$donneC11 = $fiasanaTany."".$fanasianaZezika."".$famindranaFanetsana."".$fanondrahana;
					}

					return $recolte."<hr>".$titre.$donneC11."<hr>".$volsar.$saryV;
			}else{
					return "";
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

		public function GetValueGCAffiche($gc)
		{
					switch ($gc) {
					case '0%':
						$val = "<span class='badge badge-success'>0%</span>";
						break;
					case '10%':
						$val = "<span class='badge badge-secondary'>10%</span>";
						break;
					case '20%':
						$val = "<span class='badge badge-secondary'>20%</span>";
						break;
					case '30%':
						$val = "<span class='badge badge-secondary'>30%</span>";
						break;
					case '40%':
						$val = "<span class='badge badge-secondary'>40%</span>";
						break;
					case '50%':
						$val = "<span class='badge badge-warning'>50%</span>";
						break;
					case '60%':
						$val = "<span class='badge badge-warning'>60%</span>";
						break;
					case '70%':
						$val = "<span class='badge badge-warning'>70%</span>";
						break;
					case '80%':
						$val = "<span class='badge badge-warning'>80%</span>";
						break;
					case '90%':
						$val = "<span class='badge badge-danger'>90%</span>";
						break;
					case '100%':
						$val = "<span class='badge badge-danger'>100%</span>";
						break;
					default:
						$val = NULL;
						break;
				}
				return $val;
		}

		public function AfficheDateL($mois,$langue)
		{
			if ($langue=="Malagasy") {
				$ln1 = "Janoary";
				$ln2 = "Febroary";
				$ln3 = "Martsa";
				$ln4 = "Aprily";
				$ln5 = "May";
				$ln6 = "Jona";
				$ln7 = "Jolay";
				$ln8 = "Aogositra";
				$ln9 = "Septambra";
				$ln10 = "Oktobra";
				$ln11 = "Novembra";
				$ln12 = "Desambra";
			}elseif ($langue=="Anglais") {
				$ln1 = "January";
				$ln2 = "February";
				$ln3 = "March";
				$ln4 = "April";
				$ln5 = "May";
				$ln6 = "June";
				$ln7 = "July";
				$ln8 = "August";
				$ln9 = "September";
				$ln10 = "October";
				$ln11 = "November";
				$ln12 = "December";
			}elseif ($langue=="Francais") {
				$ln1 = "Janvier";
				$ln2 = "Fevrier";
				$ln3 = "Mars";
				$ln4 = "Avril";
				$ln5 = "Mai";
				$ln6 = "Juin";
				$ln7 = "Juillet";
				$ln8 = "Août";
				$ln9 = "Septembre";
				$ln10 = "Octobre";
				$ln11 = "Novembre";
				$ln12 = "Decembre";
			}

			switch ($mois) {
				case 1:
					$m = $ln1;
					break;
				case 2:
					$m = $ln2;
					break;
				case 3:
					$m = $ln3;
					break;
				case 4:
					$m = $ln4;
					break;
				case 5:
					$m = $ln5;
					break;
				case 6:
					$m = $ln6;
					break;
				case 7:
					$m = $ln7;
					break;
				case 8:
					$m = $ln8;
					break;
				case 9:
					$m = $ln9;
					break;
				case 10:
					$m = $ln10;
					break;			
				case 11:
					$m = $ln11;
					break;
				case 12:
					$m = $ln12;
					break;
				default:
					$m = NULL;
					break;
			}
			return $m;
		}



	}

















 ?>