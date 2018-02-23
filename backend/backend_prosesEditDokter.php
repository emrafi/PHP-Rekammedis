<?php
include "koneksi.php";
if(isset($_POST['edit_dokter'])){
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$spesialis = $_POST['jenis_poli'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$nohp = $_POST['noHp'];

  $query = "UPDATE tb_dokter SET NIP='$nip',nama='$nama',jenis_poli='$spesialis',jk='$jk',alamat='$alamat',no_hp='$nohp' where NIP = '$nip' ";
  $input = mysqli_query($koneksi, $query);
  if($input){
    ?>
    <script type="text/javascript">
      swal({
        title: "Data dirubah!",
        text: "data Dokter <?php echo $nama?> telah dirubah",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=dataDokter";
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
        window.location='?m=dataDokter';
      });
    </script>
    <?php
  }
}
?>
