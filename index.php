<?php
$text = fopen("text.txt", "r");
$array = null;
if ($text) {
    while (($buffer = fgets($text)) !== false) {
        $array[] = $buffer;

    }
}
fclose($text);
foreach ($array as $key => $value){
    $arr =file_get_contents("http://maps.google.com/maps/api/geocode/json?address=". $value);
    $decod = json_decode($arr,true);
    $town = $decod["results"][0]["address_components"][0]["long_name"];
    $lat = $decod["results"][0]["geometry"]["location"]["lat"];
    $lng = $decod["results"][0]["geometry"]["location"]["lng"];
    echo '<p>';
    echo $town .'</br>';
    echo $lat .'</br>';
    echo $lng . '</br>';
    echo '</p>';

}