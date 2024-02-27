<?php
        if(session()->get('level')== 1){
          ?>



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

             <a href="<?= base_url('/home/tambah_bayar')?>"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
                      <tr>
              <th>NO</th>
              <th>Nama Siswa</th>

              <th>Januari</th>
              <th>Februari</th>
              <th>Maret</th>
              <th>April</th>
              <th>Mei</th>
              <th>Juni</th>
              <th>Juli</th>
              <th>Agustus</th>
              <th>September</th>
              <th>Oktober</th>
              <th>November</th>
              <th>Desember</th>
              <th>Tahun Ajaran</th>
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

                <td><?php echo $evan->januari ?></td>
                <td><?php echo $evan->februari ?></td>
                <td><?php echo $evan->maret ?></td>
                <td><?php echo $evan->april ?></td>
                <td><?php echo $evan->mei ?></td>
                <td><?php echo $evan->juni ?></td>
                <td><?php echo $evan->juli ?></td>
                <td><?php echo $evan->agustus ?></td>
                <td><?php echo $evan->september ?></td>
                <td><?php echo $evan->oktober ?></td>
                <td><?php echo $evan->november ?></td>
                <td><?php echo $evan->desember ?></td>
                <td><?php echo $evan->tahun ?></td>
                <td>
                  <a href="<?= base_url('/home/edit_bayar/' . $evan->id_bayar) ?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                  <a href="<?= base_url('/home/hapus_bayar/' . $evan->id_bayar) ?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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



 <?php
        }else if(session()->get('level')== 2){
          ?>


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

           
                      <tr>
              <th>NO</th>
              <th>Nama Siswa</th>

              <th>Januari</th>
              <th>Februari</th>
              <th>Maret</th>
              <th>April</th>
              <th>Mei</th>
              <th>Juni</th>
              <th>Juli</th>
              <th>Agustus</th>
              <th>September</th>
              <th>Oktober</th>
              <th>November</th>
              <th>Desember</th>
              <th>Tahun Ajaran</th>
            
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

                <td><?php echo $evan->januari ?></td>
                <td><?php echo $evan->februari ?></td>
                <td><?php echo $evan->maret ?></td>
                <td><?php echo $evan->april ?></td>
                <td><?php echo $evan->mei ?></td>
                <td><?php echo $evan->juni ?></td>
                <td><?php echo $evan->juli ?></td>
                <td><?php echo $evan->agustus ?></td>
                <td><?php echo $evan->september ?></td>
                <td><?php echo $evan->oktober ?></td>
                <td><?php echo $evan->november ?></td>
                <td><?php echo $evan->desember ?></td>
                <td><?php echo $evan->tahun ?></td>
                
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



 <?php
        }else if(session()->get('level')== 3){
          ?>

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

           
                      <tr>
              <th>NO</th>
              <th>Nama Siswa</th>

              <th>Januari</th>
              <th>Februari</th>
              <th>Maret</th>
              <th>April</th>
              <th>Mei</th>
              <th>Juni</th>
              <th>Juli</th>
              <th>Agustus</th>
              <th>September</th>
              <th>Oktober</th>
              <th>November</th>
              <th>Desember</th>
              <th>Tahun Ajaran</th>
            
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

                <td><?php echo $evan->januari ?></td>
                <td><?php echo $evan->februari ?></td>
                <td><?php echo $evan->maret ?></td>
                <td><?php echo $evan->april ?></td>
                <td><?php echo $evan->mei ?></td>
                <td><?php echo $evan->juni ?></td>
                <td><?php echo $evan->juli ?></td>
                <td><?php echo $evan->agustus ?></td>
                <td><?php echo $evan->september ?></td>
                <td><?php echo $evan->oktober ?></td>
                <td><?php echo $evan->november ?></td>
                <td><?php echo $evan->desember ?></td>
                <td><?php echo $evan->tahun ?></td>
                
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
  <?php } ?>