<?php
require_once("../../../../wp-load.php");

$pod = pods($_POST['pods'],$_POST['id']);
$pod->save( 'linkedin_share', $pod->display('linkedin_share')+1 );