<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hosts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matchteams'), ['controller' => 'Matchteams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Matchteam'), ['controller' => 'Matchteams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hosts form large-9 medium-8 columns content">
    <?= $this->Form->create($host) ?>
    <fieldset>
        <legend><?= __('Add Host') ?></legend>
        <?php
            echo $this->Form->input('matchteam_id', ['options' => $matchteams, 'empty' => true]);
            echo $this->Form->input('primary_squad');
            echo $this->Form->input('name');
            echo $this->Form->input('yellow');
            echo $this->Form->input('red');
            echo $this->Form->input('substitution');
            echo $this->Form->input('goals');
            echo $this->Form->input('rating');
            echo $this->Form->input('assist');
            echo $this->Form->input('injuries');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
