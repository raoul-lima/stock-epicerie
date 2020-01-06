  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright 
      <a href="#"> By Lima </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->
<script>
function supp_categ(id){
  if(confirm("Voulez-vous vrament supprimer?")){
    window.location.href='<?php echo base_url()?>main/delete_categ/'+id; 
  return true;
  }
}
function supp_prod(id){
if(confirm("Voulez-vous vraiment supprimer le produit?")){
  window.location.href='<?php echo base_url()?>main/delete_produit/'+id; 
return true;
}
}
function verifile(){
	var fileInput = document.getElementById("file");
	var filePath = fileInput.value;
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

		if(!allowedExtensions.exec(filePath)){
			alert("Des fichiers d'extensions .jpg, .jpeg, .png, .gif seulement s'il vous plait.")
			fileInput.value='';
			return false; 

	}
	else{
		return true;
	}
}
  </script>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="http://localhost/gestion/assets/template/jquery-3.4.1.min.js"></script>

  <script type="text/javascript" src="http://localhost/gestion/assets/template/popper.min.js"></script>

  <script type="text/javascript" src="http://localhost/gestion/assets/template/bootstrap.min.js"></script>

  <script type="text/javascript" src="http://localhost/gestion/assets/template/mdb.min.js"></script>
  </body>

</html>
