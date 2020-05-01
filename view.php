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

// fetch the function fo template loading , this should be in core 
require_once (WB_PATH."/modules/onebyone/includes/get_tpl_file.php");

//Load Language Files
if(file_exists(WB_PATH.'/modules/onebyone/languages/'.LANGUAGE.'.php')) 
	require_once(WB_PATH.'/modules/onebyone/languages/EN.php');
if(file_exists(WB_PATH.'/modules/onebyone/languages/'.LANGUAGE.'.php')) 
	require_once(WB_PATH.'/modules/onebyone/languages/'.LANGUAGE.'.php');


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
	$content= "<h3>Database error, did not found the right number of rows ($rows)</h3>" ;
}



$page_title=$wb->page_title;
$page_description=$wb->page_description;
$page_keywords=$wb->page_keywords;

//if the Template got a special template for this override the default one
include (GetModTplFile('onebyone'));





