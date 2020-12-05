<?php
use Cake\Core\Configure;
?>
        <section class="section section-parallax section-no-border custom-section-padding-2 m-none" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="img/slider/slider_2.jpg">
            <div class="container">
                <div class="row center">
                    <div class="col-md-12">
                        <h1 class="text-color-light custom-secondary-font font-weight-bold mb-xs">Who We Are</h1>
                        <span class="text-color-light custom-secondary-font text-uppercase">About Us</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-no-border background-color-light m-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <h2 class="font-weight-bold">An Introduction to the <?php echo Configure::read('companyName'); ?></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ornare diam at lectus ultrices rutrum. Fusce et lobortis orci, vel rutrum nisl. Praesent ut eros blandit risus fermentum mattis. Ut eleifend metus in arcu malesuada, nec tincidunt lectus luctus. Suspendisse dignissim velit eu lacinia egestas. Duis posuere mi a est vestibulum congue. Pellentesque quis velit in velit maximus varius. Donec.</p>
                        <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis mauris urna. Donec pellentesque eros non sapien malesuada, at facilisis diam interdum. Praesent non cursus dui, et consectetur risus. Pellentesque eu arcu sollicitudin, viverra neque ut, facilisis ligula. In faucibus tellus ac metus ullamcorper aliquet. Aliquam sem dui, cursus quis magna vitae, convallis malesuada tellus. Nam malesuada.</p>
                    </div>
                    <div class="col-md-5 col-sm-5 hidden-xs">
                        <div class="custom-box-squares">
                            <img class="custom-cloud left-pos-2" alt src="img/demos/church/others/left-cloud.png" />
                            <div class="custom-big-square left-pos-2 custom-box-shadow" style="background: url('img/banks/program_312.jpg'); background-size: cover;"></div>
                            <div class="custom-small-square left-pos-2 custom-box-shadow" style="background: url('img/banks/program_212.jpg'); background-size: cover;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-secondary section-no-border m-none">
            <div class="container">
                <div class="row center">
                    <div class="col-md-4 col-sm-8 col-md-offset-0 col-sm-offset-2 custom-sm-margin-bottom-1">
                        <img src="img/demos/church/icons/custom-icon-1.png" alt class="img-repsonsive" />
                        <h2 class="font-weight-bold text-color-light">Our Values</h2>
                        <p class="custom-text-color-2 mb-none">Lorem ipsum dolor sit amet, adipiscing elit.</br> Mauris accumsan tortor ut posuere consequat.</br> Fusce aliquet, dolor eget tempus ultricies, eros.</p>
                    </div>
                    <div class="col-md-4 col-sm-8 col-md-offset-0 col-sm-offset-2 custom-sm-margin-bottom-1">
                        <img src="img/demos/church/icons/custom-icon-2.png" alt class="img-repsonsive" />
                        <h2 class="font-weight-bold text-color-light">Join with Us</h2>
                        <p class="custom-text-color-2 mb-none"><strong class="text-color-light">Sundays at 8.00pm - 9.00pm</strong></br> at <?php echo Configure::read('companyName'); ?></p>
                    </div>
                    <div class="col-md-4 col-sm-8 col-md-offset-0 col-sm-offset-2">
                        <img src="img/demos/church/icons/custom-icon-3.png" alt class="img-repsonsive" />
                        <h2 class="font-weight-bold text-color-light">Our Mission</h2>
                        <p class="custom-text-color-2 mb-none">Lorem ipsum dolor sit amet, adipiscing elit.</br> Mauris accumsan tortor ut posuere consequat.</br> Fusce aliquet, dolor eget tempus ultricies, eros.</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="section section-no-border background-color-light m-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 custom-xs-margin-bottom-1">
                        <h2 class="font-weight-bold">Talk to Us</h2>
                        <p>Please feel free to contact us</p>
                        <div class="col-md-11 col-sm-12">
                            <div class="custom-location">
                                <img src="img/demos/church/others/pin.png" alt class="img-responsive" />
                                <h4 class="font-weight-bold custom-primary-font mb-xs"><?php echo Configure::read('companyName'); ?></h4>
                                <h6 class="font-weight-bold custom-primary-font mb-xs">Bangladesh</h6><br/>
                                <p>
                                    <strong>Address</strong> <br/>
                                    <?php echo Configure::read('companyAddress'); ?> <br/>
                                    <strong>Phone:</strong> <a class="custom-text-color-default" href="tel:<?php echo trim(Configure::read('phoneNo')); ?>"><?php echo Configure::read('phoneNo'); ?></a><br/>
                                    <strong>Email:</strong><a href="mailto:<?php echo Configure::read('companyEmail'); ?>" target="_top"><?php echo Configure::read('companyEmail'); ?></a> <br/>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="img/banks/join_us.jpg" alt class="img-responsive custom-border-1 custom-box-shadow" />
                        <a href="about-us" class="btn btn-primary custom-btn-style-1 text-uppercase pull-right mt-md">View Gallery</a>
                    </div>
                </div>
            </div>
        </section>

