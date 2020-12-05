<div class="container">



  <?php
  $data = isset($data) ? $data : [];
  $is_otp = false;

  if (isset($data) && count($data)) {
    $is_otp = $data['otp_enable'] ? true : false;
  }
  ?>



  <div class="row">

    <div class="col-md-6">
      <div class="featured-boxes" style="padding: 90px 0;">
        <div class="row">
          <div class="col-sm-12">
            <div class="featured-box featured-box-primary align-left mt-xlg">
              <?php echo $this->Flash->render('admin_success'); ?>
              <?php echo $this->Flash->render('admin_error'); ?>

              <?php if ($is_otp) : ?>
                <div class="box-content">
                  <form method="post" action="/check-otp" class="login-form">

                    <input type="hidden" name="id" value="<?= count($data) ? $data['id'] : '' ?>">
                    <input type="hidden" name="boid" value="<?= count($data) ? $data['boid'] : '' ?>">
                    <input type="hidden" name="name" value="<?= count($data) ? $data['name'] : '' ?>">
                    <input type="hidden" name="shares" value="<?= count($data) ? $data['shares'] : '' ?>">
                    <input type="hidden" name="password" value="123123123">

                    <div class="row">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="otp">Enter OTP Code (OTP has been send in your registered Mobile Number)</label>
                        </div>
                        <div class="col-md-8">

                          <?php echo $this->Form->input('otp', array('label' => false, 'type' => 'text', 'required' => false, 'div' => false, 'class' => 'form-control input-lg', 'id' => 'otpcode', 'label' => false)); ?>
                        </div>
                        <div class="col-md-2 pull-right">
                          <input type="submit" value="Proceed" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                        </div>

                      </div>
                    </div>
                  </form>
                </div>

              <?php else : ?>
                <div class="box-content">
                  <?php echo $this->Form->create('Users', array('id' => 'frmSignIn', 'class' => 'login-form', 'novalidate' => true)); ?>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label for="boid">FOLIO/BOID</label>
                        <?php echo $this->Form->input('boid', array('label' => false, 'type' => 'text', 'required' => true, 'div' => false, 'class' => 'form-control input-lg', 'id' => 'boid', 'label' => false)); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label for="name">Name</label>
                        <?php echo $this->Form->input('name', array('label' => false, 'type' => 'text', 'required' => true, 'div' => false, 'class' => 'form-control input-lg', 'id' => 'name', 'label' => false)); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label for="shares">Shares</label>
                        <?php echo $this->Form->input('shares', array('label' => false, 'type' => 'text', 'required' => true, 'div' => false, 'class' => 'form-control input-lg', 'id' => 'shares', 'label' => false)); ?>
                      </div>
                    </div>
                  </div>

                  <?php echo $this->Form->input('password', array('div' => 'false', 'type' => 'hidden', 'class' => 'form-control input-lg', 'value' => '123123123', 'label' => false, 'id' => 'password', 'required' => true)); ?>

                  <div class="row">
                    <div class="col-md-8 pull-left">
                    </div>
                    <div class="col-md-2 pull-right">
                      <input type="submit" value="Login" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                    </div>
                  </div>
                  <?php echo $this->Form->end(); ?>
                </div>

              <?php endif ?>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
echo $this->Html->script('jquery-validate/jquery.validate.js');
?>

<script type="text/javascript">
  $("#frmSignIn").validate({
    rules: {
      boid: {
        required: true
      },
      name: {
        required: true
      },
      shares: {
        required: true
      },
      password: {
        required: true
      },
    },
    messages: {
      boid: {
        required: 'Please enter your void'
      },
      name: {
        required: 'Please enter your name'
      },
      shares: {
        required: 'Please enter your shares'
      },
      password: {
        required: "Please enter password"
      }
    }
  });
</script>