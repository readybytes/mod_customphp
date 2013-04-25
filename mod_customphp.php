<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_custom
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$file = $params->get('includefile');
?>

<div class="<?php echo $file ?>">
	<?php
		 
		if (include __DIR__."/files/$file.php") {
			//do nothing
		}else{
			echo "file name  [$file] not exist";
		}
	?>
</div>


