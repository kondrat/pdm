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
                            'cake.generic.css',
                            'tipsy/tipsy'
//                            'pdm-tray',
//                            'screen',
//                            'print'
                            ));

                
                echo $this->Html->script(array(
                    'jq/jquery-1.7.1.min',
                    'dev/pdm-items',
                    'dev/pdm-tray',
                    'plug/jquery.tipsy',
                    'plug/jquery.simplyCountable'
                ));
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="container">
		<div id="header">
                    <div class="actions">
                        <ul>
                            <li>
                            <?php echo $this->Html->link( __('Home'),'/', array('class'=>'lt-headerLink')); ?>
                            </li>
                        </ul>
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