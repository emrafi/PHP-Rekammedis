<link rel="stylesheet" href="../css/sweetalert.css" media="screen" title="no title">
<link rel="stylesheet" href="../css/scroll.css" media="screen" title="no title">
<?php
include"../backend/koneksi.php";
function rupiahkan($value)
{
  $nilai = "Rp ".number_format($value,2,',','.');
  return $nilai;
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Obat
        <small>control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Obat</li>
    </ol>
  </section>


<section class="box-body scroll">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header box-header with-border">
          <i class="fa fa-medkit"></i> Data Obat
        </h2>
        <div class="box">
          <div class="box-header with-border">
            <div class="box-title">
              <button class="btn btn-primary" data-toggle="modal" data-target="#tambahObat">
                Tambah Obat
              </button>
              <a name="cetak" href="../backend/backend_cetakObat.php" target="_blank" class="btn btn-default">
                <i class="fa fa-print"></i>
                Cetak
              </a>
            </div>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 180px;">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" id="cari" placeholder="Pencarian..." class="form-control pull-right" onkeyup="cari()">
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="isi_tabel">
            <div class="inner">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><span class="fa fa-th-list"></span> No</th>
                  <th><span class="fa fa-bars"></span> Nama Obat</th>
                  <th><span class="fa fa-bars"></span> Jenis</th>
                  <th><span class="fa fa-bars"></span> Kategori</th>
                  <th><span class="fa fa-usd"></span> Harga</th>
                  <th><span class="fa fa-cubes"></span> Stok</th>
                  <th><span class="fa fa-cogs"></span> Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $n=1;
                $query = mysqli_query($koneksi,"select * from tb_obat order by nama_obat asc ");
                while ($row=mysqli_fetch_object($query))
                {
                  ?>
                  <tr>
                    <td> <?php echo $n ?> </td>
                    <td><?php echo "$row->nama_obat"?></td>
                    <td><?php echo "$row->kategori_obat"?></td>
                    <td><?php echo "$row->jenis_obat"?></td>
                    <td id="harga_obat_tampil"><?php echo rupiahkan($row->harga_obat)?></td>
                    <td><?php echo "$row->stok_obat"?></td>
                    <td>
                      <form class="" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row->id_obat; ?>">
                        <button type="button" class="btn btn-warning btn-flat btn-sm" onclick="editPasien(<?php echo $row->id_obat; ?>)">
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
              </tbody>
            </table>
          </div>
          </div>
          <!-- /.box-body -->

        </div>
      </div>
      <!-- /.col -->
    </div>
    </section>
    <div class="modal fade" id="editObat" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Form Data Obat</h4>
          </div>
          <form class="" action="" method="post">
            <input type="hidden" name="id_obat" id="id_obat" value="">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" required="required" id="nama_obat">
              </div>
              <div class="form-group">
                <label for="">Jenis Obat</label>
                <select class="form-control" name="kategori_obat" id="kategori_obat">
                  <option value="Tab">Tablet</option>
                  <option value="Cap">Capsul</option>
                  <option value="Btl">Botol</option>
                  <option value="Srp">Sirup</option>
                  <option value="Stk">Suntik</option>
                  <option value="Crm">Cream</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Kategori Obat</label> <br>
                <label class="checkbox-inline">
                  <input type="radio" name="jenis_obat" value="G" id="jo1">Generik
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jenis_obat" value="P" id="jo2">Paten
                </label>
              </div>
              <div class="form-group">
                <label for="">Harga</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="text" class="form-control"  required="required"  id="harga_obat_edit" name="harga_obat" onkeyup="formatangka(this);">
                </div>
              </div>
              <div class="form-group">
                <label for="">Jumlah</label>
                <input type="text" class="form-control" name="stok_obat" required="required" id="stok_obat">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="edit_obat">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal tambah obat -->
    <div class="modal fade" id="tambahObat" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Form Data Obat</h4>
          </div>
          <form class="" action="" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" required="required">
              </div>
              <div class="form-group">
                <label for="">Jenis Obat</label>
                <select class="form-control" name="kategori_obat">
                  <option value="Tab">Tablet</option>
                  <option value="Cap">Capsul</option>
                  <option value="Btl">Botol</option>
                  <option value="Stk">Suntik</option>
                  <option value="Srp">Sirup</option>
                  <option value="Crm">Cream</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Kategori Obat</label> <br>
                <label class="checkbox-inline">
                  <input type="radio" name="jenis_obat" value="G">Generik
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jenis_obat" value="P">Paten
                </label>
              </div>
              <div class="form-group">
                <label for="">Harga</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="text" class="form-control" name="a" required="required" id="harga_obat" onkeyup="formatangka(this);">
                </div>
              </div>
              <div class="form-group">
                <label for="">Jumlah</label>
                <input type="text" class="form-control" name="stok_obat" required="required">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" name="tambah_obat">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- akhir modal -->
</div>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
</script>
<script type="text/javascript">
function editPasien(id){
  $.ajax({
    type: "GET",
    url : "../backend/backend_editObat.php",
    data: "id="+id,
    success: function (data){
     var $response = $(data);
       $('#id_obat').val($response.filter('#id_obat').text());
       $('#nama_obat').val($response.filter('#nama_obat').text());
       $('#kategori_obat').val($response.filter('#kategori_obat').text());

       if (($response.filter('#jenis_obat').text().trim())=="G"){
           document.getElementById('jo1').checked=true;
       }else {
         document.getElementById('jo2').checked=true;
       }
       $('#harga_obat_edit').val($response.filter('#harga_obat_edit').text());
       var tauklah = document.getElementById('harga_obat_edit');
       formatangka(tauklah);
       $('#stok_obat').val($response.filter('#stok_obat').text());
       $('#editObat').modal('show');
    }
  });
}
function cari() {
  var q = $('#cari').val();
  $.ajax({
	type: "GET",
	url: "pages/md/pencarianObat.php?q="+q,
	success: function(data){
  		var $response = $(data);
  		$('#isi_tabel').html($response.filter('#isi_tabel').html());
  	}
  });
}
</script>
<?php
include "../backend/backend_tambahObat.php";
include "../backend/backend_hapusObat.php";
include "../backend/backend_prosesEditObat.php";
 ?>
