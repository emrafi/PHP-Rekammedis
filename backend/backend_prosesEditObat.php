<?php
include "koneksi.php";
if(isset($_POST['edit_obat'])){
$id = $_POST['id_obat'];
$nama = $_POST['nama_obat'];
$kategori = $_POST['kategori_obat'];
$jenis = $_POST['jenis_obat'];
$harga = $_POST['harga_obat'];
$stok = $_POST['stok_obat'];


  $query = "UPDATE tb_obat SET nama_obat='$nama',kategori_obat='$kategori',jenis_obat='$jenis',harga_obat='".str_replace(".","",$harga)."',stok_obat='$stok' where id_obat = '$id' ";
  $input = mysqli_query($koneksi, $query);
  if($input){
    ?>
    <script type="text/javascript">
      swal({
        title: "Data dirubah!",
        text: "data Obat <?php echo $nama?> telah dirubah",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=dataObat";
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
      function () {
        window.location='./';
      });
    </script>
    <?php
  }
}
?>
