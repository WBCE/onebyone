<?php
/**
 * @category        modules
 * @package         onebyone
 * @author          WBCE Project
 * @copyright       florian
 * @license			WTFPL
 */
//no direct file access
if(count(get_included_files()) ==1){$z="HTTP/1.0 404 Not Found";header($z);die($z);}


// Create DB table
//$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_onebyone`");
$mod_onebyone = 'CREATE TABLE IF NOT EXISTS `'.TABLE_PREFIX.'mod_onebyone` ( '
	. ' `section_id` INT NOT NULL DEFAULT \'0\','
	. ' `page_id` INT NOT NULL DEFAULT \'0\','
	. ' `content1_code` LONGTEXT NOT NULL ,'
	. ' `content1_wysiwyg` LONGTEXT NOT NULL ,'
	. ' `content2_code` LONGTEXT NOT NULL ,'
	. ' `content2_wysiwyg` LONGTEXT NOT NULL ,'
	. ' `content3_code` LONGTEXT NOT NULL ,'
	. ' `content3_wysiwyg` LONGTEXT NOT NULL ,'	
	. ' `obo_modus` TEXT NOT NULL ,'
	. ' `obo_dimensions` TEXT NOT NULL ,'
	. ' PRIMARY KEY ( `section_id` ) '
	. ' ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';
$database->query($mod_onebyone);

require_once(WB_PATH.'/framework/functions.php');

$path = WB_PATH.'/modules/onebyone/';
if(file_exists($path.'module_settings.default.php')) {
	if(!rename($path.'module_settings.default.php',$path.'module_settings.php')) {
		echo "<h2>Error renaming module_settings.php. Please rename module_settings.default.php manually to module_settings.php</h2>";
	}
}


