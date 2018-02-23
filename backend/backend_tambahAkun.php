<?php
include"koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$posisi = 'admin';

if(isset($_POST['tambah_akun'])){

  $input = mysqli_query($koneksi,"INSERT INTO tb_login VALUES ('','$username',MD5('$password'),'$posisi')");

  if($input){
    ?>
    <script type="text/javascript">
swal({
  title: "Data tersimpan!",
  text: "Akun <?php echo $username?> telah ditambahkan",
  type: "success",
  confirmButtonText: "Oke",
  closeOnConfirm: false
},
function(){
  window.location="?m=akun";
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
                    window.location="?=akun";
                });
    </script>
    <?php
  }
}
?>
