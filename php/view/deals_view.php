<?php
function deals($dealDetails, $commentList){
    $paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
?>
    <section>
        <?php if(Session::exists('home')){ ?>
            <div class='alert alert-danger'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
            </div>
<?php } ?>         
        <header>
            <h1><?php echo $dealDetails->name; ?></h1>
            <pre>Offered By: <?php echo strtoupper($dealDetails->company); ?></pre>
        </header>
        <section class="row">
            <section class="col-lg-6 col-sm-6">
                <img src="<?php echo $dealDetails->cover; ?>" class="img-responsive img-rounded"/>
                <!--<img src="<?php echo $dealDetails->firstImage; ?>" class="img-responsive"/>
                <img src="<?php echo $dealDetails->secondImage; ?>" class="img-responsive"/>-->
            </section>
            <section class="col-lg-6 col-sm-6">
                <div class="table-responsive">
                    <form action='<?php echo $paypal_url; ?>' method='post'>
<!--
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="6BRGXB47C8HHW">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
-->



                        <input type="hidden" id="hide" name="hide" />
                        <table class="table table-condensed">
                            <tr id="offer">
                                <td><h3><b>Offered Value:</b></h3></td>
                                <td><h3><b><?php echo $dealDetails->offered_price; ?></b></h3></td>
                            </tr>
                            <tr>
                                <td>Actual Vaule:</td>                        
                                <td><?php echo $dealDetails->actual_price; ?></td>
                            </tr>
                            <tr>
                                <td>You Save:</td>
                                <td><?php echo $dealDetails->actual_price - $dealDetails->offered_price; ?></td>
                            </tr>
                            <tr>
                                <td><h3>Coupon Remaining:</h3></td>
                                <td><h3><?php echo $dealDetails->minimum_purchase_requirement - $dealDetails->total_people; ?></h3></td>
                            </tr>
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                            <tr>
                                <td>
                                    <div class="desc">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <input type="hidden" name="cmd" value="_s-xclick">
                                                <input type="hidden" name="hosted_button_id" value="6BRGXB47C8HHW">
                                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <a href="#"><button type="submit" name="submit" value="buy" class="btn btn-info btn-lg btn-block">Buy</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>   
                            <tr>
                                <td>Remaining Time:</td>
                                <td><?php echo time(); ?></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </section>
        </section><br /><br /><br />
        <section class="row">
            <article class= "col-lg-12 col-sm-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#desc" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                    <span class="glyphicon glyphicon-book"></span> Description
                                </a>
                            </h4>
                        </div>
                        <div id="desc" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p><?php echo $dealDetails->description; ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#comment" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                    <span class="glyphicon glyphicon-comment"></span> Comments
                                </a>
                            </h4>
                        </div>
                        <div id="comment" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><?php comment_form($commentList); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </article>
        </section>
    </section>
<?php
}
?>