<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Mesin &#8594; tambah baru</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Kode Mesin</label>
				<div class="col-sm-3">
					<input type="text" name="kd_mesin" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nama Mesin</label>
				<div class="col-sm-6">
					<input type="text" name="nama_mesin" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
					<input type="submit" value="Simpan" name="mesin" class="btn btn-sm btn-primary"> &nbsp; 
					<input type="button" value="&nbsp; Batal &nbsp;" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>