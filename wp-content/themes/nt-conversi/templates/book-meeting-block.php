<?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
<div class="book-meeting">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3><?php echo get_query_var('title') ?></h3>
                <small><?php echo get_query_var('description') ?></small>
            </div>
            <div class="col-xs-12">
             <a target="_blank" href="<?php echo get_query_var('link') ?>"> <button type="button" class="btn blue">Book a Meeting</button></a>
            </div>
        </div>
    </div>
</div>
<?php } ?>