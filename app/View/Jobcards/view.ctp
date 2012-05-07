<div class="Jobcards view">
    <h2><?php echo __('Job card'); ?></h2>


    <table class="jcard-mainTable">
        <tr>
        <table class="jcard-innerTable">

            <tr class="jcard-manufPart">
                <td><b><?php echo __('ID Number:'); ?></b>&nbsp;<span><?php echo h($jobcard['Jobcard']['id']); ?></span></td>
                <td><b><?php echo __('TASK Number:'); ?></b>&nbsp;<span><?php echo h($jobcard['Jobcard']['id']); ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td><b><?php echo __('Originator:'); ?></b>&nbsp;<span><?php echo "Originator Name" ?></span></td>
                <td><b><?php echo __('Start date:'); ?></b>&nbsp;<span><?php echo h($jobcard['Jobcard']['created']); ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td><b><?php echo __('Assigned to:'); ?></b>&nbsp;<span><?php echo "Worker name"; ?></span></td>
                <td><b><?php echo __('Target date:'); ?></b>&nbsp;<span><?php echo "Date"; ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td><b><?php echo __('Assigned to:'); ?></b>&nbsp;<span><?php echo "Worker name"; ?></span></td>
                <td><b><?php echo __('Target date:'); ?></b>&nbsp;<span><?php echo "Date"; ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td><?php echo __('Part number/Kit number:'); ?>&nbsp;<span><?php echo "A000 0 0000 200"; ?></span></td>
                <td><?php echo __('Quantity:'); ?>&nbsp;<span><?php echo "100"; ?></span></td>
            </tr>


            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Revision:'); ?>&nbsp;<span><?php echo "A00"; ?></span></td>
            </tr> 
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Description:'); ?>&nbsp;<span><?php echo "Description"; ?></span></td>
            </tr> 
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Part serial number:'); ?>&nbsp;<span><?php echo "00100"; ?></span></td>
            </tr>    
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Machine name & number:'); ?>&nbsp;<span><?php echo "Saublin"; ?></span></td>
            </tr> 
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Reference on CNC program:'); ?>&nbsp;<span><?php echo "A00"; ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Operation type:'); ?>&nbsp;<span><?php echo "Type"; ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Material type:'); ?>&nbsp;<span><?php echo "Al 7075"; ?></span></td>
            </tr>
            <tr class="jcard-manufPart">
                <td colspan="2"><?php echo __('Manufacture Engineering Check List/Log bok number:'); ?>&nbsp;<span><?php echo "0018"; ?></span></td>
            </tr>
        </table>
        </tr>
        <tr>
        <table class="jcard-innerTable">

            <tr>
                <th><?php echo __('Validation status:'); ?></th>
                <th><?php echo __('Confirm (YES)'); ?></th>
                <th><?php echo __('Not confirm (NO)'); ?></th>
                <th><?php echo __('N/A'); ?></th>
            </tr>
            <tr>
                <td><?php echo __('Material bland delivered'); ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
        </tr>
    </table>






</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Jobcard'), array('action' => 'edit', $jobcard['Jobcard']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Jobcard'), array('action' => 'delete', $jobcard['Jobcard']['id']), null, __('Are you sure you want to delete # %s?', $jobcard['Jobcard']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Jobcards'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Jobcard'), array('action' => 'add')); ?> </li>
    </ul>
</div>
