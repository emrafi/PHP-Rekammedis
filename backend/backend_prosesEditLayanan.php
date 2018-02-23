<?php
include "koneksi.php";
if (isset($_POST['ubahLayanan'])) {
$id_rawat = $_POST['id_rawat'];
$jenis_poli = $_POST['jenis_poli'];

$sql1="select nama from tb_pendaftaran where id_rawat='$id_rawat'";
$cek=mysqli_query($koneksi,$sql1);
while ($row=mysqli_fetch_object($cek)) {
  $nama1=$row->nama;
}

$sql="UPDATE tb_pendaftaran set proses = '$jenis_poli' where id_rawat='$id_rawat'";
$ubah=mysqli_query($koneksi,$sql);

if ($ubah) {
  ?>
  <script type="text/javascript">
    swal({
      title: "Perubahan layanan!",
      text: "Layanan saudara/i <?php echo $nama1?> telah dirubah",
      type: "success",
      confirmButtonText: "Oke",
      closeOnConfirm: false
    },
    function(){
      window.location="?m=rawat";
    });
  </script>
  <?php
}else {
  ?>
  <script type="text/javascript">
    swal({
      title: "Maaf",
      text: "Data gagal dirubah!",
      type: "error",
      confirmWarningText: "Oke",
    },
    function (){
      window.location='?m=rawat';
    });
  </script>
  <?php
}
}

 ?>
