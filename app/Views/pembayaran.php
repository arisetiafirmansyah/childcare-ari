
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Simple Tables -->
    <div class="card">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran</h6>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">

             <a href="<?= base_url('/home/tambah_pembayaran')?>"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
                      <tr>
              <th>NO</th>
              <th>Nama Siswa</th>
              <th>Bulan</th>
              <th>Jumlah</th>
              <th>Denda</th>
              <th>Tanggal Pembayaran</th>
              <th>Status Pemeriksaan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($okta as $evan) {
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $evan->nama?></td>
                <td><?php echo $evan->bulan ?></td>
                <td><?php echo $evan->jumlah?></td>
                <td><?php echo $evan->denda?></td>
                <td><?php echo $evan->tanggal?></td>
                <td><?php echo $evan->status?></td>
                <td>

                  <a href="<?= base_url('/home/edit_pembayaran/' . $evan->id_pembayaran) ?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                  <a href="<?= base_url('/home/hapus_pembayaran/' . $evan->id_pembayaran) ?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

