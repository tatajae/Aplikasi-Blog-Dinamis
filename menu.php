<?php 
if(isset($_GET['menu'])){
  $menu=$_GET['menu'];
}
else{
  $menu="";
}

if($menu=="komentar"){
  include "komentar.php";
}

else if($menu=="edit_komentar"){
  include "edit_komentar.php";
}

else if($menu=="hapus_komentar"){
  include "hapus_komentar.php";
}

else if($menu=="tambah_komentar"){
  include "tambah_komentar.php";
}

else if($menu=="update_komentar"){
  include "update_komentar.php";
}

else if($menu=="simpan_komentar"){
  include "simpan_komentar.php";
}

else if($menu=="detail_artikel"){
  include "detail_artikel.php";
}

else{
  include "home.php";
}
?>