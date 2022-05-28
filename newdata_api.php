<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header('Location: login.php');
    exit;
}
$api_key_newsdata = 'pub_754785a8f68616da99a4b5a73e8647ba7789';
$_url_fetch_newdata = "https://newsdata.io/api/1/news?apikey=" .$api_key_newsdata ."&language=it,en&q=crypto";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $_url_fetch_newdata);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
echo $result;
curl_close($curl);
?>
