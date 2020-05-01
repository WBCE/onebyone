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



$module_directory = 'onebyone';
$module_name = 'onebyone';
$module_function = 'page';
$module_version = '0.4';
$module_platform = '1.4.x';
$module_author = 'florian, Bernd Michna';
$module_license = 'WTFPL';
$module_description = 'This module can display some contents one by one';

/*

0.4 2020/05/01
+ Tab persistence
! remove duplicate simpletab js

0.3 2020/05/01
! Convert all files from ANSI to UTF-8

0.2	2020/05/01	
+ Backend Tabs
+ module_settings.php
+ Frontend classes (section id / obo_left etc.)

0.1	2020/04/30	Initial release

*/
