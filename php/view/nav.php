<?php 
  function nav($category = null){
    $user = new User();
    $i = 0;
?>
<!-- Navigation -->
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <a class="navbar-brand" href="#">RamroDeal</a>
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php
          if($user->isLoggedIn()){
              if($user->hasPermission('admin')){
          ?>
                <li><a href="homepage_admin.php">Dashboard</a></li>
                <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Deals<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="addcategory.php">Category</a></li>
                        <li class="divider"></li>
                        <li><a href="deallist.php">Deal list</a></li>
                        <li><a href="adddeal.php">Add Deal</a></li>
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
                <li><a href="customerlist.php">Customers</a></li>  
                <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Users<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="adminlist.php">Admin list</a></li>
                        <li class="divider"></li>
                        <li><a href="addadminuser.php">Add New Admin</a></li>
                    </ul>
                </li>
            </ul>
          <?php
                }elseif($user->hasPermission('sub-admin')){
          ?>
                  <li><a href="homepage_admin.php">Dashboard</a></li>
                <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Deals<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="addcategory.php">Category</a></li>
                        <li class="divider"></li>
                        <li><a href="deallist.php">Deal list</a></li>
                        <li><a href="adddeal.php">Add Deal</a></li>
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
                        <li><a href="customerlist.php">Reviews and Rating</a></li>
                    </ul>
                </li>
                <li><a href="customerlist.php">Customers</a></li>  
            </ul>
          <?php
                } elseif($user->hasPermission('mer_admin')){
          ?>
                  <li><a href="homepage_merchant.php">Dashboard</a></li>
                  <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Deals<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="deallist.php">Deal list</a></li>
                      <li><a href="adddeal.php">Add Deal</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Reviews and Rating</a></li>
                    </ul>
                  </li>
                  <li><a href="customerlist.php">Customers</a></li>
                  <li><a href="#">Transaction Histroy</a></li> 
              </ul>
          <?php
                } elseif($user->hasPermission('normal_user')){
          ?>
                  <li class=""><a href="<?php echo BASE_URL; ?>index.php">All Deals</a></li>
                  <li><a href="<?php echo BASE_URL; ?>php/controller/members/homepage_normalUser.php?deal=active">Active deals</a></li>  
                  <li><a href="#">Top Deals</a></li>
                  <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">Category<b class="caret"></b></a>
                    <ul class="dropdown-menu">
<?php 
              while($i < count($category) ){ 
?>
                  <li><a href="<?php echo BASE_URL; ?>php/controller/members/homepage_normalUser.php?category=<?php echo $category[$i]->name; ?>"><?php echo $category[$i]->name; ?></a></li>
<?php
                $i++;
              }
?>
                  </ul>
                </li>
                <li><a href="">My Purchase</a></li>
              </ul>
          <?php
                }
?>
              <div class="pull-right">
                <ul class="nav navbar-nav">
                  <li class="dropdown pull-right" id="accountmenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user->data()->username; ?><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL; ?>php/controller/members/profile.php?user=<?php echo trim($user->data()->username); ?>">Profile</a></li>
                        <li><a href="<?php echo BASE_URL; ?>php/controller/members/update.php">Account Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo BASE_URL; ?>php/controller/members/logout.php"> Logout</a></li>
                      </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php
          } else{
        ?>
              <li class=""><a href="<?php echo BASE_URL; ?>index.php">All Deals</a></li>
              <li><a href="<?php echo BASE_URL; ?>index.php?deal=active">Active deals</a></li>  
              <li><a href="#">Top Deals</a></li>
              <li class="dropdown" id="accountmenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="">Category<b class="caret"></b></a>
                <ul class="dropdown-menu">
<?php 
              while($i < count($category) ){ 
?>
                  <li><a href="<?php echo BASE_URL; ?>index.php?category=<?php echo $category[$i]->name; ?>"><?php echo $category[$i]->name; ?></a></li>
<?php
                $i++;
              }
?>
                </ul>
              </li>
            </ul>
        </div>
      </div>
    </div>
      <?php
        }
} ?>