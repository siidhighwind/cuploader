
<div class="well well-small form-inline" id="additionalOptions">
	<label class="span2" style="margin-left: 5px;" for="file-input-text"><?php echo Ciap_Lang::t('link_text') ?>: </label>
	<input id="file-input-text" type="text" value="<?php echo $this->fileName; ?>"/>
	<div style="clear: both;"></div>
	<label class="span2" style="margin-left: 5px;" for="file-input-title"><?php echo Ciap_Lang::t('title_text') ?>: </label>
	<input id="file-input-title" type="text" value="<?php echo $this->fileName; ?>"/>
	<div style="clear: both;"></div>
	<label class="span3" style="margin-left: 5px;" for="file-input-window"><?php echo Ciap_Lang::t('in_new_window') ?>: </label>
	<input id="file-input-window" type="checkbox" value="1"/>
	<input id="file-input-url" type="hidden" value="<?php echo $this->fileUrl; ?>"/>
	<hr style="clear: both; margin: 5px 0" />
	<div style="text-align: right;">
		<button type="button" onclick="targetObj.insert(typeFile.getHtml());" class="btn btn-success"><?php echo Ciap_Lang::t('insert_link') ?></button>
	</div>
</div>
<div class="well well-small form-inline" id="additionalOptions2" style='margin-bottom: 0px;'>
	<div style="clear: both;"></div>
	<label class="span2" style="margin-left: 5px;" for="file-input-wrap"><?php echo Ciap_Lang::t('wrap_in') ?></label>
	<select id="file-input-wrap">
		<option value='0'></option>
		<option value='p'>&lt;p&gt;</option>
		<option value='div'>&lt;div&gt;</option>
	</select>
	<hr style="clear: both; margin: 5px 0" />
	<textarea id="file-content" style="display: none !important;"><?php echo $this->content; ?></textarea>
	<div style="text-align: right;">
		<button type="button" onclick="targetObj.insert(typeFile.getContent());" class="btn btn-success"><?php echo Ciap_Lang::t('insert_content') ?></button>
	</div>
	<hr style="clear: both; margin: 5px 0" />
	<?php echo Ciap_Lang::t('encoding_warning'); ?>
</div>