<?php
include "koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$posisi = 'dokter';

if(isset($_POST['tambah_dokter'])){

  $query1 = "INSERT INTO tb_dokter VALUES ('','".$_POST[nip]."','".$_POST[nama]."','".$_POST[jenis_poli]."','".$_POST[jk]."','".$_POST[alamat]."','".$_POST[noHp]."','".$_POST[username]."')";

  $query2= "INSERT INTO tb_login (username, password, posisi) VALUES ('".$username."', MD5('".$password."'), '".$posisi."')";

  $input2 = mysqli_query($koneksi, $query2);
  $input = mysqli_query($koneksi, $query1);

  if($input){
    ?>
    <script type="text/javascript">
      swal({
        title: "Data tersimpan!",
        text: "<?php echo $nama?> telah ditambahkan",
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
        title: "",
        text: "Data gagal disimpan!",
        type: "error",
        confirmWarningText: "Oke"
      },
      function () {
        window.location='?m=dataDokter';
      });
    </script>
    <?php
  }
}
?>
