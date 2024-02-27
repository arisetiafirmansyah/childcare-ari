<!-- Januari -->

<div class="container">
      <form action="<?= base_url('/home/aksi_edit_bayar/?')?>"method="post">
            <input type="hidden" name="id" value="<?php echo $jojo->id_bayar?>">
            
<div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Siswa<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="nama" placehoder="Enter Jabatan" name="nama" >
                <option value="<?php echo $jojo->nama?>">-PILIH-</option>
                <?php

                foreach ($a as $evan) {
                  ?>
                  <option value ="<?= $evan->id_siswa?>"><?php echo $evan->nama?>

                </option>
              <?php } ?>
            </select>
          </div>
        </div> 





<div class="mb-3 mt-3">
  <label for="januari" class="form-label">Januari</label>
  <input type="text" class="form-control" id="januari" placeholder="Isi Januari" name="januari" value="<?php echo $jojo->januari ?>">
</div>

<!-- Februari -->
<div class="mb-3 mt-3">
  <label for="februari" class="form-label">Februari</label>
  <input type="text" class="form-control" id="februari" placeholder="Isi Februari" name="februari" value="<?php echo $jojo->februari ?>">
</div>

<!-- Maret -->
<div class="mb-3 mt-3">
  <label for="maret" class="form-label">Maret</label>
  <input type="text" class="form-control" id="maret" placeholder="Isi Maret" name="maret" value="<?php echo $jojo->maret ?>">
</div>

<!-- April -->
<div class="mb-3 mt-3">
  <label for="april" class="form-label">April</label>
  <input type="text" class="form-control" id="april" placeholder="Isi April" name="april" value="<?php echo $jojo->april ?>">
</div>

<!-- Mei -->
<div class="mb-3 mt-3">
  <label for="mei" class="form-label">Mei</label>
  <input type="text" class="form-control" id="mei" placeholder="Isi Mei" name="mei" value="<?php echo $jojo->mei ?>">
</div>

<!-- Juni -->
<div class="mb-3 mt-3">
  <label for="juni" class="form-label">Juni</label>
  <input type="text" class="form-control" id="juni" placeholder="Isi Juni" name="juni" value="<?php echo $jojo->juni ?>">
</div>

<!-- Juli -->
<div class="mb-3 mt-3">
  <label for="juli" class="form-label">Juli</label>
  <input type="text" class="form-control" id="juli" placeholder="Isi Juli" name="juli" value="<?php echo $jojo->juli ?>">
</div>

<!-- Agustus -->
<div class="mb-3 mt-3">
  <label for="agustus" class="form-label">Agustus</label>
  <input type="text" class="form-control" id="agustus" placeholder="Isi Agustus" name="agustus" value="<?php echo $jojo->agustus ?>">
</div>

<!-- September -->
<div class="mb-3 mt-3">
  <label for="september" class="form-label">September</label>
  <input type="text" class="form-control" id="september" placeholder="Isi September" name="september" value="<?php echo $jojo->september ?>">
</div>

<!-- Oktober -->
<div class="mb-3 mt-3">
  <label for="oktober" class="form-label">Oktober</label>
  <input type="text" class="form-control" id="oktober" placeholder="Isi Oktober" name="oktober" value="<?php echo $jojo->oktober ?>">
</div>

<!-- November -->
<div class="mb-3 mt-3">
  <label for="november" class="form-label">November</label>
  <input type="text" class="form-control" id="november" placeholder="Isi November" name="november" value="<?php echo $jojo->november ?>">
</div>

<!-- Desember -->
<div class="mb-3 mt-3">
  <label for="desember" class="form-label">Desember</label>
  <input type="text" class="form-control" id="desember" placeholder="Isi Desember" name="desember" value="<?php echo $jojo->desember ?>">
</div>

<div class="mb-3 mt-3">
  <label for="tahun" class="form-label">Tahun Ajaran</label>
  <input type="text" class="form-control" id="tahun" placeholder="Isi tahun" name="tahun" value="<?php echo $jojo->tahun ?>">
</div>


<button type="submit" class="btn btn-primary">Submit</button>
            
      </form>
</div>

</tr>
</body>
</html>