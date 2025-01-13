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

$fields = array('obo_global_headline','obo_global_headline_size','obo_before','obo_after','obo_content1_headline','obo_content1_headline_size','obo_content1_link','obo_content1_image','obo_content1_image_alt','obo_content2_headline','obo_content2_headline_size','obo_content2_link','obo_content2_image','obo_content2_image_alt','obo_content3_headline','obo_content3_headline_size','obo_content3_link','obo_content3_image','obo_content3_image_alt');


global $database;
	$table = TABLE_PREFIX.'mod_onebyone';	
	$desc = 'TEXT NOT NULL';
	for ($i=0;$i<sizeof($fields);$i++) {
		$query = $database->query("DESCRIBE `$table` `$fields[$i]`");
		if(!$query || $query->numRows() == 0) { // add field
			$query = $database->query("ALTER TABLE `$table` ADD `$fields[$i]` $desc");
		}
	}