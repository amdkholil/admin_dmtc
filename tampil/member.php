<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?m=setting&f=new-member">Tambah</a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Member</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff">
			<thead>
				<tr align="center" class="info">
					<th width="50">No.</th>
					<th>Nama Member</th>
					<th>Jabatan</th>
					<th width="150px">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$st=0;
				$q=select_order("member","nama asc");
				while ($d=$q->fetch_assoc())
				{
				?>
				<tr>
					<td align="center"><?php $st++; echo $st;  ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td align="center"><?php echo $d['jabatan']; ?></td>
					<td align="center">
						<a href="?f=edit-member&id=<?php echo $d['id_member']; ?>" class="btn btn-xs btn-primary">Edit</a>
						<a href="proses/proses.php?hapus=member&id=<?php echo $d['id_member']; ?>" class="btn btn-xs btn-danger" onclick="return konfirmhapus()">Hapus</a>
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