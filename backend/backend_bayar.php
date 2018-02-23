<?php
include "koneksi.php";

if (isset($_POST['bayar'])) {
$id_transaksi = $_POST['id_transaksi'];
$id_pasien = $_POST['id_pasien'];

$sql = "SELECT nama from tb_pasien inner join tb_transaksi on tb_transaksi.id_pasien = tb_pasien.id_pasien where tb_transaksi.id_pasien = '$id_pasien'";
$id=mysqli_query($koneksi,$sql);
while ($row=mysqli_fetch_object($id))
{
  $nama1 = $row->nama;
}

$cek="select status_bayar from tb_transaksi where id_transaksi='$id_transaksi'";
$cek_status=mysqli_query($koneksi,$cek);
while ($row=mysqli_fetch_object($cek_status))
{
  $status = $row->status_bayar;
}

if ($status=='Lunas') {
  ?>
  <script type="text/javascript">
    swal("Konfirmasi Pembayaran","Saudara/i <?php echo $nama ?> telah melakukan pembayaran ","info");
  </script>
  <?php
}else {
  $sql1 = "UPDATE tb_transaksi set status_bayar = 'Lunas' where id_transaksi= '$id_transaksi'";
  $bayar = mysqli_query($koneksi,$sql1);

  if ($bayar) {
    ?>
    <script type="text/javascript">
    swal({
      title: "Konfirmasi Pembayaran",
      text: "Apakah saudara/i <?php echo $nama1?> sudah membayar?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-warning",
      confirmWarningText: "Sudah, belum",
      closeOnConfirm: false
    },
    function() {
      swal({
        title: "Berhasil",
        text: "Data transaksi disimpan",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=pembayaran";
      });
    });
    </script>
    <?php
}
}
}
 ?>
