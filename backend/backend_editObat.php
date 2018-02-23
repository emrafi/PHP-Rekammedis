<?php
include "koneksi.php";
$id=$_GET['id'];
$query = "SELECT nama_obat,jenis_obat,kategori_obat,harga_obat,stok_obat FROM tb_obat where id_obat='$id'";
$edit = mysqli_query($koneksi,$query);
$row=mysqli_fetch_object($edit);
 ?>
<div id="id_obat"><?php echo $id ?></div>
<div id="nama_obat"><?php echo $row->nama_obat ?></div>
<div id="kategori_obat"><?php echo $row->kategori_obat ?></div>
<div id="jenis_obat"><?php echo $row->jenis_obat ?></div>
<div id="harga_obat_edit"> <?php echo $row->harga_obat ?></div>
<div id="stok_obat"><?php echo $row->stok_obat ?></div>
