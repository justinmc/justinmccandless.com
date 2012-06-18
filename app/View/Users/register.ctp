<h2>Register a New Administrator Account</h2>
<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
echo $this->Form->input('username', array('label' => '用户名 / Username'));
echo $this->Form->input('password', array('label' => '密码 / Password'));
echo $this->Form->input('password_confirm', array('label' => '再次输入密码 Confirm Password', 'type' => 'password'));
echo $this->Form->end('注册 Create');
?>
