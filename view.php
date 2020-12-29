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
require_once __DIR__."/includes/get_tpl_file.php";

//Load Language Files
$lang = __DIR__ . '/languages/' . LANGUAGE . '.php';
require (!file_exists($lang) ? __DIR__ . '/languages/EN.php' : $lang);




$sSql = 'SELECT * FROM `{TP}mod_onebyone` WHERE `section_id`='.(int)$section_id;
$aData = $database->get_array($sSql)[0];
if (!empty($aData)) {
	
	extract($aData);
	
	$page_title       = $wb->page_title;
	$page_description = $wb->page_description;
	$page_keywords    = $wb->page_keywords;

	//if the Template got a special template for this override the default one
	include (GetModTplFile('onebyone'));
} else {
	$content= "<h3>Database error, did not found the right number of rows ($rows)</h3>" ;
}