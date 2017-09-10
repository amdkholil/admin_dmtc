<?php
if ($_SESSION['level']=="admin"){
	$q=select_id("user",$_GET['id']);
	$d=$q->fetch_assoc();
}
elseif($_SESSION['level']=='user') {
	$q=$mysqli->query("select * from user where username='".$_SESSION['username']."' and level='user'");
	$d=$q->fetch_assoc();
}
?>
<div class="row submenu">

	<div class="col-sm-3">
			
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Pengguna &#8594; Edit <i><?php echo $d['username']; ?></i></span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Username</label>
				<div class="col-sm-6">
					<input type="text" name="username" class="form-control input-sm" value="<?php echo $d['username']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Password</label>
				<div class="col-sm-6">
					<input type="password" name="password" class="form-control input-sm" value="<?php echo $d['password']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="fullname" class="form-control input-sm"  value="<?php echo $d['fullname']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Email</label>
				<div class="col-sm-6">
					<input type="email" name="email" class="form-control input-sm"  value="<?php echo $d['email']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">No. Telp.</label>
				<div class="col-sm-6">
					<input type="phone" name="phone" class="form-control input-sm"  value="<?php echo $d['phone']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Level</label>
				<div class="col-sm-5">
					<?php if ($_SESSION['level']=="admin") { ?>
					<select name="level" class="form-control input-sm" id="combobox" required>
						<option value="0"></option>
						<option value="admin" <?php echo cek($d['level'],"admin","selected"); ?> >Admin</option>
						<option value="user" <?php echo cek($d['level'],"user","selected"); ?> >User</option>
					</select>
					<?php } 
					else {?><label>User</label>
					<input type="hidden" name="level" class="form-control input-sm" value="user">
					<?php } ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
					<input type="hidden" name="id" value="<?php echo $d['id_user']; ?>">
					<input type="submit" value="Edit" name="user" class="btn btn-sm btn-primary"> &nbsp; 
					<input type="button" value="Batal" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>