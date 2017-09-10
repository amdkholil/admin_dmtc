<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
			
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Pengguna &#8594; Tambah Baru</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Username</label>
				<div class="col-sm-6">
					<input type="text" name="username" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Password</label>
				<div class="col-sm-6">
					<input type="password" name="password" class="form-control input-sm" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="fullname" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Email</label>
				<div class="col-sm-6">
					<input type="email" name="email" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">No. Telp.</label>
				<div class="col-sm-6">
					<input type="phone" name="phone" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Level</label>
				<div class="col-sm-5">
					<select name="level" class="form-control input-sm" id="combobox" required>
						<option value="0"></option>
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
					<input type="submit" value="Simpan" name="user" class="btn btn-sm btn-primary"> &nbsp; 
					<input type="button" value="&nbsp; Batal &nbsp;" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>