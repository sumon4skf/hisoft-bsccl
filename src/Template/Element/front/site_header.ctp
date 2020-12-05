<?php
use Cake\Core\Configure;

    $controller = $this->name;
    $action = $this->request->params['action'];
?>
<header id="header" style="min-height: 0px !important;" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 88, 'stickySetTop': '0px', 'stickyChangeLogo': false}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-logo" style="font-size: 20px; font-weight: bold;">

                        <?php
                        echo $this->Html->link($this->Html->image('/images/logo.png', array('height' => '60')),
                            '/',
                            array('escape' => false));
                        ?>
                        <?php echo $this->Html->link('', '/'); ?>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        
                    </div>
                    <div class="header-row">
                        <div class="header-nav pt-xs">
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse m-none">
                                <nav>
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="<?php if($controller == 'Pages' && $action == 'home'){ echo 'active'; }?> dropdown-full-color dropdown-primary">
                                            <?php echo $this->Html->link('Home', '/'); ?>
<!--                                            <a href="about-us">-->
<!--                                                Home-->
<!--                                            </a>-->
                                        </li>
                                        
                                        <?php
                                           if(!empty($this->request->session()->read('Auth.User'))){ ?>
                                               <li class="dropdown dropdown-mega dropdown-mega-signin signin logged" id="headerAccount">
                                                   <a class="dropdown-toggle" href="#">
                                                       <i class="fa fa-user"></i> <?php
                                                       $user_name = explode(' ',trim($this->request->session()->read('Auth.User.full_name')));
                                                       echo $user_name[0];
                                                       ?>
                                                   </a>
                                                   <ul class="dropdown-menu">
                                                       <li>
                                                           <div class="dropdown-mega-content">
                                                               <div class="row">
                                                                   <div class="col-md-8">
                                                                       <div class="user-avatar">
                                                                           <div class="img-thumbnail">
                                                                               <?php echo $this->Html->image('/images/user.png'); ?>
                                                                           </div>
                                                                           <p><strong><?php echo $this->request->session()->read('Auth.User.full_name'); ?></strong><span>USER</span></p>
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-4">
                                                                       <ul class="list-account-options">
                                                                           <li>
                                                                               <?php echo $this->Html->link('My Account', '/profile'); ?>
                                                                           </li>
                                                                           <li>
                                                                               <?php
                                                                               echo $this->Html->link('Logout', '/logout');
                                                                               ?>
                                                                           </li>
                                                                       </ul>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </li>
                                                   </ul>
                                               </li>
                                           <?php }else{ ?>
                                               <li class="<?php if($controller == 'Users' && ($action == 'login' || $action =='council')){ echo 'active'; }?> dropdown dropdown-full-color dropdown-primary dropdown-full-color dropdown-primary">
                                                   <?php
                                                   echo $this->Html->link('Sign In', '/login');
                                                   ?>

                                               </li>
                                           <?php }
                                        ?>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    div.header-logo a{
        text-decoration: none;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>

    $('form').submit(function(evt){
        evt.preventDefault();// to stop form submitting
    });
</script>