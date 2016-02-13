<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Matchteam'), ['action' => 'edit', $matchteam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Matchteam'), ['action' => 'delete', $matchteam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchteam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matchteams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchteam'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Guests'), ['controller' => 'Guests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Guest'), ['controller' => 'Guests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hosts'), ['controller' => 'Hosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Host'), ['controller' => 'Hosts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matchteams view large-9 medium-8 columns content">
    <h3><?= h($matchteam->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($matchteam->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Clubname') ?></th>
            <td><?= h($matchteam->clubname) ?></td>
        </tr>
        <tr>
            <th><?= __('Formation') ?></th>
            <td><?= h($matchteam->formation) ?></td>
        </tr>
        <tr>
            <th><?= __('Goals') ?></th>
            <td><?= h($matchteam->goals) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($matchteam->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Matchdate') ?></th>
            <td><?= h($matchteam->matchdate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Guests') ?></h4>
        <?php if (!empty($matchteam->guests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Matchteam Id') ?></th>
                <th><?= __('Primary Squad') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Yellow') ?></th>
                <th><?= __('Red') ?></th>
                <th><?= __('Substitution') ?></th>
                <th><?= __('Goals') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Assist') ?></th>
                <th><?= __('Injuries') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($matchteam->guests as $guests): ?>
            <tr>
                <td><?= h($guests->id) ?></td>
                <td><?= h($guests->matchteam_id) ?></td>
                <td><?= h($guests->primary_squad) ?></td>
                <td><?= h($guests->name) ?></td>
                <td><?= h($guests->yellow) ?></td>
                <td><?= h($guests->red) ?></td>
                <td><?= h($guests->substitution) ?></td>
                <td><?= h($guests->goals) ?></td>
                <td><?= h($guests->rating) ?></td>
                <td><?= h($guests->assist) ?></td>
                <td><?= h($guests->injuries) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Guests', 'action' => 'view', $guests->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Guests', 'action' => 'edit', $guests->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Guests', 'action' => 'delete', $guests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guests->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Hosts') ?></h4>
        <?php if (!empty($matchteam->hosts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Matchteam Id') ?></th>
                <th><?= __('Primary Squad') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Yellow') ?></th>
                <th><?= __('Red') ?></th>
                <th><?= __('Substitution') ?></th>
                <th><?= __('Goals') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Assist') ?></th>
                <th><?= __('Injuries') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($matchteam->hosts as $hosts): ?>
            <tr>
                <td><?= h($hosts->id) ?></td>
                <td><?= h($hosts->matchteam_id) ?></td>
                <td><?= h($hosts->primary_squad) ?></td>
                <td><?= h($hosts->name) ?></td>
                <td><?= h($hosts->yellow) ?></td>
                <td><?= h($hosts->red) ?></td>
                <td><?= h($hosts->substitution) ?></td>
                <td><?= h($hosts->goals) ?></td>
                <td><?= h($hosts->rating) ?></td>
                <td><?= h($hosts->assist) ?></td>
                <td><?= h($hosts->injuries) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Hosts', 'action' => 'view', $hosts->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Hosts', 'action' => 'edit', $hosts->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hosts', 'action' => 'delete', $hosts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hosts->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
