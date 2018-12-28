<section class="get-reference">
    <div class="container has-margin-bottom">
        <div class="row">
            <div class="col-xl-offset-3 col-xl-6 col-lg-offset-2 col-lg-8 col-xs-12">
                <h3><?php echo get_query_var('title') ?></h3>
                <small class="hidden-md hidden-sm hidden-xs">
                    <?php echo get_query_var('description') ?>
                </small>
            </div>
            <div class="col-xs-12">
                <form id="reference-form" class="inline-form" novalidate>
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group form-group-floating">
                                <input type="text" id="email" name="email" data-unvalid="Valid email required" maxlength="70" required>
                                <label for="email">Your Email</label>
                                <div class="error-tooltip">
                                    <div class="icon icon-question"></div>
                                    <div class="tooltip"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group form-group-floating">
                                <input id="phone" name="phone" type="text">
                                <label for="phone">Your Phone (optional)</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <?php
                            $data = pods('industry')->find(
                                array(
                                    'orderby' => 'order_weight.meta_value DESC , term_id DESC'
                                )
                            );?>
                            <select id="industry" name="industries" class="industry-select accordion hidden">
                                <option value="0">Choose Industry</option>
                                <?php while ( $data->fetch() ) {   ?>
                                    <option
                                        <?php if(isset($_GET['industry'])) {
                                            $industry = explode(',',$_GET['industry']);
                                            foreach($industry as $item){
                                                if($item== $data->display( 'slug' )){
                                                    echo "selected";
                                                }
                                            }
                                        }?>
                                        value="<?php echo $data->display( 'slug' )?>"><?php echo $data->display( 'name' )?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="submit-wrap">
                        <button type="submit" class="btn blue">Ask For a Reference</button>
                        <div class="form-message"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>