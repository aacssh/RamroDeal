    <?php 
      function nav(){
        $user = new User();
    ?>
    <!-- Navigation -->
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                          <?php
                          if($user->isLoggedIn()){
                              if($user->hasPermission('admin')){
                          ?>
                                  <li class=""><a href="/RamroDeal/php/controller/members/homepage_admin.php">Dashboard</a></li>
                                  <li class="dropdown" id="accountmenu">
                                      <a class="dropdown-toggle" data-toggle="dropdown" href="">Deals<b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                          <li><a href="#">Deal list</a></li>
                                          <li><a href="../controller/members/addCategory.php">Category list</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Add Deal</a></li>
                                          <li><a href="addcategory.php">Add Category</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#">Reviews and Rating</a></li>
                                      </ul>
                                  </li>
                                  
                                  <li class="dropdown" id="accountmenu">
                                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Companies<b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                          <li><a href="companylist.php">Company list</a></li>
                                          <li class="divider"></li>
                                          <li><a href="addcompany.php">Add New Company</a></li>
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
                                          <li><a href="addadminuser.php">Add New Admin</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown" id="accountmenu">
                                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings<b class="caret"></b></a>
                                      <ul class="dropdown-menu">
                                          <li><a href="profile.php">Account Setting</a></li>
                                          <li class="divider"></li>
                                          <li><a href="/RamroDeal/php/controller/members/logout.php"> Logout</a></li>
                                      </ul>
                                  </li>
                              </ul>
                              
                              <div class="pull-right">
                                <div class="nav">
                                    <li><a href="/RamroDeal/php/controller/members/profile.php?user=<?php echo trim($user->data()->username); ?>"><?php echo $user->data()->username; ?></a></li>
                                </div>
                              </div>
                              
                          <?php
                                }elseif($user->hasPermission('moderator')){
                          ?>
                                  <li class=""><a href="#"></a></li>  
                                  <li><a href="#"></a></li>  
                                  <li><a href="#"></a></li>
                                  <li><a href="#"></a></li>  
                                  <li><a href="#"></a></li>
                                  <li><a href="#"></a></li>
                              </ul>
                              
                          <?php
                                } elseif($user->hasPermission('mer_admin')){
                          ?>
                                  <li class=""><a href="#"></a></li>  
                                  <li><a href="#"></a></li>  
                                  <li><a href="#"></a></li>
                                  <li><a href="#"></a></li>  
                                  <li><a href="#"></a></li>
                                  <li><a href="#"></a></li>
                                </ul>
                          <?php
                                } elseif($user->hasPermission('mer_moderator')){
                          ?>
                                  <li class=""><a href="#"></a></li>  
                                  <li><a href="#"></a></li>  
                                  <li><a href="#"></a></li>
                                  <li><a href="#"></a></li>  
                                  <li><a href="#"></a></li>
                                  <li><a href="#"></a></li>
                                </ul>
                          <?php
                                } elseif($user->hasPermission('normal_user')){
                          ?>
                                  <li class=""><a href="/RamroDeal/php/index.php">All Deals</a></li>  
                                  <li><a href="#">Today's deals</a></li>  
                                  <li><a href="#">Beauty & Spas</a></li>
                                  <li><a href="#">Health & Fitness</a></li>  
                                  <li><a href="#">Foods</a></li>
                                  <li><a href="#">Tours & Travels</a></li>
                                </ul>
                                <div class="pull-right">
                                    <a href="/RamroDeal/php/controller/login.php" class="btn btn-info"> Sign-In</a>
                                    <a href="/RamroDeal/php/controller/register.php" class="btn btn-info"> Sign-up</a>
                                </div>
                          <?php
                                }
                          } else{
                        ?>
                            <li class=""><a href="/RamroDeal/index.php">All Deals</a></li>  
                            <li><a href="#">Today's deals</a></li>  
                            <li><a href="#">Beauty & Spas</a></li>
                            <li><a href="#">Health & Fitness</a></li>  
                            <li><a href="#">Foods</a></li>
                            <li><a href="#">Tours & Travels</a></li>
                          </ul>
                          <div class="pull-right">
                              <a href="/RamroDeal/php/controller/public/login.php" class="btn btn-info"> Sign-In</a>
                              <a href="/RamroDeal/php/controller/public/register.php" class="btn btn-info"> Sign-up</a>
                          </div>
                        <?php
                          }
                        ?>
                    </div>
                </div>
            </div>
<?php } ?>