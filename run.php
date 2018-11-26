<?php
	$token = "648740217:AAEf2YTL-rVWtmydikSYnbwric2gdOBUIo8";
	define('BOT_TOKEN', $token);

	define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

	define('myVERSI', '0.0.1');
	define('lastUpdate', 'date("Y-m-d", time())');

	$debug = false;

	function exec_curl_request($handle){
		$response = curl_exec($handle);

		if($response == false){
			$errno = curl_errno($handle);
			$error = curl_error($handle);
			error_log("return curl error guys $errno: $error \n");
			curl_close($handle);

			return false;
		}

		$http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
		curl_close($handle);

		if($http_code >= 500){
			sleep(10);

			return false;
		} elseif ($http_code != 200) {
        $response = json_decode($response, true);
        error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
        if ($http_code == 401) {
            throw new Exception('Invalid access token provided');
        }

        return false;
    } else {
        $response = json_decode($response, true);
        if (isset($response['description'])) {
            error_log("Request was successfull: {$response['description']}\n");
        }
        $response = $response['result'];
    }

    return $response;
	}

	function apiRequest($method, $parameters = null)
	{
		# code...
		if (!is_string($method)) {
        error_log("Method name must be a string\n");

	        return false;
	    }

	    if (!$parameters) {
	        $parameters = [];
	    } elseif (!is_array($parameters)) {
	        error_log("Parameters must be an array\n");

	        return false;
	    }

	    foreach ($parameters as $key => &$val) {
	        // encoding to JSON array parameters, for example reply_markup
	    if (!is_numeric($val) && !is_string($val)) {
	        $val = json_encode($val);
	    }
	    }
	    $url = API_URL.$method.'?'.http_build_query($parameters);

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
	    curl_setopt($handle, CURLOPT_TIMEOUT, 60);
	    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

	    return exec_curl_request($handle);
	}

	function apiRequestJson($method, $parameters){
	    if (!is_string($method)) {
	        error_log("Wajib String bos ku\n");

	        return false;
	    }

	    if (!$parameters) {
	        $parameters = [];
	    } elseif (!is_array($parameters)) {
	        error_log("Parameternya wajib array bos ku\n");

	        return false;
	    }

	    $parameters['method'] = $method;

	    $handle = curl_init(API_URL);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
	    curl_setopt($handle, CURLOPT_TIMEOUT, 60);
	    curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
	    curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

	    return exec_curl_request($handle);
	}
	//ini trap gan 
	if (strlen(BOT_TOKEN) < 20) {
    die(PHP_EOL."-> -> Token BOT API nya mohon diisi dengan benar!\n");
	}
	function getUpdates($last_id = null)
	{
	    $params = [];
	    if (!empty($last_id)) {
	        $params = ['offset' => $last_id + 1, 'limit' => 1];
	    }
	  //echo print_r($params, true);
	  return apiRequest('getUpdates', $params);
	}

	// ----------- pantengin mulai ini
	function sendMessage($idpesan, $idchat, $pesan)
	{
	    $data = [
	    'chat_id'             => $idchat,
	    'text'                => $pesan,
	    'parse_mode'          => 'Markdown',
	    'reply_to_message_id' => $idpesan,
	  ];

	    return apiRequest('sendMessage', $data);
	}
	
	function processMessage($message)
	{   
	include "conf/conn.php";
	include "conf/odoo_conf.php";
	

    if (isset($message['message'])) {
        $sumber = $message['message'];
        $idpesan = $sumber['message_id'];
        $idchat = $sumber['chat']['id'];

        $namamu = $sumber['from']['first_name'];
        $namabkg = $sumber['from']['last_name'];
        $iduser = $sumber['from']['id'];

      //   $q = mysqli_query($con,"select * from user where id_user='$user'");

      //   $iduser = $user;
      //   for ($i=0; $i < count($schedule_dsn); $i++) { 
						// 	$time = $schedule_dsn[$i]['hour_start'];
						// 	$hourFraction = $time - (int)$time;
						// 	$minutes = $hourFraction * 60;
						// 	$hours = (int)$time;
						// 	$menit = (int)$minutes;
						// 	$day_slot = $schedule_dsn[$i]['name'];
						// 	$day = explode(",", $day_slot);
						// 	$date_slot = $hours.":".$menit;
						// 	if($date_check == $date_slot){
						// 		$text .= "Nama          : ".$schedule_dsn[$i]['matakuliah']."\nHari             : ".$day[0]."\nJam Mulai   : ".$hours . ':' . $menit."\nRuang          : ".$schedule_dsn[$i]['room_id'][1]."\nKelompok  : ".$schedule_dsn[$i]['kelompok'];
						// 	}else{
						// 		$text = "tidak ada jadwal";
						// 	}	
						// }

        if (isset($sumber['text'])) {
            $pesan = $sumber['text'];

            if (preg_match("/^\/view_(\d+)$/i", $pesan, $cocok)) {
                $pesan = "/view $cocok[1]";
            }

            if (preg_match("/^\/hapus_(\d+)$/i", $pesan, $cocok)) {
                $pesan = "/hapus $cocok[1]";
            }

	            $pecah = explode(' ', $pesan);
	            $katapertama = strtolower($pecah[0]);
	switch ($katapertama) {
	        case '/start':
	          $text = "Hai '$namamu $namabkg' Selamat datang di Siadin Bot untuk bantuan silahkan ketik:/help\n";
	          $text .= '🎓 Sistem Akademik Universitas Dian Nuswantoro ver.`'.myVERSI."`\n";
	          $text .= "🎓 By UPT. Data & Informasi UDINUS\n\n";
	          break;

	        case '/help':
	          $text = "🎓 Sistem Akademik Universitas Dian Nuswantoro\n";
	          $text .= "🎓 By UPT. Data & Informasi UDINUS\n\n";
	          $text .= "Daftar menu yang bisa di gunakan\n\n";
	          $text .= "🎓 /reg untuk register account baru format:/reg A11.2018.XXXXX Password\n";
	          $text .= "🎓 /help info bantuan ini\n";
	          $text .= "🎓 /jadwal info jadwal pada KRS\n";
	          $text .= "🎓 /profil info Data diri\n\n";
	          break;

	        case '/jadwal':
	        	$q = mysqli_query($con,"select * from user where id_user='$iduser'");
	        	foreach ($q as $mhs) {
	        		$smhs = $mhs['nim'];
	        		$user = $mhs['id_user'];
	        	}	

				$cek_status = $models->execute_kw(
													$database,
													$uid,
													$password,
													'udin.student.student',
													'search_read',
													array(
															array(
																	array('nim','=',$smhs),
																 )
														 )
								 				);
				if($cek_status == null){
					$cek_npp = $models->execute_kw($database,
												   $uid,
												   $password,
												   'udin.lecturer.lecturer',
												   'search_read',
												    array(
												    		array(
												    				array('npp','=',$smhs),
												    			 )
												    	 )
												    );
					foreach ($cek_npp as $key => $npp) {
						# code...
						$npp = $npp['nidn'];
					}
					$slot_dsn = $models->execute_kw($database,
													$uid,
													$password,
													'udin.schedule.krm',
													'search_read',
													array(
															array(
																	array('nidn','=',$npp),
																	array('state','=','1'),
																)
														)
													);
					foreach ($slot_dsn as $key => $item) {
						# code...
						$id_item = $item['schedule_slot_ids'];

					}
					$schedule_dsn = $models->execute_kw($database,
												 $uid,
												 $password,
												'udin.schedule.schedule_slot',
												'search_read',
												 array(
														array(	
															  array('id','=',$id_item),
															 )
													  )
											   );
					// var_dump($schedule_dsn);
						$text = "JADWAL MENGAJAR ANDA : \n\n";
						for ($i=0; $i < count($schedule_dsn); $i++) { 
							$time = $schedule_dsn[$i]['hour_start'];
							$hourFraction = $time - (int)$time;
							$minutes = $hourFraction * 60;
							$hours = (int)$time;
							$menit = (int)$minutes;
							$day_slot = $schedule_dsn[$i]['name'];
							$day = explode(",", $day_slot);

							$text .= "Nama          : ".$schedule_dsn[$i]['matakuliah']."\nHari             : ".$day[0]."\nJam Mulai   : ".$hours . ':' . $menit."\nRuang          : ".$schedule_dsn[$i]['room_id'][1]."\nKelompok  : ".$schedule_dsn[$i]['kelompok']."\n--------------------------------------------------------------------------------\n";
						}
				}else{
				foreach ($cek_status as $a) {
					$nim = $a['nim'];
					$smhs = $a['current_status'];
					$program_id = $a['program_id'][1];
				}
				$stat_mhs = $smhs;
				if($stat_mhs != "AKTIF"){
					$text = "MAAF STATUS MAHASISWA ANDA TIDAK AKTIF";
					}
				else{
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
																		array('student_id','ilike',$nim),	
																		array('offer_id','=',$batch_id),
																   	 )
															  )
														);
					foreach ($cek_item as $key => $cm) {
						# code...
						$code_course = ($cm['item_ids']);
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
						$items[] = $item['schedule_id'][0];
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
						}
						$text = "JADWAL KULIAH ANDA :\n\n";
						for ($i=0; $i < count($cur); $i++) { 
							$time = $cur[$i]['hour_start'];
							$hourFraction = $time - (int)$time;
							$minutes = $hourFraction * 60;
							$hours = (int)$time;
							$menit = (int)$minutes;
							$text .= "Nama          : ".$cur[$i]['matakuliah']."\nJam Mulai   : ".$hours . ':' . $menit."\nRuang          : ".$cur[$i]['room_id'][1]."\n--------------------------------------------------------------------------------\n";
						}
					}
				}				
	          break;
	        
	        case '/profil':
	          $text = "maaf menu ini belum tersedia";
	          break;

	        case '/reg':
	          if (isset($pecah[1])) {
	            if(isset($pecah[2])) {
	              error_reporting(0);
	              $user_check = mysqli_num_rows(mysqli_query($con, "select * from user where id_user='$iduser' or nim='$pecah[1]'"));
	              $nim = strtoupper($pecah[1]);
		          $password = $pecah[2];
	              if($user_check > 0){
	                $text = 'NIM/ID/NPP sudah terdaftar';
	              }else{	
					  $q = "INSERT INTO user(id_user,nim,password) values ('$iduser','$nim','$password')";
		                if($con->query($q) == TRUE){
	                  	$text = '😘 Register Berhasil!';
	                  }else{
	                  	$text = '⛔️ *ERROR:* NIM atau password yang ditambahkan tidak boleh kosong!_';
			            $text .= "\n\nContoh: `/reg A11.2014.08450 PasswordKalian`";
	                  }
	            }
	          }
	      	}
	          break;

	        case '/view':
	              $text = $iduser;
	          break;

	        default:
	          $text = '😥 _aku tidak mengerti apa maksudmu, namun tetap akan kudengarkan sepenuh hatiku.._';
	          break;
	      }
	        } else {
	            $text = 'Sepertinya ada kesalahan, silahkan cek kembali 😘';
	        }

	        $hasil = sendMessage($idpesan, $idchat, $text);
	        if ($GLOBALS['debug']) {
	            // hanya nampak saat metode poll dan debug = true;
	      echo 'Pesan yang dikirim: '.$text.PHP_EOL;
	            print_r($hasil);
	        }
	    }
	}

// pencetakan versi dan info waktu server, berfungsi jika test hook
	echo 'Ver. '.myVERSI.' OK Start!'.PHP_EOL.date('Y-m-d H:i:s').PHP_EOL;

	function printUpdates($result)
	{
	    foreach ($result as $obj) {
	        // echo $obj['message']['text'].PHP_EOL;
	    processMessage($obj);
	        $last_id = $obj['update_id'];
	    }

	    return $last_id;
	}

// AKTIFKAN INI jika menggunakan metode poll
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	$last_id = null;
	while (true) {
	    $result = getUpdates($last_id);
	    if (!empty($result)) {
	        echo '+';
	        $last_id = printUpdates($result);
	    } else {
	        echo '-';
	    }

	    sleep(1);
	}

?>