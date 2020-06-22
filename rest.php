<?php

$curl_handle = curl_init();
$relative = '/advanced_php/REST/php-rest-json/people.json';

if((array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on")) {
    $domain = $_SERVER['HTTP_HOST'];
    $prefix = $_SERVER['HTTPS'] ? 'https://' : 'http://';
} else {
    $domain = 'localhost';
    $prefix = '';
}
$url = $prefix.$domain.$relative;

curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
$curl_data = curl_exec($curl_handle);
curl_close($curl_handle);

$response_data = json_decode($curl_data);
$user_data = $response_data;

foreach ($user_data as $user) {
	echo "username: ".$user->username;
	echo "<br />";
}