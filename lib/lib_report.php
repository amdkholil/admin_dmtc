<?php

class report extends mysqli
{
	var $tbl;
	var $bulan;
	var $tahun;
	var $mg1=" day(date)<7 ";
	var $mg2=" day(date)>7 and day(date)<=14 ";
	var $mg3=" day(date)>14 and day(date)<=21 ";
	var $mg4=" day(date)>21 ";
	var $menit="select sum(minutes) as total FROM ";
	var $masalah;
	function __construct($tbl)
	{
		$this->tbl=$tbl;
	}

	function set_bulan($bulan)
	{
		$this->bulan=$bulan;
	}

	function set_tahun($thn)
	{
		$this->tahun=$thn;
	}
	function set_masalah($masalah)
	{
		$this->masalah=$masalah;
	}

	function tot_jam_bulan() //mendapatkan total jam seluruh problem dalah 1 bulan
	{
		$q=$this->menit;
		$q.=$this->tbl;
		$q.=" where year(date)=".$this->tahun;
		if (isset($this->bulan)) { $q.=" and month(date)=".$this->bulan; }
		require 'config.php';
		$d=$mysqli->query($q)->fetch_assoc();
		$result=$d['total'];
		return $result/60;
	}

	function get_jam_minggu($no) // mendapatkan jam berdasarkan problem per minggu
	{
		require 'config.php';
		$q=$this->menit;
		$q.=$this->tbl;
		$q.=" where ";
		switch ($no) {
			case '1':
				$q.=$this->mg1;
				break;
			case '2':
				$q.=$this->mg2;
				break;
			case '3':
				$q.=$this->mg3;
				break;
			case '4':
				$q.=$this->mg4;
				break;
		}
		$q.=" and year(date)=".$this->tahun;
		if(isset($this->bulan)){ $q.=" and month(date)=".$this->bulan; }
		if (isset($this->masalah)){	$q.=" and id_problem=".$this->masalah.""; }
		$d=$mysqli->query($q);
		$dt=$d->fetch_assoc();
		$result=$dt['total']/60;
		if (is_null($result)) { $result=0; }
		return $result;
	}

	function get_problem() //mendapatkan list problem
	{
		$q="select id_problem, problem FROM ".$this->tbl;
		$q.=" NATURAL JOIN problem where ";		
		$q.=" year(date)=".$this->tahun;
		if(isset($this->bulan)){ $q.=" and month(date)=".$this->bulan; }
		$q.=" GROUP by problem ORDER by sum(minutes) desc";
		require 'config.php';
		$result=$mysqli->query($q);
		if (mysqli_num_rows($result)<1) {
			$result=0;
		}
		return $result;
	}

	function get_jam_problem() //mendapatkan jumlah jam berdasarkan problem perbulan
	{
		require 'config.php';
		$q=$this->menit;
		$q.=$this->tbl;
		$q.=" where ";
		$q.=" year(date)=".$this->tahun;
		if(isset($this->bulan)){ $q.=" and month(date)=".$this->bulan; }
		if(isset($this->masalah)){ $q.=" and id_problem=".$this->masalah; }
		$d=$mysqli->query($q);
		$dt=$d->fetch_assoc();
		$result=$dt['total']/60;
		if (is_null($result)) { $result=0; }
		return $result;
	}

	function get_jam_bulan_minggu($no) // mendapatkan jumlah jam seluruh problem per minggu
	{
		require 'config.php';
		$q=$this->menit;
		$q.=$this->tbl;
		$q.=" where ";
		switch ($no) {
			case '1':
				$q.=$this->mg1;
				break;
			case '2':
				$q.=$this->mg2;
				break;
			case '3':
				$q.=$this->mg3;
				break;
			case '4':
				$q.=$this->mg4;
				break;
		}
		$q.=" and month(date)=".$this->bulan;
		$q.=" and year(date)=".$this->tahun;
		$d=$mysqli->query($q);
		$dt=$d->fetch_assoc();
		$result=$dt['total']/60;
		if (is_null($result)) { $result=0; }
		return $result;
	}

	function get_jam_bulan($no) //mendapatkan jam berdasarkan problem per bulan
	{
		require 'config.php';
		$q=$this->menit;
		$q.=$this->tbl;
		$q.=" where ";
		$q.=" month(date)=".$no;
		$q.=" and year(date)=".$this->tahun;
		if (isset($this->masalah)) {	$q.=" and id_problem=".$this->masalah.""; }
		$d=$mysqli->query($q);
		$dt=$d->fetch_assoc();
		$result=$dt['total']/60;
		if (is_null($result)) { $result=0; }
		return $result;
	}

	function tot_jam_tahun()
	{
		$q=$this->menit;
		$q.=$this->tbl;
		$q.=" where year(date)=".$this->tahun;
		require 'config.php';
		$d=$mysqli->query($q);
		$dt=$d->fetch_assoc();
		$result=$dt['total']/60;
		return $result;
	}
}

class export extends mysqli
{
	var $tbl;
	var $stTgl;
	var $toTgl;
	var $mesin;
	var $die;
	var $masalah;
	var $pmbm;
	var $go;

	function __construct($tbl){
		$this->tbl=$tbl;
	}

	function stTgl($sttgl){
		$this->stTgl=$sttgl;
	}

	function toTgl($toTgl){
		$this->toTgl=$toTgl;
	}

	function mesin($mesin){
		$this->mesin=$mesin;
	}

	function die($die){
		$this->die=$die;
	}

	function masalah($masalah){
		$this->masalah=$masalah;
	}

	function pmbm($pmbm){
		$this->pmbm=$pmbm;
	}

	function export(){
		include 'config.php';
		$q="select * from ".$this->tbl;
		$q.=" natural join mesin natural join die natural join problem natural join member ";
		if(isset($this->mesin)){ $q.=" where kd_mesin like '%".$this->mesin."%' "; }
		if(isset($this->die)){ $q.=" and nick_die like '%".$this->die."%' "; }
		if(isset($this->masalah)){ $q.=" and problem like '%".$this->masalah."%' "; }
		if(isset($this->pmbm)){ $q.=" and pm_bm like '%".$this->pmbm."%' "; }
		if(isset($this->stTgl)){ $q.=" and date>='".$this->stTgl."' "; }
		if(isset($this->toTgl)){ $q.=" and date<='".$this->toTgl."' "; }
		$q.=" order by date desc";
		return $q;
	}
}
?>