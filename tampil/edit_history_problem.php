<?php 
notif();
include "lib/lib_js.php";
$q=select_id("problem_die",$_GET['id']);
$dt=$q->fetch_assoc();	
?>
<div class="row submenu">
	<div class="col-sm-12">
		<span class="h-title"> Input History Repair Die</span>
	</div>	
</div>
<div class="row">
	<div class="col-sm-12">&nbsp;</div>
</div>
<div class="row">
	<form method="post" action="proses/proses.php" class="form-horizontal">
		<div class="col-sm-10">
			<div class="form-group">
				<label class="col-sm-2">Tanggal</label>
				<div class="col-sm-4">
					<input type="text" name="tanggal" class="form-control input-sm " id="datepicker" value="<?php echo $dt['date']; ?>" required>
				</div>
				<div class="col-sm-2">
					<select name="shift" id="combobox">
						<option value="Siang" <?php echo cek($dt['shift'],"Siang","Selected"); ?>>Siang</option>
						<option value="Malam" <?php echo cek($dt['shift'],"Malam","Selected"); ?>>Malam</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Mesin</label>
				<div class="col-sm-2">
					<select name="mesin" id="combobox1">
						<option value=""></option>
						<?php
						$q=select_tbl("mesin");
						while ($d=$q->fetch_assoc()) {
							echo "<option value=\"$d[id_mesin]\" ".cek ($d['id_mesin'],$dt['id_mesin'],"selected").">$d[kd_mesin]</option>";
						} ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Die</label>
				<div class="col-sm-4">
					<select name="die" id="combobox2">
						<option value=""></option>
						<?php
						$q=select_tbl("die");
						while ($d=$q->fetch_assoc()) {
							echo "<option value=\"$d[id_die]\" ".cek($d['id_die'],$dt['id_die'],"selected").">$d[nick_die]</option>";
						} ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Masalah</label>
				<div class="col-sm-6">
					<select name="masalah" id="combobox3">
						<option value=""></option>
						<?php
						$q=select_tbl("problem");
						while ($d=$q->fetch_assoc()) {
							echo "<option value=\"$d[id_problem]\" ".cek($d['id_problem'],$dt['id_problem'],"Selected").">";
							echo "$d[problem]</option>";
						} ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Detail Masalah</label>
				<div class="col-sm-7">
					<input type="text" name="detail_masalah" class="form-control" value="<?php echo $dt['detail_problem']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2" style="padding-top: 20px;">Penanganan</label>
				<div class="col-sm-7">
					<textarea name="penanganan" rows="2" class="form-control" id="action_list"><?php echo $dt['action']; ?>
					</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">PIC</label>
				<div class="col-sm-3">
					<select name="pic" id="combobox4">
						<option value=""></option>
						<?php
						$q=select_tbl("member");
						while ($d=$q->fetch_assoc()) {
							echo "<option value=\"$d[id_member]\" ".cek($d['id_member'],$dt['id_member'],"selected").">";
							echo "$d[nama]</option>";
						} ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Frekuensi</label>
				<div class="col-sm-2">
					<input type="text" name="freq" class="form-control" id="numeric" value="<?php echo $dt['freq']; ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Waktu</label><span style="color: #999">*menit</span>
				<div class="col-sm-2">
					<input type="text" name="menit" class="form-control" id="numeric" value="<?php echo $dt['minutes']; ?>" required> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-5">
					<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<input type="submit" value="Edit" name="history_problem" class="btn btn-sm btn-primary"> &nbsp;
					<input type="button" value="Batal" name="back" class="btn btn-sm btn-default" onclick="history.go(-1);">
				</div>
			</div>
		</div>
	</form>
</div>