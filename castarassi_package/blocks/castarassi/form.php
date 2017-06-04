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

function getSSILibDirectory() {
  return realpath(realpath(dirname(__FILE__)).'/../../lib/').'/'; 
}

function getSSILibraryAndVersion($libDir) {
  $result = '';
  $seperator = '';
  
  foreach (new DirectoryIterator($libDir) as $dirInfo) {
    if ($dirInfo->isDot()) continue;
    $result .= $seperator . $dirInfo->getFilename();
	$seperator = ', ';
  } 
  
  return $result;
}

function getSSILibrariesAndVersions() {
  $result = array();
  
  $baselibdir = getSSILibDirectory();
  
  foreach (new DirectoryIterator($baselibdir) as $dirInfo) {
    if ($dirInfo->isDot()) continue;
    $result[] = $dirInfo->getFilename().' version(s): '.getSSILibraryAndVersion($baselibdir.$dirInfo->getFilename());
  }
  
  natsort($result);  
  return $result;  
}

?>
<div id="blockBoilerplateForm">
    <h3>CastaraSSI</h3>
	<p>Library Directory: <?php echo getSSILibDirectory(); ?></p>
    Versions of Server Side Libraries included:
	<ul>
	<?php 
      foreach (getSSILibrariesAndVersions() as $lib) {
		echo '<li>'.$lib.'</li>';  
	  }
    ?>
	</ul>
</div>