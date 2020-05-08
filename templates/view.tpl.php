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
			<?php if ($unitleft!='false') { ?>
			<div class="obo_unit obo_left <?=$unitleft ?>">
				<?php 
				echo $content1_wysiwyg;
				echo $content1_code;
				?>
			</div>
			<?php }
			if ($unitright!='false') { ?>
			<div class="obo_unit obo_right <?=$unitright ?>">
				<?php 
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
				echo $content1_wysiwyg;
				echo $content1_code;
				?>
			</div>
			<div class="obo_unit obo_center obo_one-third">
				<?php 
				echo $content2_wysiwyg;
				echo $content2_code;
				?>
			</div>
			<div class="obo_unit obo_right obo_one-third">
				<?php 
				echo $content3_wysiwyg;
				echo $content3_code;
				?>
			</div>
		</div>
	<?php
}



