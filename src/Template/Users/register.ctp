<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
<form action = "/users/register" method = "post">
    <fieldset>
        <legend>Register</legend>
        <div class="input text"><label for="username">Username</label><input type="text" name="username" id="username"/></div><div class="input email"><label for="email">Email</label><input type="email" name="email" id="email"/></div><div class="input password"><label for="password">Password</label><input type="password" name="password" id="password"/></div>    </fieldset>
    <button type="submit">Submit</button>    </form></div>

    </div>
