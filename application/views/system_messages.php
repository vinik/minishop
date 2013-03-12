<!-- SYSTEM MESSAGES -->
<?php
$info = $this->session->flashdata(MESSAGE_TYPE_SUCCESS);
if ('' != $info) {
	?>
	<p class="msg msg-ok SYSTEM_MESSAGE"><strong>Ok!</strong> <?php echo $info; ?></p>
	<br>
	<?php
}

$erro = $this->session->flashdata(MESSAGE_TYPE_ERROR);
if ('' != $erro) {
	?>
	<p class="msg msg-error SYSTEM_MESSAGE"><strong>Erro!</strong> <?php echo $erro; ?></p>
	<br>
	<?php
}

$warning = $this->session->flashdata(MESSAGE_TYPE_WARNING);
if ('' != $warning) {
	?>
	<p class="msg msg-warning SYSTEM_MESSAGE"><strong>Aviso!</strong> <?php echo $warning; ?></p>
	<br>
	<?php
}
?>
