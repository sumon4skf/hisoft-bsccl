<?php

use Cake\Core\Configure;
?>

<?php echo $this->Flash->render('admin_success'); ?>
<?php echo $this->Flash->render('admin_error'); ?>

<section class="section section-no-border background-color-light m-none">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-8 col-md-offset-0 col-sm-offset-2 custom-sm-margin-bottom-1">

        <?php
        if (!empty($current_agenda) && $this->request->session()->check('Auth.User.full_name')) { ?>
          <div class="featured-boxes featured-boxes-style-7" id="agenda-proposed-section">
            <div class="row">
              <div class="col-lg-6">
                <div class="featured-box featured-box-primary featured-box-effect-7" style="height: 211px;">
                  <div class="box-content">
                    <div class="custom-event-info proposed-msg agenda-list">&nbsp;</div>
                    <?php echo $this->Form->create('Users', array('id' => 'frmProposed')); ?>
                    <?php echo $this->Form->input('proposed', array('label' => false, 'type' => 'hidden', 'value' => true, 'id' => 'proposed')); ?>
                    <?php echo $this->Form->input('agenda_id', array('label' => false, 'type' => 'hidden', 'value' => $current_agenda->id, 'id' => 'agenda_id')); ?>
                    <?php echo $this->Form->button('প্রস্তাবিত / Proposed', ['id' => 'proposedButton', 'name' => 'btn', 'class' => 'btn btn-primary custom-btn-style-1 text-uppercase mt-sm']); ?>
                    <?php echo $this->Form->end(); ?>
                    <?php
                    if (!empty($current_agenda->proposed_user->full_name)) {
                      $proposed_name = $current_agenda->proposed_user->full_name;
                      $proposed_boid = $current_agenda->proposed_user->boid;
                    } else {
                      $proposed_name = $this->request->session()->read('Auth.User.full_name');
                      $proposed_boid = $this->request->session()->read('Auth.User.boid');
                    }
                    ?>
                    <p class="custom-text-color-2 mb-0">
                      <div class="agenda-text">
                        <strong><?php echo $proposed_boid; ?></strong><br />
                        <strong><?php echo $proposed_name; ?></strong>
                      </div>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="featured-box featured-box-secondary featured-box-effect-7" style="height: 211px;">
                  <div class="box-content">
                    <div class="custom-event-info seconded-msg agenda-list">&nbsp;</div>
                    <?php echo $this->Form->create('Users', array('id' => 'frmSeconded')); ?>
                    <?php echo $this->Form->input('seconded', array('label' => false, 'type' => 'hidden', 'value' => true, 'id' => 'seconded')); ?>
                    <?php echo $this->Form->input('agenda_id', array('label' => false, 'type' => 'hidden', 'value' => $current_agenda->id, 'id' => 'agenda_id')); ?>
                    <?php echo $this->Form->button('সমর্থিত / Seconded', ['id' => 'secondedButton', 'name' => 'btn', 'class' => 'btn btn-primary custom-btn-style-1 text-uppercase mt-sm']); ?>
                    <?php echo $this->Form->end(); ?>
                    <?php
                    if (!empty($current_agenda->seconded_user->full_name)) {
                      $seconded_name = $current_agenda->seconded_user->full_name;
                      $seconded_boid = $current_agenda->seconded_user->boid;
                    } else {
                      $seconded_name = $this->request->session()->read('Auth.User.full_name');
                      $seconded_boid = $this->request->session()->read('Auth.User.boid');
                    }
                    ?>
                    <p class="custom-text-color-2 mb-0">
                      <div class="agenda-text">
                        <strong><?php echo $seconded_boid; ?></strong><br />
                        <strong><?php echo $seconded_name; ?> </strong>
                      </div>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php }
        ?>
      </div>

      <?php include 'agenda_list.ctp'; ?>

    </div>
  </div>
</section>

<?php
$next_date_time = date('M d, Y', strtotime($next_event->event_date)) . ' ' . date('G:i:s', strtotime($next_event->event_time));
?>
<script>
  $(document).ready(function() {
    var next_event_datetime = '<?php echo $next_date_time; ?>';

    var countDownDate = new Date(next_event_datetime).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      var days_name = ' day';
      if (days > 1) {
        days_name = ' days';
      }

      // Output the result in an element with id="demo"
      document.getElementById("count-down-timer").innerHTML = days + days_name + " " + hours + " hours " +
        minutes + " minutes " + seconds + " seconds ";

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("count-down-timer").innerHTML = "EXPIRED";
      }
    }, 1000);


    $("#proposedButton").click(function(e) {
      e.preventDefault();
      var datastring = $("#frmProposed").serialize();
      $.ajax({
        type: "POST",
        url: SITE_URL + 'agendas/proposed',
        data: datastring,
        dataType: 'html',
        success: function(data) {
          if (data != 0) {
            $(".proposed-msg").text(data);
          } else {
            $(".proposed-msg").text(data);
          }
        }
      });
    });

    $("#acceptedButton").click(function(e) {
      e.preventDefault();
      var datastring = $("#frmAccepted").serialize();
      $.ajax({
        type: "POST",
        url: SITE_URL + 'agendaVotes/accepted',
        data: datastring,
        dataType: 'json',
        success: function(data) {
          $(".accepted-msg").show();
          var msg = 'Thanks for vote.';
          if (data != 0) {
            $(".accepted-msg").text(msg).delay(3000).fadeOut();;
          } else {
            $(".accepted-msg").text(msg).delay(3000).fadeOut();;
          }

          $("#voted-given-action").hide();
          $("#agenda-vote-description").show();
          $("#agenda-vote-description").html(data.message_1);
          $("#agenda-vote-info-" + data.id).html(data.message_2);
        }
      });
    });

    $("#declinedButton").click(function(e) {
      e.preventDefault();
      var datastring = $("#frmDeclined").serialize();

      $.ajax({
        type: "POST",
        url: SITE_URL + 'agendaVotes/declined',
        data: datastring,
        dataType: 'json',
        success: function(data) {
          $(".declined-msg").show();
          var msg = 'Thanks for vote.';
          if (data != 0) {
            $(".declined-msg").text(msg).delay(3000).fadeOut();
          } else {
            $(".declined-msg").text(msg).delay(3000).fadeOut();
          }

          $("#voted-given-action").hide();
          $("#agenda-vote-description").show();
          $("#agenda-vote-description").html(data.message_1);
          $("#agenda-vote-info-" + data.id).html(data.message_2);
        }
      });
    });

  });
</script>