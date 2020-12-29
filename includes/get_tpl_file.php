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

if (!function_exists('GetModTplFile')) :
	function GetModTplFile($sModule, $sTplFile="view.tpl.php") {
		$tpathTpl    = WB_PATH."/templates/".TEMPLATE."/modules/".$sModule."/".$sTplFile;
		$tpathModule = WB_PATH."/modules/".$sModule."/templates/".$sTplFile;
		if (file_exists ($tpathTpl)){
			return $tpathTpl;
		} elseif (file_exists ($tpathModule)){
			return $tpathModule;
		} else {
			return "TEMPLATE FILE WAS NOT FOUND FOR MODULE: <b>".$sModule."</b>.";
		}		
	}
endif;
