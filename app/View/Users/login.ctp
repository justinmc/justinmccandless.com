<h2>Administrator Login</h2>
<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => '用户名 / Username'));
echo $this->Form->input('password', array('label' => '密码 / password'));
echo $this->Form->end('进入 Login');
?>
