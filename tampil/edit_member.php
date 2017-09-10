<?php
notif();
$q=select_id("member",$_GET['id']);
$d=$q->fetch_assoc();
?>
<div class="row submenu">

	<div class="col-sm-3">
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Member &#8594; Edit</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Nama</label>
				<div class="col-sm-4">
					<input type="text" name="nama" class="form-control input-sm" value="<?php echo $d['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Jabatan</label>
				<div class="col-sm-3" >
					<select name="jabatan" class="form-control input-sm" id="combobox">
						<option value=""></option>
						<option value="Teknisi" <?php echo cek("Teknisi",$d['jabatan'],"selected"); ?>>Teknisi</option>
						<option value="Leader" <?php echo cek("Leader",$d['jabatan'],"selected"); ?>>Leader</option>
						<option value="Foreman" <?php echo cek("Foreman",$d['jabatan'],"selected"); ?>>Foreman</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<input type="submit" value="Edit" name="member" class="btn btn-sm btn-primary"> &nbsp; 
					<input type="button" value="&nbsp; Batal &nbsp;" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>