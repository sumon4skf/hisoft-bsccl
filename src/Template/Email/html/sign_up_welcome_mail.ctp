<?php
use Cake\Core\Configure;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<table align="center" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f2f2f2">
    <tr>
        <td align="center" valign="top" height="40"></td>
    </tr>
    <tr>
        <td align="center" valign="top">
            <table align="center" cellpadding="0" cellspacing="0" width="750" bgcolor="#ffffff"
                   style="background:#ffffff">
                <tr>
                    <td colspan="3" height="40"></td>
                </tr>
                <tr>
                    <td width="40"></td>
                    <td align="center" valign="top">
                        <table align="center" cellpadding="0" cellspacing="0" width="100%">

                            <tr>
                                <td align="left" valign="top" height="30" colspan="2"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" colspan="2"
                                    style="color:#676767;font-size:16px;font-family:Arial, Helvetica, sans-serif;text-align:left;font-weight:bold; padding:0; line-height:20px;">
                                    Dear <?php
                                    if(false)
                                        echo 'Admin';
                                    else
                                        echo $variables['user']['full_name'];

                                    ?>!
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" height="15" colspan="2"></td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" height="15" colspan="2"></td>
                            </tr>

                            <tr>
                                <td valign="top" align="left" width="100%">
                                    <table cellspacing="0" cellpadding="0" align="left" border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="line-height:20px;color:#000;font-size:14px; font-weight:normal;text-align:left;font-family:Arial, Helvetica, sans-serif;"
                                                valign="top" align="left">I am delighted to inform you that your online portal is now active. Please log in using your credentials and browse the site.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" height="30" colspan="2"></td>
                            </tr>

                            <tr>
                                <td valign="top" align="left" width="100%">
                                    <table cellspacing="0" cellpadding="0" align="left" border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="line-height:20px;color:#000;font-size:14px; font-weight:normal;text-align:left;font-family:Arial, Helvetica, sans-serif;"
                                                valign="top" align="left">Don't forget to book in for the events or purchase your RSM items.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" height="30" colspan="2"></td>
                            </tr>

                            <tr>
                                <td valign="top" align="left" width="60%">
                                    <table cellspacing="0" cellpadding="0" align="left" border="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="line-height:20px;color:#000;font-size:14px; font-weight:normal;text-align:left;font-family:Arial, Helvetica, sans-serif;"
                                                valign="top" align="left">Have fun....
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td valign="top" align="left" width="40%">&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" height="30" colspan="2"></td>
                            </tr>


                            <tr>
                                <td align="left" valign="top" colspan="2" height="20"></td>
                            </tr>


                            <tr>
                                <td align="left" valign="top" colspan="2" height="10"></td>
                            </tr>
                        </table>
                    </td>
                    <td width="40"></td>
                </tr>

                <tr>
                    <td colspan="3" height="25"></td>
                </tr>

                <tr>
                    <td colspan="3" height="15"></td>
                </tr>

                <tr>
                    <td colspan="3" height="40"></td>
                </tr>
                <tr>
                    <td width="40"></td>
                    <td align="left" valign="top" style="color:#000;font-size:14px;text-align:left;font-family:Arial, Helvetica, sans-serif;
font-weight:normal;"><b style="font-size:12px;">Regards</b><br/>
                        <b style="font-size:14px;"><?php echo Configure::read('companyName'); ?> Team </b></td>
                    <td width="40"></td>
                </tr>
                <tr>
                    <td colspan="3" height="40"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" height="40"></td>
    </tr>
</table>
</body>
</html>