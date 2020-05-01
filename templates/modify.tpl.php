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
require_once(WB_PATH .'/modules/onebyone/module_settings.php');
// edit form for onebyone

?>
<?php if (DEFAULT_THEME != 'argos_theme_reloaded') : ?>
	<script src="<?=WB_URL?>/modules/onebyone/templates/jquery.easytabs.min.js"></script>
<?php endif; ?>

<form name="obo<?php echo $section_id; ?>" action="<?php echo WB_URL; ?>/modules/onebyone/save.php" enctype="multipart/form-data" method="post">

	<input type="hidden" name="page_id" value="<?php echo $page_id; ?>" />
	<input type="hidden" name="section_id" value="<?php echo $section_id; ?>" />
	<?php echo $admin->getFTAN()."\n";?>

	<div id="obotab-container<?php echo $section_id; ?>" class="tab-container<?php echo $section_id; ?> top">

	<ul class='etabs'>
		<li class="tab tab<?php echo $section_id; ?> obotab<?php echo $section_id; ?>1">
			<a href="#obotab<?php echo $section_id; ?>1"><?= $OBO['CONTENT']?> 1</a>
		</li>
		<li class="tab tab<?php echo $section_id; ?> obotab<?php echo $section_id; ?>2">
			<a href="#obotab<?php echo $section_id; ?>2"><?= $OBO['CONTENT']?> 2</a>
		</li>
		<li class="tab tab<?php echo $section_id; ?> obotab<?php echo $section_id; ?>3">
			<a href="#obotab<?php echo $section_id; ?>3"><?= $OBO['CONTENT']?> 3</a>
		</li>
		<li class="tab tab<?php echo $section_id; ?> obotab<?php echo $section_id; ?>4">
			<a href="#obotab<?php echo $section_id; ?>4"><?= $OBO['SETTINGS']?></a>
		</li>
	</ul>


		<div class="cpForm obo_contentbox" id="obotab<?php echo $section_id; ?>1">
		<?php if ($use_wysiwyg) { ?>
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['CONTENT_WYSIWYG']?> 1:
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
					<?php echo $OBO['CONTENT_CODE']?> 1:
				</div>
				<div class="settingValue">
					<textarea id="content1_code<?php echo $section_id?>" name="content1_code<?php echo $section_id?>"><?= $content1_code?></textarea>
				</div>
			</div>
		<?php } ?>

		</div>
		<div class="cpForm obo_contentbox" id="obotab<?php echo $section_id; ?>2">
		<?php if ($use_wysiwyg) { ?>
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['CONTENT_WYSIWYG']?> 2:
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
					<?php echo $OBO['CONTENT_CODE']?> 2:
				</div>
				<div class="settingValue">
					<textarea id="content2_code<?php echo $section_id?>" name="content2_code<?php echo $section_id?>"><?= $content2_code?></textarea>
				</div>
			</div>
		<?php } ?>


		</div>
		<div class="cpForm obo_contentbox" id="obotab<?php echo $section_id; ?>3">
		<?php if ($use_wysiwyg) { ?>
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['CONTENT_WYSIWYG']?> 3:
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
					<?php echo $OBO['CONTENT_CODE']?> 3:
				</div>
				<div class="settingValue">
					<textarea id="content3_code<?php echo $section_id?>" name="content3_code<?php echo $section_id?>"><?= $content3_code?></textarea>
				</div>
			</div>
		<?php } ?>
		</div>

		<div class="cpForm obo_contentbox" id="obotab<?php echo $section_id; ?>4">

		<div class="formRow">
			<div class="settingName">
				<?php echo $OBO['DIMENSIONS']?>:
			</div>
			<div class="settingValue">
				<select id="obo_dimensions<?php echo $section_id?>" name="obo_dimensions<?php echo $section_id?>">
					<option disabled>...</option>
					<option <?php if ($obo_dimensions=='2080') { echo 'selected'; } ?> value="2080">20% - 80%</option>
					<option <?php if ($obo_dimensions=='4060') { echo 'selected'; } ?> value="4060">40% - 60%</option>
					<option <?php if ($obo_dimensions=='6040') { echo 'selected'; } ?> value="6040">60% - 40%</option>
					<option <?php if ($obo_dimensions=='8020') { echo 'selected'; } ?> value="8020">80% - 20%</option>
					<option <?php if ($obo_dimensions=='3366') { echo 'selected'; } ?> value="3366">33.3% - 66.6%</option>
					<option <?php if ($obo_dimensions=='6633') { echo 'selected'; } ?> value="6633">66.6% - 33.3%</option>
					<option <?php if ($obo_dimensions=='2575') { echo 'selected'; } ?> value="2575">25% - 75%</option>
					<option <?php if ($obo_dimensions=='7525') { echo 'selected'; } ?> value="7525">75% - 25%</option>
					<option <?php if ($obo_dimensions=='5050') { echo 'selected'; } ?> value="5050">50% - 50%</option>
				</select>
			</div>
		</div>

		<div class="formRow">
			<div class="settingName">
				<?php echo $OBO['MODUS']?>:
			</div>
			<div class="settingValue">
				<select id="obo_modus<?php echo $section_id?>" name="obo_modus<?php echo $section_id?>">
					<option disabled>...</option>
					<option <?php if ($obo_modus=='obo') { echo 'selected'; } ?> value="obo"><?php echo $OBO['ONEBYONE']?></option>
					<option <?php if ($obo_modus=='3bl') { echo 'selected'; } ?> value="3bl"><?php echo $OBO['3BLOCKS']?></option>
				</select>
			</div>
		</div>

		</div>

	</div>


		<div class="formRow">
			<div class="buttonRow">
				<input name="modify" type="submit" value="<?php echo $TEXT['SAVE']; ?>" />
				<input name="pagetree" type="submit" value="<?php echo $TEXT['SAVE'].' &amp; '.$TEXT['BACK']; ?>" />
				<input name="cancel" type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = 'index.php';" />
			</div>
		</div>



</form>

<script>
	// init the tabs
	if (!sessionStorage.oboTabsName<?php echo $section_id; ?>) {
		sessionStorage.setItem('oboTabsName<?php echo $section_id; ?>','obotab<?php echo $section_id; ?>1');
	}

	active_tab<?php echo $section_id; ?> = sessionStorage.getItem('oboTabsName<?php echo $section_id; ?>');

	$('#obotab-container<?php echo $section_id; ?>').easytabs({
		animate : false,
		defaultTab : 'li.' + active_tab<?php echo $section_id; ?>,
		transitionIn : 'slideDown',
		transitionOut : 'slideUp',
		transitionInEasing : 'linear',
		transitionOutEasing : 'linear',
		updateHash : false,
	});

	// fetch the active tab
	$('.tab<?php echo $section_id; ?>').click(function() {
		if ($(this).hasClass('active')) {
			tabs_name = $(this).children('a').attr('href');
			tabs_name = tabs_name.substr(1);
		}
		console.log(tabs_name);
		sessionStorage.setItem('oboTabsName<?php echo $section_id; ?>',tabs_name);
	});
</script>
