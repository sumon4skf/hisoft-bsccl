<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="featured-boxes">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="featured-box featured-box-primary align-left mt-xlg">
                            <?php echo $this->Flash->render('admin_success'); ?>
                            <?php echo $this->Flash->render('admin_error'); ?>
                            <div class="box-content">
                                <h4 class="heading-primary text-uppercase mb-md">User Registration</h4>
                                <?php echo $this->Form->create('Users', array('id'=>'frmSignUp', 'class'=>'login-form','novalidate'=>true)); ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="full_name">Full Name<em>*</em></label>
                                            <?php echo $this->Form->input('full_name',array('label'=>false,'type'=>'text','required'=>true, 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'full_name', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="phone">Phone Number</label>
                                            <?php echo $this->Form->input('phone',array('label'=>false,'type'=>'text','div'=>false, 'class'=>'form-control input-lg', 'id'=>'phone', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="email">Email Address<em>*</em></label>
                                            <?php echo $this->Form->input('email',array('label'=>false,'type'=>'text','div'=>false, 'autocomplete'=>'off', 'class'=>'form-control input-lg', 'id'=>'email', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="full_name">Name of council<em>*</em></label>
                                            <?php echo $this->Form->input('name_of_council',array('label'=>false,'type'=>'text','required'=>true, 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'name_of_council', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="full_name">Council Number</label>
                                            <?php echo $this->Form->input('council_no',array('label'=>false,'type'=>'text', 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'council_no', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="full_name">Province</label>
                                            <?php echo $this->Form->input('province',array('label'=>false,'type'=>'text', 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'province', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="full_name">Vouch Contact 1</label>
                                            <?php echo $this->Form->input('vouch_contact_1',array('label'=>false,'type'=>'text', 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'vouch_contact_1', 'label'=>false));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="full_name">Vouch Contact 2</label>
                                            <?php echo $this->Form->input('vouch_contact_2',array('label'=>false,'type'=>'text', 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'vouch_contact_2', 'label'=>false));?>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="password" class="control-label">Password <em>*</em></label>
                                            <?php echo $this->Form->input('password',array('div'=>'false','class'=>'form-control input-lg','label'=>false, 'autocomplete'=>'off'));?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="confirm_password" class="control-label">Confirm Password <em>*</em></label>
                                            <?php echo $this->Form->input('confirm_password',array('div'=>'false','class'=>'form-control input-lg','label'=>false,'type'=>'password', 'required'=>true));?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 pull-left">
                                        <a class="back-link" href="<?php echo $this->Url->build('/login',true);?>">Login</a>
                                    </div>
                                    <div class="col-md-2 pull-right">
                                        <input type="submit" value="Submit" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                    </div>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
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

    $("#frmSignUp").validate({
        rules:{
            "full_name": "required",
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            'email':{
                required: true,
                email: true
            }
        },
        messages:{
            "full_name": "Please enter Full Name",
            "email":{
                email:'Please enter correct email',
                required:'Please enter your valid Email Address'
            },
            password: {
                required: "Please enter password"
            },
            confirm_password: {
                required: "Please enter confirm passwor",
                equalTo: "Password and confirm password must be same"
            }
        }
    });

</script>
