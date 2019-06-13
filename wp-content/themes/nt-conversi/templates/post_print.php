<?php $data = get_query_var('data');?>

<?php foreach($data as $item=>$key){ ?> 
        <p><?=$item?> : <?=$key?></p> 

<?php } ?>
 
