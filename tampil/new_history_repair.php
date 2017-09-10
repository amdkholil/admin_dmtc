<?php 
notif();
include "lib/lib_js.php";
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
		<div class="col-sm-9">
			<div class="form-group">
				<label class="col-sm-2">Tanggal</label>
				<div class="col-sm-4">
					<input type="text" name="tanggal" class="form-control input-sm" id="datepicker" required="">
				</div>
				<div class="col-sm-2">
					<select name="shift" class="form-control input-sm" id="combobox">
						<option value="Siang">Siang</option>
						<option value="Malam">Malam</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Mesin</label>
				<div class="col-sm-2">
					<select name="dcm" class="form-control input-sm" id="combobox1">
						<option></option>
						<?php
						$query=$mysqli->query("select * from mesin order by kd_mesin asc");
						while($d=$query->fetch_assoc())
						{
							echo "<option value='$d[id_mesin]'>$d[kd_mesin]</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Tipe Die</label>
				<div class="col-sm-6">
					<select name="die" class="form-control input-sm" id="combobox2">
						<option value=""></option>
						<?php
							$q=select_tbl("die");
							while ($d=$q->fetch_assoc())
							{
								echo "<option value='$d[id_die]'>$d[nick_die]</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Masalah</label>
				<div class="col-sm-1">
					<select name="pm_bm" class="form-control input-sm" id="combobox3">
						<option value="PM">PM</option>
						<option value="BM">BM</option>
					</select>
				</div>
				<div class="col-sm-8">
					<select name="problem" class="form-control input-sm" id="combobox4">
						<option value=""></option>
						<?php
						$query=$mysqli->query("select * from problem order by problem asc");
						while($d=$query->fetch_assoc())
						{
							echo "<option value='$d[id_problem]'>$d[problem]</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2" style="padding-top: 10px; padding-bottom: 10px;">
					Tindakan
				</label>
				<div class="col-sm-10">
					<textarea name="action" class="form-control" id="action_list" rows="2" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">PIC</label>
				<div class="col-sm-5">
					<select name="member" class="form-control input-sm" id="combobox5">
						<option value=""></option>
						<?php
							$q=select_tbl("member");
							while ($d=$q->fetch_assoc())
							{
								echo "<option value='$d[id_member]'>$d[nama]</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Waktu</label><span style="color: #999">*menit</span>
				<div class="col-sm-2">
					<input type="text" name="menit" class="form-control input-sm" id="numeric" required> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-5">
					<input type="submit" value="Simpan" name="act" class="btn btn-sm btn-primary"> &nbsp;
					<input type="button" value="Batal" name="back" class="btn btn-sm btn-default" onclick="window.location='?m=history-repair';">
				</div>
			</div>
		</div>
	</form>
</div>