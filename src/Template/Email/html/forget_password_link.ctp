<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forget Password Link</title>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,800' rel='stylesheet' type='text/css' />
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,800');
    </style>
</head>
<body>
<style type="text/css">
    *{

        font-family: 'Raleway', sans-serif;
    }
    p,span,a,strong,tabel,tr,th,td{
        font-family: 'Raleway', sans-serif;
    }
    body{
        background-color:#ececec;


    }
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  bgcolor="#ececec" align="center">
    <tr>
        <td valign="top" align="center">
            <table width="748" border="0" cellspacing="0" cellpadding="0"   align="center">
                <tr>
                    <td valign="top" align="center" height="30px" style="line-height:30px;">&nbsp;</td>
                </tr>
            </table>
            <table width="748" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="border:none; padding:2px;">
                <tr> <td valign="top" align="center" height="30px" style="line-height:30px;">&nbsp;</td> </tr>
                <tr>
                    <td valign="top" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                            <tr>
                                <td width="100%" height="15px" style="line-height:15px;">&nbsp;</td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                            <tr>
                                <td  width="100%" height="40px" style="line-height:40px;">&nbsp;</td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                            <tr>
                                <td width="4%" valign="top"></td>
                                <td width="92%" valign="top">


                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">

                                        <tr><td valign="top" width="100%"><span style="color:#000;font-size:18px;font-family: 'Raleway',Verdana, Arial, sans-serif;"> Dear <?php echo $variables['user']['full_name']; ?>,</span></td></tr>


                                        <tr><td height="10">&nbsp;</td></tr>
                                        <tr><td height="10">&nbsp;</td></tr>

                                        <?php foreach($variables['message'] as $message) {?>
                                            <tr><td valign="top" width="100%"><span style="color:#000;font-size:18px;font-family: 'Raleway',Verdana, Arial, sans-serif;"><?php echo $message ?></span></td></tr>
                                        <?php } ?>

                                        <tr><td height="10">&nbsp;</td></tr>
                                        <tr><td height="10">&nbsp;</td></tr>

                                        <tr><td valign="top" width="100%"><span style="color:#000;font-size:18px; font-family: 'Raleway',Verdana, Arial, sans-serif;">link : <?php echo $variables['site_link']; ?> <br/></span></td></tr>


                                        <?php foreach($variables['footerMessage'] as $footerMessage) {?>
                                            <tr><td valign="top" width="100%"><span style="color:#000;font-size:18px;font-family: 'Raleway',Verdana, Arial, sans-serif;"><?php echo $footerMessage ?></span></td></tr>
                                        <?php } ?>


                                        <tr><td height="10">&nbsp;</td></tr>

                                        <tr><td height="10">&nbsp;</td></tr>

                                        <tr><td height="30">&nbsp;</td></tr>
                                        <tr><td width="100%" valign="top"><span style="color:#000;font-size:18px; font-family: 'Raleway',Verdana, Arial, sans-serif;">Thank You</span></td></tr>
                                        <tr><td width="100%" valign="top"><span style="color:#000;font-size:18px; font-family: 'Raleway',Verdana, Arial, sans-serif;">ABBL Team. </span></td></tr>


                                        <tr><td height="30">&nbsp;</td></tr>
                                        <tr><td height="1">&nbsp;</td></tr>
                                        <tr><td height="50">&nbsp;</td></tr>

                                        <tr><td height="30">&nbsp;</td></tr>
                                        <tr><td height="1">&nbsp;</td></tr>
                                        <tr><td height="50">&nbsp;</td></tr>




                                    </table>



                                </td>
                                <td width="4%" valign="top"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
            <table width="748" border="0" cellspacing="0" cellpadding="0"   align="center">
                <tr>
                    <td valign="top" align="center" height="30px" style="line-height:30px;">&nbsp;</td>
                </tr>
            </table></td>
    </tr>
    <tr><td height="30">&nbsp;</td></tr>
    <tr><td height="1">&nbsp;</td></tr>
    <tr><td height="50">&nbsp;</td></tr>
</table>
</body>
</html>