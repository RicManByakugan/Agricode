<?php 
	if (isset($_POST['regionpays'])) {
		$pays = $_POST['regionpays'];

		switch ($pays) {
			case "AFRIQUE DU SUD":
				$valeur = "
					<option disabled selected></option>
                    <option>Cap-Occidental</option>
					<option>Cap-Nord</option>
					<option>Cap-Oriental</option>
					<option>KwaZulu-Nata</option>
					<option>Etat-Libre</option>
					<option>Nord-Ouest</option>
					<option>Gauteng</option>
					<option>Mpumalanga</option>
					<option>Limpopo</option>
				";
				break;	

			case "MADAGASCAR":
				$valeur = "
					<option disabled selected></option>
                    <option>Analamanga (Antananarivo)</option>
                    <option>Bongolava (Antananarivo)</option>
                    <option>Itasy (Antananarivo)</option>
                    <option>Vakinankaratra (Antananarivo)</option>
                    <option disabled></option>
                    <option>Amoron i Mania (Fianarantsoa)</option>
                    <option>Atsimo-Atsinanana (Fianarantsoa)</option>
                    <option>Haute Matsiatra (Fianarantsoa)</option>
                    <option>Vatovavy-Fitovinany (Fianarantsoa)</option>
                    <option>Ihorombe (Fianarantsoa)</option>
                    <option disabled></option>
                    <option>Alaotra Mangoro (Toamasina)</option>
                    <option>Analanjirofo (Toamasina)</option>
                    <option>Atsinanana (Toamasina)</option>
                    <option disabled></option>
                    <option>Betsiboka (Mahajanga)</option>
                    <option>Boeny (Mahajanga)</option>
                    <option>Melaky (Mahajanga)</option>
                    <option>Sofia (Mahajanga)</option>
                    <option disabled></option>
                    <option>Androy (Toliara)</option>
                    <option>Anosy (Toliara)</option>
                    <option>Atsimo-Andrefana (Toliara)</option>
                    <option>Menabe (Toliara)</option>
                    <option disabled></option>
                    <option>Diana (Antsiranana)</option>
                    <option>Sava (Antsiranana)</option>
				";
				break;
			
			default:
				$valeur = NULL;
				break;

		}

		if ($valeur == NULL) {
			echo "ko";
		}else{
			echo $valeur;
		}

	}

	if (isset($_POST['regiond'])) {
		$region = $_POST['regiond'];
		switch ($region) {
			//AFIRUQE DU SUD
			case "Cap-Occidental":
				$valeur = "
					<option></option>
					<option>Cape Winelands District Municipality</option>
					<option>Central Karoo District Municipality</option>
					<option>City of Cape Town Metropolitan Municipality</option>
					<option>Eden District Municipality</option>
					<option>Overberg District Municipality</option>
					<option>West Coast District Municipality</option>
				";
				break;
			case "Cap-Nord":
				$valeur = "
					<option></option>
					<option>Frances Baard District Municipality</option>
					<option>John Taolo Gaetsewe District Municipality</option>
					<option>Namakwa District Municipality</option>
					<option>Pixley ka Seme District Municipality</option>
					<option>ZF Mgcawu District Municipality</option>
				";
				break;
			case "Cap-Oriental":
				$valeur = "
					<option></option>
					<option>Alfred Nzo District Municipality</option>
					<option>Amathole District Municipality</option>
					<option>Buffalo City Metropolitan Municipality</option>
					<option>Chris Hani District Municipality</option>
					<option>Joe Gqabi District Municipality</option>
					<option>Nelson Mandela Bay Metropolitan Municipality</option>
					<option>OR Tambo District Municipality</option>
					<option>Sarah Baartman District Municipality</option>
				";
				break;
			case "KwaZulu-Nata":
				$valeur = "
					<option></option>
					<option>Amajuba District Municipality</option>
					<option>eThekwini Metropolitan Municipality</option>
					<option>Harry Gwala District Municipality</option>
					<option>iLembe District Municipality</option>
					<option>Ugu District Municipality</option>
					<option>uMgungundlovu District Municipality</option>
					<option>uMkhanyakude District Municipality</option>
					<option>uMzinyathi District Municipality</option>
					<option>uThukela District Municipality</option>
					<option>uThungulu District Municipality</option>
					<option>Zululand District Municipality</option>
				";
				break;
			case "Etat-Libre":
				$valeur = "
					<option></option>
					<option>Fezile Dabi District Municipality</option>
					<option>Lejweleputswa District Municipality</option>
					<option>Mangaung Metropolitan Municipality</option>
					<option>Thabo Mofutsanyana District Municipality</option>
					<option>Xhariep District Municipality</option>
				";
				break;
			case "Nord-Ouest":
				$valeur = "
					<option></option>
					<option>Bojanala Platinum District Municipality</option>
					<option>Dr Kenneth Kaunda District Municipality</option>
					<option>Dr Ruth Segomotsi Mompati District Municipality</option>
					<option>Ngaka Modiri Molema District Municipality</option>
				";
				break;
			case "Gauteng":
				$valeur = "
					<option></option>
					<option>City of Johannesburg Metropolitan Municipality</option>
					<option>City of Tshwane Metropolitan Municipality</option>
					<option>Ekurhuleni Metropolitan Municipality</option>
					<option>Sedibeng District Municipality</option>
					<option>West Rand District Municipality</option>
				";
				break;
			case "Mpumalanga":
				$valeur = "
					<option></option>
					<option>Ehlanzeni District Municipality</option>
					<option>Gert Sibande District Municipality</option>
					<option>Nkangala District Municipality</option>
				";
				break;
			case "Limpopo":
				$valeur = "
					<option></option>
					<option>Capricorn District Municipality</option>
					<option>Mopani District Municipality</option>
					<option>Sekhukhune District Municipality</option>
					<option>Vhembe District Municipality</option>
					<option>Waterberg District Municipality</option>
				";
				break;


			// MADAGASCAR
			case "Analamanga (Antananarivo)":
				$valeur = "
					<option></option>
					<option>Ambohidratrimo</option>
					<option>Andramasina</option>
					<option>Anjozorobe</option>
					<option>Ankazobe</option>
					<option>Antananarivo Atsimondrano</option>
					<option>Antananarivo Avaradrano</option>
					<option>Antananarivo Renivohitra</option>
					<option>Manjakandriana</option>
				";
				break;
			case "Bongolava (Antananarivo)":
				$valeur = "
					<option></option>
					<option>Fenoarivobe</option>
					<option>Tsiroanomandidy</option>
				";
				break;
			case "Itasy (Antananarivo)":
				$valeur = "
					<option></option>
					<option>Arivonimamo</option>
					<option>Miarinarivo</option>
					<option>Soavinandriana</option>
				";
				break;
			case "Vakinankaratra (Antananarivo)":
				$valeur = "
					<option></option>
					<option>Ambatolampy</option>
					<option>Antanifotsy</option>
					<option>Betafo</option>
					<option>Faratsiho</option>
					<option>Mandoto</option>
					<option>Antsirabe I</option>
					<option>Antsirabe II</option>
				";
				break;
			case "Amoron i Mania (Fianarantsoa)":
				$valeur = "
					<option></option>
					<option>Ambatofinandrahana</option>
					<option>Ambositra</option>
					<option>Fandriana</option>
					<option>Manandriana</option>
				";
				break;
			case "Atsimo-Atsinanana (Fianarantsoa)":
				$valeur = "
					<option></option>
					<option>Befotaka</option>
					<option>Farafangana</option>
					<option>Midongy Atsimo</option>
					<option>Vangaindrano</option>
					<option>Vondrozo</option>
				";
				break;
			case "Haute Matsiatra (Fianarantsoa)":
				$valeur = "
					<option></option>
					<option>Ambalavao</option>
					<option>Ambohimahasoa</option>
					<option>Vohibato</option>
					<option>Lalangina</option>
					<option>Isandra</option>
					<option>Ikalamavony</option>
					<option>Fianarantsoa</option>
				";
				break;
			case "Vatovavy-Fitovinany (Fianarantsoa)":
				$valeur = "
					<option></option>
					<option>Ifanadiana</option>
					<option>Ikongo</option>
					<option>Manakara</option>
					<option>Mananjary</option>
					<option>Nosy Varika</option>
					<option>Vohipeno</option>
				";
				break;
			case "Ihorombe (Fianarantsoa)":
				$valeur = "
					<option></option>
					<option>Iakora</option>
					<option>Ihosy</option>
					<option>Ivohibe</option>
				";
				break;
			case "Alaotra Mangoro (Toamasina)":
				$valeur = "
					<option></option>
					<option>Ambatondrazaka</option>
					<option>Amparafaravola</option>
					<option>Andilamena</option>
					<option>Anosibe An ala</option>
					<option>Moramanga</option>
				";
				break;
			case "Analanjirofo (Toamasina)":
				$valeur = "
					<option></option>
					<option>Fenoarivo Atsinanana (Est)</option>
					<option>Mananara Avaratra (Nord)</option>
					<option>Maroantsetra</option>
					<option>Nosy Boraha (Sainte Marie)</option>
					<option>Soanierana Ivongo</option>
					<option>Vavatenina</option>
				";
				break;
			case "Atsinanana (Toamasina)":
				$valeur = "
					<option></option>
					<option>Antanambao Manampotsy</option>
					<option>Mahanoro</option>
					<option>Marolambo</option>
					<option>Toamasina I</option>
					<option>Toamasina II</option>
					<option>Vatomandry</option>
					<option>Vohibinany (Brickaville)</option>
				";
				break;
			case "Betsiboka (Mahajanga)":
				$valeur = "
					<option></option>
					<option>Kandreho</option>
					<option>Maevatanana</option>
					<option>Tsaratanana</option>
				";
				break;
			case "Boeny (Mahajanga)":
				$valeur = "
					<option></option>
					<option>Ambato-Boeny</option>
					<option>Mahajanga I</option>
					<option>Mahajanga II</option>
					<option>Marovoay</option>
					<option>Misinjo</option>
					<option>Soalala</option>
				";
				break;
			case "Melaky (Mahajanga)":
				$valeur = "
					<option></option>
					<option>Ambatomainty</option>
					<option>Antsalova</option>
					<option>Besalampy</option>
					<option>Maintirano</option>
					<option>Morafenobe</option>
				";
				break;
			case "Sofia (Mahajanga)":
				$valeur = "
					<option></option>
					<option>Ananalava</option>
					<option>Andapa</option>
					<option>Antsohihy</option>
					<option>Bealanana</option>
					<option>Befandriana Avaratra (Nord)</option>
					<option>Boriziny (Ancienne Port Bergé)</option>
					<option>Mampikony</option>
					<option>Mandritsara</option>
				";
				break;
			case "Androy (Toliara)":
				$valeur = "
					<option></option>
					<option>Ambovombe-Androy</option>
					<option>Bekily</option>
					<option>Beloha</option>
				";
				break;
			case "Anosy (Toliara)":
				$valeur = "
					<option></option>
					<option>Amboasary-Atsimo</option>
					<option>Betroka</option>
					<option>Taolanaro (Taolagnaro)</option>
					<option>Tsihombe</option>
				";
				break;
			case "Atsimo-Andrefana (Toliara)":
				$valeur = "
					<option></option>
					<option>Ampanihy</option>
					<option>Ankazoabo</option>
					<option>Benenitra</option>
					<option>Beroroha</option>
					<option>Betioky-Atsimo</option>
					<option>Morombe</option>
					<option>Sakaraha</option>
					<option>Toliara I</option>
					<option>Toliara II</option>
				";
				break;
			case "Menabe (Toliara)":
				$valeur = "
					<option></option>
					<option>Belo sur Tsiribihina</option>
					<option>Mahabo</option>
					<option>Manja</option>
					<option>Miandrivazo</option>
					<option>Morondava</option>
				";
				break;
			case "Diana (Antsiranana)":
				$valeur = "
					<option></option>
					<option>Ambanja</option>
					<option>Ambilobe</option>
					<option>Antsiranana I</option>
					<option>Antsiranana II</option>
					<option>Nosy Be</option>
				";
				break;
			case "Sava (Antsiranana)":
				$valeur = "
					<option></option>
					<option>Antalaha</option>
					<option>Sambava</option>
					<option>Vohemar</option>
				";
				break;
			
			default:
				$valeur = "ko";
				break;
		}

		if ($valeur == NULL) {
			echo "ko";
		}else{
			echo $valeur;
		}
	}
 ?>