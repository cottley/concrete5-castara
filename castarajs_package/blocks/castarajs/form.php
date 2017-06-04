<?php
defined('C5_EXECUTE') or die('Access Denied.');

/*
 * This file is part of CastaraJS.
 *
 * (c) Christopher Ottley <cottley@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
function getLibDirectory() {
  return realpath(dirname(__FILE__)).'/lib/'; 
}

function getLibraryAndVersion($libDir) {
  $result = '';
  $seperator = '';
  
  foreach (new DirectoryIterator($libDir) as $dirInfo) {
    if ($dirInfo->isDot()) continue;
    $result .= $seperator . $dirInfo->getFilename();
	$seperator = ', ';
  } 
  
  return $result;
}

function getLibrariesAndVersions() {
  $result = array();
  
  $baselibdir = getLibDirectory();
  
  foreach (new DirectoryIterator($baselibdir) as $dirInfo) {
    if ($dirInfo->isDot()) continue;
    $result[] = $dirInfo->getFilename().' version(s): '.getLibraryAndVersion($baselibdir.$dirInfo->getFilename());
  }
  
  natsort($result);  
  return $result;  
}

?>
<div id="blockBoilerplateForm">
    <h3>CastaraJS</h3>
	<p>Library Directory: <?php echo getLibDirectory(); ?></p>
    Versions of Javascript Libraries included:
	<ul>
	<?php 
      foreach (getLibrariesAndVersions() as $lib) {
		echo '<li>'.$lib.'</li>';  
	  }
    ?>
	</ul>
</div>