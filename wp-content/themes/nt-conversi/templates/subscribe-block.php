<div class="subscribe hidden-sm hidden-xs" data-scroll="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3><?php echo get_query_var('title') ?></h3>
                <small><?php echo get_query_var('description') ?></small>
            </div>
            <div class="col-md-offset-2 col-md-8 col-xs-12">
                <form id="subscribe-form" novalidate>
                    <div class="form-group form-group-floating">
                        <input type="text" id="subscribe-email" name="email" data-unvalid="Valid email required" required maxlength="70">
                        <label for="email-subscribe">Your Email</label>
                        <div class="error-tooltip">
                            <div class="icon icon-question"></div>
                            <div class="tooltip"></div>
                        </div>
                        <div class="form-message"></div>
                    </div>
                    <button type="submit" class="btn blue">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>

