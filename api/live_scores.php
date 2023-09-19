<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://odds.p.rapidapi.com/v4/sports/americanfootball_nfl/scores?daysFrom=3",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: odds.p.rapidapi.com",
		"X-RapidAPI-Key: d0806c34b9msh1b95c2f0e842061p16d4bajsn17e211fc77ee"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}