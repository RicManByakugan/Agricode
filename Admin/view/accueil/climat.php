<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-cloud"></i>  Climat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a><?php echo $user['nom']." ".$user['prenom']; ?></a></a></li>
              <li class="breadcrumb-item active">Collection</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content">
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row text-center" id="recap"></div>
        </div>
      </div>
</section>


<section class="content">
      <div class="row">
        <div class="col">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Cyclone possible</h3> 
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
              </div>             
            </div>
            <div class="card-body collapse">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>PAYS</label>
                    <select class="form-control" id="paysC">
                        <option disabled selected></option>
                        <option>MADAGASCAR</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Date du cyclone</label>
                    <input type="date" id="dateC" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Direction</label>
                    <select class="form-control" id="directionC">
                        <option disabled selected></option>
                        <option>EST vers OUEST</option>
                        <option>EST vers NORD</option>
                        <option>EST vers SUD</option>
                        <option>OUEST vers EST</option>
                        <option>OUEST vers NORD</option>
                        <option>OUEST vers SUD</option>
                        <option>NORD vers EST</option>
                        <option>NORD vers SUD</option>
                        <option>NORD vers OUEST</option>
                        <option>SUD vers OUEST</option>
                        <option>SUD vers EST</option>
                        <option>SUD vers NORD</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Précipitation</label>
                    <input type="number" id="preC" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Vent</label>
                    <input type="number" id="ventC" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn btn-secondary btn-block" onclick="AddCyclone();">Ajouter</button>
                </div>
                <div class="col">
                  <button class="btn btn-secondary btn-block" data-target="#CycloneListe" data-toggle="modal" onclick="RecupClimat();">Liste</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Entrer les données</h3>
              <div class="card-tools">
                <?php echo $d." ".$m." ".$y; ?>

              </div>
            </div>
            <div class="card-body">
                    <div class="row">
                      <input type="text" id="idPersoAna" hidden value="<?php echo $idPerso; ?>">
                      <div class="col">
                        <div class="form-group">
                          <label>Pays</label>
                          <select class="form-control" id="pays" onchange="GetRegionPays(this.value);">
                            <option disabled selected></option>
                            <option>AFRIQUE DU SUD</option>
                            <option>MADAGASCAR</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Région</label>
                          <select class="form-control" id="region" onchange="GetDistrict(this.value);"></select>
                        </div>
                        <div class="form-group">
                          <label>District</label>
                          <select class="form-control" id="district"></select>
                        </div>
                        <div class="form-group">
                          <label>Période</label>
                          <input type="date" id="periode" class="form-control">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Débit de précipitation</label>
                          <input type="number" id="debitPre" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Température (°C)</label>
                          <input type="number" id="temperature" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Vitesse de vent (km/h)</label>
                          <input type="number" id="vitesseV" class="form-control">
                        </div><hr>                       
                        <input type="number" id="cycloneV" value="0" hidden>
                        <div class="form-group">
                          <label>Grêle</label>
                          <select class="form-control" id="greleV">
                            <option value="0">0%</option>
                            <option value="1">10%</option>
                            <option value="2">20%</option>
                            <option value="3">30%</option>
                            <option value="4">40%</option>
                            <option value="5">50%</option>
                            <option value="6">60%</option>
                            <option value="7">70%</option>
                            <option value="8">80%</option>
                            <option value="9">90%</option>
                            <option value="10">100%</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="">
                      <button class="btn btn-block btn-outline-secondary" onclick="AnalyseDonneCollecte();">Analyser</button>
                    </div>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card card-secondary">
                  <div class='card-header'>
                    <h3 class='card-title'>
                      Résultat
                    </h3>
                  </div>
                  <div class='card-body' id="resres"></div>
            </div>
        </div>

      </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function GetRegionPays(valeur) {
            var url = "controller/controllerPays/controller.pays.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                regionpays: valeur
              }),
              dataType: "text",
              success: function(res) {
                  $("#region").html("");
                  if (res=="ko") {
                      alert('Erreur');
                  }else{
                    $("#region").html(res);
                  }
              }
            });
  }
  function GetDistrict(valeur) {
            var url = "controller/controllerPays/controller.pays.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                regiond: valeur
              }),
              dataType: "text",
              success: function(res) {
                  $("#district").html("");
                  if (res=="ko") {
                      alert('Erreur');
                  }else{
                    $("#district").html(res);
                  }
              }
            });
  }
  function RecupRecap() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recupDonne: "go"
              }),
              dataType: "text",
              success: function(res) {
                  $("#recap").html(res);
              }
            });
  }
  function AddCyclone(){
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                addCyclone: $("#dateC").val(),
                direction: $("#directionC").val(),
                pays: $("#paysC").val(),
                preC: $("#preC").val(),
                ventC: $("#ventC").val(),
                idPerso: $("#idPersoAna").val()
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                  window.location.reload();
                }else{
                  alert(res)
                }
              }
            });
  }
  function AnalyseDonneCollecte() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                analyse: "go",
                periode: $("#periode").val(),
                precipitation: $("#debitPre").val(),
                temperature: $("#temperature").val(),
                vent: $("#vitesseV").val(),
                region: $("#region").val(),
                district: $("#district").val(),
                pays: $("#pays").val(),
                grele: $("#greleV").val(),
                cyclone: $("#cycloneV").val(),
                idPerso: $("#idPersoAna").val()
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ko") {
                  alert('Entrer les données');
                }else if(res=="koko"){
                  alert('Erreur');
                }else{
                  $("#resres").html(res);
                }
              }
            });
  }
  function EnvoieDonne(periode,precipitation,temperature,vent,region,pays,district,idPerso,cyclone,grele) {
         var url = "controller/controllerAgro/controller.agro.php";
          if (confirm("Confirmer votre demande ?")) {
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                confirmAnalyse: "go",
                periode: periode,
                precipitation:  precipitation,
                temperature: temperature,
                vent: vent,
                region: region,
                district: district,
                pays: pays,
                grele: grele,
                cyclone: cyclone,
                idPerso: idPerso
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
  RecupRecap();
</script>