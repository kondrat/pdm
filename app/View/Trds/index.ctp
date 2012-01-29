<div class="Trds index">
    <h2><?php echo __('Trds'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
//        foreach ($trds as $k => $v) {
//            foreach ($nest as $v1) {
//                if ($k == $v1['Trd']['id']) {
//                    $trds[$k] = $trds[$k] . '<span class="trd-trdType">' . $v1['ItemType']['name'] . '</span>';
//                    break;
//                }
//            }
//        }
        ?>
        <?php foreach ($trds as $k => $trd): ?>
<?php
            foreach ($nest as $v1) {
               
                if ($k == $v1['Trd']['id']) {                   
                    $trd = $trd . '<span class="trd-trdTypeName">' . $v1['ItemType']['name'] . '</span>';
                    $classTrd = 'trd-list'.' '.'trd-trdType'.$v1['ItemType']['name'];
                    break;
                }
            }       
?>       
        
            <tr>
                <td style="text-decoration: none;"><?php echo $this->Html->link($trd, array('action' => 'view', $k), array('class' => $classTrd, 'escape' => false)); ?></td>

                <td class="actions">
                    <?php 
                    if(strtolower($v1['ItemType']['name']) == 'assy'){
                        echo $this->Html->link(__('Add'), array('action' => 'add', $k));
                    }else{
                        echo __('No add');
                    }
                    ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $k)); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $k), null, __('Are you sure you want to delete %s?', strip_tags($trd))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
