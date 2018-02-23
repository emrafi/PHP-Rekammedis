<?php
include "koneksi.php";

if (isset($_POST['ambil'])) {
$id_transaksi =$_POST['id_transaksi'];
$id_pasien =$_POST['id_pasien'];

$query = "SELECT tb_pasien.id_pasien,tb_pasien.nama,tb_transaksi.status_bayar,tb_transaksi.no_rm,tb_resep_obat.status from tb_transaksi inner join tb_pasien on tb_transaksi.id_pasien=tb_pasien.id_pasien inner join tb_resep_obat on tb_transaksi.no_rm=tb_resep_obat.no_rm where tb_transaksi.id_transaksi= '$id_transaksi'";

// die(var_dump($query));

$sql = mysqli_query($koneksi,$query);
while ($row=mysqli_fetch_object($sql))
{
  $cek_status = $row->status_bayar;
  $nama = $row->nama;
  $no_rm = $row->no_rm;
  $status_obat = $row->status;
}

if ($cek_status=="Belum Lunas") {
  ?>
  <script type="text/javascript">
    swal("Tagihan Pembayaran","Saudara/i <?php echo $nama ?> belum melakukan pembayaran","error");
  </script>
  <?php
}elseif ($status_obat=="Tidak Ada Obat") {
  ?>
  <script type="text/javascript">
    swal("Pengambilan Obat","Tidak ada obat untuk saudara/i <?php echo $nama ?> ","info");
  </script>
  <?php
}elseif ($status_obat=="Diambil") {
  ?>
  <script type="text/javascript">
    swal("Pengambilan Obat","Obat untuk saudara/i <?php echo $nama  ?> sudah diambil","info");
  </script>
  <?php
}else{
  $update = mysqli_query($koneksi,"UPDATE tb_resep_obat set status = 'Diambil' where no_rm= '$no_rm'");
// die(var_dump("UPDATE tb_transaksi set status = 'Diambil' where no_rm= "$no_rm""));
if ($update) {
  ?>
<script type="text/javascript">
  swal({
    title: "Pengambilan Obat!",
    text: "Obat untuk saudara/i <?php echo $nama ?> telah diambil",
    type: "success",
    confirmButtonText: "Oke",
    closeOnConfirm: false
  },
  function(){
    window.location="?m=pengambilanObat";
  });
  </script>
  <?php
}
}
}
 ?>
