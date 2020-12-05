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
                                <h4 class="heading-primary text-uppercase mb-md">Change Password</h4>
                                <?php echo $this->Form->create('Users',array('id'=>'change-password-form', 'class'=>'login-form','novalidate'=>true)); ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="password">Password</label>
                                            <?php echo $this->Form->input('password',array('label'=>false,'type'=>'password', 'required'=>true, 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'password', 'label'=>false));?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="confirm_password" class="control-label">Confirm Password <em>*</em></label>
                                            <?php echo $this->Form->input('confirm_password',array('div'=>'false', 'type'=>'password', 'class'=>'form-control input-lg','label'=>false,'id'=>'confirm_password', 'required'=>true));?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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

    $("#change-password-form").validate({
        rules:{
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages:{
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