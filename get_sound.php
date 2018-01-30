<?php
require_once __DIR__ . "/vendor/autoload.php";
use duncan3dc\Speaker\Providers\GoogleProvider;
use duncan3dc\Speaker\TextToSpeech;
$google = new GoogleProvider;
$tts = new TextToSpeech("Hello World", $google);
file_put_contents("hello.mp3", $tts->getAudioData());

?>