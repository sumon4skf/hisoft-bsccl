<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php $this->fetch('title') ?></title>

    <meta name="keywords" content="hisoft" />
    <meta name="description" content="HiSoft Site">
    <meta name="author" content="hisoftcloud.com">

    <script type="text/javascript">var SITE_URL="<?php echo $this->Url->build('/',true);?>"</script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700%7CSintony:400,700" rel="stylesheet" type="text/css">

    <?php echo $this->element('front/site_styles');?>

</head>
<body>

<div class="body">
    <?php echo $this->element('front/site_header');?>
    <div role="main" class="main">

        <?php echo $this->fetch('content') ?>

        <button class="open-button" onclick="openForm()">Comment</button>

        <div class="chat-popup" id="myForm">
            <div class="form-container">
                <div id="msg-info" class="msg-informaiton" style="display: none"><strong>Successfully submitted.</strong></div>
                <div class="frame text-box">
                    <div>
                        <div class="msj-rta macro">
                            <div class="text text-r" style="background:whitesmoke !important">
                                <input class="mytext" placeholder="Type a comment"/>
                            </div>

                        </div>

                        <div class="col-sm-6 col-md-4 col-lg-3 sample-icon">
                            <a onclick="closeForm()"><i class="icon-close icons"></i><span class="name"></span></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>

        <?php echo $this->element('front/site_footer');?>
    </div>

    <?php echo $this->element('front/site_scripts');?>

</body>
</html>