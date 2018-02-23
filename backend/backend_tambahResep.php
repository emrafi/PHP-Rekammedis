<?php
include "koneksi.php";

if (isset($_POST['tambah_resep'])) {
$id_pasien = $_POST['id_pasien'];
$id_obat = $_POST['nama_obat'];
$jumlah = $_POST['jumlah_obat'];

$sql = "SELECT * from tb_obat where id_obat = '$id_obat'";
$hasil =mysqli_query($koneksi,$sql);
while ($row=mysqli_fetch_object($hasil)) {
  $nama_obat = $row->nama_obat;
  $harga_obat = $row->harga_obat;
}

$sql1 = "SELECT no_rm FROM tb_rekam_medis where id_pasien='$id_pasien' and tgl_rekam = current_date()";
$cariNo = mysqli_query($koneksi,$sql1);
while ($row=mysqli_fetch_object($cariNo)) {
  $no_rm = $row->no_rm;
}

$total = ($harga_obat * $jumlah) ;

  $sql2 = "INSERT INTO tb_resep_obat VALUES ('','$id_obat','$jumlah','$total','$no_rm','Belum Diambil')";
  $input = mysqli_query($koneksi,$sql2);


if ($input) {
 ?>
<script type="text/javascript">
    window.location="?m=inputRekam&id=<?php echo $id_pasien ?>";
</script>
<?php
}
}
 ?>
