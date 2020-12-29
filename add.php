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



$aInsert = array(
	'page_id'          => $page_id,
	'section_id'       => $section_id,
	'content1_code'    => '',
	'content1_wysiwyg' => '',
	'content2_code'    => '',
	'content2_wysiwyg' => '',
	'content3_code'    => '',
	'content3_wysiwyg' => '',
	'obo_modus'        => '',
	'obo_dimensions'   => '',	
);


require_once __DIR__ .'/module_settings.php';
if($use_latest_settings){
	// if $use_latest_settings = TRUE add modus and dimensions from latest obo section
	$sSql = "SELECT `section_id`, `obo_modus`, `obo_dimensions` FROM `{TP}mod_onebyone` ORDER BY `section_id` DESC LIMIT 1";
	$aLatestCfg = $database->get_array($sSql)[0];
	if(!empty($aLatestCfg)){
		$aInsert['obo_modus']      = $aLatestCfg['obo_modus'];
		$aInsert['obo_dimensions'] = $aLatestCfg['obo_dimensions'];
	}
}

$database->insertRow('{TP}mod_onebyone',$aInsert);