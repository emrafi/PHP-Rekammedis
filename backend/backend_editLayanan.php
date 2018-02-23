<?php
include "koneksi.php";
$id=$_GET['id'];
$query = "SELECT proses from tb_pendaftaran where id_rawat='$id'";
$edit = mysqli_query($koneksi,$query);
$row=mysqli_fetch_object($edit);
 ?>
<div id="id_rawat"><?php echo $id ?></div>
<div id="layanan"><?php echo $row->proses ?></div>
