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

// Insert an extra row into the database
$sql = 'INSERT INTO `'.TABLE_PREFIX.'mod_onebyone` '
     . 'SET `page_id`='.$page_id.', '
     .     '`section_id`='.$section_id.', '     
     .     '`content1_code`=\'\', '
     .     '`content1_wysiwyg`=\'\', '
     .     '`content2_code`=\'\', '
     .     '`content2_wysiwyg`=\'\', '
     .     '`content3_code`=\'\', '
     .     '`content3_wysiwyg`=\'\', '
	 .     '`obo_modus`=\'\', '
     .     '`obo_dimensions`=\'\'';
$database->query($sql);

