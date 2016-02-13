<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="players index large-9 medium-8 columns content">
    <h3><?= __('Players') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('yellow');?></th>
                <th><?= $this->Paginator->sort('red');?></th>
                <th><?= $this->Paginator->sort('substitution');?></th>
                <th><?= $this->Paginator->sort('goals');?></th>
                <th><?= $this->Paginator->sort('rating');?></th>
                <th><?= $this->Paginator->sort('assist');?></th>
                <th><?= $this->Paginator->sort('penalty_failed');?></th>
                <th><?= $this->Paginator->sort('penalty_keeped');?></th>
                <th><?= $this->Paginator->sort('injuries');?></th>
                <th class="actions"><?= __('Save') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players_primary as $player): ?>
            <tr>
                <td>
                    <?= $this->Form->create($player, ['url' => ['action' => 'save',$player->id,$player->team_id]]) ?>
                </td>
                    <td style="background-color:green"><?php echo $player->squad_number.' '.$player->name; ?></td>
                    <td><?php echo $this->Form->input('yellow');?></td>
                    <td><?php echo $this->Form->input('red');?></td>
                    <td><?php echo $this->Form->input('substitution');?></td>
                    <td><?php echo $this->Form->input('goals');?></td>
                    <td><?php echo $this->Form->input('rating');?></td>
                    <td><?php echo $this->Form->input('assist');?></td>
                    <td><?php echo $this->Form->input('penalty_failed');?></td>
                    <td><?php echo $this->Form->input('penalty_keeped');?></td>
                    <td><?php echo $this->Form->input('injuries');?></td>

                <td>             <?= $this->Form->button(__('Save')) ?>
                            <?= $this->Form->end() ?></td>
            </tr>

            <?php endforeach; ?>
            <?php foreach ($players_secondary as $player): ?>
            <tr>
                <td>
                    <?= $this->Form->create($player, ['url' => ['action' => 'save',$player->id,$player->team_id]]) ?>
                </td>
                    <td style="background-color:yellow"><?php echo $player->squad_number.' '.$player->name; ?></td>
                    <td><?php echo $this->Form->input('yellow');?></td>
                    <td><?php echo $this->Form->input('red');?></td>
                    <td><?php echo $this->Form->input('substitution');?></td>
                    <td><?php echo $this->Form->input('goals');?></td>
                    <td><?php echo $this->Form->input('rating');?></td>
                    <td><?php echo $this->Form->input('assist');?></td>
                    <td><?php echo $this->Form->input('penalty_failed');?></td>
                    <td><?php echo $this->Form->input('penalty_keeped');?></td>
                    <td><?php echo $this->Form->input('injuries');?></td>

                <td>             <?= $this->Form->button(__('Save')) ?>
                            <?= $this->Form->end() ?></td>
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
