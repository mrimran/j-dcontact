<?php

/*------------------------------------------------------------------------
# J DContact
# ------------------------------------------------------------------------
# author                Md. Shaon Bahadur
# copyright             Copyright (C) 2014 j-download.com. All Rights Reserved.
# @license -            http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

    $showdepartment  	     =        $params->get( 'showdepartment', '1' );
    $showsendcopy            =        $params->get( 'showsendcopy', '1' );
    $humantestpram           =        $params->get( 'humantestpram', '1' );
    $sales_address           =        $params->get( 'sales_address', 'sales@yourdomain.com' );
    $support_address         =        $params->get( 'support_address', 'support@yourdomain.com' );
    $billing_address         =        $params->get( 'billing_address', 'billing@yourdomain.com' );
    $backgroundcolor         =        $params->get( 'backgroundcolor', '#FFEFD5' );
    $wrp_width               =        $params->get( 'wrp_width', '320px' );
    $inputfield_width        =        $params->get( 'inputfield_width', '300px' );
    $inputfield_border       =        $params->get( 'inputfield_border', '#CCCCCC' );
    $result                  =        '';
    $name                    =        '';
    $email                   =        '';
    $phno                    =        '';
    $subject                 =        '';
    $msg                     =        '';
    $selfcopy                =        '';
    $sucs                    =        '';
    $varone                  =        rand(5, 15);
    $vartwo                  =        rand(5, 15);
    $sum_rand                =        $varone+$vartwo;

?>
    <link rel="stylesheet" href="<?php echo JURI::root(); ?>modules/mod_jdcontact/tmpl/lib/contact.css" media="screen" />
    <script src="<?php echo JURI::root(); ?>modules/mod_jdcontact/tmpl/lib/jquery-1.4.4.js"></script>
    <script src="<?php echo JURI::root(); ?>modules/mod_jdcontact/tmpl/lib/jquery-1.4.4.js"></script>    
    <div id="contactform" style="background: <?php echo $backgroundcolor; ?>;width: <?php echo $wrp_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;">
        <form name="contactform" id="form" method="post" action="<?php $_SERVER['PHP_SELF']?>">
            <?php if($showdepartment=='1') : ?>
              <label><?php echo JText::_('MOD_JDCONTACT_DEPARTMENT'); ?></label><br />
              <select style="width: <?php echo $inputfield_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;" name="dept" class="text">
              	<option value="sales"><?php echo JText::_('MOD_JDCONTACT_SALES'); ?></option>
              	<option value="support"><?php echo JText::_('MOD_JDCONTACT_SUPPORT'); ?></option>
              	<option value="billing"><?php echo JText::_('MOD_JDCONTACT_BILLING'); ?></option>
              </select><br />
            <?php endif; ?>
            <label class="name"><?php echo JText::_('MOD_JDCONTACT_NAME'); ?><br /><input style="width: <?php echo $inputfield_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;" class="text" name="name" type="text" value="<?php echo $name; ?>" /><br /></label>
            <label class="email"><?php echo JText::_('MOD_JDCONTACT_EMAIL'); ?><br /><input style="width: <?php echo $inputfield_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;" class="text" name="email" type="text" value="<?php echo $email; ?>" /><br /></label>
            <label class="phno"><?php echo JText::_('MOD_JDCONTACT_TELEPHONE'); ?><br /><input style="width: <?php echo $inputfield_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;" class="text" name="phno" type="text" value="<?php echo $phno; ?>" /><br /></label>
            <label class="subject"><?php echo JText::_('MOD_JDCONTACT_SUBJECT'); ?><br /><input style="width: <?php echo $inputfield_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;" class="text" name="subject" type="text" value="<?php echo $subject; ?>" /><br /></label>
            <label class="msg"><?php echo JText::_('MOD_JDCONTACT_MESSAGE'); ?><br /><textarea style="width: <?php echo $inputfield_width; ?>;border:1px solid <?php echo $inputfield_border; ?>;" class="text" name="msg"><?php echo $msg; ?></textarea><br /></label>
            <?php if($showsendcopy=='1') : ?>
                <input type="checkbox" name="selfcopy" <?php if($selfcopy == "yes") echo "checked='checked'"; ?> value="yes" />
                <label><?php echo JText::_('MOD_JDCONTACT_SELFCOPY'); ?></label><br /><br />
            <?php endif; ?>
            <?php if($humantestpram=='1') : ?>
            <div style="border-bottom: 1px solid <?php echo $inputfield_border; ?>;border-top: 1px solid <?php echo $inputfield_border; ?>;padding-bottom: 2px;padding-top: 10px;">
                <label for='message'><?php echo JText::_('MOD_JDCONTACT_HUMANTEST'); ?></label>
                <?php echo '<b>'.$varone.'+'.$vartwo.'=</b>'; ?>
                <input id="human_test" name="human_test" size="3" type="text" class="text" style="border:1px solid <?php echo $inputfield_border; ?>;"><br>
                <input type="hidden" id="sum_test" name="sum_test" value="<?php echo $sum_rand; ?>" />
            </div>
            <?php endif; ?>
            <br />
            <input type="hidden" name="browser_check" value="false" />
            <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                <tr>
                    <td width="20%" valign="top">
                        <input type="submit" name="submit" value="<?php echo JText::_('MOD_JDCONTACT_SUBMIT'); ?>" id="submit" />
                    </td>
                    <td width="80%" valign="top" align="center">
                        <div id="result"><?php if($result) echo "<div class='message'>".$result."</div>"; ?></div>
                    </td>
                </tr>
            </table>
        </form>

        <script type="text/javascript">
        <?php
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        ?>
	    document.contactform.browser_check.value = "true";
	    $("#submit").click(function(){
		$('#result').html('<img src="<?php echo JURI::root(); ?>modules/mod_jdcontact/tmpl/images/loader.gif" class="loading-img" alt="loader image">').fadeIn();
		var input_data = $('#form').serialize();
				$.ajax({
				   type: "POST",
				   url:  "<?php echo "//" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
				   data: input_data,
				   success: function(msg){
					   $('.loading-img').remove(); //Removing the loader image because the validation is finished
					   $('<div class="message">').html(msg).appendTo('div#result').hide().fadeIn('slow'); //Appending the output of the php validation in the html div

                        if(msg=='<?php echo JText::_("MOD_JDCONTACT_SUCCESSMSG"); ?>'){
                          $('#form').each (function(){
                            this.reset();
                          });
                       }
				   }
				});
			return false;
	    });
	    </script>
    </div>