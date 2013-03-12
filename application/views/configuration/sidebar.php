<ul class="sideNav">
	<li><?php echo anchor('dashboard', 'Resumo', '' . ($active == 'RESUMO' ? 'class="active"' : '')); ?></li>
	<li><?php echo anchor('dashboard/checklist', 'Checklist', '' . ($active == 'CHECKLIST' ? 'class="active"' : '')); ?></li>
	<li><?php echo anchor('dashboard/alertas', 'Alertas', '' . ($active == 'ALERTAS' ? 'class="active"' : '')); ?></li>
	<li><?php echo anchor('configuration/countries', 			'Países', 			'class="button-blue right"'); ?></li>
	<li><?php echo anchor('configuration/states', 				'Estados', 				'class="button-blue right"'); ?></li>
	<li><?php echo anchor('configuration/zipcodes', 			'CEPs', 									'class="button-blue right"'); ?></li>
</ul>
<!-- // .sideNav -->