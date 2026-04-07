<?php 
session_start();
if(isset($_GET['menu'])){
  $menu=$_GET['menu'];
}
else{
  $menu="";
}

if($menu=="artikel"){
  include "artikel.php";
}

else if($menu=="pengguna"){
  include "pengguna.php";
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

else if($menu=="tambah_pengguna"){
  include "tambah_pengguna.php";
}

else if($menu=="edit_pengguna"){
  include "edit_pengguna.php";
}

else if($menu=="hapus_pengguna"){
  include "hapus_pengguna.php";
}

else if($menu=="simpan_pengguna"){
  include "simpan_pengguna.php";
}

else if($menu=="kategori"){
  include "kategori.php";
}

else if($menu=="simpan_kategori"){
  include "simpan_kategori.php";
}

else if($menu=="tambah_kategori"){
  include "tambah_kategori.php";
}

else if($menu=="edit_kategori"){
  include "edit_kategori.php";
}

else if($menu=="update_kategori"){
  include "update_kategori.php";
}

else if($menu=="hapus_kategori"){
  include "hapus_kategori.php";
}

else if($menu=="tag"){
  include "tag.php";
}

else if($menu=="simpan_tag"){
  include "simpan_tag.php";
}

else if($menu=="tambah_tag"){
  include "tambah_tag.php";
}

else if($menu=="edit_tag"){
  include "edit_tag.php";
}

else if($menu=="update_tag"){
  include "update_tag.php";
}

else if($menu=="hapus_tag"){
  include "hapus_tag.php";
}

else if($menu=="komentar"){
  include "komentar.php";
}

else if($menu=="approve_komentar"){
  include "approve_komentar.php";
}

else if($menu=="hapus_komentar"){
  include "hapus_komentar.php";
}

else if($menu=="laporan_statistik"){
  include "laporan_statistika.php";
}

else{
  include "home.php";
}
?>