<?php
include "koneksi.php";

if (isset($_POST['daftar'])) {

$cariId = "SELECT * from tb_karyawan where username = '".$_SESSION['username']."'";
$hasil =mysqli_query($koneksi,$cariId);
while ($row=mysqli_fetch_object($hasil)) {
  $id_dua = $row->id_karyawan;
}
$no_cm = $_POST['no_cm'];
$id = $_POST['id_pasien'];
$nama = $_POST['nama'];
$pelayanan = $_POST['poli'];
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
$proses = "$pelayanan";
$biaya = "10000";
$status = "Aktif";
$keterangan = "Menunggu...";

$sql = "INSERT INTO tb_pendaftaran VALUES ('','$nama','$tanggal','$jam','$proses','$biaya','$status','$keterangan','$id','$id_dua','$no_cm')";
// die($sql);
$simpan = mysqli_query($koneksi,$sql);

if($simpan){
  ?>
  <script type="text/javascript">
swal({
title: "Berhasil!",
text: "<?php echo $nama ?> terdaftar",
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
                  title: "",
                  text: "Gagal!",
                  type: "failed",
                  confirmWarningText: "Oke"
              },
              function () {
                  window.location="?=rawat";
              });
  </script>
  <?php
}
}
 ?>
