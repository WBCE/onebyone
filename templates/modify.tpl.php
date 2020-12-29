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

// edit form for onebyone
if (DEFAULT_THEME != 'argos_theme_reloaded') : ?>
	<script src="<?=WB_URL?>/modules/onebyone/templates/jquery.easytabs.min.js"></script>
<?php endif; ?>

<form name="obo<?=$section_id; ?>" action="<?=$actionURL; ?>" enctype="multipart/form-data" method="post">
	<input type="hidden" name="page_id" value="<?=$page_id; ?>" />
	<input type="hidden" name="section_id" value="<?=$section_id; ?>" />
	<?=$admin->getFTAN()."\n";?>

	<div id="obotab-container<?=$section_id; ?>" class="tab-container<?=$section_id; ?> top">
		<ul class="etabs">
			<li class="tab tab<?=$section_id; ?> obotab<?=$section_id; ?>1">
				<a href="#obotab<?=$section_id; ?>1"><?=$OBO['CONTENT']?> 1</a>
			</li>
			<li class="tab tab<?=$section_id; ?> obotab<?=$section_id; ?>2">
				<a href="#obotab<?=$section_id; ?>2"><?=$OBO['CONTENT']?> 2</a>
			</li>
			<?php if($use_third_box): ?>
			<li class="tab tab<?=$section_id; ?> obotab<?=$section_id; ?>3">
				<a href="#obotab<?=$section_id; ?>3"><?=$OBO['CONTENT']?> 3</a>
			</li>
			<?php endif;?>
			<li class="tab tab<?=$section_id; ?> obotab<?=$section_id; ?>4">
				<a href="#obotab<?=$section_id; ?>4"><?=$OBO['SETTINGS']?></a>
			</li>
		</ul>
		
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>1">
		<?php if ($use_wysiwyg) { ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['CONTENT_WYSIWYG']?> 1:
				</div>
				<div class="settingValue">
					<?php
					show_wysiwyg_editor('content1_wysiwyg'.$section_id,'content1_wysiwyg'.$section_id,$content1_wysiwyg,'100%',$wysiwyg_size);
					?>
				</div>
			</div>
		<?php }
		if ($use_code) { ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['CONTENT_CODE']?> 1:
				</div>
				<div class="settingValue">
					<textarea id="content1_code<?=$section_id?>" name="content1_code<?=$section_id?>"><?=$content1_code?></textarea>
				</div>
			</div>
		<?php } ?>

		</div>
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>2">
		<?php if ($use_wysiwyg) { ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['CONTENT_WYSIWYG']?> 2:
				</div>
				<div class="settingValue">
					<?php
					show_wysiwyg_editor('content2_wysiwyg'.$section_id,'content2_wysiwyg'.$section_id,$content2_wysiwyg,'100%',$wysiwyg_size);
					?>
				</div>
			</div>
		<?php }
		if ($use_code) { ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['CONTENT_CODE']?> 2:
				</div>
				<div class="settingValue">
					<textarea id="content2_code<?=$section_id?>" name="content2_code<?=$section_id?>"><?=$content2_code?></textarea>
				</div>
			</div>
		<?php } ?>


		</div>
		<?php if($use_third_box): ?>
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>3">
		<?php if ($use_wysiwyg) { ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['CONTENT_WYSIWYG']?> 3:
				</div>
				<div class="settingValue">
					<?php
					show_wysiwyg_editor('content3_wysiwyg'.$section_id,'content3_wysiwyg'.$section_id,$content3_wysiwyg,'100%',$wysiwyg_size);
					?>
				</div>
			</div>
		<?php }
		if ($use_code) { ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['CONTENT_CODE']?> 3:
				</div>
				<div class="settingValue">
					<textarea id="content3_code<?=$section_id?>" name="content3_code<?=$section_id?>"><?=$content3_code?></textarea>
				</div>
			</div>
		<?php } ?>
		</div>
		<?php endif; ?>
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>4">

			<div class="formRow">
				<div class="settingName">
					<?php if($use_third_box): ?>
						<?=$OBO['DIMENSIONS']?>:
					<?php else: ?>
						<?=explode('/', $OBO['SETTINGS'])[0]?>:
					<?php endif; ?>
				</div>
				<div class="settingValue">
					<select id="obo_dimensions<?=$section_id?>" name="obo_dimensions<?=$section_id?>">
						<option disabled ><?=$TEXT['PLEASE_SELECT']?> &hellip;</option>
						<?php  foreach($arr_dimensions as $value=>$label): ?>
							<option <?=($obo_dimensions==$value) ? ' selected' :''; ?> value="<?=$value?>"><?=$label?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<?php if($use_third_box): ?>
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['MODUS']?>:
				</div>
				<div class="settingValue">
					<select id="obo_modus<?=$section_id?>" name="obo_modus<?=$section_id?>">
						<option disabled>...</option>
						<option <?php if ($obo_modus=='obo') { echo 'selected'; } ?> value="obo"><?=$OBO['ONEBYONE']?></option>					
						<option <?php if ($obo_modus=='3bl') { echo 'selected'; } ?> value="3bl"><?=$OBO['3BLOCKS']?></option>					
					</select>
				</div>
			</div>
			<?php else: ?>
				<input type="hidden" name="obo_modus<?=$section_id?>" value="obo">
			<?php endif; ?>
		</div>
	</div>
	<div class="formRow">
		<div class="buttonRow">
			<input name="modify" type="submit" value="<?=$TEXT['SAVE']; ?>" />
			<input name="pagetree" type="submit" value="<?=$TEXT['SAVE'].' &amp; '.$TEXT['BACK']; ?>" />
			<input name="cancel" type="button" value="<?=$TEXT['CANCEL']; ?>" onclick="javascript: window.location = 'index.php';" />
		</div>
	</div>
</form>

<script>
	// init the tabs
	if (!sessionStorage.oboTabsName<?=$section_id; ?>) {
		sessionStorage.setItem('oboTabsName<?=$section_id; ?>','obotab<?=$section_id; ?>1');
	}

	active_tab<?=$section_id; ?> = sessionStorage.getItem('oboTabsName<?=$section_id; ?>');

	$('#obotab-container<?=$section_id; ?>').easytabs({
		animate : false,
		defaultTab : 'li.' + active_tab<?=$section_id; ?>,
		transitionIn : 'slideDown',
		transitionOut : 'slideUp',
		transitionInEasing : 'linear',
		transitionOutEasing : 'linear',
		updateHash : false,
	});

	// fetch the active tab
	$('.tab<?=$section_id; ?>').click(function() {
		if ($(this).hasClass('active')) {
			tabs_name = $(this).children('a').attr('href');
			tabs_name = tabs_name.substr(1);
		}
		console.log(tabs_name);
		sessionStorage.setItem('oboTabsName<?=$section_id; ?>',tabs_name);
	});
</script>
