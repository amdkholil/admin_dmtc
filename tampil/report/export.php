<?php
switch ($_GET['r']) {
	case 'hrepair':
		$title="History Repair Dies";
		$tbl="repair_die";
		break;
	case 'hproblem':
		$title="History Problem Dies";
		$tbl="problem_die";
		break;
}
?>
<div class="row submenu">
	<div class="col-sm-1">
		<input type="button" value="Filter" class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#filter">
	</div>
	<div class="col-sm-8">
		<span class="h-title"><?php echo "$title"; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form method="POST" action="" class="form-horizontal collapse" id="filter">
			<div class="form-group">
				<div class="col-sm-2">
					<input type="text" name="st_tgl" class="form-control input-sm" id="datepicker" placeholder="dari tanggal">
				</div>
				<div class="col-sm-2">
					<input type="text" name="to_tgl" class="form-control input-sm" id="datepicker2" placeholder="sampai tanggal">
				</div>
				<div class="col-sm-1">
					<input type="text" name="mesin" class="form-control input-sm	" placeholder="Mesin">
				</div>
				<div class="col-sm-2">
					<input type="text" name="dies" class="form-control input-sm" placeholder="Dies">
				</div>
				<?php if ($tbl=="repair_die") { ?>
				<div class="col-sm-1">
					<input type="text" name="pm_bm" class="form-control input-sm" placeholder="PM/BM">
				</div><?php } ?>
				<div class="col-sm-3">
					<select name="masalah" class="form-control input-sm">
						<option value="">Masalah Die</option>
						<?php
						$q=select_tbl("problem");
						while ($dt=$q->fetch_assoc()) {
							echo "<option value=\"".$dt['problem']."\">".$dt['problem']."</option>";
						}
						?>
					</select>
				</div>
				<div class="col-sm-1">
					<input type="submit" name="go" value="Cari" class="btn btn-sm btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<table class="data table table-condensed table-bordered table-hover" id="data" style="background: #fff">
			<thead>
				<tr class="success">
					<th>No.</th>
					<th>Tanggal</th>
					<th>Shift</th>
					<th>Mesin</th>
					<th>Tipe Die</th>
					<?php if ($tbl=="repair_die") { ?>
					<th>PM/BM</th><?php }?>
					<th>Masalah</th>
					<th>Perbaikan</th>
					<th>Menit</th>
					<?php if ($tbl=="problem_die") { ?>
					<th>Freq.</th><?php }?>
					<th>Pic</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$e=new export($tbl);
				if (isset($_POST['go'])){
					if (isset($_POST['st_tgl']) and $_POST['st_tgl']!='') { $e->stTgl($_POST['st_tgl']); }
					if (isset($_POST['to_tgl']) and $_POST['to_tgl']!='') { $e->toTgl($_POST['to_tgl']); }
					if (isset($_POST['mesin'])) { $e->mesin($_POST['mesin']); }
					if (isset($_POST['dies']) and $_POST['dies']!='') { $e->die($_POST['dies']); }
					if (isset($_POST['pm_bm']) and $_POST['pm_bm']!='') { $e->pmbm($_POST['pm_bm']); }
					if (isset($_POST['masalah']) and $_POST['masalah']!='') { $e->masalah($_POST['masalah']); }
				}
				$i=1;
				$q=$e->export();
				$qr=$mysqli->query($q);
				while ($dt=$qr->fetch_assoc()) {
				?>
				<tr>
					<td align="center"><?php echo $i; $i++; ?></td>
					<td><?php echo $dt['date']; ?></td>
					<td><?php echo $dt['shift']; ?></td>
					<td><?php echo $dt['kd_mesin']; ?></td>
					<td><?php echo $dt['nick_die']; ?></td>
					<?php if ($tbl=="repair_die") { ?>
					<td><?php echo $dt['pm_bm']; ?></td> <?php }?>
					<td><?php echo $dt['problem']; ?></td>
					<td width="300px">
						<?php echo $dt['action']; ?>
					</td>
					<td align="center"><?php echo $dt['minutes']; ?></td>
					<?php if($tbl=="problem_die") { ?>
					<td align="center"><?php echo $dt['freq']; ?></td> <?php }?>
					<td align="center"><?php echo $dt['nama']; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="ui/datatables.js"></script>
<script type="text/javascript" src="ui/e/dataTables.buttons.js"></script>
<script type="text/javascript" src="ui/e/buttons.html5.js"></script>
<script type="text/javascript" src="ui/e/jszip.min.js"></script>
<script type="text/javascript" src="ui/e/pdfmake.min.js"></script>
<script type="text/javascript" src="ui/e/vfs_fonts.js"></script>
<script> 
$(function(){
    $('.data').DataTable({
    	"lengthMenu": [[10, 15, 30], [10, 15, 30]],
    	"filter":false,
    	dom: 'Bfrtip',
      buttons: [
      {
        extend: 'excelHtml5',
        title: '<?php echo $title; ?>'
      },
      {
        extend: 'pdfHtml5',
        title: '<?php echo $title; ?>',
      }
      ]
    });
});
</script>