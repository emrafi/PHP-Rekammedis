<?php
include"koneksi.php";
if (isset($_POST["hapus"])) {
  $id=$_POST['id'];
  $hapus=mysqli_query($koneksi,"DELETE FROM tb_obat where id_obat=$id");
  if ($hapus){
    ?>
    <script type="text/javascript">
    swal({
      title: "Hapus Data!",
      text: "Apakah anda yakin menghapus data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-warning",
      confirmWarningText: "Ya, keluar",
      closeOnConfirm: false
    },
    function() {
      swal({
        title: "Terhapus!",
        text: "Data berhasil dihapus",
        type: "success",
        confirmButtonText: "Oke",
        closeOnConfirm: false
      },
      function(){
        window.location="?m=dataObat";
      });
    });
    </script>
    <?php
  }
}
 ?>
