<?php 
	/**
	 * 
	 */
	class Calendrier
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddCalendrier($idPersoC,$idClimatC,$Riz,$Manioc)
		{
			$sql = "INSERT INTO calendrier(idPersoC,idClimatC,Riz,Manioc,dateC,heureC) VALUES('$idPersoC','$idClimatC','$Riz','$Manioc',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetCalendrierIdClimat($idClimat)
		{
			$sql = "SELECT * FROM calendrier INNER JOIN climat ON calendrier.idClimatC=climat.idClimat WHERE calendrier.idClimatC='$idClimat'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function UpdateCalendrier($idClimat,$c1,$c2)
		{
			if ($c1!="" && $c1!=NULL) {
				$sql = "UPDATE calendrier SET Riz='$c1' WHERE idClimatC='$idClimat'";
				$this->bdd->exec($sql);
			}
			if ($c2!="" && $c2!=NULL) {
				$sql = "UPDATE calendrier SET Manioc='$c2' WHERE idClimatC='$idClimat'";
				$this->bdd->exec($sql);
			}
		}
		public function DeleteCalendrier($idClimat)
		{
			$sql = "DELETE FROM calendrier WHERE idClimatC='$idClimat'";
			$this->bdd->exec($sql);
		}

	}
 ?>