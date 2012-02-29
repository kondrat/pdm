<div class="items form">

    <div>
        <a href="file:///S:/TADS/PDM/PROJECT_408/PARTS/AK/">Good boltAGA338.CATPart</a>
    </div>
<?php echo $this->Form->create('Item');?>
	<fieldset>
		<legend><?php echo __('Add Item to ').$trayName; ?></legend>
	<?php echo $this->Form->input('tray',array("id"=>"item-trayListAdd"));?>
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
