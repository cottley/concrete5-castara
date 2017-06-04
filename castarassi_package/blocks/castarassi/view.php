<?php
defined('C5_EXECUTE') or die('Access Denied.');

/*
 * This file is part of CastaraSSI.
 *
 * (c) Christopher Ottley <cottley@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 if (Page::getCurrentPage()->isEditMode()) {
  $this->inc('form.php');
 }
?> 