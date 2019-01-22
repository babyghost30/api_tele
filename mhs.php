<?php
	function notif_mhs()
	{
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

		$q = mysqli_query($con, "select * from user where nim LIKE 'A%' or nim LIKE 'B%' or nim LIKE 'D%'");
			foreach ($q as $mhs) {
				# code...
				$nim = $mhs['nim'];
				$cek_status = $models->execute_kw(
													$database,
													$uid,
													$password,
													'udin.student.student',
													'search_read',
													array(
															array(
																	array('nim','=',$nim),
																 )
														 )
								 				);
				foreach ($cek_status as $id) {
					# code...
					$nim_mhs = $id['nim'];
					$program_id = $id['program_id'][1];
				}
				$offer = $models->execute_kw($database,
												 $uid,
												 $password,
												'udin.schedule.offer',
												'search_read',
												 array(
														array(	
															  array('status','ilike','1'),
															  array('program_id','ilike',$program_id),
															 )
													  )
											   );
						foreach ($offer as $key => $a) {
							# code...
							$batch_id = $a['code'];
						}
					$cek_item = $models->execute_kw(
														$database,
														$uid,
														$password,
														'udin.lectures.studyplan',
														'search_read',
														array(
																array(
																		array('student_id','ilike',$nim_mhs),
																		array('offer_id','=',$batch_id),
																   	 )
															  )
														);
					foreach ($cek_item as $key => $cm) {
						# code...
						$code_course = $cm['item_ids'];
					}
					$study_plan_id = $models->execute_kw(
														 $database,
														 $uid,
														 $password,
														 'udin.lectures.studyplan_item',
														 'search_read',
														 array(
																array(
																		array('id','=',$code_course),
																	 )
															  )
														);

					foreach ($study_plan_id as $key => $item) {
						# code...
						$items = $item['schedule_id'][0];
						$cur = $models->execute_kw($database,
												   $uid,
												   $password,
												   'udin.schedule.schedule_slot',
												   'search_read',
												   array(
														 array(
														    	array('schedule_id','=', $items),
															  )
														)
											);
						
							foreach ($cur as $schedule) {
								# code...
								$hour_start = $schedule['hour_start'];
								$day = $schedule['day_slot'];
								$course = $schedule['matakuliah'];
								$room = $schedule['room_id'][1];
								$hourFraction = $hour_start - (int)$hour_start;
								$minutes = $hourFraction * 60;
								$hours = (int)$hour_start;
								$menit = (int)$minutes;
								$time_course = $hours.":".$menit;
								$time_try = $time_course;
								if(($day == $day_target) && ($time_try == $date)){
										if($day == 1){
											$day = 'Senin';
										}elseif ($day == 2) {
											$day = 'Selasa';
										}elseif ($day == 3) {
											$day = 'Rabu';
										}elseif ($day == 4) {
											$day = 'Kamis';
										}elseif ($day == 5) {
											$day = 'Jumat';
										}elseif ($day == 6) {
											$day = 'Sabtu';
										}else $day = 'minggu';
											
										$message = "Ada Jadwal pada hari ".$day." dengan Mata Kuliah ".$course." di ruang ".$room;
										$q = mysqli_query($con,"select * from user where nim='$nim_mhs'");
							        	foreach ($q as $mhs) {
							        		$user = $mhs['id_user'];
							        		file_get_contents($urls."/sendmessage?text=".$message."&chat_id=".$user);
							        	}	
								}
							}
						}
			}
	}
	while (true) {
	    notif_mhs();
	    sleep(30);
	}
?>