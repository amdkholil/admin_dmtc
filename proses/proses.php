<?php
require_once '../lib/config.php';
require_once '../lib/lib.php';
sessionme();

if(isset($_POST['act']))  //history repair
{
	switch ($_POST['act']) {
		case 'Simpan':
			$tanggal=$_POST['tanggal'];
			$shift=$_POST['shift'];
			$dcm=$_POST['dcm'];
			$die=$_POST['die'];
			$pm_bm=$_POST['pm_bm'];
			$problem=$_POST['problem'];
			$action=$_POST['action'];
			$member=$_POST['member'];
			$menit=$_POST['menit'];
			$q=$mysqli->query("INSERT INTO repair_die values('','$tanggal','$shift','$dcm','$die','$pm_bm','$problem','$action','$menit','$member')");
			$_SESSION['notif']="Input data sukses!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$tanggal=$_POST['tanggal'];
			$shift=$_POST['shift'];
			$dcm=$_POST['dcm'];
			$die=$_POST['die'];
			$pm_bm=$_POST['pm_bm'];
			$problem=$_POST['problem'];
			$action=$_POST['action'];
			$member=$_POST['member'];
			$menit=$_POST['menit'];
			$id=$_POST['id'];
			$q=$mysqli->query("update repair_die set date='$tanggal', shift='$shift', id_mesin='$dcm', id_die='$die', pm_bm='$pm_bm', id_problem='$problem', action='$action', minutes='$menit', id_member='$member' where id_repair_die=$id");
			$_SESSION['notif']="Edit data sukses!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}

if (isset($_POST['history_problem']))
{
	switch ($_POST['history_problem']) {
		case 'Simpan':
			$tanggal=$_POST['tanggal'];
			$shift=$_POST['shift'];
			$mesin=$_POST['mesin'];
			$die=$_POST['die'];
			$masalah=$_POST['masalah'];
			$detail_masalah=$_POST['detail_masalah'];
			$penanganan=$_POST['penanganan'];
			$pic=$_POST['pic'];
			$frek=$_POST['freq'];
			$menit=$_POST['menit'];
			$q="insert into problem_die values('','$tanggal','$shift','$mesin','$die','$masalah','$detail_masalah','$penanganan','$frek','$menit','$pic')";
			$query=$mysqli->query($q);
			$_SESSION['notif']="Data berhasil disimpan!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$tanggal=$_POST['tanggal'];
			$shift=$_POST['shift'];
			$mesin=$_POST['mesin'];
			$die=$_POST['die'];
			$masalah=$_POST['masalah'];
			$detail_masalah=$_POST['detail_masalah'];
			$penanganan=$_POST['penanganan'];
			$pic=$_POST['pic'];
			$frek=$_POST['freq'];
			$menit=$_POST['menit'];
			$id=$_POST['id'];
			$q="update problem_die set date='$tanggal', shift='$shift', id_mesin='$mesin', id_die='$die', id_problem='$masalah', detail_problem='$detail_masalah', action='$penanganan', freq='$frek', minutes='$menit', id_member='$pic' where id_problem_die='$id'";
			$query=$mysqli->query($q);
			$_SESSION['notif']="Data berhasil diubah!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}
if (isset($_GET['hapus']))
{
	switch ($_GET['hapus']) {
		case 'hrepair':
			$id=$_GET['id'];
			hapus_data("repair_die",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'problem-die':
			$id=$_GET['id'];
			hapus_data("problem_die",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'user':
			$id=$_GET['id'];
			hapus_data("user",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'die':
			$id=$_GET['id'];
			hapus_data("die",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'member':
			$id=$_GET['id'];
			hapus_data("member",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'problem':
			$id=$_GET['id'];
			hapus_data("problem",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'action':
			$id=$_GET['id'];
			hapus_data("action",$id);
			$_SESSION['notif']="Data berhasil dihapus!!";
			echo "<script> javascript:history.back(); </script>";
			break;
	}
	
}

if (isset($_POST['user']))
{
	switch ($_POST['user']) {
		case 'Simpan':
			$username=$_POST['username'];
			$password=$_POST['password'];
			$fullname=$_POST['fullname'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$level=$_POST['level'];
			$q=$mysqli->query("insert into user values('','$username','$password','$fullname','$email','$phone','$level')");
			$_SESSION['notif']="Berhasil menambahkan user baru !!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$username=$_POST['username'];
			$password=$_POST['password'];
			$fullname=$_POST['fullname'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$level=$_POST['level'];
			$id=$_POST['id'];
			$q=$mysqli->query("update user set username='$username', password='$password', fullname='$fullname', email='$email', phone='$phone', level='$level' where id_user=$id");
			$_SESSION['notif']="Berhasil mengedit data user!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}

if (isset($_POST['die']))
{
	switch ($_POST['die']){
		case 'Simpan':
			$nama=$_POST['nama_die'];
			$nick=$_POST['nick'];
			$no=$_POST['no_die'];
			$kategori=$_POST['kategori'];
			$lokasi=$_POST['lokasi'];
			$q=$mysqli->query("insert into die values('','$nama','$nick','$no','$kategori','$lokasi')");
			$_SESSION['notif']="Berhasil menambahkan data die baru!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$nama=$_POST['nama_die'];
			$nick=$_POST['nick'];
			$no=$_POST['no_die'];
			$kategori=$_POST['kategori'];
			$lokasi=$_POST['lokasi'];
			$id=$_POST['id'];
			$q=$mysqli->query("update die set name_die='$nama', nick_die='$nick', no_die='$no', kategori='$kategori', location='$lokasi' where id_die=$id ");
			$_SESSION['notif']="Berhasil mengedit data die!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}



if (isset($_POST['mesin']))
{
	switch ($_POST['mesin']){
		case 'Simpan':
			$kd_mesin=$_POST['kd_mesin'];
			$nama_mesin=$_POST['nama_mesin'];
			$q=$mysqli->query("insert into mesin values('','$kd_mesin','$nama_mesin')");
			$_SESSION['notif']="Berhasil menambahkan data mesin baru!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$kd_mesin=$_POST['kd_mesin'];
			$nama_mesin=$_POST['nama_mesin'];
			$id=$_POST['id'];
			$q=$mysqli->query("update mesin set kd_mesin='$kd_mesin', nama_mesin='$nama_mesin' where id_mesin=$id ");
			$_SESSION['notif']="Berhasil mengedit data Mesin!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}


if (isset($_POST['member']))
{
	switch ($_POST['member']){
		case 'Simpan':
			$nama=$_POST['nama'];
			$jabatan=$_POST['jabatan'];
			$q=$mysqli->query("insert into member values('','$nama','$jabatan')");
			$_SESSION['notif']="Berhasil menambahkan data member baru!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$nama=$_POST['nama'];
			$jabatan=$_POST['jabatan'];
			$id=$_POST['id'];
			$q=$mysqli->query("update member set nama='$nama', jabatan='$jabatan' where id_member=$id ");
			$_SESSION['notif']="Berhasil mengedit data Member!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}

if (isset($_POST['problem']))
{
	switch ($_POST['problem']){
		case 'Simpan':
			$problem=$_POST['problem_name'];
			$q=$mysqli->query("insert into problem values('','$problem')");
			$_SESSION['notif']="Berhasil menambahkan data jenis masalah baru!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$problem=$_POST['problem_name'];
			$id=$_POST['id'];
			$q=$mysqli->query("update problem set problem='$problem' where id_problem=$id ");
			$_SESSION['notif']="Berhasil mengedit data jenis masalah!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}

if (isset($_POST['action']))
{
	switch ($_POST['action']){
		case 'Simpan':
			$action=$_POST['action_name'];
			$q=$mysqli->query("insert into action values('','$action')");
			$_SESSION['notif']="Berhasil menambahkan data Penanganan baru!!";
			echo "<script> javascript:history.back(); </script>";
			break;
		case 'Edit':
			$action=$_POST['action_name'];
			$id=$_POST['id'];
			$q=$mysqli->query("update action set action='$ation' where id_action=$id ");
			$_SESSION['notif']="Berhasil mengedit data Penanganan!!";
			echo "<script> javascript:history.go(-2); </script>";
			break;
	}
}
















?>