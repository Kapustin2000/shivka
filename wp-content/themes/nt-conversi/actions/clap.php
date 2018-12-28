<?php
require_once("../../../../wp-load.php");

$pod = pods($_POST['pods'],$_POST['id']);
$pod->save( 'claps', $pod->display('claps')+1 );