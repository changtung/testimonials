<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business'), ['action' => 'edit', $business->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business'), ['action' => 'delete', $business->id], ['confirm' => __('Are you sure you want to delete # {0}?', $business->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Testimonials'), ['controller' => 'Testimonials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Testimonial'), ['controller' => 'Testimonials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businesses view large-9 medium-8 columns content">
    <h3><?= h($business->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($business->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($business->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($business->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Testimonials') ?></h4>
        <?php if (!empty($business->testimonials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Name') ?></th>
                <th><?= __('Client Email') ?></th>
                <th><?= __('Hash') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Business Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($business->testimonials as $testimonials): ?>
            <tr>
                <td><?= h($testimonials->id) ?></td>
                <td><?= h($testimonials->client_name) ?></td>
                <td><?= h($testimonials->client_email) ?></td>
                <td><?= h($testimonials->hash) ?></td>
                <td><?= h($testimonials->rating) ?></td>
                <td><?= h($testimonials->description) ?></td>
                <td><?= h($testimonials->business_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Testimonials', 'action' => 'view', $testimonials->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Testimonials', 'action' => 'edit', $testimonials->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Testimonials', 'action' => 'delete', $testimonials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonials->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
