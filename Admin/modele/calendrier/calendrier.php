<?php

function AlgoCalendrier()
{	
	$tableau=  array(); 
	$annee = date("y");
	$mois = date("m");
	$jours = date("d");
	$numero = date("z");	                                      
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
	$tableau[281]="ML";$tableau[282]="ML";$tableau[283]="MRS";$tableau[284]="MRS";$tableau[286]="MR";$tableau[286]= "MM";
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
			$volll = " voly mamoany afaka miasa"; 
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
			$volll =  "voly mamelana tsy afak miasa";
			break;
		case 'MRS':
			$volll =  "voly mandravina tsy afak miasa";
			break;
		case 'MDS':
			$volll =  "voly mamody tsy afak miasa";
			break;
		case 'MMS':
			$volll =  "voly mamony tsy afak miasa";
			break;
		
		default:
			$volll = NULL;
			break;
	}
	return $volll;
}

function RecupAsa()
{
	$tableau=  array(); 
	$annee = date("y");
	$mois = date("m");
	$jours = date("d");
	$numero = date("z");	                                      
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
	$tableau[281]="ML";$tableau[282]="ML";$tableau[283]="MRS";$tableau[284]="MRS";$tableau[286]="MR";$tableau[286]= "MM";
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

	echo $travail;
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
?>