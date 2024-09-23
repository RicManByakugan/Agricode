<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-search"></i>  <span id="ln13">Zone</span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">AGRICODE</li>
            </ol>
          </div>
        </div>
      </div>
</section>

<section class="content container">
        <div class="card card-success card-outline">
           <div class="card-header">
          	  <div class="row">
          	  	<div class="col">
          	  		<h4 class="card-title text-muted" id="ln14">Entrer votre pays</h4>
          	  	</div>
          	  </div>
           </div>
           <div class="card-body">
           		<div class="container-fluid">
	              <div class="row">
	                <div class="col-md-4">
	                  		<label id="ln15">Pays</label>
	                        <div class="input-group input-group-lg">
	                              <select class="form-control" id="paysu" onchange="GetRegionPays(this.value);">
	                                <option disabled selected></option>
	                                <option>MADAGASCAR</option>
	                                <option>AFRIQUE DU SUD</option>
	                              </select>
	                        </div>
	                </div>
	                <div class="col-md-4">
	                  		<label id="ln16">Province ou région</label>
	                        <div class="input-group input-group-lg">
	                              <select class="form-control" id="regiona" onchange="GetDistrict(this.value);"></select>
	                        </div>
	                </div>
	                <div class="col-md-4">
	                  		<label id="ln17">District</label>
	                        <div class="input-group input-group-lg">
	                              <select class="form-control" id="selectReche"></select>
	                              <div class="input-group-append">
	                                  <button class="btn btn-lg btn-default" onclick="RechercheAnalysePays();"><i class="fa fa-search"></i></button>
	                              </div>
	                        </div>
	                </div>
	              </div>
	          </div>
           </div>
        </div>

        <div class="card" id="listeRUser"></div>
        <div class="card" id="listeRUserPDF" style="display:none;"></div>
</section>

<script src="content/jquery/jquery.min.js"></script>
<script src="content/pdf/jszip.min.js"></script>
<script src="content/pdf/kendo.all.min.js"></script>
<script type="text/javascript">
  function LoadPdfCalendar(district) {
        var divv = document.getElementById('listeRUserPDF');
        divv.style.display = "block";
         kendo.drawing
        .drawDOM("#listeRUserPDF", 
        { 
            paperSize: "A3",
            margin: { top: "1cm", bottom: "1cm" },
            scale: 0.8,
            height: 500
        })
        .then(function(group){
            <?php if (isset($_SESSION['langue']) && $_SESSION['langue']=="Malagasy") { ?>
              alert("Miandrasa kely azafady ... ");
            <?php } ?>
            <?php if (isset($_SESSION['langue']) && $_SESSION['langue']=="Anglais") { ?>
              alert("Wait a moment please ... ");
            <?php } ?>
            <?php if (isset($_SESSION['langue']) && $_SESSION['langue']=="Francais") { ?>
              alert("Un instant s'il vous plaît ... ");
            <?php } ?>
            kendo.drawing.pdf.saveAs(group, "AgriCode-"+district+".pdf")
            divv.style.display = "none";
        }); 
  
  }
  function ScrollToTo(id) {
          document.getElementById(id).scrollIntoView({
            behavior: 'smooth'
          });
  }
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
                  $("#regiona").html("");
                  if (res=="ko") {
                      alert('Erreur | Error | Misy tsy milamina');
                  }else{
                    $("#regiona").html(res);
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
                  $("#selectReche").html("");
                  if (res=="ko") {
                      alert('Erreur | Error | Misy tsy milamina');
                  }else{
                    $("#selectReche").html(res);
                  }
              }
            });
  }
  function Renialize(idCycle) {
        var idCOLCOL = document.getElementById(idCycle); 
        idCOLCOL.value = "";
        $("#afficheInfooof").html("");
  }
  function AfficheInfoInfo(idcol,cycle,region) {
        var idCOLCOL = document.getElementById(idcol); 
        var url = "controller/controllerAgro/controller.agro.php";
        valeur = idCOLCOL.value;
        if (valeur!="") {
            if (cycle!="") {
              $.ajax({
                type: "POST",
                url: url,
                data: ({
                  infoinfo: valeur,
                  cycle: cycle,
                  region: region
                }),
                dataType: "text",
                success: function(res) {
                    $("#afficheInfooof").html("");
                    ScrollToTo('afficheInfooof');
                    $("#afficheInfooof").html(res);
                }
              });
            }else{
              $("#afficheInfooof").html("");
            }
        }else{
          alert("Choisissez le type de culture");
        }
  }
  function RechercheAnalysePays() {
        $("#listeRUser").html("<div class='col text-center'><div class='spinner-border text-success'></div></div>");
  			var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                paysRecherche: $("#paysu").val(),
                region: $("#regiona").val(),
                district: $("#selectReche").val()
              }),
              dataType: "text",
              success: function(res) {
                var d = $("#selectReche").val();
                var p = $("#paysu").val();
                var R = $("#regiona").val();
                RecupCNotif(d);
                RecupCNotifValue(d);
                RecupCNotifVatana(d);
                RecupAlertAmbonyVatana(d);
                DonnePDF(p,d,R);
                // setInterval("RecupCNotif("+d+")",2000);
                // setInterval("RecupCNotifValue("+d+")",2000);
                // setInterval("RecupCNotifVatana("+d+")",2000);
                if(d.length > 15){
                  var r = d.slice(0, 15);
                  $("#zoneAct").html(r);
                }else{
                  $("#zoneAct").html(d);
                }

                $("#listeRUser").html(res);
              }
            });
  }
  function DonnePDF(p,d,R) {
          var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                dRecherchePDF: d,
                region: R,
                pRecherchePDF: p
              }),
              dataType: "text",
              success: function(res) {
                $("#listeRUserPDF").html(res);
              }
            });
  }
  function RecupCNotif(district) {
        var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                districtCN: district
              }),
              dataType: "text",
              success: function(res) {
                $("#listeCNotif").html(res);
                if (res!=0) {
                  $("#listeCNotifAA").html("Aujourd'hui");
                }else{
                  $("#listeCNotifAA").html("");
                }
              }
            });
  }
  function RecupCNotifValue(district) {
        var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                districtCNValue: district
              }),
              dataType: "text",
              success: function(res) {
                $("#listeCNotifValue").html(res);
              }
            });
  }
  function RecupCNotifVatana(district) {
        var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                districtCNVatana: district
              }),
              dataType: "text",
              success: function(res) {
                $("#notifvatana").html(res);
              }
            });
  }
  function RecupAlertAmbonyVatana(district) {
        var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                districtAAVAVatana: district
              }),
              dataType: "text",
              success: function(res) {
                $("#notifalertwar").html(res);
              }
            });
  }
  function RecupDetailleClimat(idClimat) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recupDetailleC: idClimat
              }),
              dataType: "text",
              success: function(res) {
                $("#donneClimatDetaille").html(res); 
              }
            });
  }
  function RecupDetailleCalendar(andro,idClimat) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recupDetailleCale: idClimat,
                andro: andro
              }),
              dataType: "text",
              success: function(res) {
                $("#donneCalendarDetaille").html(res); 
              }
            });
  }
</script>
