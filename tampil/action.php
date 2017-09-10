<?php notif(); ?>

<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?f=new-action">Tambah</a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Jenis Penanganan</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-5">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff">
			<thead>
				<tr class="active">
					<th width="50">No.</th>
					<th>Jenis Penanganan</th>
					<th width="150">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$st=0; $p=1;
				$q=select_order("action","action asc");
				while ($d=$q->fetch_assoc())
				{ ?>
				<tr>
					<td align="center"><?php $st++; echo $st; ?></td>
					<td><?php echo $d['action']; ?></td>
					<td align="center">
						<a href="?f=edit-action&id=<?php echo $d['id_action']; ?>" class="btn btn-primary btn-xs">Edit</a>
						<a href="proses/proses.php?hapus=action&id=<?php echo $d['id_action']; ?>" class="btn btn-danger btn-xs" onclick="return konfirmhapus()">Hapus</a>
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
    	"lengthMenu": [[10], [10]],
    	"bLengthChange": false,
    	"filter":false
    });
  	});
</script>