<?php
$this->load->view('head');
$this->load->view('top');
?>

		<div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<?php $this->load->view('configuration/sidebar', array('active' => 'RESUMO')); ?>
                </div>    
                <!-- // #sidebar -->
                
                <!-- breadcrumbs -->
                <h2><?php echo anchor('dashboard', 'Painel'); ?> &raquo; <?php echo anchor('dashboard', 'Resumo', 'class="active"'); ?></h2>
                
                <div id="main">
                	
                	<?php $this->load->view('system_messages'); ?>
                	
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->

<?php
$this->load->view('footer');