<?php

$url =  "http://cursomvc.com/api/notes";
$return = file_get_contents($url);

$data = json_decode($return, 1);

foreach ($data as $d){
    echo $d['title']."<br>";
    echo $d['text']."<br>";
    echo $d['image']."<br>";
    echo "<hr>";

}
