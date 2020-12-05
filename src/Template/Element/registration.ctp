<?php

$date_early_bird = 'on or before 26 August';
$date_standard = 'from 27 August';
?>
<h2 id="regFee">B. REGISTRATION FEES *</h2>
<p><strong style="color:red;font-size: 16px;">
        Organizations registering five or more full price attendees will receive the sixth registration free of charge. Please note that each registrant MUST be from the same organization to be eligible
    </strong></p>
<p>
    Visit the website to view delegate entitlements.<br />
    <em>NOTE: All fees are in USD.
    </em>
</p>
<table width="100%" border="0" cellspacing="2" cellpadding="0" bgcolor="#FFFFFF" class="calculate_registration_fee">
    <tr>
        <th width="30%" align="left" scope="col"><span>REGISTRATION CATEGORY</span></th>
        <th colspan="4" style="text-align: center" scope="col"><span>PRICE CATEGORY</span></th>
    </tr>
    <tr class="sub_th">
        <td>&nbsp;</td>
        <td width="24%" align="center"><span>EARLY BIRD<br />
            <em>(<?php echo $date_early_bird; //Configure::read('date_early_bird')?>)</em></span></td>
        <td width="24%" align="center"><span>STANDARD<br />
            <em>(<?php echo $date_standard; //Configure::read('date_standard')?>)</em></span></td>
        <td width="22%" align="center"><span>QUANTITY</span></td>
        <td width="22%" align="center"><span>TOTAL</span></td>
    </tr>
    <?php
    if(!empty($registrations)){
        $i=0;$c=1;
        foreach($registrations as $reg){


            $regCat = explode(" ",html_entity_decode($reg->category));
            $regCatEx = strtolower($regCat[0]);
            if($reg->id==4){
                $regCatEx = 'day';
                $regType='group';
            }else{
                $regCatEx='standard';
                $regType='single';
            }


            $fields_two_day_registration_group = ($reg->id == 1)?'fields_group_registration':'';

            ?>

            <?php

            // IF user is admin then show the complementary option
            if($reg->is_restricted == 1 && $role_id == 1){ ?>

                <tr id="register_tr" class="">

                    <td>
                        5.&nbsp;Complimentary Registration
                    </td>

                    <input type="hidden" name="data[admin_complementary]" value="1">


                    <td class="register_early_bird" align="left">
                        <label>
                            <input alt="0" type="checkbox" name="data[Registration][typePrice][5]" class="early_bird_price_5 admin_complementary summitF standard5" value="5_earlybird_0_single"> $0
                        </label>
                    </td>

                    <td class="register_standard" align="left">
                        <label>
                            <input alt="0" disabled="disabled" type="checkbox" name="data[Registration][typePrice][5]" class="standard_price_5 admin_complementary summitF standard5" value="5_standard_0_single"> $0
                        </label>
                    </td>

                    <!--  Qty -->
                    <td class="register_amount">
                        <input type="text" value="" required="" class="field_register_quantity_5 is_required registration_qty" name="data[Registration][quantity][5]" alt="Quantity" title="Quantity" aria-required="true">
                    </td>

                    <!--  Total -->
                    <td align="left" class="registration_fee_item_total standard" alt="">
                        $
                    </td>

                </tr>

            <?php  } else {  if($reg->is_restricted != 1){ ?>

                <tr id="register_tr"   class="<?php echo $fields_two_day_registration_group; ?>" >

                    <td>
                        <?php
                        echo $c.'.&nbsp;';
                        echo html_entity_decode($reg->category);
                        $short_note = html_entity_decode($reg->short_note);
                        if(!empty($short_note)){
                            echo "<br /><strong><i>$short_note</i></strong>";
                        }


                        // create day indicate and pre post workshop  controlling class
                        $control_two_day_registration_group = ($reg->id == 1)?'onkeyup="showGroupRegistration(this.value)"':'';
                        $first_option = ($reg->id == 1)?' first_option':'';
                        $control_day_indecate = ($reg->id == 3)?'control_day_indecate':'';
                        $control_day_indecate_reg4 = ($reg->id == 4)?'control_day_indecate_reg4':'';
                        $control_pre_post_workshop = ($reg->id == 3)?'control_pre_post_workshop':'';

                        $control_auto_select_early_bird = ($reg->id == 15)?'control_auto_select_early_bird':'';
                        $control_auto_select_standard = ($reg->id == 15)?'control_auto_select_standard':'';
                        ?>
                    </td>

                    <td class="register_early_bird"  align="left">
                        <label><input  alt="<?php echo $reg->early_bird; ?>" <?php echo $status["disable_early_bird"] ?> type="checkbox"  name="data[Registration][typePrice][<?php echo $reg->id; ?>]" class="early_bird_price_<?php echo $c ?> <?php echo $control_day_indecate.' '.$control_day_indecate_reg4.' '.$control_pre_post_workshop.' '.$control_auto_select_early_bird  ?> summitF <?php echo $regCatEx.($i+1);  if($reg->id == '3'){echo " lea-gold-pass";}?>" value="<?php echo $reg->id; ?>_earlybird_<?php echo $reg->early_bird; ?>_<?php echo $regType;?>" /> $<?php echo $reg->early_bird;
                            ?>
                        </label>
                    </td>

                    <td class="register_standard" align="left">
                        <label>
                            <input  alt="<?php echo $reg->standard; ?>" <?php echo $status["disable_standard"] ?>  type="checkbox" name="data[Registration][typePrice][<?php echo $reg->id; ?>]" class="standard_price_<?php echo $c ?> <?php echo $control_day_indecate.' '.$control_day_indecate_reg4.'  '.$control_pre_post_workshop.' '.$control_auto_select_standard ?> summitF <?php echo $regCatEx.($i+1);  if($reg->id == '3'){echo " lea-gold-pass";}?>" value="<?php echo $reg->id; ?>_standard_<?php echo $reg->standard; ?>_<?php echo $regType;?>" /> $<?php echo $reg->standard;
                            ?>
                        </label>
                    </td>

                    <!--  Qty -->
                    <td class="register_amount">
                        <input type="text" value="" required class="field_register_quantity_<?php echo $c ?> is_required registration_qty<?php echo $first_option ?>" <?php echo $control_two_day_registration_group ?> name="data[Registration][quantity][<?php echo $reg->id; ?>]" alt="Quantity" title="Quantity">

                        <script type="text/javascript">
                            $('.early_bird_price_<?php echo $c ?>').click(function () {
                                if($('.early_bird_price_<?php echo $c ?>').is(":checked")){
                                    $('.field_register_quantity_<?php echo $c ?>').prop('required',true);
                                }else{
                                    $('.group_container').remove();
                                    $('.field_register_quantity_<?php echo $c ?>').prop('required',false);
                                    $('.field_register_quantity_<?php echo $c ?>').val('');

                                    $this_closest.find('.registration_fee_item_total').text('$');

                                    showSumQty();

                                    showSumTotal();

                                    showPayment();

                                }
                            });

                            $('.standard_price_<?php echo $c ?>').click(function () {
                                if($('.standard_price_<?php echo $c ?>').is(":checked")){
                                    $('.field_register_quantity_<?php echo $c ?>').prop('required',true);
                                }else{
                                    $('.group_container').remove();
                                    $('.field_register_quantity_<?php echo $c ?>').prop('required',false);

                                    $this_closest.find('.registration_fee_item_total').text('$');

                                    showSumQty();

                                    showSumTotal();

                                    showPayment();

                                }
                            });

                        </script>

                    </td>

                    <!--  Total -->
                    <td align="left" class="registration_fee_item_total <?php echo $regCatEx; ?>" alt="">
                        $
                    </td>

                </tr>

            <?php } } ?>

            <!-- expand section for indicate day -->
            <?php if($reg->id==3){ ?>
                <tr class="even indicate_day" style="display: none">
                    <td colspan="5">
                        <div style="text-align: center;width: 600px;margin-left: 170px;">
                            <input type="radio" class="spacific_day" id="default_spacific_day" value="Stanford Health Care" name="data[Registration][dayIndicate]"/> Stanford Health Care
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" class="spacific_day" value="Stanford Children's Health" name="data[Registration][dayIndicate]"/> Stanford Children's Health
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <?php if($reg->id==4){ ?>
                <tr class="even indicate_day_reg4" style="display: none">
                    <td colspan="5">
                        <div style="text-align: center;width: 600px;margin-left: 170px;">
                            <input type="radio" class="spacific_day_reg4" value="VA Palo Alto" name="data[Registration][dayIndicateReg4]"/> VA Palo Alto
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <!-- expand section for pre and post workshop -->
            <?php if($reg->id==3){ ?>
                <tr class="even inner_pre_post_section" style="display: none;">
                    <td colspan="4">
                        <div>
                            <br />
                            <h1>Please select your site visit & half day workshop or full day workshop and post summit options (C or D and E)</h1>
                            <?php //echo $this->element('pre_summit',array('workshoppres'=>$workshoppres,'status'=>$status)) ?>


                            <?php //echo $this->element('pre_summit_full_day',array('workshoppres'=>$workshoppres_full_day,'status'=>$status)) ?>

                            <br />

                            <?php //echo $this->element('post_summit',array('workshops'=>$workshops,'status'=>$status)) ?>
                            <br />
                        </div>

                    </td>
                </tr>

            <?php } ?>



            <?php
            $i++; $c++;
        }
    }
    ?>
    <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="right"><strong>B. SUB-TOTAL REGISTRATION FEES:</strong></td>
        <td align="left"><strong class="sub_total_registration_fees reset_total" id="registration_total_qty"></strong></td>
        <td  align="left"><strong id="registration_total_amount">$</strong></td>
    </tr>
</table>

<script>
$( document ).ready(function() {
    $(".admin_complementary").change(function() {
        if(this.checked) {
            $('#card_section').hide();
        } else {
            $('#card_section').show();
        }
    });
});
</script>