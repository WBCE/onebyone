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
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['HEADLINE']?> 1:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_content1_headline; ?>" id="obo_content1_headline<?php echo $section_id; ?>" name="obo_content1_headline<?php echo $section_id; ?>">
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['HEADLINE_SIZE']?>:
				</div>
				<div class="settingValue">
					<select id="obo_content1_headline_size<?=$section_id?>" name="obo_content1_headline_size<?=$section_id?>">
						<option disabled>...</option>
						<option <?php if ($obo_content1_headline_size=='h1') { echo 'selected'; } ?> value="h1">H1</option>					
						<option <?php if ($obo_content1_headline_size=='h2') { echo 'selected'; } ?> value="h2">H2</option>					
						<option <?php if ($obo_content1_headline_size=='h3') { echo 'selected'; } ?> value="h3">H3</option>					
						<option <?php if ($obo_content1_headline_size=='h4') { echo 'selected'; } ?> value="h4">H4</option>					
						<option <?php if ($obo_content1_headline_size=='h5') { echo 'selected'; } ?> value="h5">H5</option>					
						<option <?php if ($obo_content1_headline_size=='div') { echo 'selected'; } ?> value="div">div</option>					
						<option <?php if ($obo_content1_headline_size=='p') { echo 'selected'; } ?> value="p">p</option>					
					</select>
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['LINK_TO_PAGE_ID']?> 1:
				</div>
				<div class="settingValue">
					<input type="number" value="<?php echo $obo_content1_link; ?>" id="obo_content1_link<?php echo $section_id; ?>" name="obo_content1_link<?php echo $section_id; ?>"><br>
					<?php echo $OBO['LINK_TO_PAGE_ID_INFO'] ?>
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['IMAGE']?> 1:
				</div>
				<div class="settingValue">
					<input type="file" size="50" id="obo_content1_image<?php echo $section_id?>" name="obo_content1_image<?php echo $section_id?>"  value="" />  
					<?php if ($obo_content1_image != '') { ?>
					<input type="checkbox" id="obo_content1_delete_image<?php echo $section_id?>" name="obo_content1_delete_image<?php echo $section_id?>" value="Delete" ><label for="obo_content1_delete_image<?php echo $section_id?>"><?php echo $OBO['DELETE_IMAGE']?></label><br>
					<input type="hidden" name="obo_image1_fullname<?php echo $section_id?>" value="<?php echo $obo_content1_image ?>" />
					<?php $obo_content1_image_preview = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content1_image ); ?>
					<img src="<?php echo $obo_content1_image_preview; ?>" style="width:100px; height:auto" title="" alt=""> 
					<?php } ?>
				</div>
			</div>
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['IMAGE_ALT']?> 1:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_content1_image_alt; ?>" id="obo_content1_img_alt<?php echo $section_id; ?>" name="obo_content1_img_alt<?php echo $section_id; ?>">
				</div>
			</div>
			
		
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
		
		
		<? // -------------------------------------------------------------------------------------------------------------------------------------------------- ?>

		</div>
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>2">
		
		<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['HEADLINE']?> 2:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_content2_headline; ?>" id="obo_content2_headline<?php echo $section_id; ?>" name="obo_content2_headline<?php echo $section_id; ?>">
				</div>
			</div>						
			
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['HEADLINE_SIZE']?>:
				</div>
				<div class="settingValue">
					<select id="obo_content2_headline_size<?=$section_id?>" name="obo_content2_headline_size<?=$section_id?>">
						<option disabled>...</option>
						<option <?php if ($obo_content2_headline_size=='h1') { echo 'selected'; } ?> value="h1">H1</option>					
						<option <?php if ($obo_content2_headline_size=='h2') { echo 'selected'; } ?> value="h2">H2</option>					
						<option <?php if ($obo_content2_headline_size=='h3') { echo 'selected'; } ?> value="h3">H3</option>					
						<option <?php if ($obo_content2_headline_size=='h4') { echo 'selected'; } ?> value="h4">H4</option>					
						<option <?php if ($obo_content2_headline_size=='h5') { echo 'selected'; } ?> value="h5">H5</option>					
						<option <?php if ($obo_content2_headline_size=='div') { echo 'selected'; } ?> value="div">div</option>					
						<option <?php if ($obo_content2_headline_size=='p') { echo 'selected'; } ?> value="p">p</option>					
					</select>
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['LINK_TO_PAGE_ID']?> 2:
				</div>
				<div class="settingValue">
					<input type="number" value="<?php echo $obo_content2_link; ?>" id="obo_content2_link<?php echo $section_id; ?>" name="obo_content2_link<?php echo $section_id; ?>"><br>
					<?php echo $OBO['LINK_TO_PAGE_ID_INFO'] ?>
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['IMAGE']?> 2:
				</div>
				<div class="settingValue">
					<input type="file" size="50" id="obo_content2_image<?php echo $section_id?>" name="obo_content2_image<?php echo $section_id?>"  value="" />  
					<?php if ($obo_content2_image != '') { ?>
					<input type="checkbox" id="obo_content2_delete_image<?php echo $section_id?>" name="obo_content2_delete_image<?php echo $section_id?>" value="Delete" ><label for="obo_content2_delete_image<?php echo $section_id?>"><?php echo $OBO['DELETE_IMAGE']?>
					</label><br>		
					<input type="hidden" name="obo_image2_fullname<?php echo $section_id?>" value="<?php echo $obo_content2_image ?>" />
					<?php $obo_content2_image_preview = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content2_image ); ?>
					<img src="<?php echo $obo_content2_image_preview?>" style="width:100px; height:auto" title="" alt=""> 
					<?php } ?>
				</div>
			</div>
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['IMAGE_ALT']?> 2:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_content2_image_alt; ?>" id="obo_content2_img_alt<?php echo $section_id; ?>" name="obo_content2_img_alt<?php echo $section_id; ?>">
				</div>
			</div>
		
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
		
		<? // -------------------------------------------------------------------------------------------------------------------------------------------------- ?>
		
		<?php if($use_third_box): ?>
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>3">
		
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['HEADLINE']?> 3:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_content3_headline; ?>" id="obo_content3_headline<?php echo $section_id; ?>" name="obo_content3_headline<?php echo $section_id; ?>">
				</div>
			</div>
					
			
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['HEADLINE_SIZE']?>:
				</div>
				<div class="settingValue">
					<select id="obo_content3_headline_size<?=$section_id?>" name="obo_content3_headline_size<?=$section_id?>">
						<option disabled>...</option>
						<option <?php if ($obo_content3_headline_size=='h1') { echo 'selected'; } ?> value="h1">H1</option>					
						<option <?php if ($obo_content3_headline_size=='h2') { echo 'selected'; } ?> value="h2">H2</option>					
						<option <?php if ($obo_content3_headline_size=='h3') { echo 'selected'; } ?> value="h3">H3</option>					
						<option <?php if ($obo_content3_headline_size=='h4') { echo 'selected'; } ?> value="h4">H4</option>					
						<option <?php if ($obo_content3_headline_size=='h5') { echo 'selected'; } ?> value="h5">H5</option>					
						<option <?php if ($obo_content3_headline_size=='div') { echo 'selected'; } ?> value="div">div</option>					
						<option <?php if ($obo_content3_headline_size=='p') { echo 'selected'; } ?> value="p">p</option>					
					</select>
				</div>
			</div>
			
				<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['LINK_TO_PAGE_ID']?> 3:
				</div>
				<div class="settingValue">
					<input type="number" value="<?php echo $obo_content3_link; ?>" id="obo_content3_link<?php echo $section_id; ?>" name="obo_content3_link<?php echo $section_id; ?>"><br>
					<?php echo $OBO['LINK_TO_PAGE_ID_INFO'] ?>
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['IMAGE']?> 3:
				</div>
				<div class="settingValue">
					<input type="file" size="50" id="obo_content3_image<?php echo $section_id?>" name="obo_content3_image<?php echo $section_id?>"  value="" />  
					<?php if ($obo_content3_image != '') { ?>
					<input type="checkbox" id="obo_content3_delete_image<?php echo $section_id?>" name="obo_content3_delete_image<?php echo $section_id?>" value="Delete" ><label for="obo_content3_delete_image<?php echo $section_id?>"><?php echo $OBO['DELETE_IMAGE']?></label><br>
					<input type="hidden" name="obo_image3_fullname<?php echo $section_id?>" value="<?php echo $obo_content3_image ?>" />
					<?php $obo_content3_image_preview = str_replace('{SYSVAR:MEDIA_REL}', WB_URL.MEDIA_DIRECTORY, $obo_content3_image ); ?>
					<img src="<?php echo $obo_content3_image_preview?>" style="width:100px; height:auto" title="" alt=""> 
					<?php } ?>
				</div>
			</div>
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['IMAGE_ALT']?> 3:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_content3_image_alt; ?>" id="obo_content3_img_alt<?php echo $section_id; ?>" name="obo_content3_img_alt<?php echo $section_id; ?>">
				</div>
			</div>
		
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
		
		
		<? // -------------------------------------------------------------------------------------------------------------------------------------------------- ?>
		
		<div class="cpForm obo_contentbox" id="obotab<?=$section_id; ?>4">
		
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['GLOBAL_HEADLINE']?>:
				</div>
				<div class="settingValue">
					<input type="text" value="<?php echo $obo_global_headline; ?>" id="obo_global_headline<?php echo $section_id; ?>" name="obo_global_headline<?php echo $section_id; ?>">
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?=$OBO['GLOBAL_HEADLINE_SIZE']?>:
				</div>
				<div class="settingValue">
					<select id="obo_global_headline_size<?=$section_id?>" name="obo_global_headline_size<?=$section_id?>">
						<option disabled>...</option>
						<option <?php if ($obo_global_headline_size=='h1') { echo 'selected'; } ?> value="h1">H1</option>					
						<option <?php if ($obo_global_headline_size=='h2') { echo 'selected'; } ?> value="h2">H2</option>					
						<option <?php if ($obo_global_headline_size=='h3') { echo 'selected'; } ?> value="h3">H3</option>					
						<option <?php if ($obo_global_headline_size=='h4') { echo 'selected'; } ?> value="h4">H4</option>					
						<option <?php if ($obo_global_headline_size=='h5') { echo 'selected'; } ?> value="h5">H5</option>					
						<option <?php if ($obo_global_headline_size=='div') { echo 'selected'; } ?> value="div">div</option>					
						<option <?php if ($obo_global_headline_size=='p') { echo 'selected'; } ?> value="p">p</option>					
					</select>
				</div>
			</div>
			
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['BEFORE']?>:
				</div>
				<div class="settingValue">
					<textarea id="obo_before<?php echo $section_id; ?>" name="obo_before<?php echo $section_id; ?>"><?php if ($obo_before!='') { echo $obo_before; } ?></textarea>				
				</div>
			</div>
			
			<div class="formRow">
				<div class="settingName">
					<?php echo $OBO['AFTER']?>:
				</div>
				<div class="settingValue">
					<textarea id="obo_after<?php echo $section_id; ?>" name="obo_after<?php echo $section_id; ?>"><?php if ($obo_after!='') { echo $obo_after; } ?></textarea>				
				</div>
			</div>

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
