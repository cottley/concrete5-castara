<?php
defined('C5_EXECUTE') or die('Access Denied.');

/*
 * This file is part of CastaraTabs.
 *
 * (c) Christopher Ottley <cottley@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

?>
<div id="blockBoilerplateForm">
    <span>Please fill out all fields</span>

    <div class="form-group">
        <?php echo $form->label('jqueryuiversion', t('jQuery UI Version (example 1.12.1)'))?>
        <?php echo $form->text('jqueryuiversion', $jqueryuiversion); ?>
    </div>

    <div class="form-group">
        <?php echo $form->label('jqueryuitheme', t('jQuery UI default theme (example redmond)'))?>
        <?php echo $form->text('jqueryuitheme', $jqueryuitheme); ?>
    </div>	

    <div class="form-group">
        <?php echo $form->label('jscookieversion', t('JS Cookie Version (example 2.1.3)'))?>
        <?php echo $form->text('jscookieversion', $jscookieversion); ?>
    </div>
	
    <div class="form-group">
        <?php echo $form->label('tabheight', t('Tab Height CSS value (example calc(100vh - 60px))'))?>
        <?php echo $form->text('tabheight', $tabheight); ?>
    </div>		
    <div class="form-group">
        <?php echo $form->label('tabconfig', t('Tab Config'))?>
        <?php echo $form->textarea('tabconfig', $tabconfig, array('rows' => 5)); ?>
    </div>		
	
	
</div>