<?php
require_once("../../../../wp-load.php");

$pod = pods($_POST['pods'],$_POST['id']);
$pod->save( 'facebook_share', $pod->display('facebook_share')+1 );