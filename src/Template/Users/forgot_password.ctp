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
                                <h4 class="heading-primary text-uppercase mb-md">Forgot Your Password?</h4>
                                <?php echo $this->Form->create('Users',array('id'=>'forgot-password-form', 'class'=>'login-form','novalidate'=>true)); ?>
                                <fieldset>
                                    <legend>Retrieve your password here</legend>
                                </fieldset>

                                <fieldset class="form-group">Please enter your email address below. You will receive a link to reset your password.</fieldset>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1" class="control-label">Email Address <em>*</em></label>
                                            <?php echo $this->Form->input('email',array('label'=>false,'type'=>'email','required'=>true, 'div'=>false, 'class'=>'form-control input-lg', 'id'=>'email', 'label'=>false));?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="back-link pull-left" href="<?php echo $this->Url->build('/login',true);?>">Back to Login</a>
                                    </div>
                                    <div class="col-md-6">
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

    $("#forgot-password-form").validate({
        rules:{
            'email':{
                required: true,
                email: true
            }
        },
        messages:{
            "email":{
                email:'Please enter correct email',
                required:'Please enter your valid Email Address'
            }
        }
    });
</script>


<!--<div class="container forgot-password">-->
<!--    <div class="row">-->
<!--        <div class="col-sm-12">-->
<!--            --><?php //echo $this->Flash->render('admin_success'); ?>
<!--            --><?php //echo $this->Flash->render('admin_error'); ?>
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <h1 class="text-uppercase">Forgot Your Password?</h1>-->
<!---->
<!--    <div class="forgot-password-form">-->
<!--        --><?php //echo $this->Form->create('Users',array('id'=>'forgot-password-form','novalidate'=>true)); ?>
<!--        <div class="inner">-->
<!--            <fieldset>-->
<!--                <legend>Retrieve your password here</legend>-->
<!--            </fieldset>-->
<!---->
<!--            <fieldset class="form-group">Please enter your email address below. You will receive a link to reset your password.</fieldset>-->
<!---->
<!--            <fieldset class="form-group">-->
<!--                <label for="exampleInputEmail1" class="control-label">Email Address <em>*</em></label>-->
<!--                --><?php //echo $this->Form->input('email',array('label'=>false,'type'=>'email','required'=>true, 'div'=>false, 'class'=>'form-control', 'id'=>'field-email', 'label'=>false));?>
<!---->
<!--            </fieldset>-->
<!--        </div>-->
<!--        <footer>-->
<!--            <div class="buttons-wrapper">-->
<!--                <button type="submit" title="Submit" class="btn pull-left">Submit</button>-->
<!--                <a class="back-link pull-right" href="--><?php //echo $this->Url->build('/login',true);?><!--">Back to Login</a>-->
<!--            </div>-->
<!--        </footer>-->
<!---->
<!--        --><?php //echo $this->Form->end(); ?>
<!--    </div>-->
<!---->
<!--</div>-->
<!---->
<!---->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!---->
<!--        $("#forgot-password-form").validate({-->
<!--            rules:{-->
<!--                "email": {-->
<!--                    required: true,-->
<!--                    email: true-->
<!--                }-->
<!--            },-->
<!--            messages:{-->
<!--                "email": "Please enter your Valid Email",-->
<!--            }-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->
