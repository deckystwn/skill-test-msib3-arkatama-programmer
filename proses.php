<?php
	include_once('connection.php');
	$data = $_POST['user'];
	$nama;
	$tahun;
	$kota;
	$nama_fix="";
	$tahun_fix="";
	$exp = explode(" ", $data);
	$count = count($exp);
	$no = 0;
	for ($i=0; $i <count($exp); $i++) { 
		if($exp[$i] === 'THN' || $exp[$i] === 'TAHUN' ){
			$arrSe = array_search('THN', $exp);
			$prev = array_slice($exp,$arrSe-$no,$no);
			$next = array_slice($exp,$arrSe-1,$no);
			
			$prevFixValue = array_pop($prev);
			$lastValue = array_pop($next);

			$nama = $prev;
			for ($a=0; $a < count($nama); $a++) { 
				$nama_fix .= $nama[$a]." ";
			}
			$tahun = $next;
			for ($a=0; $a < count($tahun); $a++) { 
				$tahun_fix .= $tahun[$a]." ";
			}
			$kota = $lastValue;
		}
		$no++;
	}
	$query = "INSERT INTO user VALUES('','$nama_fix','$tahun_fix','$kota')";
	$sql = mysqli_query($con,$query);
	if($sql === true){
		header("Location: index.php");
		$_SESSION['alert'] = "Berhasil input";
	}else{
		header("Location: index.php");
		$_SESSION['alert'] = "Gagal input";
	}
?>