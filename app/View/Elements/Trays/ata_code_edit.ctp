<div class="tray-noClass">
    <p style="margin: 0;padding: 0;"><?php echo __('ATA code:'); ?></p>
</div>
<div class="tray-noClass"><?php echo $this->Form->error('ata_code');?></div>

<div><?php echo '<span class="tray-prjCode">X</span> '. $this->request->data['Tray']['ata_cache'].' '.' XXXXX - '.$this->request->data['ItemType']['suffix'];?> </div>