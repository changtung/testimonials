<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logoes'), ['controller' => 'Logoes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logo'), ['controller' => 'Logoes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teams view large-9 medium-8 columns content">
    <h3><?= h($team->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($team->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Clubname') ?></th>
            <td><?= h($team->clubname) ?></td>
        </tr>
        <tr>
            <th><?= __('Formation') ?></th>
            <td><?= h($team->formation) ?></td>
        </tr>
        <tr>
            <th><?= __('Goals') ?></th>
            <td><?= h($team->goals) ?></td>
        </tr>
        <tr>
            <th><?= __('Logo') ?></th>
            <td><?= $team->has('logo') ? $this->Html->link($team->logo->name, ['controller' => 'Logoes', 'action' => 'view', $team->logo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($team->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Host') ?></th>
            <td><?= $team->host ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Players') ?></h4>
        <?php if (!empty($team->players)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Team Id') ?></th>
                <th><?= __('Match Id') ?></th>
                <th><?= __('Primary Squad') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Squad Number') ?></th>
                <th><?= __('Yellow') ?></th>
                <th><?= __('Red') ?></th>
                <th><?= __('Substitution') ?></th>
                <th><?= __('Goals') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Assist') ?></th>
                <th><?= __('Penalty Failed') ?></th>
                <th><?= __('Penalty Keeped') ?></th>
                <th><?= __('Injuries') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($team->players as $players): ?>
            <tr>
                <td><?= h($players->id) ?></td>
                <td><?= h($players->team_id) ?></td>
                <td><?= h($players->match_id) ?></td>
                <td><?= h($players->primary_squad) ?></td>
                <td><?= h($players->name) ?></td>
                <td><?= h($players->squad_number) ?></td>
                <td><?= h($players->yellow) ?></td>
                <td><?= h($players->red) ?></td>
                <td><?= h($players->substitution) ?></td>
                <td><?= h($players->goals) ?></td>
                <td><?= h($players->rating) ?></td>
                <td><?= h($players->assist) ?></td>
                <td><?= h($players->penalty_failed) ?></td>
                <td><?= h($players->penalty_keeped) ?></td>
                <td><?= h($players->injuries) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Players', 'action' => 'view', $players->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Players', 'action' => 'edit', $players->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Players', 'action' => 'delete', $players->id], ['confirm' => __('Are you sure you want to delete # {0}?', $players->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
