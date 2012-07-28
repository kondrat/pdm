<div class="items index">
    <h2><?php echo __('Items'); ?></h2>

    <?php echo __('Project: '). $userPrj['Project']['name'].__(' Total of items: ').$itemsCount.__(' Tray name: ').$userPrj['Project']['tray_name'];?>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Drw number'); ?></th>
            <th><?php echo __('Issue');?></th>
            <th><?php echo __('Name');?></th>
            
            <th><?php echo __('Tray Name'); ?></th>
            <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($items as $item):
            ?>
            <tr>
                <td><?php echo h($item['Item']['full_drwname']); ?>&nbsp;</td>
                <td><?php echo h($item['Itemissue'][0]['issue']); ?>&nbsp;</td>
                <td><?php echo h($item['Item']['name']); ?>&nbsp;</td>
                
                <td><?php echo h($item['Tray']['name']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New ').$userPrj['Project']['tray_name'].' '.__('Item'), array('action' => 'add', 'trd' => $userPrj['Project']['tray_id'],'prj'=>$userPrj['Project']['id'])); ?></li>        
    </ul>
    <div style="margin-bottom: 5px;"><?php echo __('Other projects:');?></div>
    <ul>
    <?php foreach($allPrj as $k=>$v):?>
        <li><?php echo $this->Html->link($v['Project']['name'], array('controller'=>'items','action'=>'index','prj'=>$v['Project']['id']));?></li>
    <?php endforeach;?>
</div>