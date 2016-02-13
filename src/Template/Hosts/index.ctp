<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Host'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matchteams'), ['controller' => 'Matchteams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Matchteam'), ['controller' => 'Matchteams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hosts index large-9 medium-8 columns content">
    <h3><?= __('Hosts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('matchteam_id') ?></th>
                <th><?= $this->Paginator->sort('primary_squad') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('yellow') ?></th>
                <th><?= $this->Paginator->sort('red') ?></th>
                <th><?= $this->Paginator->sort('substitution') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hosts as $host): ?>
            <tr>
                <td><?= $this->Number->format($host->id) ?></td>
                <td><?= $host->has('matchteam') ? $this->Html->link($host->matchteam->name, ['controller' => 'Matchteams', 'action' => 'view', $host->matchteam->id]) : '' ?></td>
                <td><?= h($host->primary_squad) ?></td>
                <td><?= h($host->name) ?></td>
                <td><?= h($host->yellow) ?></td>
                <td><?= h($host->red) ?></td>
                <td><?= h($host->substitution) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $host->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $host->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $host->id], ['confirm' => __('Are you sure you want to delete # {0}?', $host->id)]) ?>
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
