<?php
include '../../../backend/koneksi.php';
function rupiahkan($value)
{
  $nilai = "Rp ".number_format($value,2,',','.');
  return $nilai;
}
?>
<div id="isi_tabel">
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
    <tbody id="isi_tabel">
      <?php
      $n=1;
      $query = mysqli_query($koneksi,"select * from tb_obat where nama_obat like '%".$_GET['q']."%' order by nama_obat asc ");
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
