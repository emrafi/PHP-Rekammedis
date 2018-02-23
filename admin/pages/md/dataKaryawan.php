<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Karyawan
        <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Karyawan</li>
    </ol>
  </section>


<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa "></i> Data Karyawan
        </h2>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">
              <button class="btn btn-primary" data-toggle="modal" data-target="#tambahKaryawan">
                Tambah Data
              </button>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <tr>
                <th><span class="fa fa-th-list"></span> No</th>
                <th><span class="fa fa-user"></span> Nama</th>
                <th><span class="fa fa-calendar"></span> Tanggal Lahir</th>
                <th><span class="fa fa-map-marker"></span> Alamat</th>
                <th><span class="fa fa-mobile"></span> No. Hp</th>
                <th><span class="fa fa-cogs"></span> Opsi</th>
              </tr>

              <?php
              $n=1;
              $query = mysqli_query($koneksi,"select * from tb_karyawan order by nama asc ");
              while ($row=mysqli_fetch_object($query))
              {
               ?>
               <tr>
                 <td> <?php echo $n ?> </td>
                 <td><?php echo "$row->nama"?></td>
                 <td><?php echo "$row->tgl_lahir"?></td>
                 <td><?php echo "$row->alamat"?></td>
                 <td><?php echo "$row->no_hp"?></td>
                 <td>

               <form class="" action="" method="post">
                 <input type="hidden" name="id" value="<?php echo $row->id_karyawan; ?>">
                 <button type="button" class="btn btn-warning btn-flat btn-sm" onclick="editKaryawan(<?php echo $row->id_karyawan; ?>)">
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
    <div class="modal fade" id="editKaryawan" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="">Form edit karyawan</h4>
          </div>
          <div class="modal-body">
            <form class="" action="" method="post">
              <input type="hidden" name="id_karyawan" id="id_karyawan" value="">
              <div class="modal-body">
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nama" required="required" id="nama">
                </div>
                  <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" required="required" id="tgl_lahir">
                  </div>
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="alamat" required="required" rows="3" cols="40" class="form-control" id="alamat"></textarea>
                </div>
                <div class="form-group">
                  <label for="">No Telp/Hp</label>
                  <input type="text" class="form-control" name="noHp" required="required" id="noHp">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="edit_karyawan">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <!-- modal tambah data -->
    <div class="modal fade" id="tambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Form Data Karyawan</h4>
          </div>
          <form class="" action="" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" required="required">
              </div>
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" required="required">
                </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" required="required" rows="3" cols="40" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="">No Telp/Hp</label>
                <input type="text" class="form-control" name="noHp" required="required">
              </div>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" required="required" placeholder="username">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" required="required" placeholder="password" id="pass1">
              </div>
              <div class="form-group">
                <label for="">Konfirmasi password</label>
                <input type="password" name="konfirmasi" value="" id="pass2" placeholder="konfirmasi password" class="form-control" oninput="Cek();">
                <span class="label label-success" id="cocok" style="display:none">cocok</span>
                <span class="label label-danger" id="salah" style="display:none">salah</span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="tambah_karyawan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal tambah data -->
</div>
<script src="../js/sweetalert.min.js"> </script>
<script type="text/javascript">
function editKaryawan(id){
  $.ajax({
    type: "GET",
    url : "../backend/backend_editKaryawan.php",
    data: "id="+id,
    success: function (data){
     var $response = $(data);
       $('#id_karyawan').val($response.filter('#id_karyawan').text());
       $('#nama').val($response.filter('#nama').text());
       $('#tgl_lahir').val($response.filter('#tgl_lahir').text());
       $('#alamat').val($response.filter('#alamat').text());
       $('#noHp').val($response.filter('#noHp').text());
       $('#editKaryawan').modal('show');
    }
  });
}
</script>
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
include "../backend/backend_tambahKaryawan.php";
include "../backend/backend_prosesEditKaryawan.php";
include "../backend/backend_hapusKaryawan.php"
 ?>
