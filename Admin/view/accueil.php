<!DOCTYPE html>
<html>
<head>
	<title>AGRICODEADMIN</title>
  <link rel="icon" href="data/logo.jpg">
	<meta charset="utf-8">
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
  <script type="text/javascript">
    function DeleteClimat(idClimat) {
          var url = "controller/controllerAgro/controller.agro.php";
          if (confirm("Supprimer le climat ?")) {
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                supIt: idClimat
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                  window.location.reload();
                }else{
                  alert(res);
                }
              }
            });
          }
    }
    function Deco() {
          var url = "controller/controllerPersonnel/controller.personnel.php";
          if (confirm("Se deconnecter ?")) {
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                deconnexion: "go"
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                  window.location.reload();
                }else{
                  alert(res);
                }
              }
            });
          }
    }
    function ModifConfirm(idClimat) {
          var url = "controller/controllerAgro/controller.agro.php";
          if (confirm("Confirmer le modification ?")) {
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                modifC: idClimat,
                periodeModif: $("#preModif").val(),
                precipitationModif: $("#preciModif").val(),
                temperatureModif: $("#tempModif").val(),
                regModif: $("#regModif").val(),
                paysModif: $("#paysModif").val(),
                descModif: $("#descModif").val(),
                cycloneModif: $("#cycloneModif").val(),
                greleModif: $("#greleModif").val(),
                ventModif: $("#ventModif").val()
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                  MoodifClimat(idClimat);
                  RecupDetailleClimat(idClimat);
                }else{
                  alert(res);
                }
              }
            });
          }
    }
    function MoodifClimat(idClimat) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                modifEleme: idClimat
              }),
              dataType: "text",
              success: function(res) {
                $("#modifCAcontent").html(res); 
              }
            });
    }
    function RecupListeClimat(periode) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recupListeC: periode
              }),
              dataType: "text",
              success: function(res) {
                $("#donneClimatC").html(res); 
              }
            });
    }
    function RecupDetailleClimat(idClimat) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recupDetailleC: idClimat,
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                $("#donneClimatDetaille").html(res); 
              }
            });
    }
    function RecupDetailleDistrict(pays,district,region) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recupDistridetaille: district,
                recupPaysdetaille: pays,
                recupRegiondetaille: region,
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                $("#donnedetailleDistrict").html(res); 
              }
            });
    }
    function AddClimatPlus(periode,district,region) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                addDistridetaille: district,
                addRegiondetaille: region,
                periode: periode,
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                $("#dETAILLEAddClimat").html(res); 
              }
            });
    }
    function AnalyseAddClimat() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                analyse: "go",
                periode: $("#preadd").val(),
                precipitation: $("#preciAdd").val(),
                temperature: $("#tempAdd").val(),
                vent: $("#ventAdd").val(),
                region: $("#regadd").val(),
                district: $("#descadd").val(),
                pays: $("#paysadd").val(),
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ko") {
                  alert('Entrer les données');
                }else if(res=="koko"){
                  alert('Erreur');
                }else{
                  $("#analyseaddclimaat").html(res);
                }
              }
            });
  }
  function ScrollToTo(id) {
          document.getElementById(id).scrollIntoView({
            behavior: 'smooth'
          });
  }
  function AfficheCalendarDR(idClimat) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                afficheCRDRRE: idClimat,
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                  $("#calDRDR").html(res);
              }
            });
  }
  function DetailleCalendarB(idC) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                detailleCCCCC: idC,
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                  $("#detailleCccdetaille").html(res);
              }
            });
  }
  function DeleteCalendarB(idC) {
            var url = "controller/controllerAgro/controller.agro.php";
            if (confirm("Supprimer le calendrier ?")) {
              $.ajax({
                type: "POST",
                url: url,
                data: ({
                  deleteCCCCC: idC,
                  idPerso: <?php echo $idPerso; ?>
                }),
                dataType: "text",
                success: function(res) {
                  if (res=="ok") {
                    GetListeCalendar();
                  }else{
                    alert(res);
                  }
                }
              });
            }
  }
  function RecupClimat() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                listeCyclone: "go",
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                  $("#CycloneListeliste").html(res);
              }
            });
  }
  function SupCyclone(idC) {
            var url = "controller/controllerAgro/controller.agro.php";
            if(confirm("Confirmer la suppression ?")){
              $.ajax({
                type: "POST",
                url: url,
                data: ({
                  delCyl: idC,
                  idPerso: <?php echo $idPerso; ?>
                }),
                dataType: "text",
                success: function(res) {
                  if(res=="ok"){
                    RecupClimat();
                  }else{
                    alert(res);
                  }
                }
              });
            }
  }
    $(document).ready(function(){
                $("#new_mdpbtn").click(function(e) {
                    e.preventDefault();
                    $.post(
                      'controller/controllerPersonnel/controller.personnel.php',
                      {
                        new_mdpbtn: "go",
                        idPerso: $("#idPerso").val(),
                        old_mdp: $("#old_mdp").val(),
                        new_mdp1: $("#new_mdp1").val(),
                        new_mdp2: $("#new_mdp2").val()
                      },
                      function(data) {
                        if (data=="OK") {
                          $("#success").html("Effectuer"); 
                          $("#error").html(""); 
                          window.location.reload();
                        }
                        else{
                           $("#error").html(data); 
                        }
                      }
                    );    
                });
    });
  </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
          <div class="container mt-3">
                  <div class="modal fade" id="detailleCcc">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="detailleCccdetaille"></div>
                            </div>
                  </div>
          </div>
          <div class="container mt-3">
                  <div class="modal fade" id="CycloneListe">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="CycloneListeliste"></div>
                            </div>
                  </div>
          </div>
        <div class="container mt-3">
                  <div class="modal fade" id="calendarDi">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="calDRDR"></div>
                            </div>
                  </div>
          </div>
          <div class="container mt-3">
                  <div class="modal fade" id="AddClimatPlus">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="dETAILLEAddClimat"></div>
                            </div>
                  </div>
          </div>
          <div class="container mt-3">
                  <div class="modal fade" id="donneClimat">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="donneClimatC"></div>
                            </div>
                  </div>
          </div>
          <div class="container mt-3">
                  <div class="modal fade" id="detailleClimat">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content" id="donneClimatDetaille"></div>
                            </div>
                  </div>
          </div>

          <div class="container mt-3">
                  <div class="modal fade" id="modifCA">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="modifCAcontent"></div>
                            </div>
                  </div>
          </div>

          <div class="container mt-3">
                  <div class="modal fade" id="detailleDistrict">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                              <div class="modal-content" id="donnedetailleDistrict"></div>
                            </div>
                  </div>
          </div>

          <div class="container mt-3">
                  <div class="modal fade" id="Params">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Paramètre <i class="fas fa-cog"></i></h4>
                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col">
                                        <h6 align="left">Mot de passe</h6>
                                      </div>
                                      <div class="col">
                                        <h6 align="right"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ConModal">Modifier</button></h6>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                  </div>
            </div>

             <div class="container mt-3">
                <div class="modal fade" id="ConModal">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Changement mot de passe <i class="typcn typcn-cog"></i></h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Ancien mot de passe</label>
                            <input type="text" id="idPerso" hidden value="<?php echo $idPerso; ?>">
                          <input type="password" id="old_mdp" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Nouveau mot de passe</label>
                          <input type="password" id="new_mdp1" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Confirmer le nouveau mot de passe</label>
                          <input type="password" id="new_mdp2" class="form-control">
                        </div>
                      </div>
                      <small id="error" style="color: red;text-align: center;"></small>
                      <small id="success" style="color: green;text-align: center;"></small>
                      <div class="modal-footer">
                          <button class="btn btn-sm btn-primary" id="new_mdpbtn">Modifier</button>
                          <small class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</small>
                       </div>
                    </div>
                  </div>
                </div>
          </div>

			<div class="wrapper">

			<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-top: -20px;">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
			      </li>
			    </ul>

			    <ul class="navbar-nav ml-auto">			   

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
			      
			      <li class="nav-item dropdown">
			      	<a class="nav-link" data-toggle="dropdown">
			          <i class="far fa-user"></i>
			        </a>
			         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          	<span class="dropdown-item dropdown-header"><?php echo $user['nom']." ".$user['prenom']; ?></span>
			         	<div class="dropdown-divider"></div>
			         	<span class="dropdown-item" style="text-align: center;">
				         	<small class="btn btn-primary" data-toggle="modal" data-target="#Params">Paramètre</small>
				         	<a><small class="btn btn-primary" onclick="Deco();">Déconnexion</small></a>
			         	</span>
			          	<div class="dropdown-divider"></div>
			        </div>
			      </li>
			    
			    </ul>
			  </nav>

			<aside class="main-sidebar sidebar-dark-primary elevation-4">
			    <a href="index.php" target="blank" class="brand-link">
			      <img src="data/logo.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
			      <span class="brand-text font-weight-light">AGRICODE</span>
			    </a>

			    <div class="sidebar">

			      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			        <div class="image">
			          	<img src="<?php echo $img; ?>" class="img-circle elevation-2">
			        </div>
			        <div class="info">
			          <a class="users-list-name"><?php echo $user['nom']." ".$user['prenom']; ?></a>
			        </div>
			      </div>


			      <nav class="mt-2">
			        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                <li class="nav-header">Collection climat</li>
                <li class="nav-item" onclick="ChangeMan('climat','historique','analyse','bilan','bienvenu','calendar','liste')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-cloud"></i>
                    <p>
                      Climat
                    </p>
                  </a>
                </li>
			         	<li class="nav-item" onclick="ChangeMan('analyse','historique','climat','bilan','bienvenu','calendar','liste')">
			            <a class="nav-link">
			              <i class="nav-icon fas fa-eye"></i>
			              <p>
			                Analyse
			              </p>
			            </a>
			          </li>
                <li class="nav-item" onclick="ChangeMan('bilan','historique','climat','analyse','bienvenu','calendar','liste')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-spinner"></i>
                    <p>
                      Bilan
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="ChangeMan('historique','climat','analyse','bilan','bienvenu','calendar','liste')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                      Historique
                    </p>
                  </a>
                </li>
			        </ul>
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
                <li class="nav-header">Collection cultural</li>
                <li class="nav-item" onclick="ChangeMan('calendar','climat','analyse','bilan','bienvenu','historique','liste')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>
                      Calendrier
                    </p>
                  </a>
                </li>
                <!-- <li class="nav-item" onclick="ChangeMan('liste','climat','analyse','bilan','bienvenu','historique','calendar')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                      Liste calendrier
                    </p>
                  </a>
                </li> -->
              </ul>
			      </nav>
			    </div>
			  </aside>

		<div class="content-wrapper">
			<span style="display: block;" id="bienvenu"><?php include 'accueil/bienvenu.php'; ?></span>
      <span style="display: none;" id="climat"><?php include 'accueil/climat.php'; ?></span>
      <span style="display: none;" id="historique"><?php include 'accueil/historique.php'; ?></span>
      <span style="display: none;" id="analyse"><?php include 'accueil/analyse.php'; ?></span>
      <span style="display: none;" id="bilan"><?php include 'accueil/bilan.php'; ?></span>
      <span style="display: none;" id="calendar"><?php include 'accueil/calendar.php'; ?></span>
      <span style="display: none;" id="liste"><?php include 'accueil/liste.php'; ?></span>
		    
		</div>
</div>
    <script type="text/javascript">
      function ChangeMan(id1,id2,id3,id4,id5,id6,id7,id8) {
        var id11 = document.getElementById(id1);
        var id12 = document.getElementById(id2);
        var id13 = document.getElementById(id3);
        var id14 = document.getElementById(id4);
        var id15 = document.getElementById(id5);
        var id16 = document.getElementById(id6);
        var id17 = document.getElementById(id7);
        var id18 = document.getElementById(id8);
        id11.style.display = "block";
        id12.style.display = "none";
        id13.style.display = "none";
        id14.style.display = "none";
        id15.style.display = "none";
        id16.style.display = "none";
        id17.style.display = "none";
        id18.style.display = "none";
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