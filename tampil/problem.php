<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?f=new-problem">Tambah</a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Jenis Masalah</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-5">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff">
			<thead>
				<tr class="info">
					<th width="50">No.</th>
					<th>Jenis Masalah</th>
					<th width="150">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$st=0;
				$q=select_order("problem","problem asc");
				while ($d=$q->fetch_assoc())
				{ ?>
				<tr>
					<td align="center"><?php $st++; echo $st; ?></td>
					<td><?php echo $d['problem']; ?></td>
					<td align="center">
						<a href="?f=edit-problem&id=<?php echo $d['id_problem']; ?>" class="btn btn-primary btn-xs">Edit</a>
						<a href="proses/proses.php?hapus=problem&id=<?php echo $d['id_problem']; ?>" class="btn btn-danger btn-xs" onclick="return konfirmhapus();">Hapus</a>
					</td>
				</tr>
				<?php
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
    	"lengthMenu": [[10], [10]],
    	"bLengthChange": false,
    	"filter":false
    });
  	});
</script>