<?php
function deals($dealDetails, $commentList){
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
                        <tr>
                            <td>
                                <div class="desc">
                                    <a href="#"><button type="submit" name="buy" class="btn btn-info btn-lg btn-block">Buy</button></a>
                                </div>
                            </td>
                        </tr>   
                        <tr>
                            <td>Remaining Time:</td>
                            <td><?php echo time(); ?></td>
                        </tr>
                    </table>
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