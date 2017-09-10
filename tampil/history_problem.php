<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?f=new-history-problem"> Tambah </a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">History Problem Dies</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff" width="100%">
			<thead>
			<tr class="info">
				<th style="text-align: center;">No.</th>
				<th style="text-align: center;">Tanggal</th>
				<th style="text-align: center;">Shift</th>
				<th style="text-align: center;">Mesin</th>
				<th style="text-align: center;">Tipe Dies</th>
				<th style="text-align: center;">Masalah</th>
				<th style="text-align: center;" style="text-align: center;">Detail Masalah</th>
				<th style="text-align: center;">Penanganan</th>
				<th style="text-align: center;">Freq.</th>
				<th style="text-align: center;">Menit</th>
				<th style="text-align: center;">Tindakan</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				$query="SELECT * FROM problem_die NATURAL JOIN mesin NATURAL JOIN die NATURAL JOIN problem NATURAL JOIN member order by id_problem_die desc";
				$data=$mysqli->query($query);
				$i=0;
				while($d=$data->fetch_assoc())
				{ $i++; ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $d['date']; ?></td>
					<td><?php echo $d['shift']; ?></td>
					<td><?php echo $d['kd_mesin']; ?></td>
					<td><?php echo $d['nick_die']; ?></td>
					<td><?php echo $d['problem']; ?></td>
					<td><?php echo $d['detail_problem']; ?></td>
					<td><?php echo $d['action']; ?></td>
					<td><?php echo $d['freq']; ?></td>
					<td><?php echo $d['minutes']; ?></td>
					<td align="center">
						<a href="?f=edit-history-problem&id=<?php echo $d['id_problem_die']; ?>" class="btn btn-xs btn-primary">Edit</a>
						<a href="proses/proses.php?hapus=problem-die&id=<?php echo $d['id_problem_die']; ?>" class="btn btn-xs btn-danger" onclick="return konfirmhapus();">Hapus</a>
					</td>
				</tr>	
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
	<script type="text/javascript" src="ui/datatables.js"></script>
	<script> 
	$(document).ready(function(){
    $('.data').DataTable({
    	"lengthMenu": [[10, 15, 30], [10, 15, 30]]
    });
  	});
	</script>