<div class="items form">

<?php echo $this->Form->create('Item');?>
	<fieldset>
		<legend><?php echo __('Add Item for ').$trayName; ?></legend>
	<?php echo $this->Form->input('tray');?>
                <div id="tem"></div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index'));?></li>
	</ul>
</div>
