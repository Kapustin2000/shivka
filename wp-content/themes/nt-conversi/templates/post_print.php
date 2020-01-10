<?php $data = get_query_var('data');?>

<?php foreach($data as $item=>$key){ if($item!='g-recaptcha-response'){?> 
        <p><?=$item?> : <?=$key?></p> 

<?php } } ?>
 
