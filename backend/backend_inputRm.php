<?php

include "koneksi.php";

if (isset($_POST["rekam"])) {

$id_pasien = $_POST['id_pasien'];
$tanggal = date("Y-m-d");
$jam = date("H:i:s");
$biaya = 10000;
// $periksa = $_POST['periksa'];
// $biaya1 = $_POST['biaya_periksa'];
// $biaya_periksa = ($biaya + $biaya1);


$username = $_SESSION['username'];

$sql= "SELECT * FROM tb_dokter where username = '$username'";
$hasil =mysqli_query($koneksi,$sql);
while ($row=mysqli_fetch_object($hasil)) {
  $NIP = $row->NIP;
}

// $sql1 = "INSERT  INTO tb_rekam_medis (no_rm,id_pasien,tgl_rekam,jam,NIP,biaya,periksa) VALUES ('','$id_pasien','$tanggal','$jam','$NIP','$biaya_periksa','$periksa')";
$sql1 = "INSERT  INTO tb_rekam_medis (no_rm,id_pasien,tgl_rekam,jam,NIP,biaya) VALUES ('','$id_pasien','$tanggal','$jam','$NIP','$biaya')";
$input = mysqli_query($koneksi,$sql1);

if ($input) {
 ?>
<script type="text/javascript">
    window.location="?m=inputRekam&id=<?php echo $id_pasien ?>";
</script>
<?php
}
}
?>
