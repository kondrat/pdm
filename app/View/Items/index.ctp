<div class="items index">
    <h2><?php echo __('Items'); ?></h2>

        <?php 
            echo $this->Form->input('Project', array(
                'label'=>__('Select project'),
                'selected'=>$this->request->params['named']['prj'],
                'id'=>'item-currentPrj'
                    ));
            $projectId = null;
            $projectId = key($projects);   
        ?>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('drwnbr'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>

            <th><?php echo $this->Paginator->sort('tray.name'); ?></th>
            <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($items as $item):
            ?>
            <tr>
                <td><?php echo h($item['Item']['drwnbr']); ?>&nbsp;</td>
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
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Rifle Item'), array('action' => 'add','trd'=>2,'prj'=>$projectId)); ?></li>
    </ul>
</div>