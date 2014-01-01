<?php
function deals($dealDetails){
    echo '<pre>'.print_r($dealDetails, true).'</pre>';
?>
    <header>
        <h1><u><?php echo $dealDetails->name; ?></u></h1>
    </header>
    <section class="row">
        <section class="span6">
            <table>
                <tr>
                    <td>
                        Real Vaule:
                    </td>
                    <td>
                        <?php echo $dealDetails->actual_price; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Discount Value:   
                    </td>
                    <td>
                        <?php echo $dealDetails->offered_price; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Offered By:
                    </td>
                    <td>
                        <?php echo strtoupper($dealDetails->company); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Coupon Remaining:
                    </td>
                    <td>
                        <?php echo $dealDetails->minimum_purchase_requirement - $dealDetails->total_people; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Remaining Time:
                    </td>
                    <td>
                        <?php echo time(); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table>
        </section>
        <section class="span6">
            hello
        </section>
    </section>

<?php
}
?>