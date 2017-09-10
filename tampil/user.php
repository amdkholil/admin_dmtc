<?php
notif();
if ($_SESSION['level']=='admin'){
?>
<div class="row submenu">

	<div class="col-sm-3">
			<a class="btn btn-xs btn-primary" href="index.php?m=setting&f=new-user">Tambah</a>
	</div>
	<div class="col-sm-9">
		<span class="h-title">Kontrol Pengguna</span>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="data table table-condensed table-bordered table-hover" style="background: #fff" width="100%">
			<thead>
				<tr class="info">
					<th>No.</th>
					<th>Username</th>
					<th>Nama Lengkap</th>
					<th>Email</th>
					<th>No. Telepon</th>
					<th>Level</th>
					<th width="150px">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=1;
					$q=select_tbl("user");
					while ($d=$q->fetch_assoc())
					{
				?>
				<tr align="center">
				<td><?php echo $i; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['fullname']; ?></td>
				<td><?php echo $d['email']; ?></td>
				<td><?php echo $d['phone']; ?></td>
				<td><?php echo $d['level']; ?></td>
				<td>
					<a href="?f=edit-user&id=<?php echo $d['id_user']; ?>" class="btn btn-xs btn-primary"> &nbsp; Edit &nbsp; </a> &nbsp; 
					<a href="proses/proses.php?hapus=user&id=<?php echo $d['id_user']; ?>" class="btn btn-xs btn-danger" onclick="return konfirmhapus()" > Hapus </a>
				</td>
				</tr>
				<?php
						$i++;
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
    	"filter":false,
    	"paging":false
    });
  	});
</script>
<?php }
else { 
$q=$mysqli->query("select * from user where username='".$_SESSION['username']."' and level='user'");
$d=$q->fetch_assoc();
?>
<div class="row submenu">
	<div class="col-sm-9">
		<span class="h-title">Kontrol Pengguna</span>
	</div>
</div>
<div class="row fieldset">
	<div class="col-sm-5">
		<table class="usr table table-condensed table-bordered table-hover">
			<tr>
				<td width="110px">Username</td>
				<td><?php echo $d['username']; ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>*******</td>
			</tr>
			<tr>
				<td>Fullname</td>
				<td><?php echo $d['fullname']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $d['email']; ?></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><?php echo $d['phone']; ?></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><?php echo $d['level']; ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-sm-3" align="center">
		<a href="?f=edit-user" class="btn btn-sm btn-primary"> &nbsp; Edit &nbsp; </a>
	</div>
</div>
<?php } ?>