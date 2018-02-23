<?php
include "koneksi.php";
$id = $_GET['id'];
$query = "SELECT NIP,nama,jenis_poli,jk,alamat,no_hp FROM tb_dokter where NIP='$id'";
$edit = mysqli_query($koneksi,$query);
$row=mysqli_fetch_object($edit);
 ?>
<div id="nip"><?php echo $row->NIP ?></div>
<div id="nama"><?php echo $row->nama ?></div>
<div id="jenis_poli"><?php echo $row->jenis_poli ?></div>
<div id="jk"> <?php echo $row->jk ?></div>
<div id="alamat"><?php echo $row->alamat ?></div>
<div id="no_hp"><?php echo $row->no_hp ?></div>
