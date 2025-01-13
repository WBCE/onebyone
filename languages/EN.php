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

/*
 -----------------------------------------------------------------------------------------
  ENGLISH LANGUAGE FILE FOR MODULE: onebyone
 -----------------------------------------------------------------------------------------
*/

// Deutsche Modulbeschreibung
$module_description = 'This module allows to place some content side by side';


$OBO['CONTENT_WYSIWYG']  = 'WYSIWYG Content';
$OBO['CONTENT_CODE']   = 'HTML/Code Content';
$OBO['CONTENT'] ='Content';
$OBO['SETTINGS'] ='Dimensions/Modus';
$OBO['DIMENSIONS'] =' Dimensions (if not 3 blocks)';
$OBO['MODUS'] ='Modus';
$OBO['ONEBYONE'] ='One by one';
$OBO['3BLOCKS'] ='3 blocks';
$OBO['BEFORE'] ='Code before';
$OBO['AFTER'] ='Code after';
$OBO['GLOBAL_HEADLINE'] = 'Section headline';
$OBO['GLOBAL_HEADLINE_SIZE'] = 'Section headline size';
$OBO['HEADLINE'] = 'Headline';
$OBO['HEADLINE_SIZE'] = 'Headline size';
$OBO['IMAGE'] = 'Image';
$OBO['IMAGE_ALT'] = 'Image alt text';
$OBO['DELETE_IMAGE'] ='Delete image';
$OBO['LINK_TO_PAGE_ID'] = 'Link to page ID... (i.e. 42)';
$OBO['LINK_TO_PAGE_ID_INFO'] = 'Enter Page ID (see pages overview) of the target page (will not be verified). If not empty, title and image will be used as link to that page';

