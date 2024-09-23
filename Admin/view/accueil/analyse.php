<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-eye"></i>  Analyse</h1>
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
        <div class="card">
          <div class="container-fluid">
              <div class="container-fluid">
                <h2 class="text-center display-4">Selectionnez le pays</h2>
              </div>
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                          <div class="input-group input-group-lg">
                              <select class="form-control" id="PaysAnalyse" onchange="GetRegionPaysAnalyse(this.value);">
                                <option disabled selected></option>
                                <option>AFRIQUE DU SUD</option>
                                <!-- <option>ALGERIE</option> -->
                                <!-- <option>ANGOLA</option> -->
                                <!-- <option>BENIN</option> -->
                                <!-- <option>BOTSWANA</option> -->
                                <!-- <option>BURKINA FASO</option> -->
                                <!-- <option>BURUNDI</option> -->
                                <!-- <option>CAMEROUN</option> -->
                                <!-- <option>CAP-VERT</option> -->
                                <!-- <option>REPUBLIQUE CENTRAFRICAINE</option> -->
                                <!-- <option>COMORES</option> -->
                                <!-- <option>REPUBLIQUE DU CONGO</option> -->
                                <!-- <option>REPUBLIQUE DEMOCRATIQUE DU CONGO</option> -->
                                <!-- <option>COTE IVOIRE</option> -->
                                <!-- <option>DJIBOUTI</option> -->
                                <!-- <option>EGYPTE</option> -->
                                <!-- <option>ERYTHREE</option> -->
                                <!-- <option>ESWATINI</option> -->
                                <!-- <option>ETHIOPIE</option> -->
                                <!-- <option>GABON</option> -->
                                <!-- <option>GAMBIE</option> -->
                                <!-- <option>GHANA</option> -->
                                <!-- <option>GUINEE</option> -->
                                <!-- <option>GUINEE-BISSAU</option> -->
                                <!-- <option>GUINEE EQUATORIAL</option> -->
                                <!-- <option>KENYA</option> -->
                                <!-- <option>LESOTHO</option> -->
                                <!-- <option>LIBERIA</option> -->
                                <!-- <option>LIBYE</option> -->
                                <option>MADAGASCAR</option>
                                <!-- <option>MALAWI</option> -->
                                <!-- <option>MALI</option> -->
                                <!-- <option>MAROC</option> -->
                                <!-- <option>MAURICE</option> -->
                                <!-- <option>MAURITANIE</option> -->
                                <!-- <option>MOZAMBIQUE</option> -->
                                <!-- <option>NAMIBIE</option> -->
                                <!-- <option>NIGER</option> -->
                                <!-- <option>NIGERIA</option> -->
                                <!-- <option>OUGANDA</option> -->
                                <!-- <option>RWANDA</option> -->
                                <!-- <option>SAO TOME-ET-PRINCIPE</option> -->
                                <!-- <option>SENEGAL</option> -->
                                <!-- <option>SEYCHELLES</option> -->
                                <!-- <option>SIERRA LEONE</option> -->
                                <!-- <option>SOMALIE</option> -->
                                <!-- <option>SOUDAN</option> -->
                                <!-- <option>SOUDAN DU SUD</option> -->
                                <!-- <option>TANZANIE</option> -->
                                <!-- <option>TCHAD</option> -->
                                <!-- <option>TOGO</option> -->
                                <!-- <option>TUNISIE</option> -->
                                <!-- <option>ZAMBIE</option> -->
                                <!-- <option>ZIMBABWE</option> -->
                              </select>
                          </div>
                  </div>
              </div>

              <div class="container-fluid">
                <h2 class="text-center display-4">Région</h2>
              </div>
              
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                          <div class="input-group input-group-lg">
                              <select class="form-control" id="regionAnalyse" onchange="GetDisttrictSelect(this.value);"></select>
                          </div>
                  </div>
              </div>

              <div class="container-fluid">
                <h6 class="text-center display-4">District</h6>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                          <div class="input-group input-group-lg">
                              <select class="form-control" id="selectReche"></select>
                              <div class="input-group-append">
                                  <button class="btn btn-lg btn-default" onclick="RechercheAnalyse();"><i class="fa fa-search"></i></button>
                              </div>
                          </div>
                </div>
              </div>

              <div class="row mt-3">
                  <div class="col-md-10 offset-md-1">
                      <div class="list-group" id="listSe"></div>
                  </div>
              </div>

          </div>
        </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function GetRegionPaysAnalyse(valeur) {
            var url = "controller/controllerPays/controller.pays.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                regionpays: valeur
              }),
              dataType: "text",
              success: function(res) {
                  $("#regionAnalyse").html("");
                  if (res=="ko") {
                      alert('Erreur');
                  }else{
                    $("#regionAnalyse").html(res);
                  }
              }
            });
  }
  function GetDisttrictSelect(valeur) {
            var url = "controller/controllerPays/controller.pays.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                regiond: valeur
              }),
              dataType: "text",
              success: function(res) {
                  $("#selectReche").html("");
                  if (res=="ko") {
                      alert('Erreur');
                  }else{
                    $("#selectReche").html(res);
                  }
              }
            });
  }
  function RechercheAnalyse() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recheAnalyse: $("#selectReche").val(),
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                $("#listSe").html(res);
              }
            });
  }
</script>