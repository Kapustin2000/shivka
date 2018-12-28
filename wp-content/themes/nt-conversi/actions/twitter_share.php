<?php
require_once("../../../../wp-load.php");

$pod = pods($_POST['pods'],$_POST['id']);
$pod->save( 'twitter_share', $pod->display('twitter_share')+1 );