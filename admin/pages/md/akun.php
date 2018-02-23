<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Akun
        <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Akun</li>
    </ol>
  </section>
<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa "></i> Data Akun
        </h2>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">
              <button class="btn btn-primary" data-toggle="modal" data-target="#tambahAkun">
                Tambah Admin
              </button>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <tr>
                <th><span class="fa fa-th-list"></span> No</th>
                <th><span class="fa fa-user"></span> Username</th>
                <th><span class="fa fa-users"></span> Posisi</th>
                <th><span class="fa fa-cogs"></span> Opsi</th>
              </tr>

              <?php
              $n=1;
              $query = mysqli_query($koneksi,"select * from tb_login order by posisi asc ");
              while ($row=mysqli_fetch_object($query))
              {
               ?>
               <tr>
                 <td> <?php echo $n ?> </td>
                 <td><?php echo "$row->username"?></td>
                 <td><?php echo "$row->posisi"?></td>
                 <td>

               <form class="" action="" method="post">
                 <input type="hidden" name="id" value="<?php echo $row->id_login?>">
                 <button type="button" class="btn btn-warning btn-flat btn-sm" onclick="editAkun(<?php echo $row->id_login; ?>)">
                   <i class="glyphicon glyphicon-edit"></i>
                 </button>
                 <button type="submit" class="btn btn-danger btn-flat btn-sm" name="hapus">
                   <i class="glyphicon glyphicon-remove"></i>
                 </button>
               </form>
            </td>
           </tr>
           <?php
           $n= $n+1;
            	}
             ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.col -->
    </div>
    </section>
    </div>
    <!-- modal tambah akun -->
    <div class="modal fade" id="tambahAkun" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Form tambah akun</h4>
          </div>
          <div class="modal-body">
            <form class="" action="" method="post">
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" required="required">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" required="required" id="pass1">
              </div>
              <div class="form-group">
                <label for="">Konfirmasi password</label>
                <input type="password" class="form-control" name="konfirmasi_password" required="required" id="pass2" oninput="Cek()">

                <span class="label label-success" id="cocok" style="display:none">cocok</span>
                <span class="label label-danger" id="salah" style="display:none">salah</span>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah_akun" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        </div>
      </div>
    </div>
<!-- akhir modal -->
<script src="../js/sweetalert.min.js"> </script>
<script type="text/javascript">
  function Cek() {
    if(document.getElementById('pass1').value==document.getElementById('pass2').value){
     $("#cocok").show();
     $("#salah").hide();
    }else{
     $("#salah").show();
     $("#cocok").hide();
    }
  }
</script>
<?php
include "../backend/backend_tambahAkun.php";
include "../backend/backend_hapusAkun.php";
 ?>
