<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <!-- x -->
         <!--  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li> -->
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"> -->


        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('/home/aksi_tambah_ta/?')?>"method="post">
        <!--   <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
          </p> -->
          
         <!--  <span class="section">Personal Info</span> -->

            <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun">Tahun Ajaran<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tahun" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tahun" placeholder="Isi Tanggal tahun" required="required" type="text">
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