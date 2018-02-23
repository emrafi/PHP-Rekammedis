<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
 ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dokter
        <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Dokter</li>
    </ol>
  </section>


<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa "></i> Data Dokter
        </h2>
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">
              <button class="btn btn-primary" data-toggle="modal" data-target="#piu">
                Tambah Data
              </button>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <tr>
                <th><span class="fa fa-th-list"></span> No</th>
                <th><span class="fa fa-ellipsis-h"></span> NIP</th>
                <th><span class="fa fa-user"></span> Nama</th>
                <th><span class="fa fa-stethoscope"></span> Spesialis</th>
                <th><span class="fa fa-venus-mars"></span> Jenis Kelamin</th>
                <th><span class="fa fa-map-marker"></span> Alamat</th>
                <th><span class="fa fa-mobile"></span> No. Hp</th>
                <th><span class="fa fa-cogs"></span> Opsi</th>
              </tr>

              <?php
              $n=1;
              $query = mysqli_query($koneksi,"select * from tb_dokter order by nama asc ");
              while ($row=mysqli_fetch_object($query))
              {
               ?>
               <tr>
                 <td> <?php echo $n ?> </td>
                 <td><?php echo "$row->NIP"?></td>
                 <td><?php echo "$row->nama"?></td>
                 <td><?php echo "$row->jenis_poli"?></td>
                 <td><?php echo "$row->jk"?></td>
                 <td><?php echo "$row->alamat"?></td>
                 <td><?php echo "$row->no_hp"?></td>
                 <td>

               <form class="" action="" method="post">
                 <input type="hidden" name="id" value="<?php echo $row->NIP; ?>">
                 <button type="button" class="btn btn-warning btn-flat btn-sm" onclick="editDokter('<?php echo $row->NIP; ?>')">
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
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Form Edit Dokter</h4>
          </div>
          <form class="" action="" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">NIP</label>
                <input type="text" class="form-control" name="nip" required="required" id="nip">
                <p class="help-block">Nomor Induk Pegawai</p>
              </div>
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" required="required" id="nama">
              </div>
              <div class="form-group">
                <label for="">Spesialis</label>
                <select class="form-control" name="jenis_poli" id="jenis_poli">
                  <?php
                  $tampil=mysqli_query($koneksi,"select * from tb_jenis_poli");
                  while($row=mysqli_fetch_array($tampil)){
                    echo "<option value=$row[nama_jenis] >$row[nama_jenis]</option>";
                  }
                  echo "<option value='belum dipilih' selected>- pilih spesialis -</option>";
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin</label> <br>
                <label class="checkbox-inline">
                  <input type="radio" name="jk" value="Laki-laki" id="jk1">Laki-laki
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jk" value="Perempuan" id="jk2">Perempuan
                </label>
              </div>
              <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" class="form-control" name="alamat" required="required" id="alamat">
              </div>
              <div class="form-group">
                <label for="">No Telp/Hp</label>
                <input type="text" class="form-control" name="noHp" required="required" id="no_hp">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="edit_dokter">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal tambah data -->
    <div class="modal fade" id="piu" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Form Data Dokter</h4>
          </div>
          <form class="" action="" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">NIP</label>
                <input type="text" class="form-control" name="nip" required="required">
                <p class="help-block">Nomor Induk Pegawai</p>
              </div>
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" required="required">
              </div>
              <div class="form-group">
                <label for="">Jenis Poli</label>
                <select class="form-control" name="jenis_poli">
                  <?php
                  $tampil=mysqli_query($koneksi,"select * from tb_jenis_poli");
                  while($row=mysqli_fetch_array($tampil)){
                    echo "<option value=$row[nama_jenis] selected>$row[nama_jenis]</option>";
                  }
                  echo "<option value='belum dipilih' selected>- pilih spesialis -</option>";
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin</label> <br>
                <label class="checkbox-inline">
                  <input type="radio" name="jk" value="Laki-laki">Laki-laki
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jk" value="Perempuan">Perempuan
                </label>
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
                <input type="password" class="form-control" name="konfirmasi" value="" id="pass2" oninput="Cek();" placeholder="konfirmasi password">
                <span class="label label-success" id="cocok" style="display:none">cocok</span>
                <span class="label label-danger" id="salah" style="display:none">salah</span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="tambah_dokter">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal tambah data -->
</div>
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
 <script type="text/javascript">
   function editDokter(id){
     $.ajax({
       type: "GET",
       url : "../backend/backend_editDokter.php",
       data: "id="+id,
       success: function (data){
        var $response = $(data);
          $('#nip').val($response.filter('#nip').text());
          $('#nama').val($response.filter('#nama').text());
          $('#jenis_poli').val($response.filter('#jenis_poli').text());

          if (($response.filter('#jk').text().trim())=="Perempuan"){
              document.getElementById('jk2').checked=true;
          }else{
            document.getElementById('jk1').checked=true;
          }
          $('#alamat').val($response.filter('#alamat').text());
          $('#no_hp').val($response.filter('#no_hp').text());
          $('#edit').modal('show');
       }
     });
   }
 </script>
 <script src="../js/sweetalert.min.js"> </script>
 <?php
 include "../backend/backend_tambahDokter.php";
 include '../backend/backend_hapusDokter.php';
 include '../backend/backend_prosesEditDokter.php';
 ?>
