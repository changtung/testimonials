<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Matchteams'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Guests'), ['controller' => 'Guests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Guest'), ['controller' => 'Guests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hosts'), ['controller' => 'Hosts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Host'), ['controller' => 'Hosts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matchteams form large-9 medium-8 columns content">
    <?= $this->Form->create($matchteam) ?>
    <fieldset>
        <legend><?= __('Add Matchteam') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('clubname');
            echo $this->Form->input('matchdate');
            echo $this->Form->input('formation');
            echo $this->Form->input('goals');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
