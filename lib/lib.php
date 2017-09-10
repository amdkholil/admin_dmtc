<?php
require_once "config.php";
function sessionme()
{
	session_start();
	if(!isset($_SESSION['level']))
	{
		header("Location: login.php");
	}
}

function select_tbl($tbl)
{
	require 'config.php';
	$query=$mysqli->query("select * from $tbl");
	return $query;
}

function select_id($tbl,$id)
{
	require 'config.php';
	$q=$mysqli->query("select * from $tbl where id_$tbl=$id");
	return $q;
}

function select_order($tbl,$order)
{
	require 'config.php';
	$q=$mysqli->query("select * from $tbl order by $order");
	return $q;
}

function select_order_limit($tbl,$order,$limit)
{
	require 'config.php';
	$q=$mysqli->query("select * from $tbl order by $order limit $limit");
	return $q;
}

function select_tot_row($tbl)
{
	require 'config.php';
	$q=$mysqli->query("select count(id_$tbl) as total from $tbl");
	$d=$q->fetch_assoc();
	$dt=$d['total'];
	return $dt;
}

function hapus_data($tbl,$id)
{
	require 'config.php';
	$query=$mysqli->query("delete from $tbl where id_$tbl=$id");
	return $query;
}

function nick_die()
{
	require 'config.php';
	$nick=array();
	$query=$mysqli->query("select * from die");
	while($d=$query->fetch_assoc())
	{
		$nick[]=$d['nick_die'];
	}
	$nick_die=json_encode($nick);
	return $nick_die;
}

function action_list()
{
	require 'config.php';
	$action=array();
	$q=$mysqli->query("select * from action");
	while($d=$q->fetch_assoc())
	{
		$action[]=$d['action'];
	}
	$result= json_encode($action);
	return $result;
}

function member()
{
	require 'config.php';
	$q=select_tbl("member");
	$a=array();
	while ($d=$q->fetch_assoc())
	{
		$a[]=$d['nama'];
	}
	$r= json_encode($a);
	return $r;
}

function cek($value1,$value2,$hasil)
{
	if ($value1==$value2)
	{
		$result=$hasil;
	}
	else
	{
		$result="";
	}
	return $result;
}

function notif()
{
	if (isset($_SESSION['notif']) and $_SESSION['notif'] <> "")
	{
		echo "<div class='notif'>".$_SESSION['notif']."</div>";
	}
	$_SESSION['notif']="";
}

function potong($data,$angka)
{
	$potong=explode(" ", $data);
	if (count($potong)<$angka)
	{
		$result=$data;
	}
	else
	{
		$result=implode(" ", array_splice($potong, 0, $angka))."...";
	}
	return $result;
}
function bulan($x) {
    if ($x == 1 ) {
        $bulan = "Januari"; }
    if ($x == 2 ) {
        $bulan = "Februari"; }
    if ($x == 3 ) {
        $bulan = "Maret"; }
    if ($x == 4 ) {
        $bulan = "April"; }
    if ($x == 5 ) {
        $bulan = "Mei"; }
    if ($x == 6 ) {
        $bulan = "Juni"; }
    if ($x == 7 ) {
        $bulan = "Juli"; }
    if ($x == 8 ) {
        $bulan = "Agustus"; }
    if ($x == 9 ) {
        $bulan = "September"; }
    if ($x == 10) {
        $bulan = "Oktober"; }
    if ($x == 11) {
        $bulan = "November"; }
    if ($x == 12) {
        $bulan = "Desember"; }
    return $bulan;
}
?>