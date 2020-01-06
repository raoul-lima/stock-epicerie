
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
                          <td><a data-toggle="tooltip" title="Supprimer" style="color: red;" onclick="supp_categ(<?php echo $l->id_categ ?>);">supprimer</a>
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

                    <div class="form-group" style="margin-left:320px; ">
                      <div class="">
                      <button type="submit" class="btn btn-primary">Ajouter</button>
                      </div>

                    </div>
                  </form>
              </div>
            
            </div>
          </div>
        </div>
<!--Main layout-->

    <div class="bg-light p-3 container-fluid mt-5 pt-5">
        <h1 style="margin-left: 15px;"><a href="" data-toggle="modal" data-target="#myModal00">Ajouter un produit</a></h1>
    
            <div class="modal" id="myModal00">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Ajout du produit pour aujourd'hui</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                <div class="modal-body">
                    <form id="loginForm" method="post" class="form-horizontal" action="<?php echo base_url('main/add_produit');?>">

                      <select id="pet-select" style="margin-bottom: 20px; padding: 7px; width: 465px;" name="option" required>
                          <option value="">Choisissez une categorie ici</option>
                          <?php foreach($list as $l){?>
                          <option value="<?php echo $l->id_categ ?>" required><?php echo $l->categ ?></option>
                        <?php }?>
                      </select>
                      <div class="form-group">
                        <label class="col-xs-3 control-label">Libelle</label>
                        <div class="col-xs-5">
                        <input type="text" class="form-control" name="libelle" placeholder="Nom du produit" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-xs-3 control-label">Volume</label>
                        <div class="col-xs-5">
                        <input type="number" class="form-control" name="volume" placeholder="Volume obligatoire.." required />
                        </div>
                      </div>

                      <div class="form-group" style="margin-left:320px; ">
                        <div class="">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>

                      </div>
                    </form>
                </div>
              
              </div>
            </div>
          </div>

    </div>

    <div class="container row">
    <?php foreach($result as $r){?>
            <div class="col-xs-12 col-md-12 col-lg-4 col-xl-4 mt-4">
                <div class="p-3 clearfix">
                    <h2 style="text-transform: capitalize;">
                    <?php echo $r->libelle?>
                    </h2>
                    <img style="width:350px; height:200px" src="<?php echo base_url()?>uploads/<?php echo $r->image?>" class="" />
                    <hr>
                    <p>
                    <?php if(($r->volume_vendus)!=0){
                      $rest = (($r->volume) - ($r->volume_vendus));
                      if($rest <= 0) echo 0;
                      else echo $rest;
                    }else 
                    echo $r->volume; ?> kg(s) en stock</p>
                    <a href="<?php echo base_url()?>main/affiche/<?php echo $r->id_produit?>" class="btn btn-primary">
                        gerer
                    </a>
                </div>

            </div>
            <?php }?>
    </div>


     </div>
     <!--le grid row-->
   </div>
 </div>
</div>

</main>

<script>

</script>

<?php require_once "footer.php";?>
