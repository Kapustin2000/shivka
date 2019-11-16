<?php
/*
Template Name: Blog
*/

?>
<?php
$params = array(
    'where'=>' t.post_status="Draft"',
);
$subscribers = pods('subscribers')->find($params);

while ($subscribers->fetch()){
    echo $subscribers->id;
}
?>