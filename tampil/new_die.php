<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Dies &#8594; tambah baru</span>
	</div>
</div>
<div class="row"al>
	<div class="col-sm-10">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Nama Dies</label>
				<div class="col-sm-9">
					<input type="text" name="nama_die" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nick</label>
				<div class="col-sm-9">
					<input type="text" name="nick" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">No. Dies</label>
				<div class="col-sm-9">
					<input type="text" name="no_die" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Kategori</label>
				<div class="col-sm-5">
					<select name="kategori" class="form-control input-sm" id="combobox">
						<option value=""></option>
						<option value="Casting">Casting</option>
						<option value="Moulding">Moulding</option>
						<option value="Trimming">Trimming</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Lokasi</label>
				<div class="col-sm-9">
					<input type="text" name="lokasi" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-9">
					<input type="submit" name="die" value="Simpan" class="btn btn-sm btn-primary">
					<input type="button" name="cancel" value="Batal" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>