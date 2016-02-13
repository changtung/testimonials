<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Testimonial'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testimonials index large-9 medium-8 columns content">
    <h3><?= __('Testimonials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('client_name') ?></th>
                <th><?= $this->Paginator->sort('client_email') ?></th>
                <th><?= $this->Paginator->sort('hash') ?></th>
                <th><?= $this->Paginator->sort('rating') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('business_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testimonials as $testimonial): ?>
            <tr>
                <td><?= $this->Number->format($testimonial->id) ?></td>
                <td><?= h($testimonial->client_name) ?></td>
                <td><?= h($testimonial->client_email) ?></td>
                <td><?= h($testimonial->hash) ?></td>
                <td><?= $this->Number->format($testimonial->rating) ?></td>
                <td><?= h($testimonial->description) ?></td>
                <td><?= $testimonial->has('business') ? $this->Html->link($testimonial->business->name, ['controller' => 'Businesses', 'action' => 'view', $testimonial->business->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $testimonial->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testimonial->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testimonial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonial->id)]) ?>
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
