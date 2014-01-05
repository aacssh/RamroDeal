<?php
function deals($dealDetails, $commentList){
?>
    <section>
        <?php if(Session::exists('home')){ ?>
            <div class='control-group error'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
            </div>
<?php } ?>         
        <header>
            <h1><?php echo $dealDetails->name; ?></h1>
            <pre>Offered By: <?php echo strtoupper($dealDetails->company); ?></pre>
        </header>
        <section class="row">
            <section class="span6">
                <table>
                    <tr id="offer">
                        <td>Offered Value:</td>
                        <td><?php echo $dealDetails->offered_price; ?></td>
                    </tr>
                    <tr>
                        <td>Actual Vaule:</td>                        
                        <td>You Save:</td>
                    </tr>
                    <tr>
                        <td><?php echo $dealDetails->actual_price; ?></td>
                        <td><?php echo $dealDetails->actual_price - $dealDetails->offered_price; ?></td>
                    </tr>
                    <tr>
                        <td>Coupon Remaining:</td>
                        <td><?php echo $dealDetails->minimum_purchase_requirement - $dealDetails->total_people; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="desc">
                                <a href="#"><button type="submit" name="buy" class="btn btn-info btn-block btn-large">Buy</button></a>
                            </div>
                        </td>
                    </tr>   
                    <tr>
                        <td>Remaining Time:</td>
                        <td><?php echo time(); ?></td>
                    </tr>
                </table>
            </section>
            <section class="span6 photos">
                <img src="<?php echo $dealDetails->cover; ?>" class="img-polaroid"/>
                <img src="<?php echo $dealDetails->firstImage; ?>" class="img-polaroid"/>
                <img src="<?php echo $dealDetails->secondImage; ?>" class="img-polaroid"/>
            </section>
        </section>
        <section class="row">
            <header class= "span12">       
                <h3>Description</h3>
                <table>
                    <tr>
                        <td>Offered By:</td>
                        <td><?php echo strtoupper($dealDetails->company); ?></td>
                    </tr>
                </table>
                <p><?php echo $dealDetails->description; ?></p>
            </header>
        </section>
        <?php comment_form($commentList); ?>
    </section>
<?php
}
?>