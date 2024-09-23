
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-calendar"></i>  Liste Calendrier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a><?php echo $user['nom']." ".$user['prenom']; ?></a></a></li>
              <li class="breadcrumb-item active">MAGRITECH</li>
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
                    <h3 class="card-title">Région</h3>
                  </div>
                  <div class="card-body">
                    <!-- <input class="form-control" id="disinput" type="text" placeholder="Cherchez...."><br> -->
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th style="width: 40px">Période</th>
                          <th>District</th>
                          <th>Région</th>
                          <th style="width: 40px">Action</th>
                        </tr>
                      </thead>
                      <tbody id="LISTEcrd"></tbody>
                    </table>
                  </div>
                </div>
        </div>
      </div>
  </div>
</section>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
	function GetCalendarDisitriListe() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                listeCRDKAZ: "go",
                idPerso: <?php echo $idPerso; ?>
              }),
              dataType: "text",
              success: function(res) {
                $("#LISTEcrd").html(res);
              }
            });
  }
  GetCalendarDisitriListe();
</script>