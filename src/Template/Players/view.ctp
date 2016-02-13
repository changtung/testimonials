<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player'), ['action' => 'edit', $player->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="players view large-9 medium-8 columns content">
    <h3><?= h($player->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $player->has('team') ? $this->Html->link($player->team->name, ['controller' => 'Teams', 'action' => 'view', $player->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Match') ?></th>
            <td><?= $player->has('match') ? $this->Html->link($player->match->name, ['controller' => 'Matches', 'action' => 'view', $player->match->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($player->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Squad Number') ?></th>
            <td><?= h($player->squad_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Yellow') ?></th>
            <td><?= h($player->yellow) ?></td>
        </tr>
        <tr>
            <th><?= __('Red') ?></th>
            <td><?= h($player->red) ?></td>
        </tr>
        <tr>
            <th><?= __('Substitution') ?></th>
            <td><?= h($player->substitution) ?></td>
        </tr>
        <tr>
            <th><?= __('Goals') ?></th>
            <td><?= h($player->goals) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= h($player->rating) ?></td>
        </tr>
        <tr>
            <th><?= __('Assist') ?></th>
            <td><?= h($player->assist) ?></td>
        </tr>
        <tr>
            <th><?= __('Penalty Failed') ?></th>
            <td><?= h($player->penalty_failed) ?></td>
        </tr>
        <tr>
            <th><?= __('Penalty Keeped') ?></th>
            <td><?= h($player->penalty_keeped) ?></td>
        </tr>
        <tr>
            <th><?= __('Injuries') ?></th>
            <td><?= h($player->injuries) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($player->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Squad') ?></th>
            <td><?= $player->primary_squad ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
