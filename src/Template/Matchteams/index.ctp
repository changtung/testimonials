<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Matchteam'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Guests'), ['controller' => 'Guests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Guest'), ['controller' => 'Guests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hosts'), ['controller' => 'Hosts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Host'), ['controller' => 'Hosts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matchteams index large-9 medium-8 columns content">
    <h3><?= __('Matchteams') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('clubname') ?></th>
                <th><?= $this->Paginator->sort('matchdate') ?></th>
                <th><?= $this->Paginator->sort('formation') ?></th>
                <th><?= $this->Paginator->sort('goals') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matchteams as $matchteam): ?>
            <tr>
                <td><?= $this->Number->format($matchteam->id) ?></td>
                <td><?= h($matchteam->name) ?></td>
                <td><?= h($matchteam->clubname) ?></td>
                <td><?= h($matchteam->matchdate) ?></td>
                <td><?= h($matchteam->formation) ?></td>
                <td><?= h($matchteam->goals) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $matchteam->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $matchteam->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $matchteam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchteam->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
