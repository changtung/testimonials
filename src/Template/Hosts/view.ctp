<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Host'), ['action' => 'edit', $host->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Host'), ['action' => 'delete', $host->id], ['confirm' => __('Are you sure you want to delete # {0}?', $host->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hosts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Host'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matchteams'), ['controller' => 'Matchteams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchteam'), ['controller' => 'Matchteams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hosts view large-9 medium-8 columns content">
    <h3><?= h($host->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Matchteam') ?></th>
            <td><?= $host->has('matchteam') ? $this->Html->link($host->matchteam->name, ['controller' => 'Matchteams', 'action' => 'view', $host->matchteam->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($host->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Yellow') ?></th>
            <td><?= h($host->yellow) ?></td>
        </tr>
        <tr>
            <th><?= __('Red') ?></th>
            <td><?= h($host->red) ?></td>
        </tr>
        <tr>
            <th><?= __('Substitution') ?></th>
            <td><?= h($host->substitution) ?></td>
        </tr>
        <tr>
            <th><?= __('Goals') ?></th>
            <td><?= h($host->goals) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= h($host->rating) ?></td>
        </tr>
        <tr>
            <th><?= __('Assist') ?></th>
            <td><?= h($host->assist) ?></td>
        </tr>
        <tr>
            <th><?= __('Injuries') ?></th>
            <td><?= h($host->injuries) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($host->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Squad') ?></th>
            <td><?= $host->primary_squad ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
