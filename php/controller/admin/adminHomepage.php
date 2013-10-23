<?php
include('../session.php');
include '../../view/fns.php';

function __autoload($obj){
    $class = strtolower($obj);
    include '../../class/'.$class.'.php';
}

//Displaying heading part of html
ramrodeal_header("RamroDeal - Great Deal, Great Price");

//Displaying navigation part of html
nav();

?>

<div class="row">
    <div class="span3">
        <ul class="nav nav-list">
            <li><a href="#" title="Coupon purchased till today"><h4>All Coupons</h4></a></li>
            <li><a href="#" title="Coupon purchased today"><h4>Today's Coupons</h4></a></li>
            <li><a href="#" title="All Purchased Deals till today"><h4>All Purchased Deals</h4></a></li>
            <li><a href="#" title="Today's Deals Purchased"><h4>Today's Purchased Deals</h4></a></li>
            <li><a href="#" title="Expired Deals till today"><h4>Expired Deals</h4></a></li>
        </ul>
    </div>
    <div class="span9">
        <h3>Dashboard</h3><hr />
                <td><table border='1' cellspacing= '2' cellpadding='2'>
                    <tr>
                        <th>
                            Coupon
                        </th>
                    </tr>
                    <tr>
                        <td>hello</td>
                    </tr>
                </table></td>
                
            </tr>
        </table>
    </div>
</div>
<?php

//Displaying footer of html
ramrodeal_footer();
?>