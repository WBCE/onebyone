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

if ($obo_content1_link != '') {
		$obo_content1_link_open  = '<a href="[wblink'.$obo_content1_link.']" title="'.$obo_content1_headline.'">';
		$obo_content1_link_close = '</a>';
	} else {
		$obo_content1_link_open = '';
		$obo_content1_link_close = '';
	}
	if ($obo_content2_link != '') {
		$obo_content2_link_open  = '<a href="[wblink'.$obo_content2_link.']" title="'.$obo_content2_headline.'">';
		$obo_content2_link_close = '</a>';
	} else {
		$obo_content2_link_open = '';
		$obo_content2_link_close = '';
	}
	if ($obo_content3_link != '') {
		$obo_content3_link_open  = '<a href="[wblink'.$obo_content3_link.']" title="'.$obo_content3_headline.'">';
		$obo_content3_link_close = '</a>';
	} else {
		$obo_content3_link_open = '';
		$obo_content3_link_close = '';
	}
	
if ($obo_global_headline != '') { echo '<'.$obo_global_headline_size.' class="obo_global_headline">'.$obo_global_headline.'</'.$obo_global_headline_size.'>';} 
if ($obo_before != '') { echo '<div class="obo_before">'.$obo_before.'</div>';}		

if ($obo_modus=='obo') {
	switch ($obo_dimensions) {
		case ('2080'):
			$unitleft  = 'obo_one-fifth';
			$unitright = 'obo_four-fifths';
		break;
		case ('4060'):
			$unitleft  = 'obo_two-fifths';
			$unitright = 'obo_three-fifths';
		break;
		case ('6040'):
			$unitleft  = 'obo_three-fifths';
			$unitright = 'obo_two-fifths';
		break;
		case ('8020'):
			$unitleft  = 'obo_four-fifths';
			$unitright = 'obo_one-fifth';
		break;
		case ('3366'):
			$unitleft  = 'obo_one-third';
			$unitright = 'obo_two-thirds';
		break;
		case ('6633'):
			$unitleft  = 'obo_two-thirds';
			$unitright = 'obo_one-third';
		break;
		case ('2575'):
			$unitleft  = 'obo_one-quarter';
			$unitright = 'obo_three-quarters';
		break;
		case ('7525'):
			$unitleft  = 'obo_three-quarters';
			$unitright = 'obo_one-quarter';
		break;
		case ('5050'):
			$unitleft  = 'obo_half';
			$unitright = 'obo_half';
		break;
		case ('1000'):
			$unitleft = 'obo_whole';
			$unitright= 'false';
		break;
		case ('0100'):
			$unitleft = 'false';
			$unitright= 'whole';
		break;
	}
	
	?>

	
	<div class="obo_grid obo_<?= $section_id; ?>">
	
		<?php 
			if ($unitleft!='false') { ?>
			<div class="obo_unit obo_left <?=$unitleft ?>">
				<?php 
				if ($obo_content1_headline != '') { echo $obo_content1_link_open.'<'.$obo_content1_headline_size.' class="obo_content_headline obo_content_headline1">'.$obo_content1_headline.'</'.$obo_content1_headline_size.'>'.$obo_content1_link_close;}
				if ($obo_content1_image != '') { 
					$obo_content1_image = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content1_image );
					echo $obo_content1_link_open.'<img src="'.$obo_content1_image.'" class="obo_content_image obo_content_image1"  alt="'.$obo_content1_image_alt.'" />'.$obo_content1_link_close;
				}
				echo $content1_wysiwyg;
				echo $content1_code;
				?>
			</div>
			<?php }
			if ($unitright!='false') { ?>
			<div class="obo_unit obo_right <?=$unitright ?>">
				<?php 
				if ($obo_content2_headline != '') { echo $obo_content2_link_open.'<'.$obo_content2_headline_size.' class="obo_content_headline obo_content_headline2">'.$obo_content2_headline.'</'.$obo_content2_headline_size.'>'.$obo_content2_link_close;}
				if ($obo_content2_image != '') { 
					$obo_content2_image = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content2_image );
					echo $obo_content2_link_open.'<img src="'.$obo_content2_image.'" class="obo_content_image obo_content_image2"  alt="'.$obo_content2_image_alt.'" />'.$obo_content2_link_close;
				}
				echo $content2_wysiwyg;
				echo $content2_code;
				?>
			</div>			
			<?php } ?>
			
	</div>
	<?php
} else {
	?>
		<div class="obo_grid obo_<?= $section_id; ?>">
			
			<div class="obo_unit obo_left obo_one-third">
				<?php 
				if ($obo_content1_headline != '') { echo $obo_content1_link_open.'<'.$obo_content1_headline_size.' class="obo_content_headline obo_content_headline1">'.$obo_content1_headline.'</'.$obo_content1_headline_size.'>'.$obo_content1_link_close;}
				if ($obo_content1_image != '') { 
					$obo_content1_image = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content1_image );
					echo $obo_content1_link_open.'<img src="'.$obo_content1_image.'" class="obo_content_image obo_content_image1"  alt="'.$obo_content1_image_alt.'" />'.$obo_content1_link_close;
				}
				echo $content1_wysiwyg;
				echo $content1_code;
				?>
			</div>
			<div class="obo_unit obo_center obo_one-third">
				<?php 
				if ($obo_content2_headline != '') { echo $obo_content2_link_open.'<'.$obo_content2_headline_size.' class="obo_content_headline obo_content_headline2">'.$obo_content2_headline.'</'.$obo_content2_headline_size.'>'.$obo_content2_link_close;}
				if ($obo_content2_image != '') { 
					$obo_content2_image = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content2_image );
					echo $obo_content2_link_open.'<img src="'.$obo_content2_image.'" class="obo_content_image obo_content_image2"  alt="'.$obo_content2_image_alt.'" />'.$obo_content2_link_close;
				}
				echo $content2_wysiwyg;
				echo $content2_code;
				?>
			</div>
			<div class="obo_unit obo_right obo_one-third">
				<?php 
				if ($obo_content3_headline != '') { echo $obo_content3_link_open.'<'.$obo_content3_headline_size.' class="obo_content_headline obo_content_headline3">'.$obo_content3_headline.'</'.$obo_content3_headline_size.'>'.$obo_content3_link_close;}
				if ($obo_content3_image != '') { 
					$obo_content3_image = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content3_image );
					echo $obo_content3_link_open.'<img src="'.$obo_content3_image.'" class="obo_content_image obo_content_image3"  alt="'.$obo_content3_image_alt.'" />'.$obo_content3_link_close;
				}
				echo $content3_wysiwyg;
				echo $content3_code;
				?>
			</div>
			<br clear="all">
			
		</div>
		
	<?php
}
if ($obo_after != '') { echo '<div class="obo_after">'.$obo_after.'</div>';} 


