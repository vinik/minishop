<?php
$this->load->view('header');

if ($country->get_country_id()) {
	$page_title = $this->lang->line('countries.edit-country.title');
} else {
	$page_title = $this->lang->line('countries.new-country.title');
}

?>

<div id="content-left">
	<div class="content">
	
		<?php $this->load->view('system_message'); ?>
		
		<div class="div-block">
			<div class="main-title"><?php echo $page_title; ?></div>
			<div class="clear"></div>
			
			<?php echo anchor('configuration/countries', $this->lang->line('countries.title'), 'class="button-blue"'); ?>
			<?php echo anchor('configuration/new_country', $this->lang->line('countries.new-country.title'), 'class="button-blue"'); ?>
			
			<?php echo form_open('configuration/process_country'); ?>
				<input type="hidden" name="country_id" value="<?php echo $country->get_country_id(); ?>">
				<ul class="info-list">
					<li>
						<label><?php echo $this->lang->line('country.field.country_name'); ?></label>
						<div><?php echo form_input('country_name', $country->get_country_name()); ?> <span class="error"><?php echo form_error('country_name'); ?></span></div>
					</li>
					<li>
						<label><?php echo $this->lang->line('country.field.country_abbr'); ?></label>
						<div><?php echo form_input('country_abbr', $country->get_country_abbr()); ?> <span class="error"><?php echo form_error('country_abbr'); ?></span></div>
					</li>
				</ul>
				<br>
				<button class="button-blue"><?php echo $this->lang->line('button.submit.label'); ?></button>
			<?php echo form_close(); ?>
			
		</div>
        
    </div> <!-- .content -->
</div><!-- #content-left -->

<?php
$this->load->view('footer');