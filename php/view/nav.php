    <?php 
      function nav(){
    ?>
    <!-- Navigation -->
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                          <?php
                          if(isset($_SESSION['type'])){
                               switch($_SESSION['type']){
                                  case "administrator":
                          ?>
                            <li class=""><a href="#">Dashboard</a></li>
                            <li class="dropdown" id="accountmenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="">Deals<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Deal list</a></li>
                                    <li><a href="../controller/addCategory.php">Category list</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Add Deal</a></li>
                                    <li><a href="#">Add Category</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Reviews and Rating</a></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown" id="accountmenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Companies<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Company list</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Add New Company</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Reviews and Rating</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Customers</a></li>  
                            <li class="dropdown" id="accountmenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Users<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Admin Users list</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Add New Admin</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Setting</a></li>
                        </ul>
                        
                        <div class="pull-right">
                              <a href="/RamroDeal/php/controller/logout.php" class="btn btn-info"> Logout</a>
                        </div>
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
                          
                          }else{
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