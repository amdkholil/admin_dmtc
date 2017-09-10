<?php
notif();
?>
<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?m=setting&f=new-die">Tambah</a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Dies</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff" width="100%">
			<thead>
				<tr align="center" class="info">
					<th>No.</th>
					<th>Nama Die</th>
					<th>Nick</th>
					<th>No. Die</th>
					<th>Kategori</th>
					<th>Lokasi</th>
					<th width="150">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$st=0;
				$q=select_order("die","nick_die asc");
				while ($d=$q->fetch_assoc())
				{
				?>
				<tr>
					<td align="center"><?php $st++; echo $st; ?></td>
					<td><?php echo $d['name_die']; ?></td>
					<td align="center"><?php echo $d['nick_die']; ?></td>
					<td align="center"><?php echo $d['no_die']; ?></td>
					<td align="center"><?php echo $d['kategori']; ?></td>
					<td align="center"><?php echo $d['location']; ?></td>
					<td  align="center">
						<a href="?f=edit-die&id=<?php echo $d['id_die']; ?>" class="btn btn-xs btn-primary">Edit</a>
						<a href="proses/proses.php?hapus=die&id=<?php echo $d['id_die']; ?>" class="btn btn-xs btn-danger" onclick="return konfirmhapus()">Hapus</a>
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
    	"bLengthChange": false
    });
  	});
</script>