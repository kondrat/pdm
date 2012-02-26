<div class="trays index">
    <h2><?php echo __('Trays'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>

        <?php foreach ($trays as $k => $tray): ?>
            <?php
            $classTray = null;
            foreach ($nest as $v1) {

                if ($k == $v1['Tray']['id']) {
                    $tray = $tray . '<span class="tray-trayTypeName">' . $v1['ItemType']['name'] . '</span><span class="tray-traySuffix"> X '.$v1['Tray']['ata_cache'].' - xxxxx -'.$v1['ItemType']['suffix']."</span>";
                    $classTray = 'tray-list' . ' ' . 'tray-trayType' . $v1['ItemType']['name'];
                    break;
                }
            }
            ?>       

            <tr>
                <td style="text-decoration: none;"><?php echo $this->Html->link($tray, array('action' => 'view', $k), array('class' => $classTray, 'escape' => false)); ?></td>

                <td class="actions">
                    <?php
                    if (strtolower($v1['ItemType']['name']) == 'assy') {
                        echo $this->Html->link(__('Add'), array('action' => 'add', $k));
                    } else {
                        echo __('No add');
                    }
                    ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $k)); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $k), null, __('Are you sure you want to delete %s?', strip_tags($tray))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
