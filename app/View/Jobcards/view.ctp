<div class="Jobcards view">
    <h2><?php echo __('Job card'); ?></h2>

    <div class="jcard-wrapper">
        <div class="jcard-block-1"> 
        <div class="jcard-line">
            <div class="jcard-field-2"><b><?php echo __('ID Number:'); ?></b>&nbsp;<span><?php echo h($jobcard['Jobcard']['id']); ?></div>
            <div class="jcard-field-2 jcard-lastField"><b><?php echo __('TASK Number:'); ?></b>&nbsp;<span><?php echo h($jobcard['Jobcard']['id']); ?></span></div>
        </div>
        
        <div class="jcard-line">
            <div class="jcard-field-2"><b><?php echo __('Originator:'); ?></b>&nbsp;<span><?php echo "Originator Name"; ?></div>
            <div class="jcard-field-2 jcard-lastField"><b><?php echo __('Start date:'); ?></b>&nbsp;<span><?php echo h($jobcard['Jobcard']['created']); ?></span></div>
        </div>

        <div class="jcard-line">
            <div class="jcard-field-2"><b><?php echo __('Assigned to:'); ?></b>&nbsp;<span><?php echo "Worker name"; ?></div>
            <div class="jcard-field-2 jcard-lastField"><b><?php echo __('Target date:'); ?></b>&nbsp;<span><?php echo "Date"; ?></span></div>
        </div>

        <div class="jcard-line">
            <div class="jcard-field-2"><?php echo __('Part number/Kit number:'); ?>&nbsp;<span><?php echo "A000 0 0000 200"; ?></div>
            <div class="jcard-field-2 jcard-lastField"><?php echo __('Quantity:'); ?>&nbsp;<span><?php echo "100"; ?></span></div>
        </div>
        
        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Revision:'); ?>&nbsp;<span><?php echo "A00"; ?></div>
        </div>
        
        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Description:'); ?>&nbsp;<span><?php echo "Description"; ?></div>
        </div>
        
        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Part serial number:'); ?>&nbsp;<span><?php echo "00100"; ?></div>
        </div>   

        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Machine name & number:'); ?>&nbsp;<span><?php echo "Saublin"; ?></div>
        </div>
        
        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Reference on CNC program:'); ?>&nbsp;<span><?php echo "A00"; ?></div>
        </div>

        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Operation type:'); ?>&nbsp;<span><?php echo "Type"; ?></div>
        </div> 
        
        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Material type:'); ?>&nbsp;<span><?php echo "Al 7075"; ?></div>
        </div>

        <div class="jcard-line">
            <div class="jcard-field-1 jcard-lastField"><?php echo __('Manufacture Engineering Check List/Log bok number:'); ?>&nbsp;<span><?php echo "0018"; ?></div>
        </div>
        </div>
        <div class="jcard-block-2">
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Validation status:'); ?></div>
                <div class="jcard-field-4"><?php echo __('Confirm (YES)'); ?></div>
                <div class="jcard-field-4"><?php echo __('Confirm (NO)'); ?></div>
                <div class="jcard-field-4 jcard-lastField"><?php echo __('N/A'); ?></div>
            </div>
        </div>
        <div class="jcard-block-3">
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Material blank delivered'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Tool/Jig delivered'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Parts/Components delivered'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>            
        </div>
        <div class="jcard-block-4">
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('CNC Program Validation by Manufacture Engineering'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Documents Review(Drawings,Specifications,Check Lists)'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div> 
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Target Date'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Tooling & Jig in right condition'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Processing according Drawing and specification'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Dimensional check during /after production'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Incident on production'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Damage/wear of tool'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Scraped Material'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
        </div>
        <div class="jcard-block-5">
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Specification Compliance after production'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Identification marking/Traceability'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Functional test'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Part validation (after production check)'); ?></div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4">.</div>
                <div class="jcard-field-4 jcard-lastField">.</div>                
            </div>
        </div>
        <div class="jcard-block-2">
            <div class="jcard-line">
                <div class="jcard-field-1 jcard-remarks jcard-lastField"><?php echo __('Remarks'); ?></div>
            </div>
        </div>
        <div class="jcard-block-2">
            <div class="jcard-line">
                <div class="jcard-field-3"><?php echo __('Responsible person:'); ?></div>
                <div class="jcard-field-4">NAME:</div>
                <div class="jcard-field-4">SIGNATURE</div>
                <div class="jcard-field-4 jcard-lastField">DATE:</div>                
            </div>
        </div>
    </div>
    


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
