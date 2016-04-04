<?php if (!defined('APPLICATION')) exit();
/*	Copyright 2014-2016 Zachary Doll*/
?>
<div class="Header"><?php
		echo Wrap(T($this->data('Title')), 'h3');
		echo Wrap(T($this->data('PluginDescription')), 'div', array('class' => 'Info'));
	?>
</div>
<div class="Content"><?php
    /* dynamic content here */
    ?>
<div class="Footer">
    <?php
    echo Wrap(T('Feedback'), 'h3');
    ?>
    <div class="Aside Box">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="CNW2NMHK657JC">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	</div>
	<?php
	echo Wrap('Find this plugin helpful? Want to support a freelance developer?<br/>Click the donate button to buy me a beer. :D', 'div', array('class' => 'Info')); 
	echo Wrap('Confused by something? Check out the feedback thread on the official <a href="http://vanillaforums.org/discussions" target="_blank">Vanilla forums</a>.', 'div', array('class' => 'Info'));
?>
</div>
<?php

