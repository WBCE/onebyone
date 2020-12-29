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


//Load Language Files
$lang = __DIR__ . '/languages/' . LANGUAGE . '.php';
require (!file_exists($lang) ? __DIR__ . '/languages/EN.php' : $lang);
	
require_once __DIR__ .'/module_settings.php';
	
// Fetch media URL for replacing {SYSVAR:MEDIA_REL}
$sMediaUrl = WB_URL.MEDIA_DIRECTORY;
$actionURL = get_url_from_path(__DIR__).'/save.php';

$sSql = 'SELECT * FROM `{TP}mod_onebyone` WHERE `section_id`='.(int)$section_id;
$aData = $database->get_array($sSql)[0];
if (!empty($aData)) {
	
	extract($aData);	
	
	/**
		// THE FOLLOWING LINES ARE NOT NEEDED BECAUSE WE "extract"ED THESE ABOVE
		// get values for Variables

		$content1_code    = $aData['content1_code'];
		$content1_wysiwyg = $aData['content1_wysiwyg'];
		. . . .
	*/
	
	
	if(!isset($wysiwyg_editor_loaded)) {
		$wysiwyg_editor_loaded = true;
		
		// No WYSIWYG Editor defined create a show_wysiwyg_editor() funktion, that only creates a textarea.
		if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php')) {
			function show_wysiwyg_editor($name, $id, $content, $width, $height) {
				echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
			}
		} else {
				require_once(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');		
		}
	}

	include (__DIR__."/templates/modify.tpl.php");

} else {
	echo "<h3>Database error, did`t find the section data</h3>" ;
}