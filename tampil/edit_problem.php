<?php
$q=select_id("problem",$_GET['id']);
$d=$q->fetch_assoc();
?>
<div class="row submenu">

	<div class="col-sm-3">
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Jenis Masalh &#8594; tambah baru</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="post" action="proses/proses.php" class="form-horizontal fieldset">
			<div class="form-group">
				<label class="col-sm-2">Jenis Maslah</label>
				<div class="col-sm-4">
					<input type="text" name="problem_name" class="form-control input-sm" value="<?php echo $d['problem']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-6">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<input type="submit" value="Edit" name="problem" class="btn btn-sm btn-primary"> &nbsp; 
					<input type="button" value="&nbsp; Batal &nbsp;" class="btn btn-sm btn-default" onclick="history.go(-1)">
				</div>
			</div>
		</form>
	</div>
</div>