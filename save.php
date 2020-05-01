<?php
/**
 * @category        modules
 * @package         onebyone
 * @author          WBCE Project
 * @copyright       florian
 * @license			WTFPL
 */

// Fetch config and Initialize
require('../../config.php');

// suppress to print the header, so no new FTAN will be set
// This is only here till we remove singletab 
$admin_header = false;

// Tells script to update when this page was last updated
$update_when_modified = true;

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Check for Valid FTAN
if (!$admin->checkFTAN()) {
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

// After check print the header Maybe we too no longer need this.. we will see 
$admin->print_header();

// Include the WB functions file
require_once(WB_PATH.'/framework/functions.php');


$bBackLink = isset($_POST['pagetree']);
$sw1='';
$sc1='';
$sw2='';
$sc2='';
$sw3='';
$sc3='';

// Update the mod_wysiwygs table with the contents
if(isset($_POST['content1_wysiwyg'.$section_id])) {
    $content1_wysiwyg = $_POST['content1_wysiwyg'.$section_id];
	$sw1 = '`content1_wysiwyg`=\''.$database->escapeString($content1_wysiwyg).'\', ';
}
if(isset($_POST['content1_code'.$section_id])) {
    $content1_code = $_POST['content1_code'.$section_id];
	$sc1 = '`content1_code`=\''.$database->escapeString($content1_code).'\', ';
}

if(isset($_POST['content2_wysiwyg'.$section_id])) {
    $content2_wysiwyg = $_POST['content2_wysiwyg'.$section_id];
	$sw2 = '`content2_wysiwyg`=\''.$database->escapeString($content2_wysiwyg).'\', ';
}
if(isset($_POST['content2_code'.$section_id])) {
    $content2_code = $_POST['content2_code'.$section_id];
	$sc2 = '`content2_code`=\''.$database->escapeString($content2_code).'\', ';
}

if(isset($_POST['content3_wysiwyg'.$section_id])) {
    $content3_wysiwyg = $_POST['content3_wysiwyg'.$section_id];
	$sw3 = '`content3_wysiwyg`=\''.$database->escapeString($content3_wysiwyg).'\', ';
}
if(isset($_POST['content3_code'.$section_id])) {
    $content3_code = $_POST['content3_code'.$section_id];
	$sc3 = '`content3_code`=\''.$database->escapeString($content3_code).'\', ';
}

if(isset($_POST['obo_modus'.$section_id])) 
    $obo_modus = $_POST['obo_modus'.$section_id];
if(isset($_POST['obo_dimensions'.$section_id])) 
    $obo_dimensions = $_POST['obo_dimensions'.$section_id];




// Generate SQL Query and run it 



// now create the rest of the query
$sql = 'UPDATE `'.TABLE_PREFIX.'mod_onebyone` '
     . 'SET '.$sw1.$sc1.$sw2.$sc2.$sw3.$sc3
     .	   '`obo_modus`=\''.$database->escapeString($obo_modus).'\','
	 .	   '`obo_dimensions`=\''.$database->escapeString($obo_dimensions).'\' '     
     . 'WHERE `section_id`='.(int)$section_id;
$database->query($sql);

$sec_anchor = (defined( 'SEC_ANCHOR' ) && ( SEC_ANCHOR != '' )  ? '#'.SEC_ANCHOR.$section['section_id'] : '' );
if(defined('EDIT_ONE_SECTION') && EDIT_ONE_SECTION){
    $edit_page = ADMIN_URL.'/pages/modify.php?page_id='.$page_id.'&onebyone='.$section_id;
} elseif ( $bBackLink ) {
	$edit_page = ADMIN_URL.'/pages/index.php';
} else {
    $edit_page = ADMIN_URL.'/pages/modify.php?page_id='.$page_id.$sec_anchor;
}

// Check if there is a database error, otherwise say successful
if ($database->is_error()) {
	$admin->print_error($database->get_error(), $js_back);
} else {
	$admin->print_success($MESSAGE['PAGES_SAVED'], $edit_page );
}

// Print admin footer //This displays the footer/End of admin page 
$admin->print_footer();


