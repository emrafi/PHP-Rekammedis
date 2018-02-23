<?php
include "koneksi.php";
if(isset($_POST['edit_karyawan'])){
$id = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$nohp = $_POST['noHp'];

  $query = "UPDATE tb_karyawan SET nama='$nama',tgl_lahir='$tgl_lahir',alamat='$alamat',no_hp='$nohp' where id_karyawan = '$id'";
  $input = mysqli_query($koneksi, $query);
  if($input){
    ?>
    <script type="text/javascript">
      swal({
        title: "Data dirubah!",
        text: "data Karyawan <?php echo $nama?> telah dirubah",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=dataKaryawan";
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
        window.location='?m=dataKaryawan';
      });
    </script>
    <?php
  }
}
?>
