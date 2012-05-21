<?php
    $cakeDescription = __d('cake_dev', 'TADS pdm');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css(
                        array(
                            'pdm-lt',
                            'pdm-tray',
                            'pdm-item',
                            'pdm-jcard',
                            'cake.generic.css',
                            'tipsy/tipsy'
//                            'pdm-tray',
//                            'screen',
//                            'print'
                            ));

                
                echo $this->Html->script(array(
                    'jq/jquery-1.7.1.min',
                    'plug/jquery.tipsy',
                    'plug/jquery.simplyCountable',
                    //'dev/pdm-items',
                    //'dev/pdm-tray'
                ));
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="container">
		<div id="header">
                    <div class="actions">
                        <div style="float: left;width: 500px;">
                            <div style="float: left">
                            <?php echo $this->Html->link( __('Home'),'/', array('class'=>'lt-headerLink')); ?>
                            </div>
                            <?php if($this->Session->read('Auth.User.User.name')):?>
                            <div style="float: left;margin-left: 10px">                                  
                               <?php                                     
                                 echo $this->Html->link( __('Logout'),array('controller'=>'users','action'=>'logout'), array('class'=>'lt-headerLink'));                                   
                               ?>                               
                            </div>
                            <div style="float: left;margin-left: 10px;">
                                <?php echo $this->Session->read('Auth.User.User.name');?>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> $cakeDescription, 'border' => '0')),
					'/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>