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

$use_wysiwyg   = true;
$wysiwyg_size  = 150;
$use_code      = true;
$use_third_box = true;
$use_latest_settings = true;

$arr_dimensions = array(
	'2080' => '20% - 80%',
	'4060' => '40% - 60%',
	'6040' => '60% - 40%',
	'8020' => '80% - 20%',
	'3366' => '33.3% - 66.6%',
	'6633' => '66.6% - 33.3%',
	'2575' => '25% - 75%',
	'7525' => '75% - 25%',
	'5050' => '50% - 50%',
	//'1000' => '100% - 0%',
	//'0100' => '0% - 100%',
);