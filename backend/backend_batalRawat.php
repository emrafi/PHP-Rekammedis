<?php
include "koneksi.php";
if (isset($_POST['hapus'])) {
  $id=$_POST['id'];
  $sql="Delete from tb_pendaftaran where id_rawat='$id'";
  $batal=mysqli_query($koneksi,$sql);

  if ($batal) {
    ?>
    <script type="text/javascript">
    swal({
      title: "Hapus Data!",
      text: "Apakah anda yakin menghapus data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-warning",
      confirmWarningText: "Ya, Keluar",
      closeOnConfirm: false
    },
    function() {
      swal({
        title: "Berhasil",
        text: "Data dihapus",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=rawat";
      });
    });
    </script>
    <?php
  }
}
if (isset($_POST['batalRawat'])) {
$id=$_POST['id'];
$sql1="select nama from tb_pendaftaran where id_rawat='$id'";
$cek=mysqli_query($koneksi,$sql1);
while ($row=mysqli_fetch_object($cek))
{
  $nama1 = $row->nama;
}

$sql="Delete from tb_pendaftaran where id_rawat='$id'";
$batal=mysqli_query($koneksi,$sql);

if ($batal) {
  ?>
  <script type="text/javascript">
  swal({
    title: "Konfirmasi Pembatalan",
    text: "Apakah saudara/i <?php echo $nama1?> membatalkan pendaftaran?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-warning",
    confirmWarningText: "Ya, Tidak",
    closeOnConfirm: false
  },
  function() {
    swal({
      title: "Berhasil",
      text: "Pendaftaran dibatalkan",
      type: "success",
      confirmButtonText: "Oke",
      closeOnConfirm: false
    },
    function(){
      window.location="?m=rawat";
    });
  });
  </script>
  <?php
}
}
 ?>
