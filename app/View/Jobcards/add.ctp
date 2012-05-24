<div class="Jobcards form">
<?php echo $this->Form->create('Jobcard');?>
	<fieldset>
		<legend><?php echo __('Add Jobcard'); ?></legend>
                <div style="margin-bottom: 0;"><?php echo __('Originator');?></div>
                <div class="" style="font-weight: bold;">
                    <?php echo $originator['User']['name'];?>
                </div>
	<?php
		
                
                echo $this->Form->input('Worker');
                echo $this->Form->input('targetdate', array(
                    'label' => 'Target date',
                    'dateFormat' => 'DMY',
                    'minYear' => date('Y'),
                    'maxYear' => date('Y') + 1,
                ));
                echo $this->Form->input('Machine');
                echo $this->Form->input('Material');
                echo $this->Form->input('quantity',array(
                    'style'=>'width:100px;'
                ));
                echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Jobcards'), array('action' => 'index'));?></li>
	</ul>
</div>
