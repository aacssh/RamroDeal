    <?php 
      function nav(){
    ?>
    <!-- Navigation -->
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                          <?php
                            switch($_SESSION['type']){
                                case "administrator":
                          ?>
                            <li class=""><a href="#">Dashboard</a></li>  
                            <li><a href="#">Deals</a></li>  
                            <li><a href="#">Companies</a></li>
                            <li><a href="#">Customers</a></li>  
                            <li><a href="#">Admin Users</a></li>
                            <li><a href="#">Setting</a></li>
                        </ul>
                          <?php
                                break;
                                case "merchant":
                          ?>
                            <li class=""><a href="#"></a></li>  
                            <li><a href="#"></a></li>  
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>  
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                          </ul>
                          <?php
                                break;
                                case "agent":
                          ?>
                            <li class=""><a href="#"></a></li>  
                            <li><a href="#"></a></li>  
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>  
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                          </ul>
                          <?php
                                break;
                                case "sub-administrator":
                          ?>  
                            <li class=""><a href="#"></a></li>  
                            <li><a href="#"></a></li>  
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>  
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                          </ul>
                          <?php
                                break;
                                default:
                          ?>
                            <li class=""><a href="#">All Deals</a></li>  
                            <li><a href="#">Today's deals</a></li>  
                            <li><a href="#">Beauty & Spas</a></li>
                            <li><a href="#">Health & Fitness</a></li>  
                            <li><a href="#">Foods</a></li>
                            <li><a href="#">Tours & Travels</a></li>
                        </ul>

                        <div class="pull-right">
                              <a href="/RamroDeal/php/controller/loginpage.php" class="btn btn-info"> Sign-In</a>
                              <a href="#" class="btn btn-info"> Sign-up</a>
                        </div>
                          <?php
                              }
                          ?>
                    </div>
                </div>
            </div>
<?php } ?>