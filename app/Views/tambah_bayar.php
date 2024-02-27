<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        



        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/home/aksi_tambah_bayar/?')?>"method="post">
       



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
        
       
     
<!-- Januari -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="januari">Januari<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="januari" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="januari" placeholder="Isi januari" required="required" type="text">
  </div>
</div>

<!-- Februari -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="februari">Februari<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="februari" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="februari" placeholder="Isi februari" required="required" type="text">
  </div>
</div>

<!-- Maret -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="maret">Maret<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="maret" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="maret" placeholder="Isi maret" required="required" type="text">
  </div>
</div>

<!-- April -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="april">April<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="april" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="april" placeholder="Isi april" required="required" type="text">
  </div>
</div>

<!-- Mei -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mei">Mei<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="mei" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mei" placeholder="Isi mei" required="required" type="text">
  </div>
</div>

<!-- Juni -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="juni">Juni<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="juni" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="juni" placeholder="Isi juni" required="required" type="text">
  </div>
</div>

<!-- Juli -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="juli">Juli<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="juli" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="juli" placeholder="Isi juli" required="required" type="text">
  </div>
</div>

<!-- Agustus -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agustus">Agustus<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="agustus" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="agustus" placeholder="Isi agustus" required="required" type="text">
  </div>
</div>

<!-- September -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="september">September<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="september" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="september" placeholder="Isi september" required="required" type="text">
  </div>
</div>

<!-- Oktober -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oktober">Oktober<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="oktober" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="oktober" placeholder="Isi oktober" required="required" type="text">
  </div>
</div>

<!-- November -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="november">November<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="november" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="november" placeholder="Isi november" required="required" type="text">
  </div>
</div>

<!-- Desember -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desember">Desember<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="desember" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="desember" placeholder="Isi desember" required="required" type="text">
  </div>
</div>



<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ta">Tahun Ajaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="ta" placehoder="Enter ta" name="tahun">
                <option value="<?php echo $jojo->ta?>">-PILIH-</option>
                <?php

                foreach ($k as $evan) {
                  ?>
                  <option value ="<?= $evan->tahun?>"><?php echo $evan->tahun?>

                </option>
              <?php } ?>
            </select>
          </div>
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