<?php
$q=select_id("die",$_GET['id']);
$d=$q->fetch_assoc();
?>
<div class="row submenu">

	<div class="col-sm-3">
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Dies &#8594; edit </span>
	</div>
</div>
<div class="row"al>
	<div class="col-sm-10">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Nama Dies</label>
				<div class="col-sm-9">
					<input type="text" name="nama_die" class="form-control input-sm" value="<?php echo $d['name_die']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nick</label>
				<div class="col-sm-9">
					<input type="text" name="nick" class="form-control input-sm" value="<?php echo $d['nick_die']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">No. Dies</label>
				<div class="col-sm-9">
					<input type="text" name="no_die" class="form-control input-sm" value="<?php echo $d['no_die']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Kategori</label>
				<div class="col-sm-5">
					<select name="kategori" class="form-control input-sm" id="combobox">
						<option value=""></option>
						<option value="Casting" <?php echo cek($d['kategori'],"Casting","Selected"); ?>>Casting</option>
						<option value="Moulding" <?php echo cek($d['kategori'],"Moulding","Selected"); ?>>Moulding</option>
						<option value="Trimming" <?php echo cek($d['kategori'],"Trimming","Selected"); ?>>Trimming</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Lokasi</label>
				<div class="col-sm-9">
					<input type="text" name="lokasi" class="form-control input-sm" value="<?php echo $d['location']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-9">
					<input type="hidden" name="id" value="<?php echo $d['id_die']; ?>">
					<input type="submit" name="die" value="Edit" class="btn btn-sm btn-primary">
					<input type="button" name="cancel" value="Batal" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>