<?php
use Cake\Core\Configure;
?>
<section class="section section-parallax section-no-border custom-section-padding-2 m-none" data-plugin-parallax
         data-plugin-options="{'speed': 1.5}" data-image-src="img/slider/slider_2.jpg">
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <h1 class="text-color-light custom-secondary-font font-weight-bold mb-xs">Profile</h1>
            </div>
        </div>
    </div>
</section>

<section class="section section-no-border background-color-light m-none">
    <div class="container">
        <?php echo $this->Flash->render('admin_success'); ?>
        <?php echo $this->Flash->render('admin_error'); ?>
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-bold text-color-dark mb-xlg">Profile</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10}">
                    <div>
									<span class="img-thumbnail">
                                        <?php echo $this->Html->image('/images/user.png', array('height' => '300', 'class'=>"img-responsive")); ?>
									</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="mb-none"><strong><?php echo $this->request->Session()->read('Auth.User.full_name'); ?></strong></h2>
                <h4 class="heading-primary"><?php echo $this->request->Session()->read('Auth.User.boid'); ?></h4>

                <hr class="solid">

                <ul class="list list-icons">
                   <li>Name :  <?php echo $this->request->Session()->read('Auth.User.full_name'); ?></li>
                   <li>Shares :  <?php echo $this->request->Session()->read('Auth.User.shares'); ?></li>
                   <li>Email :  <?php echo $this->request->Session()->read('Auth.User.email'); ?></li>
                   <li>Phone :  <?php echo $this->request->Session()->read('Auth.User.phone'); ?></li>
                   <li>Created Date :  <?php echo date('d-m-Y', strtotime($this->request->Session()->read('Auth.User.created'))); ?></li>
                </ul>

            </div>

<!--            <div class="row">-->
<!--                <p><a href="users/change-password" class="btn btn-primary custom-btn-style-1 text-uppercase custom-sm-margin-bottom-1 mt-xlg" title="Meet Our Staff">Change Password</a></p>-->
<!--                </div>-->
        </div>
</section>

<section class="section section-tertiary section-no-border m-none">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <span
                    class="custom-secondary-font font-weight-bold custom-text-color-1 text-md">First time visitor</span>
                <h2 class="font-weight-bold custom-text-color-1 m-none">Find out more about the <?php echo Configure::read('companyName'); ?>..
                    <span class="font-weight-normal custom-secondary-font custom-font-italic">You belong here</span>
                </h2>
            </div>
            <div class="col-md-2">
                <a href="about-us" class="btn btn-primary custom-btn-style-1 text-uppercase mt-sm">Visitors Guide</a>
            </div>
        </div>
    </div>
</section>
