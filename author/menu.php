<?php 
if(isset($_GET['menu'])){
  $menu=$_GET['menu'];
}
else{
  $menu="";
}

if($menu=="artikel"){
  include "artikel.php";
}

else if($menu=="edit_artikel"){
  include "edit_artikel.php";
}

else if($menu=="hapus_artikel"){
  include "hapus_artikel.php";
}

else if($menu=="tambah_artikel"){
  include "tambah_artikel.php";
}

else if($menu=="update_artikel"){
  include "update_artikel.php";
}

else if($menu=="simpan_artikel"){
  include "simpan_artikel.php";
}

else if($menu=="komentar"){
  include "komentar.php";
}

else{
  include "home.php";
}
?>