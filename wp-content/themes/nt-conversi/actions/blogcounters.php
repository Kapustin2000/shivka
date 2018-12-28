<?php
require_once("../../../../wp-load.php");

if ($pod = pods('blog', @$_GET['id'])) {
    $pod->save('views', $pod->display('views')+1);
    wp_send_json([
        'views' => $pod->display('views'),
        'claps'=>$pod->display('claps')
    ]);
}
