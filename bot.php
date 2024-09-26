<?php
// HEAD

/*

// SERVER
include('/home/asus/Desktop/0/header/header.php');
include('/home/asus/Desktop/0/badan_atas/badan_atas.php');
include('/home/asus/Desktop/0/curl/curl.php');
include('/home/asus/Desktop/0/parsing/parsing.php');
include('/home/asus/Desktop/0/countdown/countdown.php');
include('/home/asus/Desktop/0/CLI/CLI.php');
include('/home/asus/Desktop/0/warna/warna.php');
include('/home/asus/Desktop/0/garis/garis.php');
include('/home/asus/Desktop/0/notif/notif.php');
include('/home/asus/Desktop/0/waktu/waktu.php');
*/

// TERMUX
include('0/header/header.php');
include('0/badan_atas/badan_atas.php');
include('0/curl/curl.php');
include('0/parsing/parsing.php');
include('0/countdown/countdown.php');
include('0/CLI/CLI.php');
include('0/warna/warna.php');
include('0/garis/garis.php');
include('0/notif/notif.php');
include('0/waktu/waktu.php');


// SCRIPT
include('config.php');

fungsi_reset();

fungsi_badan_atas("JAPAKAR", "1.0.0");

echo $warna_isi_kuning_terang."\nYuk Mulung...\n\n$warna_reset";

// PERULANGAN ARRAY WEB
while (true) {
	for ($i = 0; $i < count($a); $i++){
		echo "\n".$warna_isi_hijau_terang."[".($i+1)."]".$warna_isi_kuning_terang." WEB \t\t= $warna_isi_biru_laut_terang".$a[$i]."$warna_reset";
	$var_untuk_fungsi_get_web = fungsi_curl_get($a[$i], $b[$i]);
	//$var_untuk_fungsi_get_web;
//$klaim = var_fungsi_parsing_html($var_untuk_fungsi_get_web, '<div class="alert alert-success">', '</div>', 1);
 //echo date('H:i:s').fungsi_parsing_html($var_untuk_fungsi_get_web, '<div class="alert alert-success"><i style="font-size:25px;" class="material-icons">checked</i> <span>', '</span> </div>', 1);

// VAR

$var_untuk_parsing_html_warning = fungsi_parsing_html($var_untuk_fungsi_get_web, '<div class="alert alert-warning"><i style="font-size:25px;" class="material-icons">clear</i> <span>', '</span> </div>', 1);

$var_untuk_parsing_html_payout_1 = fungsi_parsing_html($var_untuk_fungsi_get_web, '<div class="alert alert-success"><i style="font-size:25px;" class="material-icons">checked</i> <span>', '</span> </div>', 1);

$var_untuk_parsing_html_balance = fungsi_parsing_html($var_untuk_fungsi_get_web, '<div class="col ThirdLayer card">Balance: <br>', '<!--', 1);

$var_untuk_parsing_html_reward = fungsi_parsing_html($var_untuk_fungsi_get_web, '<div class="col ThirdLayer card">Reward: <br>', '</div>', 1);

// PARSING

//echo $var_untuk_fungsi_get_web;

if ($var_untuk_parsing_html_payout_1 != null){
echo $garis_satu;
fungsi_notif_berhasil('BERHASIL', $var_untuk_parsing_html_payout_1);
fungsi_notif_perhatian('Balance', $var_untuk_parsing_html_balance);
fungsi_notif_perhatian('Reward', $var_untuk_parsing_html_reward);
echo "\n";
echo $garis_satu;
}elseif ($var_untuk_parsing_html_warning != null ) {
echo $garis_satu;
fungsi_notif_gagal('GAGAL', $var_untuk_parsing_html_warning);
fungsi_notif_perhatian('Balance', $var_untuk_parsing_html_balance);
fungsi_notif_perhatian('Reward', $var_untuk_parsing_html_reward);
echo "\n";
echo $garis_satu;
}
else{
echo $garis_satu;
fungsi_notif_perhatian("PERHATIAN", "BELUM WAKTU NYA KLAIM!!!");
fungsi_notif_perhatian('Balance', $var_untuk_parsing_html_balance);
fungsi_notif_perhatian('Reward', $var_untuk_parsing_html_reward);
echo "\n";
echo $garis_satu;
}
}
echo "\n";
waktu_mundur(61, 0);
//echo $garis_dua;
}
?>