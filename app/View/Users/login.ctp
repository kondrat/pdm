<div class="parts index">
    <div>
        <?php echo $this->Session->flash('auth'); ?>
        <h2>My day</h2>
        <?php echo $this->Form->create('User');?>
        <?php echo $this->Form->input('name');?>
        <?php echo $this->Form->input('password');?>
        <?php echo $this->Form->end(__('Login'));?>
    </div>
</div>
