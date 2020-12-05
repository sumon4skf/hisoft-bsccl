<?php
use Cake\Core\Configure;
?>

<section class="section section-no-border custom-section-padding-3 m-none" style="background: url(<?php echo $this->Url->image('/img/demos/church/footer-bg.jpg');?>); background-size: cover;">
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <h1 class="text-color-light custom-secondary-font font-weight-bold mb-xs">Events</h1>
            </div>
        </div>
    </div>
</section>

<section class="section section-no-border background-color-light m-none">
    <div class="container">
        <div class="row custom-negative-margin-2 mb-xlg">
            <div class="col-md-12">
                <div class="custom-event-top-image">
                    <span id="countdown" data-countdown-title="" data-countdown-date="2017/06/10 12:00:00" class="custom-newcomers-class clock-one-events custom-newcomers-pos-2 text-color-dark font-weight-bold custom-secondary-font custom-box-shadow center"></span>
                    <?php
                        echo $this->Html->image('/img/banks/events.jpg',array('alt'=>'','class'=>'img-responsive custom-border-1 custom-box-shadow'));
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <article class="custom-post-event background-color-light">
                    <div class="post-event-date background-color-primary center">
                        <span class="month text-uppercase custom-secondary-font text-color-light"><?php echo date('M', strtotime($event_detail['event_date'])); ?></span>
                        <span class="day font-weight-bold text-color-light"><?php echo date('d',strtotime($event_detail['event_date'])); ?></span>
                        <span class="year text-color-light"><?php echo date('Y',strtotime($event_detail['event_date'])); ?></span>
                    </div>
                    <div class="post-event-content custom-margin-1 mb-xlg">
                        <h2 class="font-weight-bold text-color-dark mb-none"><?php echo $event_detail['event_name']; ?></h2>
										<span class="custom-event-infos">
											<ul class="mb-md">
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php echo date('g:i A', strtotime($event_detail['event_time'])); ?>
                                                </li>
                                                <li class="text-uppercase">
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php echo $event_detail['venues']; ?>
                                                </li>
                                            </ul>
										</span>
                        <p><?php echo $event_detail['description']; ?></p>
                        <p><?php echo $event_detail['description']; ?></p>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<section class="section section-tertiary section-no-border m-none">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <span class="custom-secondary-font font-weight-bold custom-text-color-1 text-md">First time visitor</span>
                <h2 class="font-weight-bold custom-text-color-1 m-none">Find out more about the <?php echo Configure::read('companyName'); ?>.. <span class="font-weight-normal custom-secondary-font custom-font-italic">You belong here</span></h2>
            </div>
            <div class="col-md-2">
                <a href="about-us" class="btn btn-primary custom-btn-style-1 text-uppercase mt-sm">Visitors Guide</a>
            </div>
        </div>
    </div>
</section>