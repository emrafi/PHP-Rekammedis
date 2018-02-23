<?php
include "koneksi.php";
$id = $_GET['id'];
$query = "SELECT * FROM tb_karyawan where id_karyawan='$id'";
$edit = mysqli_query($koneksi,$query);
$row=mysqli_fetch_object($edit);
 ?>
<div id="id_karyawan"><?php echo $id ?></div>
<div id="nama"><?php echo $row->nama ?></div>
<div id="tgl_lahir"><?php echo $row->tgl_lahir ?></div>
<div id="alamat"><?php echo $row->alamat ?></div>
<div id="noHp"><?php echo $row->no_hp ?></div>
