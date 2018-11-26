<?php 
	function notifikasi_dsn(){
		$token = "648740217:AAEf2YTL-rVWtmydikSYnbwric2gdOBUIo8";
		$url = "https://api.telegram.org/bot".$token;
		$update = json_decode(file_get_contents('php://input') ,true);

		require 'conf/conn.php';
		include "conf/odoo_conf.php";

			$hari = date('l');
			$dayList = array(
				'Sunday' => '7',
				'Monday' => '1',
				'Tuesday' => '2',
				'Wednesday' => '3',
				'Thursday' => '4',
				'Friday' => '5',
				'Saturday' => '6'
			);

		$schedule_dsn = $models->execute_kw($database,
											 $uid,
											 $password,
											'udin.schedule.schedule_slot',
											'search_read',
											 array(
													array(	
														  array('day_slot','=',$dayList[$hari]),
														  array('batch_code','=','20181'),
														 )
												  )
										   );
		// var_dump($schedule_dsn);
		foreach ($schedule_dsn as $schedule_dsn) {
					$time = strval($schedule_dsn['hour_start']);
					$date = date('H:i');
					$hari = date_create($date);
					$jam = date_add($hari, date_interval_create_from_date_string('30 minutes'));
					$jam_acuan = date_format($jam, 'H:i');

					$parts = explode(':', $jam_acuan);
					$acuan = number_format($parts[0] + (($parts[1]/60)*100 / 100), 4);

					if($acuan == $time){
						$dsn = $models->execute_kw($database,
											 $uid,
											 $password,
											'udin.schedule.schedule_slot',
											'search_read',
											 array(
													array(	
														  array('day_slot','=',$dayList[$hari]),
														  array('hour_start','=',$time),
														 )
												  )
										   );
						foreach ($dsn as $dsn) {
							# code...
							$krm_id = $dsn['krm_id'][1];
							$days = $dsn['name'];
							$course = $dsn['matakuliah'];
							$message = "Ada Jadwal pada ".$days." dengan Mata Kuliah ".$course;

							$get_id_tele = $models->execute_kw($database,$uid,$password,
																					'udin.lecturer.lecturer',
																					'search_read',
																					array(
																							array(
																									array('full_name','ilike',$krm_id),
																								)
																						)
																					);
							foreach ($get_id_tele as $id_tele) {
								# code...
								$npp = $id_tele['npp'];
								$q = mysqli_query($con,"select * from user where nim='$npp'");
						        	foreach ($q as $mhs) {
						        		$user = $mhs['id_user'];
						        		file_get_contents($url."/sendmessage?text=".$message."&chat_id=".$user);
						        	}	
							}

						}
						
					}
				}
		}

	while (true) {
	    notifikasi_dsn();
	    sleep(1800);
	}
?>