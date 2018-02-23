<?php
include "koneksi.php";
if(isset($_POST['edit_pasien'])){
$id = $_POST['id_pasien'];
$nama = $_POST['nama_pasien'];
$tgl_lahir = $_POST['tgl_lahir_pasien'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$pekerjaan = $_POST['pekerjaan'];
$pendidikan = $_POST['pendidikan'];
$alamat = $_POST['alamat'];

  $query = "UPDATE tb_pasien SET nama='$nama',tgl_lahir='$tgl_lahir',jk='$jk',agama='$agama',pekerjaan='$pekerjaan',pendidikan='$pendidikan',alamat='$alamat' where id_pasien='$id'";

  $input = mysqli_query($koneksi, $query);
  if($input){
    ?>
    <script type="text/javascript">
      swal({
        title: "Data dirubah!",
        text: "data Pasien <?php echo $nama?> telah dirubah",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=dataPasien";
      });
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      swal({
        title:"Maaf",
        text: "Data gagal dirubah!",
        type: "error",
        confirmWarningText: "Oke",
      },
      function(){
        window.location='./';
      });
    </script>
    <?php
  }
}
?>
