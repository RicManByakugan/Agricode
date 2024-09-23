<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-spinner"></i>  Bilan</h1>
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
  <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pays</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Choisissez le pays</label>
                <select class="form-control" onchange="GetPaysRD(this.value);">
                  <option></option>
                  <option>AFRIQUE DU SUD</option>
                  <option>MADAGASCAR</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Région & district : <span id="paysyid"></span></h3>
                  </div>
                  <div class="card-body">
                    <input class="form-control" id="disinput" type="text" placeholder="Cherchez...."><br>
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th style="width: 40px">Période</th>
                          <th>Restante</th>
                          <th>Pays</th>
                          <th>District</th>
                          <th>Région</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody id="listeRDA"></tbody>
                    </table>
                  </div>
            </div>
        </div>
      </div>
  </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function GetPaysRD(val) {
    GetRegionDisitricic(val);
    $("#paysyid").html(val);
  }
  function GetRegionDisitricic(pays) {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                listeRDAA: pays,
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                $("#listeRDA").html(res);
              }
            });
  }
  $(document).ready(function(){
      $("#disinput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#listeRDA tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
  });
</script>