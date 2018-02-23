<?php
include "koneksi.php";

if (isset($_POST['selesai'])) {
$id_pasien = $_POST['id'];
$no_rm = $_POST['no_rm'];
$no_cm = $_POST['no_cm'];
$tgl_transaksi = date('Y-m-d');

$sql = "SELECT biaya from tb_rekam_medis where no_rm= '$no_rm'";
$biaya_dokter = mysqli_query($koneksi,$sql);
while ($row=mysqli_fetch_object($biaya_dokter)) {
  $biaya1 = $row->biaya;
}

$sql1 = "select SUM(total) as total2 from tb_resep_obat where no_rm='$no_rm'";
$biaya_obat = mysqli_query($koneksi,$sql1);
while ($baris=mysqli_fetch_object($biaya_obat)) {
  $biaya2 = $baris->total2;
}

$tot_biaya = ($biaya1 + $biaya2);

$sql4="INSERT INTO tb_transaksi VALUES ('','$tgl_transaksi','$id_pasien','Belum Lunas','$no_rm','$tot_biaya')";
$transaksi = mysqli_query($koneksi,$sql4);

$sql4="SELECT total from tb_resep_obat where no_rm='$no_rm'";
$cek_null=mysqli_query($koneksi,$sql4);
while ($data=mysqli_fetch_object($cek_null)) {
  $total = $data->total;
}
if ($total==0) {
  $null="INSERT INTO tb_resep_obat (kode_resep,id_obat,jumlah,total,no_rm,status) VALUES ('', NULL, '0', '0', '$no_rm', 'Tidak Ada Obat')";
  $input2= mysqli_query($koneksi,$null);
}
$sql3="UPDATE tb_pendaftaran set keterangan = 'Selesai' where no_cm= '$no_cm'";
$selesai = mysqli_query($koneksi,$sql3);

if ($selesai) {
  ?>
  <script type="text/javascript">
  swal({
    title: "No.CM : <?php echo $no_cm?>",
    text: "Apakah pasien ini sudah selesai?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-warning",
    confirmWarningText: "Ya, belum",
    closeOnConfirm: false
  },
  function() {
    swal({
      title: "Pemeriksaan selesai!",
      text: "Data berhasil disimpan",
      type: "success",
      confirmButtonText: "Oke",
      closeOnConfirm: false
    },
    function(){
      window.location="?m=prosesRekam";
    });
  });
  </script>
  <?php
}
}
 ?>
