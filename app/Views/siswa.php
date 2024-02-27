

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                   <thead class="green-header">
  <a href="<?= base_url('/home/tambah_siswa') ?>"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
  <tr>
    <th>NO</th>
    <th>Username</th>
    <th>JK</th>
    <th>Tanggal Lahir</th>
  <th>Action</th>
  </tr>
</thead>
<style>
  .green-header {
    background-color: blue;
    color: white; /* You can adjust the text color as needed */
  }
</style>



       <style>      

@keyframes slideDown {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.animated-header {
    animation: slideDown 0.5s ease-in-out forwards;
    /* Adjust animation duration and easing as needed */
}
</style>      

           <tbody>
                        <?php
      $no=1;
      foreach ($okta as $evan) {

        ?>

        <tr>

          <td><?php echo $no++ ?></td>
          <td><?php echo $evan->nama?> </td>
          <td><?php echo $evan->jk?> </td>
          <td><?php echo $evan->ttl?> </td>

          
          
          
           <td> 
            <a href="<?=base_url('/home/edit_siswa/'.$evan->user)?>"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>

            <a href="<?=base_url('/home/hapus_siswa/'.$evan->user)?>"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

          </td> 
          

        </tr>
        <?php
      }
      ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
