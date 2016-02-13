<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Guest'), ['action' => 'edit', $guest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Guest'), ['action' => 'delete', $guest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Guests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Guest'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matchteams'), ['controller' => 'Matchteams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchteam'), ['controller' => 'Matchteams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hosts'), ['controller' => 'Hosts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Host'), ['controller' => 'Hosts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="guests view large-9 medium-8 columns content">
    <h3><?= h($guest->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Matchteam') ?></th>
            <td><?= $guest->has('matchteam') ? $this->Html->link($guest->matchteam->name, ['controller' => 'Matchteams', 'action' => 'view', $guest->matchteam->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($guest->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Yellow') ?></th>
            <td><?= h($guest->yellow) ?></td>
        </tr>
        <tr>
            <th><?= __('Red') ?></th>
            <td><?= h($guest->red) ?></td>
        </tr>
        <tr>
            <th><?= __('Substitution') ?></th>
            <td><?= h($guest->substitution) ?></td>
        </tr>
        <tr>
            <th><?= __('Goals') ?></th>
            <td><?= h($guest->goals) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= h($guest->rating) ?></td>
        </tr>
        <tr>
            <th><?= __('Assist') ?></th>
            <td><?= h($guest->assist) ?></td>
        </tr>
        <tr>
            <th><?= __('Injuries') ?></th>
            <td><?= h($guest->injuries) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($guest->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Squad') ?></th>
            <td><?= $guest->primary_squad ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Hosts') ?></h4>
        <?php if (!empty($guest->hosts)): ?>
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
            <?php foreach ($guest->hosts as $hosts): ?>
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
