<?php

function fungsi_badan_atas($nama_sc, $nomor_versi) {

	$headers = array();
	//$headers[] = "user-agent: Mozilla/5.0 (Linux; Android 9.0; MI 8 SE) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.36";
	//$headers[] = "Cookie: ".$Cookie;
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'http://ifconfig.co/json');
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	$hasil_curl = curl_exec($curl);
	curl_close($curl);

	$json = json_decode($hasil_curl, 1);
	$garis_dua = "\033[1;36m".str_repeat('=', 80)."\033[0m";
	$kotak_bantu = "\033[1;32m[~]\033[0m";
	$wm = "
   _______________      
  / ______   ___  |      \033[93mNama\t\t= $nama_sc \033[0m
 | (___    | |  | |      \033[93mVersi\t\t= $nomor_versi \033[0m
  \___ \   | |  | |      \033[96mDonasi\t\t= https://trakteer.id/banklink\033[0m
  ____) |  | |  | |____  \033[1;31mWarning\t= PROGRAM ILEGAL!!!\033[0m
 |_____/   |_|  |______| \033[93mTerima Kasih...\033[0m
  							
";
	
	echo ($wm)."";
	sleep(1);
	echo "$garis_dua\n";
		sleep(1);
	echo "$kotak_bantu \033[93mIP Address\t= ".$json['ip']."\n\033[0m";
		sleep(1);
	echo "$kotak_bantu \033[93mOperator\t= ".$json['asn_org']."\n\033[0m";
		sleep(1);
	echo "$kotak_bantu \033[93mLokasi\t= ".$json['region_name'].", ".$json['country']." - ".$json['country_iso']."\n\033[0m";
		sleep(1);
	echo "$garis_dua\n";
		sleep(1);
}

?>