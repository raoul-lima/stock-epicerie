<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/styleLog.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/template/mdb.min.css">
     <link rel="stylesheet" href="<?php echo base_url()?>assets/template/bootstrap.min.css">
  </head>
  <body >
          <div class="loginBox">
        <h3>Vos identifiants</h3>

          <form class="contact100-form validate-form" method="post" action="<?php echo base_url()?>login/verify">
          <div class="form-group">
            <label>Utilisateur </label>
            <input type="text" class="form-control" name="identifiant" placeholder="Mon identifiant" required>
            <span class="text-danger"><?php echo form_error('identifiant');?></span>
          </div>

          <div class="form-group">
            <label>Mot de passe </label>
            <input type="password" class="form-control" name="password" placeholder="Mon mot de passe" required>
            <span class="text-danger"><?php echo form_error('password');?></span>
          </div>

          <div class="form-group" style="float:right;">
          <input type="submit" class="btn btn-info" name="insert" value="login">
          <span class="text-danger"><?php echo $this->session->flashdata('error')?></span>

          </div>
            </form>

            </div>
  </body>
</html>
