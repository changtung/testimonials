<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Testimonial'), ['action' => 'edit', $testimonial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Testimonial'), ['action' => 'delete', $testimonial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testimonial->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Testimonials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Testimonial'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Businesses'), ['controller' => 'Businesses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business'), ['controller' => 'Businesses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="testimonials view large-9 medium-8 columns content">
    <h3><?= h($testimonial->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Client Name') ?></th>
            <td><?= h($testimonial->client_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Email') ?></th>
            <td><?= h($testimonial->client_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Hash') ?></th>
            <td><?= h($testimonial->hash) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($testimonial->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Business') ?></th>
            <td><?= $testimonial->has('business') ? $this->Html->link($testimonial->business->name, ['controller' => 'Businesses', 'action' => 'view', $testimonial->business->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($testimonial->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= $this->Number->format($testimonial->rating) ?></td>
        </tr>
    </table>
</div>
