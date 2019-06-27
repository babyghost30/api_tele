<?php 
	// date_default_timezone_set('Asia/Jakarta');
	function notifikasi_dsn(){
		$token = "648740217:AAEf2YTL-rVWtmydikSYnbwric2gdOBUIo8";
		$urls = "https://api.telegram.org/bot".$token;
		$update = json_decode(file_get_contents('php://input') ,true);

		require 'conf/conn.php';
		include "conf/odoo_conf.php";

			$hari = date("D");
			$dayList = array(
				'Sun' => '7',
				'Mon' => '1',
				'Tue' => '2',
				'Wed' => '3',
				'Thu' => '4',
				'Fri' => '5',
				'Sat' => '6'
			);
			$day_target = $dayList[$hari];

			date_default_timezone_set('Asia/Jakarta');
			$date = date('H:i');
			$hari = date_create($date);
			$jam = date_add($hari, date_interval_create_from_date_string('30 minutes'));
			$jam_acuan = date_format($jam, 'H:i');
			
			$jadwal_dsn = $models->execute_kw($database,
											 $uid,
											 $password,
											'udin.schedule.schedule_slot',
											'search_read',
											 array(
													array(	
														  array('day_slot','=',$day_target),
														  array('batch_code','=','20181'),
														 )
												  )
										   );
		// var_dump($jadwal_dsn);
		foreach ($jadwal_dsn as $key => $m) {
			# code...
			$time = $m['hour_start'];
			$krm_id = $m['krm_id'][1];
		 	// $id_dsn = $m['id'];
			$detail = $m['name'];
			$course = $m['matakuliah'];
			$hourFraction = $time - (int)$time;
			$minutes = $hourFraction * 60;
			$hours = (int)$time;
			$menit = (int)$minutes;
			$time_course = $hours.":".$menit;
			$time_try = $time_course;
			$dsn_npp = $models->execute_kw($database,
											 $uid,
											 $password,
											'udin.schedule.krm',
											'search_read',
											 array(
													array(	
														  array('name','=',$krm_id),
														 )
												  )
										   );
			foreach ($dsn_npp as $key => $n) {
				# code...
				$ini_npp = $n['npp'];
			}
			// var_dump($ini_npp);
			if($time_try <= $jam_acuan){
				$message = "Ada Jadwal pada ".$detail." dengan Mata Kuliah ".$course;
				$q = mysqli_query($con,"select * from user where nim='$ini_npp'");
				foreach ($q as $dosen) {
				   		$user = $dosen['id_user'];
						$urls = "http://api.telegram.org/bot648740217:AAEf2YTL-rVWtmydikSYnbwric2gdOBUIo8/sendmessage?text=".urlencode($message)."&chat_id=".$user;		        	
							        		file_get_contents($urls);
				}
			}

		}
	}
	echo "========================================\n";
	echo "+                                      +\n";
	echo "+    Nama File : Notifikasi Dosen      +\n";
	echo "+    Versi     : 0.0.1                 +\n";
	echo "+                                      +\n";
	echo "========================================\n";

	echo "Program sedang berjalan...\n";
	while (true) {
	    notifikasi_dsn();
	    sleep(30);
	}
?>
