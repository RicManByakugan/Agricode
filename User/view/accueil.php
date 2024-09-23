<!DOCTYPE html>
<html lang="fr">
<head>
	<title>AGRICODE</title>
	<meta charset="utf-8">
	<link rel="icon" href="data/logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="content/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="content/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="content/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="content/plugins/jqvmap/jqvmap.min.css">
	<link rel="stylesheet" href="content/css/adminlte.min.css">
	<link rel="stylesheet" href="content/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="content/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="content/plugins/summernote/summernote-bs4.min.css">
  	<script src="content/jquery/jquery.min.js"></script>
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">

	<div class="container mt-3">
        <div class="modal fade" id="donneClimat">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content" id="donneClimatDetaille"></div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="modal fade" id="donneCalendar">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content" id="donneCalendarDetaille"></div>
            </div>
        </div>
    </div>


	<div class="wrapper">
			<nav class="main-header navbar navbar-expand navbar-light" style="margin-top: -20px;">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
			      </li>
			    </ul>
			    <ul class="navbar-nav ml-auto">	

			    	

			      <li class="nav-item dropdown">
			      	<a class="nav-link" data-toggle="dropdown">
			          <i class="far fa-flag"></i>
			        </a>
			         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          	<span class="dropdown-item dropdown-header" id="ln51">Langue</span>
			         	<div class="dropdown-divider"></div>
			         	<span class="dropdown-item" style="text-align: center;">
			         		<a href="index.php?langue=fr"><button class="btn btn-success btn-sm">Francais <img src="data/pays/fr.png" width="15" height="15"></button></a>
			          		<a href="index.php?langue=en"><button class="btn btn-success btn-sm">Anglais <img src="data/pays/en.png" width="15" height="15"></button></a>
			          		<a href="index.php?langue=mg"><button class="btn btn-success btn-sm">Malagasy <img src="data/pays/mada.png" width="15" height="15"></button></a>
				         	<!-- <button class="btn btn-success btn-sm" onclick="TranslateTo('Francais');">Francais <img src="data/pays/fr.png" width="15" height="15"></button>
			          		<button class="btn btn-success btn-sm" onclick="TranslateTo('Anglais');">Anglais <img src="data/pays/en.png" width="15" height="15"></button>
			          		<button class="btn btn-success btn-sm" onclick="TranslateTo('Malagasy');">Malagasy <img src="data/pays/mada.png" width="15" height="15"></button> -->
			         	</span>
			          	<div class="dropdown-divider"></div>
			        </div>
			      </li>
			          		
			      <li class="nav-item dropdown">
			        <a class="nav-link" data-toggle="dropdown">
			          <i class="far fa-bell"></i>
			          <span class="badge badge-danger navbar-badge" id="listeCNotif"></span>
			        </a>
			        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          <div class="dropdown-divider"></div>
			          	<span id="listeCNotifValue">
			          		<h4 class="text-muted small col" align="center">AGRICODE</h4><hr>
			          		<div class="col text-center">
			          			<span class='badge badge-danger' id="lnNoA">En attente de notification</span>
			          		</div>
						</span>
			          <div class="dropdown-divider"></div>			          
			        </div>
			      </li>
			      <li class="nav-item">
			        <a href="index.php" class="nav-link" role="button">
			          <i class="fas fa-undo"></i>
			        </a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" data-widget="fullscreen" role="button">
			          <i class="fas fa-expand-arrows-alt"></i>
			        </a>
			      </li>
			    </ul>
			</nav>
			<aside class="main-sidebar sidebar-dark-primary elevation-4" style="/*color: white;font-weight: bold;background-color: #388d4c;">
			    <a href="index.php" target="blank" class="brand-link">
			      <img src="data/logo.jpg" class="brand-image img-circle elevation-4" style="opacity: .8">
			      <span class="brand-text font-weight-light">AGRICODE</span>
			    </a>

			    <div class="sidebar">
			      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			        <div class="info">
			        	<div class="row">
			        		<div class="col text-center">
				          		<a class="users-list-name">MENU</a>
			        		</div>
				        </div>
			        </div>
			      </div>
			      <nav class="mt-2">
			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">			        	
			        	<li class="nav-item" onclick="ChangeMan('accueil','guide','contact','alert','bienvenu');">
				            <a class="nav-link">
				              <i class="nav-icon fas fa-search"></i>
				              <p>
				                <span id="ln52">Zone</span>
				              	<span class="badge badge-success right" id="zoneAct"></span>
				              </p>
				            </a>
				        </li>
				        <li class="nav-item" onclick="ChangeMan('alert','guide','accueil','contact','bienvenu');">
				            <a class="nav-link">
				              <i class="nav-icon fas fa-bell"></i>
				              <p>
				                <span id="ln53">Alert climat</span>
				              	<span class="badge badge-danger right" id="listeCNotifAA"></span>
				              </p>
				            </a>
				        </li>
			        	<li class="nav-item" onclick="ChangeMan('guide','accueil','contact','alert','bienvenu');">
				            <a class="nav-link">
				              <i class="nav-icon fas fa-blind"></i>
				              <p>
				                <span id="ln54">Guide d'utilisation</span>
				              </p>
				            </a>
				        </li>
			         	<li class="nav-item" onclick="ChangeMan('contact','guide','accueil','alert','bienvenu');">
				            <a class="nav-link">
				              <i class="nav-icon fas fa-phone"></i>
				              <p>
				                <span id="ln55">Contact</span>
				              </p>
				            </a>
				        </li>
			        </ul><br>
			      </nav>
			    </div>
			</aside>
		<div class="content-wrapper">
			<span style="display: block;" id="bienvenu"><?php include 'accueil/bienvenue.php'; ?></span>  
			<span style="display: none;" id="accueil"><?php include 'accueil/accueil.php'; ?></span>  
			<span style="display: none;" id="guide"><?php include 'accueil/guide.php'; ?></span>  
			<span style="display: none;" id="contact"><?php include 'accueil/contact.php'; ?></span>  
			<span style="display: none;" id="alert"><?php include 'accueil/alert.php'; ?></span>  
		</div>
	</div>
		<script src="content/js/langcontent.js"></script>
		<script type="text/javascript">
			<?php if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") { ?>
				TranslateTo('Malagasy');
			<?php } ?>
			<?php if (isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais") { ?>
				TranslateTo('Anglais');
			<?php } ?>
			<?php if (isset($_SESSION['langue']) && $_SESSION['langue']=="Francais") { ?>
				TranslateTo('Francais');
			<?php } ?>
		    function ChangeMan(id1,id2,id3,id4,id5) {
		        var id11 = document.getElementById(id1);
		        var id12 = document.getElementById(id2);
		        var id13 = document.getElementById(id3);
		        var id14 = document.getElementById(id4);
		        var id15 = document.getElementById(id5);
		        id11.style.display = "block";
		        id12.style.display = "none";
		        id13.style.display = "none";
		        id14.style.display = "none";
		        id15.style.display = "none";
		    }
	    </script>
		<script src="content/plugins/jquery/jquery.min.js"></script>
		<script src="content/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script>
		  $.widget.bridge('uibutton', $.ui.button)
		</script>
		<script src="content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="content/plugins/chart.js/Chart.min.js"></script>
		<script src="content/plugins/sparklines/sparkline.js"></script>
		<script src="content/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="content/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<script src="content/plugins/jquery-knob/jquery.knob.min.js"></script>
		<script src="content/plugins/moment/moment.min.js"></script>
		<script src="content/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="content/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<script src="content/plugins/summernote/summernote-bs4.min.js"></script>
		<script src="content/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<script src="content/js/adminlte.js"></script>
		<script src="content/js/demo.js"></script>
		<script src="content/js/pages/dashboard.js"></script>


</body>
</html>