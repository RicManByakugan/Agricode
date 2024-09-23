<?php 
	/**
	 * 
	 */
	class Notif
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddNotif($idPersonnel,$text)
		{
			$sql = "INSERT INTO notification(idPersonnelN,DescNotif,DateNotif,HeureNotif) VALUES('$idPersonnel','$text',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetNotif()
		{
			$sql = "SELECT * FROM notification INNER JOIN personnel ON notification.idPersonnelN=personnel.idPerso ORDER BY notification.idNotif DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetNotifLimit()
		{
			$sql = "SELECT * FROM notification INNER JOIN personnel ON notification.idPersonnelN=personnel.idPerso ORDER BY notification.idNotif DESC LIMIT 5";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

	}
 ?>