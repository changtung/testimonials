<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Businesses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Testimonials'), ['controller' => 'Testimonials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Testimonial'), ['controller' => 'Testimonials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businesses form large-9 medium-8 columns content">
    <?= $this->Form->create($business) ?>
    <fieldset>
        <legend><?= __('Add Business') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
