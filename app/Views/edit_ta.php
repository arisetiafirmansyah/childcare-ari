 
<div class="container">
	<form action="<?= base_url('/home/aksi_edit_ta/?')?>"method="post">
		<input type="hidden" name="id" value="<?php echo $jojo->id_ta?>">
		<div class="mb-3 mt-3">
			<label for="tahun" class="form-label">Tahun Ajaran</label>
			<input type="text" class="form-control" id="tahun" placeholder="Isi tahun" name="tahun" value="<?php echo $jojo->tahun?>">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
		
	</form>
</div>



</tr>
</body>
</html>