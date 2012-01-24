<div class="Trds index">
    <h2><?php echo __('Trds'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($trds as $k => $trd): ?>
            <tr>
                <td style="text-decoration: none;"><?php echo $this->Html->link($trd, array('action' => 'view', $k), array('class' => 'trd-list', 'escape' => false)); ?></td>

                <td class="actions">
                    <?php echo $this->Html->link(__('Add'), array('action' => 'add',$k)); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $k)); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $k), null, __('Are you sure you want to delete # %s?', $k)); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
