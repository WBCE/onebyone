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
  DEUTSCHE SPRACHDATEI FUER DAS MODUL: onebyone
 -----------------------------------------------------------------------------------------
*/

// Deutsche Modulbeschreibung
$module_description = 'Mit diesem Modul können zwei oder 3 Inhalte nebeneinander dargestellt werden.';

$OBO['CONTENT_WYSIWYG']  = 'WYSIWYG-Inhalt';
$OBO['CONTENT_CODE']   = 'HTML/Code-Inhalt';
$OBO['CONTENT'] ='Inhalt';
$OBO['SETTINGS'] ='Aufteilung/Modus';
$OBO['DIMENSIONS'] ='Aufteilung, wenn nicht 3 Blöcke';
$OBO['MODUS'] ='Modus';
$OBO['ONEBYONE'] ='Eins neben dem anderen';
$OBO['3BLOCKS'] ='3 Blöcke';

