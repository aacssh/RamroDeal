<?php
function deals($dealDetails, $commentList){
    $user = new User();
    //$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
    $paypal_url = BASE_URL.'php/controller/members/topaypal.php';
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
            <div id="myCarousel" class="carousel slide">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <img src="<?php echo $dealDetails->cover; ?>" id = "img" class="img-responsive img-rounded"/>
                </div>
                <div class="item">
                  <img src="<?php echo $dealDetails->firstImage; ?>" id = "img" class="img-responsive img-rounded"/>
                </div>
                <div class="item">
                  <img src="<?php echo $dealDetails->secondImage; ?>" id = "img" class="img-responsive img-rounded"/>
                </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div><!-- /.carousel -->
            </section>
            <section class="col-lg-6 col-sm-6">
                <div class="table-responsive">
                    <form onload="reverseDate('<?php echo $dealDetails->end_date; ?>'');" action='<?php echo $paypal_url; ?>' method='post'>
                        <input type="hidden" id="hide" name="hide" />
                        <table class="table table-condensed">
                            <tr id="offer">
                                <td><h3><b>Offered Value:</b></h3></td>
                                <td><h3><b><?php echo 'Rs.'.$dealDetails->offered_price.' / $'.$dealDetails->offered_price_in_dollar; ?></b></h3></td>
                            </tr>
                            <tr>
                                <td>Actual Vaule:</td>                        
                                <td><?php echo 'Rs.'.$dealDetails->actual_price.'  /  $'.$dealDetails->actual_price_in_dollar; ?></td>
                            </tr>
                            <tr>
                                <td>You Save:</td>
                                <td><?php echo 'Rs.'.($dealDetails->actual_price - $dealDetails->offered_price).' / $'.($dealDetails->actual_price_in_dollar - $dealDetails->offered_price_in_dollar); ?></td>
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
                                            <?php if($user->isLoggedIn()){ 
                                                if($user->hasPermission('normal_user')){?>
                                                    <div class="col-lg-6 col-sm-6">
                                                        <input type='hidden' name='deal_id' value="<?php echo $dealDetails->deal_id; ?>" />
                                                        <input type="hidden" name="itemname" value="<?php echo $dealDetails->name; ?>" />
                                                        <input type="hidden" name="itemnumber" value="1" />
                                                        <input type="hidden" name="itemprice" value="<?php echo $dealDetails->offered_price_in_dollar;?>" />
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type="hidden" name="hosted_button_id" value="6BRGXB47C8HHW">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </div>
                                                    <div class="col-lg-4 col-lg-offset-2 col-sm-6">
                                                            <button type="submit" name="submit" value="buy" class="btn btn-info btn-lg btn-block">Buy</button>
                                            <?php } else{
                                                echo '<span class="btn btn-info btn-lg btn-block text-center">You can\'t buy</span>';
                                            }
                                            }else{ ?>
                                                <a href="<?php echo BASE_URL.'php/controller/public/login.php' ?>"><span class="btn btn-info btn-lg btn-block text-center">Log-In to buy</span></a>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>   
                            <tr>
                                <td class="btn btn-warning btn-lg btn-block text-center" colspan="2">Deal closes on: <?php echo strftime("%B %d %Y", strtotime($dealDetails->end_date)); ?></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </section>
        </section><br />
        <section class="row">
            <div class= "col-lg-12 col-sm-12">
                <pre class="btn btn-info btn-lg btn-block text-center"><?php echo 'Bought coupon should be used between '. strftime("%B %d %Y", strtotime($dealDetails->coupon_start_date)).' to '.strftime("%B %d %Y", strtotime($dealDetails->coupon_end_date)); ?></pre>
            </div>
        </section><br /><br />
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