<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $player->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="players form large-9 medium-8 columns content">
    <?= $this->Form->create($player) ?>
    <fieldset>
        <legend><?= __('Edit Player') ?></legend>
        <?php
            echo $this->Form->input('team_id', ['options' => $teams, 'empty' => true]);
            echo $this->Form->input('match_id', ['options' => $matches, 'empty' => true]);
            echo $this->Form->input('primary_squad');
            echo $this->Form->input('name');
            echo $this->Form->input('squad_number');
            echo $this->Form->input('yellow');
            echo $this->Form->input('red');
            echo $this->Form->input('substitution');
            echo $this->Form->input('goals');
            echo $this->Form->input('rating');
            echo $this->Form->input('assist');
            echo $this->Form->input('penalty_failed');
            echo $this->Form->input('penalty_keeped');
            echo $this->Form->input('injuries');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
