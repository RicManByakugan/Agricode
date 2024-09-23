<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-plus"></i>  Calendrier cultural</h1>
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
  <div class="row">
    <div class="col-sm-12">
        <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Ajout</h3> 
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
              </div> 
            </div>
            <div class="card-body collapse">
                <form  id="AddCalendar" enctype="multipart/form-data" action="controller/controllerAgro/controller.agro.php" target="ajoutCalendar" method="POST">
                  <div class="row">
                    <div class="col-sm-5">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Pays</label>
                                  <select class="form-control" id="paysaddC" name="paysaddC" onchange="GetRegionPaysAddC(this.value);" required>
                                    <option disabled selected></option>
                                    <option>AFRIQUE DU SUD</option>
                                    <option>MADAGASCAR</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Région</label>
                                  <select class="form-control" id="regionaddC" name="regionaddC" required></select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Nom culture</label>
                                  <select class='form-control' name="nomCulture" required>
                                    <option></option>
                                    <option value='Riz'>Riz</option>
                                    <option value='Mais'>Maïs</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Cycle de culture</label>
                                  <select class="form-control" name="typeCulture" required>
                                    <option></option>
                                    <option value='Courte'>Courte</option>
                                    <option value='Intermediaire'>Intermediaire</option>
                                    <option value='Long'>Long</option>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Variété</label>
                                  <input type="text" name="varieteCulture" class="form-control">
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-12">
                                <label>Préparation du sol</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="prearationCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="prearationCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="prearationCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="prearationCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>Semi plantation</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="semiplD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="semiplD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="semiplF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="semiplF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(1) Fertilisation</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="1FCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="1FCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="1FCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="1FCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(2) Fertilisation</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="2FCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="2FCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="2FCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="2FCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(3) Fertilisation</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="3FCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="3FCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="3FCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="3FCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(1) Sarclage</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="1SCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="1SCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="1SCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="1SCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(2) Sarclage</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="2SCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="2SCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="2SCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="2SCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(1) Butage</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="1BCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="1BCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="1BCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="1BCultureF1">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>(2) Butage</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="2BCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="2BCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="2BCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="2BCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>Recolte</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                    <small>Début</small>
                                    <div class="form-group">
                                      <select class="form-control" name="RecoldeCultureD1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="RecoldeCultureD2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <small>Fin</small>
                                    <div class="form-group">
                                      <select class="form-control" name="RecoldeCultureF1">
                                          <option></option>
                                          <option value='1'>Janvier</option>
                                          <option value='2'>Février</option>
                                          <option value='3'>Mars</option>
                                          <option value='4'>Avril</option>
                                          <option value='5'>Mai</option>
                                          <option value='6'>Juin</option>
                                          <option value='7'>Juillet</option>
                                          <option value='8'>Août</option>
                                          <option value='9'>Septembre</option>
                                          <option value='10'>Octobre</option>
                                          <option value='11'>Novembre</option>
                                          <option value='12'>Decembre</option>
                                        </select>
                                        <select class="form-control" name="RecoldeCultureF2">
                                          <option></option>
                                          <option value='1'>Division 1</option>
                                          <option value='2'>Division 2</option>
                                          <option value='3'>Division 3</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><hr>
                    </div>
                  </div>
                  <div class="row">
                    <button type="submit" class="btn btn-secondary btn-block" name="valideCalendarAdd">Valider</button>
                  </div>
                </form>
            </div>  
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Liste des calendrier</h3> 
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
              </div> 
            </div>
            <div class="card-body">
              <div class="card-body">
                <table class="table text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th>Nom</th>
                      <th>Variété</th>
                      <th>Cycle</th>
                      <th>Pays</th>
                      <th>Province</th>
                      <th>Région</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="listeCCCC"></tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
  </div>



  <!-- <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Région</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tbody id="listeOKOKOK"></tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="card" id="detailleListeOKOK"></div>
    </div>
  </div> -->
</section>
<iframe id="ajoutCalendar" name="ajoutCalendar" style="visibility: hidden;display: none;"></iframe>
<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function GetListeCalendar() {
            var url = "controller/controllerAgro/controller.agro.php";
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                recCalecal: "go"
              }),
              dataType: "text",
              success: function(res) {
                  $("#region").html("");
                  if (res=="ko") {
                      alert('Erreur');
                  }else{
                    $("#listeCCCC").html(res);
                  }
              }
            });
  }
  GetListeCalendar();
  function ResetForm(id) {
    var id= document.getElementById(id);
    id.reset();
  }
  function GetRegionPaysAddC(valeur) {
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
                    $("#regionaddC").html(res);
                  }
              }
            });
  }
  function GetAllRegionOK() {
    var url = "controller/controllerAgro/controller.agro.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
          listeRegionDok: "go",
          idPerso: <?php echo $idPerso; ?>
        }),
        dataType: "text",
        success: function(res) {
          $("#listeOKOKOK").html(res);
        }
    });
  }
  function AfficheDteilleC(idClimat) {
    var url = "controller/controllerAgro/controller.agro.php";
    $.ajax({
        type: "POST",
        url: url,
        data: ({
          DetailleRegionDok: idClimat,
          idPerso: <?php echo $idPerso; ?>
        }),
        dataType: "text",
        success: function(res) {
          $("#detailleListeOKOK").html(res);
          ScrollToTo('detailleListeOKOK');
        }
    });
  }
  function ValiderCalenndrier(idClimat) {
    var url = "controller/controllerAgro/controller.agro.php";
    if (confirm('Confirmez le mise à jour ?')) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
              valideCalendrier: idClimat,
              c1: $("#riz").val(),
              c2: $("#manioc").val(),
              c3: $("#autre").val(),
              idPerso: <?php echo $idPerso; ?>
            }),
            dataType: "text",
            success: function(res) {
              if (res="ok") {
                GetAllRegionOK();
                AfficheDteilleC(idClimat);
              }else{
                alert(res);
              }
            }
        });
    }
  }
  function ModifierCalenndrier(idClimat) {
    var url = "controller/controllerAgro/controller.agro.php";
    if (confirm('Confirmez le mise à jour ?')) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
              modifCalendrier: idClimat,
              c1: $("#rizm").val(),
              c2: $("#maniocm").val(),
              c3: $("#autrem").val(),
              idPerso: <?php echo $idPerso; ?>
            }),
            dataType: "text",
            success: function(res) {
              if (res="ok") {
                AfficheDteilleC(idClimat);
              }else{
                alert(res);
              }
            }
        });
    }
  }
  function SupprimerCalenndrier(idClimat) {
    var url = "controller/controllerAgro/controller.agro.php";
    if (confirm('Vider le climat ?')) {
        $.ajax({
            type: "POST",
            url: url,
            data: ({
              supCalendrier: idClimat,
              idPerso: <?php echo $idPerso; ?>
            }),
            dataType: "text",
            success: function(res) {
              if (res="ok") {
                GetAllRegionOK();
                $("#detailleListeOKOK").html("");
              }else{
                alert(res);
              }
            }
        });
    }
  }
  // GetAllRegionOK();
</script>