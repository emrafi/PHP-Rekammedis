<?php
include "koneksi.php";
$id=$_GET['id'];
$query = "SELECT nama,tgl_lahir,jk,agama,pekerjaan,pendidikan,alamat FROM tb_pasien where id_pasien ='$id'";
$edit = mysqli_query($koneksi,$query);
$row=mysqli_fetch_object($edit);
 ?>
<div id="id_pasien"><?php echo $id ?></div>
<div id="nama_pasien"><?php echo $row->nama ?></div>
<div id="tgl_lahir_pasien"><?php echo $row->tgl_lahir ?></div>
<div id="jk"><?php echo $row->jk ?></div>
<div id="agama"><?php echo $row->agama ?></div>
<div id="pekerjaan"><?php echo $row->pekerjaan ?></div>
<div id="pendidikan"><?php echo $row->pendidikan ?></div>
<div id="alamat"><?php echo $row->alamat ?></div>
