<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Squad'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Squads'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="matches view large-9 medium-8 columns content">
    <h3><?= h($match->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($match->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($match->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Matchdate') ?></th>
            <td><?= h($match->matchdate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Players') ?></h4>
        <?php if (!empty($match->players)): ?>
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
                <th><?= __('Injuries') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($match->players as $players): ?>
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
