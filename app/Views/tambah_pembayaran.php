<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        



        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/home/aksi_tambah_pembayaran/?')?>"method="post">
       



         <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="guru">Nama Siswa<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="siswa" placehoder="Enter siswa" name="nama">
                <option value="<?php echo $jojo->siswa?>">-PILIH-</option>
                <?php

                foreach ($okta as $evan) {
                  ?>
                  <option value ="<?= $evan->id_siswa?>"><?php echo $evan->nama?>

                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        
       

<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bulan">Bulan Pembayaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name ="bulan">
                <option>Pilih</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
            </div>

<!-- Februari -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah">Jumlah<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="jumlah" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="jumlah" placeholder="Isi jumlah" required="required" type="text">
  </div>
</div>

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="denda">Denda<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="denda" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="denda" placeholder="Isi denda" required="required" type="text">
  </div>
</div>

 <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal">Tanggal Pembayaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tanggal" placeholder="Isi Tanggal " required="required" type="date">
            </div>
          </div>

 <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status Pemeriksaan<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name ="status">
                <option>Pilih</option>
                <option value="✅">Lunas</option>
                <option value="❌">Belum</option>
            
              </select>
            </div> 


               
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>