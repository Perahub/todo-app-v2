<?php
	echo $this->Form->create('User');
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->submit();
	echo $this->Form->end();
?>