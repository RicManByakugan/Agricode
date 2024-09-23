<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-history"></i>  Historique</h1>
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
              <div class="card-header border-transparent">
                <h3 class="card-title">Action effectué</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-bordered table-responsive m-0">
                    <thead class="text-center">
                    <tr>
                      <th>Personnel</th>
                      <th>Action</th>
                      <th>Date</th>
                      <th>Heure</th>
                    </tr>
                    </thead>
                    <tbody id="listeHisto" class="text-center">
                    
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary float-left" onclick="GetHistoriqueAll();">Voir tout</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-outline-secondary float-right" onclick="GetHistorique();">Par défaut</a>
              </div>
            </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function GetHistorique() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                hsitoBabe: "go"
              }),
              dataType: "text",
              success: function(res) {
                $("#listeHisto").html(res);
              }
            });
  }
  function GetHistoriqueAll() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                hsitoBabeall: "go"
              }),
              dataType: "text",
              success: function(res) {
                $("#listeHisto").html(res);
              }
            });
  }
  GetHistorique();
</script>