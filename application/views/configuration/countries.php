<?php
$this->load->view('head');
$this->load->view('top');
?>
		<div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<?php $this->load->view('configuration/sidebar', array('active' => 'COUNTRIES')); ?>
                </div>    
                <!-- // #sidebar -->
                
                <!-- breadcrumbs -->
                <h2><?php echo anchor('dashboard', 'Painel'); ?> &raquo; <?php echo anchor('configuration/new_country', 'Novo país', 'class="active"'); ?></h2>
                
                <div id="main">
                	
                	<?php $this->load->view('system_messages'); ?>
                	
                	<?php 
					if (count($country_list)) {
						?>
                			<table cellpadding="0" cellspacing="0">
	                			<?php 
								foreach ($country_list as $country_index => $country_item) {
									?>
									<tr <?php echo $country_index %2 == 1 ? 'class="odd"' : ''; ?>>
										<td><?php echo $country_item->get_name(); ?></td>
		                                <td class="action">
											<?php echo anchor('configuration/edit_country/' . $country_item->get_country_id(), 'Editar', 'class="edit"'); ?>
		                                </td>
		                            </tr>                        
	                				<?php 
                				}
                				?>
                        	</table>
                        <?php
					}
					?>
                	
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->

			
<?php
$this->load->view('footer');