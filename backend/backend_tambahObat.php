<?php
include"koneksi.php";
$nama=$_POST['nama_obat'];
if(isset($_POST['tambah_obat'])){
  $input = mysqli_query($koneksi,"INSERT INTO tb_obat VALUES ('','".$_POST[nama_obat]."','".$_POST[jenis_obat]."','".$_POST[kategori_obat]."','".str_replace(".","",$_POST[a])."','".$_POST[stok_obat]."')");
  if($input){
    ?>
    <script type="text/javascript">
swal({
  title: "Data tersimpan!",
  text: "Obat <?php echo $nama?> telah ditambahkan dengan harga Rp <?php echo $_POST[a] ?>",
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
                    title: "",
                    text: "Data gagal disimpan!",
                    type: "failed",
                    confirmWarningText: "Oke"
                },
                function () {
                    window.location='?m=dataObat';
                });
    </script>
    <?php
  }
}
?>
