<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Member &#8594; tambah baru</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Jabatan</label>
				<div class="col-sm-3" >
					<select name="jabatan" class="form-control input-sm" id="combobox">
						<option value=""></option>
						<option value="Teknisi">Teknisi</option>
						<option value="Leader">Leader</option>
						<option value="Foreman">Foreman</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
					<input type="submit" value="Simpan" name="member" class="btn btn-sm btn-primary"> &nbsp; 
					<input type="button" value="&nbsp; Batal &nbsp;" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>