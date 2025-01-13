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

// Include WBCE admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Check for Valid FTAN
if (!$admin->checkFTAN()) {
	$admin->print_header();
	$admin->print_error($MESSAGE['GENERIC_SECURITY_ACCESS'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
}

$admin->print_header();

// Include the WBCE functions file
require_once(WB_PATH.'/framework/functions.php');


$bBackLink = isset($_POST['pagetree']);


$fields = array(
	'page_id','section_id','content1_code','content1_wysiwyg','content2_code','content2_wysiwyg','content3_code','content3_wysiwyg','obo_modus','obo_dimensions','obo_global_headline','obo_global_headline_size','obo_before','obo_after','obo_content1_headline','obo_content1_headline_size','obo_content1_link','obo_content1_image','obo_content1_image_alt','obo_content2_headline','obo_content2_headline_size','obo_content2_link','obo_content2_image','obo_content2_image_alt','obo_content3_headline','obo_content3_headline_size','obo_content3_link','obo_content3_image','obo_content3_image_alt','obo_image1_fullname','obo_image2_fullname','obo_image3_fullname'
);

$posts = array(
	'page_id','section_id','content1_code','content1_wysiwyg','content2_code','content2_wysiwyg','content3_code','content3_wysiwyg','obo_modus','obo_dimensions','obo_global_headline','obo_global_headline_size','obo_before','obo_after','obo_content1_headline','obo_content1_headline_size','obo_content1_link','obo_content1_image','obo_content1_img_alt','obo_content2_headline','obo_content2_headline_size','obo_content2_link','obo_content2_image','obo_content2_img_alt','obo_content3_headline','obo_content3_headline_size','obo_content3_link','obo_content3_image','obo_content3_img_alt','obo_image1_fullname','obo_image2_fullname','obo_image3_fullname'
);
// image_alt => img_alt, weil sonst der geniale SQL-Trick in Zeile 66 greift und der Alt-Tag nicht gespeichert wird :-P


// Variablen initialisieren --------------------------------------------------------------------------------------------------------------------------------

$q = '';
$sMediaUrl  = WB_URL.MEDIA_DIRECTORY;
$sidString = strval($section_id);
$folder = WB_PATH.MEDIA_DIRECTORY.'/mod_onebyone';
if (!is_dir($folder)) make_dir($folder);
$allowed =' .png.gif.jpg.jpeg.svg.webp';

//debug_dump($_POST);

// Hier wird der erste Teil des Querys zusammengesetzt  -----------------------------------------------------------------------------------------------------

for ($i=0; $i<sizeof($posts);$i++) {
	//Die Tabellenzellen Section_ID und Page_ID haben keine SID angehängt, alle anderen ja
	if ($i < 2) {
		$postSid = $posts[$i];
	} else {
		$postSid = $posts[$i].$sidString;
	}	
	// Übergabe scapen
	if (isset($_POST[$postSid])) {
		$escapedString = $database->escapeString($_POST[$postSid]);
	} else {
		$escapedString ='';
	}
	
	//Einige Felder nachbehandeln (Werte für Vergleich in Zeile 78)
	$extraClean = array('obo_global_headline'.$sidString,'obo_global_headline_size',
						'obo_content1_headline'.$sidString,'obo_content1_headline_size'.$sidString,'obo_content1_link'.$sidString,'obo_content1_img_alt',
						'obo_content2_headline'.$sidString,'obo_content2_headline_size'.$sidString,'obo_content2_link'.$sidString,'obo_content3_img_alt',
						'obo_content3_headline'.$sidString,'obo_content3_headline_size'.$sidString,'obo_content3_link'.$sidString,'obo_content3_img_alt');		
	
	if (isset($_POST[$postSid]) && stristr($postSid,'image') == FALSE) {						
		if (in_array($postSid,$extraClean)) {			
			$q .= '`'.$fields[$i].'`=\''.htmlspecialchars($escapedString).'\', ';			
		} else {
			$q .= '`'.$fields[$i].'`=\''.$escapedString.'\', ';
		}		
	}
}	


// absolute URL durch SYSVAR ersetzen
$searchfor = '@(<[^>]*=\s*")('.preg_quote($sMediaUrl).')([^">]*".*>)@siU';
$q = preg_replace($searchfor, '$1{SYSVAR:MEDIA_REL}$3', $q);


// C&P aus dem Modul einbild, könnte man sicherlich auch noch irgendwie zusammenfassen, habe ich jett aber keinen Bock mehr gehabt

/* Image 1 --------------------------------------------------------------------------------------------------------------------- */

if ($_FILES['obo_content1_image'.$section_id]['name']!='') {	
	$fname = strtolower($_FILES['obo_content1_image'.$section_id]['name']); 
	$path_parts = pathinfo($fname);
	$ffname = $path_parts['filename'];
	$fileext = '.'.$path_parts['extension'];	
	if (strpos($allowed,$fileext) == false) {
		$admin->print_error($ffname.': '.$MESSAGE['GENERIC_CANNOT_UPLOAD'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
		die();
	}

	$ncount = 1;
	while ($ncount < 100) {
		if ($ncount == 1) {
			$fullname = 's'.$section_id.'_'.$ffname.$fileext;
		} else {
			$fullname = 's'.$section_id.'_'.$ffname.'-'.$ncount.$fileext;
		}
		$fullpfad = $folder.'/'.$fullname;
		if (!file_exists($fullpfad)) {break;}
		$ncount++;
	}

	//move only (wozu auch immer, keine Ahnung)
	if (! move_uploaded_file($_FILES['obo_content1_image'.$section_id]['tmp_name'], $fullpfad))  {		
		  $admin->print_error($_FILES['obo_content1_image'.$section_id]['tmp_name'].': '.$MESSAGE['GENERIC_CANNOT_UPLOAD'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$obo_content1_image = '{SYSVAR:MEDIA_REL}/mod_onebyone/'.$fullname;
	}
	
	$q .= '`obo_content1_image`=\''.$database->escapeString($obo_content1_image).'\' ';
} else {
	if (!isset($_POST['obo_content1_delete_image'.$section_id])) {	
		if (isset($_POST['obo_image1_fullname'.strval($section_id)])) {
			$q .= '`obo_content1_image`=\''.$database->escapeString($_POST['obo_image1_fullname'.strval($section_id)]).'\'';
		}
	}
}

// one more special case , delete the image is set, this overrides the upload and delete it. 
if (isset($_POST['obo_content1_delete_image'.$section_id])) {
	//debug_dump($_POST);
	$image_to_delete = str_replace('{SYSVAR:MEDIA_REL}', WB_PATH.MEDIA_DIRECTORY, $_POST['obo_image1_fullname'.strval($section_id)] );
	if (unlink($image_to_delete)==false) {
		$admin->print_error($image_to_delete.': not deleted', ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$q .= '`obo_content1_image`=\'\'';
	}
}

/* Image 2 --------------------------------------------------------------------------------------------------------------------- */

if ($_FILES['obo_content2_image'.$section_id]['name']!='') {	
	$fname = strtolower($_FILES['obo_content2_image'.$section_id]['name']); 
	$path_parts = pathinfo($fname);
	$ffname = $path_parts['filename'];
	$fileext = '.'.$path_parts['extension'];	
	if (strpos($allowed,$fileext) == false) {
		$admin->print_error($ffname.': '.$MESSAGE['GENERIC_CANNOT_UPLOAD'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
		die();
	}

	$ncount = 2;
	while ($ncount < 200) {
		if ($ncount == 2) {
			$fullname = 's'.$section_id.'_'.$ffname.$fileext;
		} else {
			$fullname = 's'.$section_id.'_'.$ffname.'-'.$ncount.$fileext;
		}
		$fullpfad = $folder.'/'.$fullname;
		if (!file_exists($fullpfad)) {break;}
		$ncount++;
	}

	//move only
	if (! move_uploaded_file($_FILES['obo_content2_image'.$section_id]['tmp_name'], $fullpfad))  {		
		  $admin->print_error($_FILES['obo_content2_image'.$section_id]['tmp_name'].': '.$MESSAGE['GENERIC_CANNOT_UPLOAD'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$obo_content2_image = '{SYSVAR:MEDIA_REL}/mod_onebyone/'.$fullname;
	}
	
	$q .= ', `obo_content2_image`=\''.$database->escapeString($obo_content2_image).'\' ';
} else {
	if (!isset($_POST['obo_content2_delete_image'.$section_id])) {	
		if (isset($_POST['obo_image2_fullname'.strval($section_id)])) {
			$q .= ', `obo_content2_image`=\''.$database->escapeString($_POST['obo_image2_fullname'.strval($section_id)]).'\'';
		}
	}
}

// one more special case , delete the image is set, this overrides the upload and delete it. 
if (isset($_POST['obo_content2_delete_image'.$section_id])) {
	//debug_dump($_POST);
	$image_to_delete = str_replace('{SYSVAR:MEDIA_REL}', WB_PATH.MEDIA_DIRECTORY, $_POST['obo_image2_fullname'.strval($section_id)] );
	if (unlink($image_to_delete)==false) {
		$admin->print_error($image_to_delete.': not deleted', ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$q .= ', `obo_content2_image`=\'\'';
	}
}

/* Image 3 --------------------------------------------------------------------------------------------------------------------- */

if ($_FILES['obo_content3_image'.$section_id]['name']!='') {	
	$fname = strtolower($_FILES['obo_content3_image'.$section_id]['name']); 
	$path_parts = pathinfo($fname);
	$ffname = $path_parts['filename'];
	$fileext = '.'.$path_parts['extension'];	
	if (strpos($allowed,$fileext) == false) {
		$admin->print_error($ffname.': '.$MESSAGE['GENERIC_CANNOT_UPLOAD'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
		die();
	}

	$ncount = 3;
	while ($ncount < 300) {
		if ($ncount == 3) {
			$fullname = 's'.$section_id.'_'.$ffname.$fileext;
		} else {
			$fullname = 's'.$section_id.'_'.$ffname.'-'.$ncount.$fileext;
		}
		$fullpfad = $folder.'/'.$fullname;
		if (!file_exists($fullpfad)) {break;}
		$ncount++;
	}

	//move only
	if (! move_uploaded_file($_FILES['obo_content3_image'.$section_id]['tmp_name'], $fullpfad))  {		
		  $admin->print_error($_FILES['obo_content3_image'.$section_id]['tmp_name'].': '.$MESSAGE['GENERIC_CANNOT_UPLOAD'], ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$obo_content3_image = '{SYSVAR:MEDIA_REL}/mod_onebyone/'.$fullname;
	}
	
	$q .= ', `obo_content3_image`=\''.$database->escapeString($obo_content3_image).'\' ';
} else {
	if (!isset($_POST['obo_content3_delete_image'.$section_id])) {	
		if (isset($_POST['obo_image3_fullname'.strval($section_id)])) {
			$q .= ', `obo_content3_image`=\''.$database->escapeString($_POST['obo_image3_fullname'.strval($section_id)]).'\'';
		}
	}
}

// one more special case , delete the image is set, this overrides the upload and delete it. 
if (isset($_POST['obo_content3_delete_image'.$section_id])) {
	//debug_dump($_POST);
	$image_to_delete = str_replace('{SYSVAR:MEDIA_REL}', WB_PATH.MEDIA_DIRECTORY, $_POST['obo_image3_fullname'.strval($section_id)] );
	if (unlink($image_to_delete)==false) {
		$admin->print_error($image_to_delete.': not deleted', ADMIN_URL.'/pages/modify.php?page_id='.$page_id);
	} else {
		$q .= ', `obo_content3_image`=\'\'';
	}
}


/* --------------------------------------------------------------------------------------------------------------------- */

// schmutziger Trick 1 (wenn kein Bild hochgeladen wird, das letzte Komma entfernen)
if (substr($q,-2) == ', ') {
	$q = substr($q, 0, -2);
}

// schmutziger Trick 2 (wenn für den ersten Block kein Bild existiert, aber für die weiteren, falsches Doppelkomma ersetzen)
$q = str_replace(', ,',', ',$q);

// Und nun das ganze in die Tabelle schreiben! ----------------------------------------------------------------------------

$sql = 'UPDATE `'.TABLE_PREFIX.'mod_onebyone` '
     . 'SET '.$q. ' WHERE `section_id`='.(int)$section_id;
//debug_dump($sql);
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


