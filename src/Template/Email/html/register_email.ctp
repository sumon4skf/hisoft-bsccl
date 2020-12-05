<?php
if ($delegate['state'] == "Other") {
    $delegate['state'] = $delegate['state_others'];
}
?>

<p style="font-family:Calibri, Tahoma, Arial;">Congratulations, your registration is complete.</p>
<hr>
<h1 style="font-family:Calibri, Tahoma, Arial;">TAX RECEIPT</h1>
<h3 style="font-family:Calibri, Tahoma, Arial;">Delegate Information</h3>

<table width="100%" border="0" cellpadding="0">
    <tr>
        <td><p style="font-family:Calibri, Tahoma, Arial;"><strong>Title:</strong> <?php echo $delegate['title'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Given name:</strong> <?php echo $delegate['given_name'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Organization:</strong> <?php echo $delegate['organization'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Position:</strong> <?php echo $delegate['position'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>State:</strong> <?php echo $delegate['state'] ?></p>
            <?php if(!empty($delegate['telephonePrefix'])){ ?>
                <p><strong>Telephone Prefix:</strong> <?php echo $delegate['telephonePrefix']; ?></p>
            <?php } ?>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Zipcode:</strong> <?php echo $delegate['postcode'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Email:</strong> <?php echo $delegate['email'] ?></p></td>
        <td><p style="font-family:Calibri, Tahoma, Arial;"><strong>Other title:</strong> <?php echo $delegate['otherTitle'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Family name:</strong> <?php echo $delegate['family_name'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Address:</strong> <?php echo $delegate['address1'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>City:</strong> <?php echo $delegate['city'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Country:</strong> <?php echo $delegate['country'] ?></p>
            <?php if(!empty($delegate['telephone'])){ ?>
                <p><strong>Telephone:</strong> <?php echo $delegate['telephone']; ?></p>
            <?php } ?>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Mobile:</strong> <?php echo $delegate['mobile'] ?></p>
            <p style="font-family:Calibri, Tahoma, Arial;"><strong>Preferred badge name:</strong> <?php echo $delegate['preffered_badge_name'] ?></p></td>
    </tr>
</table>
<br/>
<?php if(!empty($post_data['Registration']['typePrice'])){ ?>
    <h3 style="font-family:Calibri, Tahoma, Arial;">Registration Information</h3>
    <table cellpadding="5" border="0" style="width:100%; font-family:Calibri, Tahoma, Arial;">
        <tr>
            <td width="40%"><b>Registration Name</b></td>
            <td width="20%"><b>Type</b></td>
            <td width="20%"><b>Quantity</b></td>
            <td width="20%"><b>Price</b></td>
        </tr>
        <?php
        $registration_ticket_total = $registration_fee_total = 0;
        $quantity = 1;
        $i= 0;
        foreach ($post_data['Registration']['typePrice'] as $key=>$regType) {

            $registration['price'] = $bonus  = 0;

            $regTypeArray = array('earlybird'=>'Early Bird','standard'=>'Standard');

            $explodedRegType = explode("_", $regType);
            $registration['registration_id'] = (int)$explodedRegType[0];
            $registration['registration_name'] = $post_data['Registration']['registration_name'][$key];
            $registration['type'] = $regTypeArray[$explodedRegType[1]];

            $quantity = (int)$post_data['Registration']['quantity'][$key];

            if($i == 0){
                if($post_data['Registration']['quantity'][1] > 5){
                    $bonus = (int) ($post_data['Registration']['quantity'][1] / 6);

                    $price = (float)$explodedRegType[2];
                    $registration['price'] = $price * ($quantity-$bonus);
                }else{
                    $price = (float)$explodedRegType[2];
                    $registration['price'] = $price * $quantity;
                }

            }else{
                $price = (float)$explodedRegType[2];
                $registration['price'] = $price * $quantity;
            }

            $registration['quantity'] = $quantity;

            $registration_fee_total +=$registration['price'];
            $registration_ticket_total +=$registration['quantity'];

            ?>
            <tr>
                <td><?php echo $registration['registration_name']; ?></td>
                <td><?php echo $registration['type']; ?></td>
                <td><?php echo $registration['quantity']; ?></td>
                <td>$<?php echo $registration['price']; ?></td>

            </tr>
            <?php if($registration['registration_id']==1 and isset($post_data['Registration']['group']) and !empty($post_data['Registration']['group']) ){ ?>
                <tr>
                    <td colspan="4"><strong>Group Member</strong></td>
                </tr>
                <?php foreach ($post_data['Registration']['group'] as $info) { ?>
                    <tr>
                        <td colspan="2"><table>
                                <tr>
                                    <td>Name: <?php echo $info['name'] ?> &nbsp;</td>
                                    <td>Email: <?php echo $info['email'] ?></td>
                                </tr>
                            </table></td>
                        <td colspan="2"></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            <?php $i++; }  ?>
    </table>
    <br/>
<?php } ?>
<?php
$program_cost_total = $program_ticket_total = $i=0;
if(!empty($post_data['Program']['tickets'][0])){ ?>
    <h4 style="font-family:Calibri, Tahoma, Arial;">Social Program Information</h4>
    <table cellpadding="5" border="0" style="width:100%; font-family:Calibri, Tahoma, Arial;">
        <tr>
            <td width="40%"><b>Program</b></td>
            <td width="20%"><b>Tickets</b></td>
            <td width="20%"><b>Price</b></td>
            <td width="20%"><b>Attending</b></td>
        </tr>
        <?php


        foreach($post_data['Program']['tickets'] as $tkt){

            if($tkt && $tkt!=0){

                $program['program_name'] = $post_data['Program']['program_name'][$i];
                $program['tickets'] = (int)$tkt;
                $program['attending'] = $post_data['Program']['programAttend'][$i];
                ?>
                <tr>
                    <td><?php echo $program['program_name']; ?></td>
                    <td><?php echo $program['tickets']; ?></td>
                    <td>$<?php echo $post_data['Program']['total_cost']; ?></td>
                    <td><?php echo $program['attending']; ?></td>
                </tr>
                <?php
                $program_ticket_total += $program['tickets'];
                $program_cost_total += $post_data['Program']['total_cost'];
            }


            $i++;

        }
        ?>
    </table>
    <br/>
    <br/>
<?php } ?>
<h3 style="font-family:Calibri, Tahoma, Arial;">Price Summary</h3>
<table style="font-family:Calibri, Tahoma, Arial;" width="100%" border="0" cellspacing="2" cellpadding="5">
    <tr>
        <td width="33%" align="left" class="sub_th"><strong><span>REGISTRATION FEES</span></strong></td>
        <td width="33%" align="left" class="even sectionb_qty"><?php echo $registration_ticket_total ?></td>
        <td width="33%" align="left" class="even"><strong>$<?php echo $registration_fee_total ?></strong></td>
        <td width="25%">&nbsp;</td>
    </tr>
    <tr>
        <td width="25%"><strong><span>SOCIAL PROGRAM</span></strong></td>
        <td width="25%" align="left" class="even sectionf_qty"><?php echo $program_ticket_total ?></td>
        <td width="25%" class="even"><strong>$<?php echo $program_cost_total ?></strong></td>
        <td width="25%">&nbsp;</td>
    </tr>
    <tr>
        <td width="25%" class="sub_th"><strong><span>Sales Tax</span></strong></td>
        <td width="25%" align="left"><?php echo $post_data['Payment']['hidden_sales_tax_amount'] ?>%</td>
        <td width="25%" align="left" class="even"><strong>$<?php echo $post_data['Payment']['sales_tax_total'] ?></strong></td>
        <td width="25%">&nbsp;</td>
    </tr>
    <tr>
        <strong>
            <td width="25%">Total Amount Due:</td>
            <td width="25%">&nbsp;</td>
            <td width="25%" align="left">$<?php echo $registration_fee_total + $program_cost_total + $post_data['Payment']['sales_tax_total'] ?></td>
            <td width="25%">&nbsp;</td>
        </strong>
    </tr>

    <tr>
        <strong>
            <td width="25%">Total Amount Paid:</td>
            <td width="25%">&nbsp;</td>
            <td width="25%" align="left">$<?php echo $registration_fee_total + $program_cost_total + $post_data['Payment']['sales_tax_total'] ?></td>
            <td width="25%">&nbsp;</td>
        </strong>
    </tr>

    <tr>
        <strong>
            <td width="25%">Balance:</td>
            <td width="25%">&nbsp;</td>
            <td width="25%" align="left">$0.00</td>
            <td width="25%">&nbsp;</td>
        </strong>
    </tr>

</table>

<hr>
<br/>
<br/>
