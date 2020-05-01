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
if(file_exists(WB_PATH.'/modules/onebyone/languages/'.LANGUAGE.'.php')) 
	require_once(WB_PATH.'/modules/onebyone/languages/EN.php');
if(file_exists(WB_PATH.'/modules/onebyone/languages/'.LANGUAGE.'.php')) 
	require_once(WB_PATH.'/modules/onebyone/languages/'.LANGUAGE.'.php');
	
// Fetch media URL for replacing {SYSVAR:MEDIA_REL}
$sMediaUrl = WB_URL.MEDIA_DIRECTORY;

// Get page content   
$content1_code='';
$content1_wysiwyg='';
$content2_code='';
$content2_wysiwyg='';
$content3_code='';
$content3_wysiwyg='';
$obo_modus='';
$obo_dimensions='';


$sql = 'SELECT * FROM `'.TABLE_PREFIX.'mod_onebyone` WHERE `section_id`='.(int)$section_id;
$get_content = $database->query($sql);
$rows = $get_content->numRows();
if ($rows==1) {
	$Data = $get_content->fetchRow();
	
	// get values for Variables

	$content1_code=$Data['content1_code'];
	$content1_wysiwyg=$Data['content1_wysiwyg'];
	$content2_code=$Data['content2_code'];
	$content2_wysiwyg=$Data['content2_wysiwyg'];
	$content3_code=$Data['content3_code'];
	$content3_wysiwyg=$Data['content3_wysiwyg'];
	$obo_modus=$Data['obo_modus'];
	$obo_dimensions=$Data['obo_dimensions'];


} else {
	echo "<h3>Database error, did not found the right number of rows ($rows)</h3>" ;
}


if(!isset($wysiwyg_editor_loaded)) {
	$wysiwyg_editor_loaded=true;

	// No WYSIWYG Editor defined create a show_wysiwyg_editor() funktion, that only creates a textarea.
	if (!defined('WYSIWYG_EDITOR') OR WYSIWYG_EDITOR=="none" OR !file_exists(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php')) {
		function show_wysiwyg_editor($name,$id,$content,$width,$height) {
			echo '<textarea name="'.$name.'" id="'.$id.'" style="width: '.$width.'; height: '.$height.';">'.$content.'</textarea>';
		}
	} else {
			require_once(WB_PATH.'/modules/'.WYSIWYG_EDITOR.'/include.php');		
	}
}



include (WB_PATH."/modules/onebyone/templates/modify.tpl.php");


