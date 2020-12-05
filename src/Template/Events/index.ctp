<?php
use Cake\Core\Configure;
?>

<section class="section section-no-border custom-section-padding-2 m-none" style="background: url('img/demos/church/footer-bg.jpg'); background-size: cover;">
    <div class="container">
        <div class="row center">
            <div class="col-md-12">
                <h1 class="text-color-light custom-secondary-font font-weight-bold mb-xs">Events</h1>
            </div>
        </div>
    </div>
</section>

<section class="section section-tertiary section-no-border m-none">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-md-offset-0 col-sm-offset-2 custom-sm-margin-bottom-1">
                <h2 class="text-color-dark font-weight-bold">Next Event</h2>
                <article class="thumb-info custom-thumb-info custom-box-shadow">
									<span class="thumb-info-wrapper">
										<a href="<?php echo $this->Url->build(array( 'controller' => 'events','action' => 'eventDetails', $events[0]['id'] ));?>">
                                            <img src="img/banks/program.jpg" alt class="img-responsive" />
                                        </a>
									</span>
                    <?php if(!empty($events)){ //debug($events); ?>
                            <span class="thumb-info-caption">
										<span class="custom-thumb-info-wrapper-box center">
											<span id="countdown" data-countdown-title="" data-countdown-date="2017/06/10 12:00:00" class="custom-newcomers-class clock-one-events text-color-dark font-weight-bold custom-secondary-font custom-box-shadow"></span>
										</span>
										<span class="custom-event-infos">
											<ul>
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php
                                                        echo date('d M Y', strtotime($events[0]['event_date'])) . ' ' . date('g:i A', strtotime($events[0]['event_time']));
                                                    ?>
                                                </li>

                                                <li class="text-uppercase">
                                                    <i class="fa fa-user"></i>
                                                    <?php
                                                    if($events['0']['user']['username'] == 'admin')
                                                        echo '';
                                                    else
                                                        echo $events['0']['user']['username'];
                                                    ?>
                                                </li>

                                                <li class="text-uppercase" style="margin-left: 0px !important; display: inherit;">
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php
                                                    echo $events['0']['venues'];
                                                    ?>
                                                </li>
                                            </ul>
										</span>
										<span class="thumb-info-caption-text">
											<h4 class="font-weight-bold mb-sm">
                                                <a href="<?php echo $this->Url->build(array( 'controller' => 'events','action' => 'eventDetails', $events[0]['id'] ));?>" class="text-decoration-none custom-secondary-font text-color-dark">
                                                    <?php
                                                         echo $events['0']['event_name'];
                                                    ?>
                                                </a>
                                            </h4>
											<p>
                                                <?php
                                                    echo $events['0']['description'];
                                                ?>
                                            </p>
										</span>
									</span>
                        <?php }
                    ?>

                </article>
            </div>
            <div class="col-md-6 col-sm-8 col-md-offset-0 col-sm-offset-2">
                <h2 class="text-color-dark font-weight-bold">Upcoming Event</h2>

                <?php if(!empty($events)){
                    $current_date = date('Y-m-d H:i:s');
                    foreach($events as $event) {
                        $event_date_time = date('Y-m-d', strtotime($event['event_date'])) . ' ' . date('H:i:s', strtotime($event['event_time']));

                        if ($current_date <= $event_date_time) {
                            ?>

                            <article class="custom-post-event">
                                <div class="post-event-date background-color-primary center">
                                <span class="month text-uppercase custom-secondary-font text-color-light"><?php
                                    echo date('M', strtotime($event['event_date']));
                                    ?></span>
                                <span class="day font-weight-bold text-color-light"><?php
                                    echo date('d', strtotime($event['event_date']));
                                    ?></span>
                                <span class="year text-color-light"><?php
                                    echo date('Y', strtotime($event['event_date']));
                                    ?></span>
                                </div>
                                <div class="post-event-content custom-margin-1">
										<span class="custom-event-infos">
											<ul>
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php
                                                    echo date('g:i A', strtotime($event['event_time']));
                                                    ?>
                                                </li>
                                                <li class="text-uppercase">
                                                    <i class="fa fa-user"></i>
                                                    <?php
                                                    if($event['user']['username'] == 'admin')
                                                        echo 'District Council';
                                                    else
                                                        echo $event['user']['username'];
                                                    ?>
                                                </li>
                                                <li class="text-uppercase" style="margin-left: 0px !important; display: inherit;">
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php
                                                    echo $event['venues'];
                                                    ?>
                                                </li>

                                            </ul>
										</span>
                                    <h4 class="font-weight-bold">
                                        <a href="<?php echo $this->Url->build(array( 'controller' => 'events','action' => 'eventDetails', $event['id'] ));?>"
                                           class="text-decoration-none custom-secondary-font text-color-dark"><?php
                                            echo $event['event_name'];
                                            ?></a>
                                    </h4>
                                    <p><?php
                                        echo $event['description'];
                                        ?></p>
                                </div>
                            </article>

                            <hr class="solid">

                        <?php }
                    }
                    ?>



                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="section section-no-border background-color-light m-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-bold text-color-dark mb-xlg">Past Events</h2>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($events)) {
                $current_date_time = date('Y-m-d H:i:s');
                foreach ($events as $event) {
                    $event_date_times = date('Y-m-d', strtotime($event['event_date'])) . ' ' . date('H:i:s', strtotime($event['event_time']));

                    if ($current_date_time >= $event_date_times) {
                        ?>
                        <div class="col-md-6">
                            <article class="custom-post-event background-color-light custom-sm-margin-bottom-2 mb-xlg">
                                <div class="post-event-date background-color-primary center">
                                    <span
                                        class="month text-uppercase custom-secondary-font text-color-light"><?php echo date('M', strtotime($event['event_date'])); ?></span>
                        <span class="day font-weight-bold text-color-light"><?php
                            echo date('d', strtotime($event['event_date']));
                            ?></span>
                        <span class="year text-color-light"><?php
                            echo date('Y', strtotime($event['event_date']));
                            ?></span>
                                </div>
                                <div class="post-event-content custom-margin-1">
										<span class="custom-event-infos">
											<ul>
                                                <li>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php
                                                    echo date('g:i A', strtotime($event['event_time']));
                                                    ?>
                                                </li>
                                                <li class="text-uppercase">
                                                    <i class="fa fa-user"></i>
                                                    <?php
                                                    if($event['user']['username'] == 'admin')
                                                        echo 'District Council';
                                                    else
                                                        echo $event['user']['username'];
                                                    ?>
                                                </li>
                                                <li class="text-uppercase" style="margin-left: 0px !important; display: inherit;">
                                                    <i class="fa fa-map-marker"></i>
                                                    <?php
                                                    echo $event['venues'];
                                                    ?>
                                                </li>
                                            </ul>
										</span>
                                    <h4 class="font-weight-bold text-color-dark">
                                        <a href="<?php echo $this->Url->build(array( 'controller' => 'events','action' => 'eventDetails', $event['id'] ));?>"
                                           class="text-decoration-none custom-secondary-font text-color-dark">
                                            <?php
                                            echo $event['event_name'];
                                            ?>
                                        </a>
                                    </h4>
                                    <p><?php
                                        echo $event['description'];
                                        ?></p>
                                </div>
                                <hr class="solid">
                            </article>
                        </div>
                    <?php }
                }
            }
            ?>
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