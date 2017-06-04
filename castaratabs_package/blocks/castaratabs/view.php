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

 if ($isEditMode || $canEditPage) {
?>
<h3>CastaraTabs - Not enabled current mode</h3>
<?php 
 } else {
?>
<style type="text/css">
.tabs {
	 border: none !important;
}	 

.tabs-right-vertical li a
{
    outline: none;
}

.tabs-left li a
{
    outline: none;
}

.tabs-left .ui-tabs-nav { 
    position: relative !important;
	right: 0em !important;
    height: 35px !important;
	width: 100% !important;
    text-align: left !important;
	transform: none !important;
} 
.tabs-left .ui-tabs-nav li { 
    display: inline-block !important; 
    float: none !important; 
    top: 0px !important; 
    margin: 0em !important; 
    padding-bottom: 0px !important; 
}

.tabs-left .ui-tabs-panel {
	padding-right: 0em !important;
	height: 100% !important;
	padding-left: 0em !important;
	padding-top: 0em !important;
	padding-bottom: 0em !important;
}

.tabs-left .ui-tabs-nav li {
    margin-top: 0.5em !important; 
    font-size: 65% !important; 	
}

.tabs-left .ui-tabs-nav li.ui-tabs-selected, 
.tabs-left .ui-tabs-nav li.ui-state-active { 
    margin-top: 0em !important; 
    font-size: 80% !important; 
    margin-bottom: 0em !important;
}

.tabs-right-vertical .ui-tabs-nav {
	position: absolute;
	right: 0.2em;
	width: <?php echo $tabheight; ?>;
	transform: rotate(90deg) translate(100%,0em);
	transform-origin: 100% 0%;
}

.tabs-right-vertical .ui-tabs-nav li {
    margin-top: 0.6em; 
    font-size: 70%; 	
}

.tabs-right-vertical .ui-tabs-nav li.ui-tabs-selected, 
.tabs-right-vertical .ui-tabs-nav li.ui-state-active { 
    margin-top: 0.19em; 
    font-size: 80%; 
}
	
.tabs-right-vertical .ui-tabs-panel {
	padding-right: 3em;
	padding-left: 0em;
	padding-top: 0em;
	padding-bottom: 0em;
    height: 100%;	
}
.tabs-right-vertical .ui-tabs-panel {
	height: <?php echo $tabheight; ?>; overflow: hidden
}
.subtabs  {
	height: <?php echo $tabheight; ?>; overflow: hidden
}

.subtabs .ui-tabs-panel {
	height: calc(<?php echo $tabheight; ?> - 40px) !important; overflow-y: auto
}

</style>
<div id="maincontent" style="height: <?php echo $tabgroupheight; ?>; overflow: hidden">
<div id="tabs-right-vertical"  class="tabs tabs-right-vertical">
  <ul>
  <?php foreach ($grouptabs as $grouptab) { ?>
    <li><a href="#gtabs_<?php echo str_replace(' ', '_', strtolower($grouptab)); ?>"><?php echo $grouptab; ?></a></li>
  <?php } ?>
  </ul>
  <?php foreach ($grouptabs as $grouptab) { ?>
  <div id="gtabs_<?php echo str_replace(' ', '_', strtolower($grouptab)); ?>">
    <div id="subtabs_<?php echo str_replace(' ', '_', strtolower($grouptab)); ?>" class="tabs tabs-left subtabs">
      <ul>
  <?php foreach ($groupsubtabs[$grouptab] as $groupsubtab) { ?>
        <li><a href="#subtabs_<?php echo str_replace(' ', '_', strtolower($grouptab)).'_'.str_replace(' ', '', strtolower($groupsubtab[1])); ?>"><?php echo $groupsubtab[1] ?></a></li>
  <?php } ?>
      </ul>
  <?php foreach ($groupsubtabs[$grouptab] as $groupsubtab) { ?>
      <div id="subtabs_<?php echo str_replace(' ', '_', strtolower($grouptab)).'_'.str_replace(' ', '', strtolower($groupsubtab[1])); ?>">
	    <?php if ($groupsubtab[3] != '') { 
		   if (file_exists(trim($groupsubtab[3]))) {
		     include( trim( $groupsubtab[3] ) );
		   } else {
			 echo 'Error: Cannot find: '.$groupsubtab[3];   
		   }
		 } ?>
	  </div>
  <?php } ?>
	  
    </div>
  </div>
  <?php } ?>
</div>
 <?php } ?>