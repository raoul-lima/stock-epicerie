function supp(id){
  if(confirm("Voulez-vous vrament supprimer?")){
    window.location.href='<?php echo base_url()?>main/delete_categ/'+id; 
  return true;
  }
}