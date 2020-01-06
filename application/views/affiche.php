
<?php require_once "menu.php";?>

<div class="modal" id="myModal22">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Les categories</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
              <div class="modal-body">
              <table class="table table-hover">
                        <?php foreach($list as $l){?>
                        <tr>
                          <td><?php echo $l->id_categ ?></td>
                          <td><?php echo $l->categ?></td>
                          <td><a data-toggle="tooltip" title="Supprimer" style="color: red;" onclick="supp(<?php echo $l->id_categ ?>);">supprimer</a>
                          </td>
                        </tr>
                      <?php }?>
                    </table>
                  <form id="loginForm" method="post" class="form-horizontal" action="<?php echo base_url('main/add_categ');?>">

                    <div class="form-group">
                      <label class="col-xs-3 control-label">Nouvelle categorie</label>
                      <div class="col-xs-5">
                      <input type="text" class="form-control" name="nom_categ" placeholder="ajouter une nouvelle categorie" id="spinnerInput" required />
                      </div>
                    </div>

                    <div class="form-group">
                      <div style="float:right;">
                      <button type="submit" class="btn btn-primary">Ajouter</button>
                      </div>

                    </div>
                  </form>
              </div>
            
            </div>
          </div>
        </div>
<!--Main layout-->
<?php $rest=0; foreach($result as $r){?>

    <div class="bg-light p-3 container-fluid mt-5 pt-5">
        <div class="row"style="text-transform: capitalize;margin-left:22px;"><h1><?php echo $r->libelle?></h1><h3 style="margin-top:12px;margin-left:12px;">depuis <?php echo $r->date?></h3></div>
    </div>


  <div class=" container-fluid bg-blue">
    <div class="card">
      <div class="card-body">

          <div class="row">
                <div class="container">
                    <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <img src="<?php echo base_url()?>uploads/<?php echo $r->image?>" style="width:500px; height:300px" />
                          <div class="inblock padding-none hidden-xs">
                           
                            <a style="margin-left: 0px;" data-toggle="modal" data-target="#myModal003" class="btn btn-success">
                          modifier l'image
                          </a>
                          <div class="modal" id="myModal003">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">choisissez une photo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  
                                  <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="loginForm" method="post" class="form-horizontal" action="<?php echo base_url('main/update_image');?>" enctype="multipart/form-data">
                                    <input type="hidden" name="id_prod" value="<?php echo $r->id_produit?>" />

                                      <div class="form-group">
                                        <label class="col-xs-3 control-label">votre nouvel image</label>
                                        <div class="col-xs-5">
                                        <input type="file" id="file" class="btn btn-primary" name="image" onchange="verifile()" required/>                                        </div>
                                      </div>

                                      <div class="form-group" style="margin-left:320px; ">
                                        <div style="float:right;">
                                        <button type="submit" class="btn btn-success">Modifier</button>
                                        </div>

                                      </div>
                                    </form>
                                </div>
                              
                              </div>
                            </div>
                          </div>

                            </div>
                          
                      </div>
                           
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

                        <h1><a href="" data-toggle="modal" data-target="#myModal002">Combien vendus aujourd'hui?</a> </h1>

                              <div class="modal" id="myModal002">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">volume vendus aujourd'hui</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  
                                  <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="loginForm" method="post" class="form-horizontal" action="<?php echo base_url('main/add_vendus');?>">
                                    <input type="hidden" name="id_prods" value="<?php echo $r->id_produit?>" />
                                    <input type="hidden" name="libelle" value="<?php echo $r->libelle?>" />
                                      <div class="form-group">
                                        <label class="col-xs-3 control-label">Combien?!</label>
                                        <div class="col-xs-5">
                                        <input type="number" style="size: 50px" class="form-control" placeholder="Ajout des volumes Vendus??" name="v_vendus"/>
                                        </div>
                                      </div>

                                      <div class="form-group" style="margin-left:320px; ">
                                        <div style="float:right;">
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>

                                      </div>
                                    </form>
                                </div>
                              
                              </div>
                            </div>
                          </div>

                            <!-- Table  -->
                            <table class="table table-hover">
                              <!-- Table head -->
                              <thead class="blue-grey lighten-4" style="text-transform: capitalize;">
                                <tr>
                                  <th>Libellé</th>
                                  <th>Volumes</th>
                                  <th>volume vendus</th>
                                  <th>volume restes</th>
                                </tr>
                              </thead>
                              <!-- Table head -->

                              <!-- Table body -->
                              <tbody>
                                  <tr data-toggle="modal" data-target="#myModal<?php echo $r->id_produit?>">
                                  <td style="" ><b><?php echo $r->libelle ?></b></td>
                                  <td><?php echo $r->volume?> kgs</td>
                                  <td><?php if(($r->volume_vendus) > ($r->volume)){
                                              echo $r->volume;
                                                }     
                                                 else echo $r->volume_vendus?> kgs</td>
                                  <td><?php if(($r->volume_vendus)!=0){
                                    $rest = (($r->volume) - ($r->volume_vendus));
                                    if($rest <= 0) echo 0;
                                    else echo $rest;
                                  }else 
                                  echo $r->volume; ?> kgs</td>
                                </tr>
                              </tbody>
                              <!-- Table body -->
                            </table>
                        </div>
                          
                    </div>
                    <div class="supp" style="float:right;">
                            <a class="btn btn-danger" onclick="supp_prod(<?php echo $r->id_produit ?>);">
                            supprimer</a>
                          </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  
  <?php }?>

<?php require_once "footer.php";?>
