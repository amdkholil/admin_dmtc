<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?f=new-history-repair">Tambah</a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">History Repair Dies</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff" width="100%">
			<thead>
			<tr class="info">
				<th style="text-align: center;">No.</th>
				<th style="text-align: center;">Tanggal</th>
				<th style="text-align: center;">DCM</th>
				<th style="text-align: center;">Tipe Dies</th>
				<th style="text-align: center;">PM/BM</th>
				<th style="text-align: center;">Masalah</th>
				<th style="text-align: center;">Perbaikan</th>
				<th style="text-align: center;">Menit</th>
				<th style="text-align: center;">Tindakan</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				$query="SELECT * from repair_die natural join mesin natural join die natural join problem order by id_repair_die desc";
				$data=$mysqli->query($query);
				$i=0;
				while($d=$data->fetch_assoc())
				{
					$i++;
					echo "<tr>";
					echo "<td align='center'>$i</td>";
					echo "<td align='center'>$d[date]</td>";
					echo "<td align='center'>$d[kd_mesin]</td>";
					echo "<td>$d[nick_die]</td>";
					echo "<td align='center'>$d[pm_bm]</td>";
					echo "<td>$d[problem]</td>";
					echo "<td>".potong($d['action'],4)."</td>";
					echo "<td align=right>".$d['minutes']."</td>";
					echo "<td align='center'>
						<a href=\"?f=edit-history-repair&id=$d[id_repair_die]\" class=\"btn btn-primary btn-xs\">&nbsp; Edit &nbsp;</a> 
						<a href=\"proses/proses.php?hapus=hrepair&id=$d[id_repair_die]\" class=\"btn btn-danger btn-xs\" onclick=\"return konfirmhapus()\">hapus</a></td>";
					echo "</tr>";
				}
			?>
			</tbody>
		</table>
	</div>
</div>
	<script type="text/javascript" src="ui/datatables.js"></script>
	<script> 
	$(document).ready(function(){
    $('.data').DataTable({
    	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
  	});
	</script>