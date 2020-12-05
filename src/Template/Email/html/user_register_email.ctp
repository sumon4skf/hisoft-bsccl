<?php
$delegate = $post_data['Delegate'];
?>

<p style="font-family:Calibri, Tahoma, Arial;">Hi <?php echo $delegate['given_name'].' '.$delegate['family_name']; ?>,</p>

<?php //include('register_email.ctp'); ?>

<div style="font-family:Calibri, Tahoma, Arial;">Kind regards,</div>
<div style="font-family:Calibri, Tahoma, Arial;">ABBL</div>

<p>&nbsp;</p>

<img src="<?php echo $this->Url->Build('/img/banner.jpg',true);?>" alt="email">
