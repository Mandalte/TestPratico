<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inbox'), ['action' => 'edit', $inbox->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inbox'), ['action' => 'delete', $inbox->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inbox->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inboxs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inbox'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inboxs view large-9 medium-8 columns content">
    <h3><?= h($inbox->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $inbox->has('user') ? $this->Html->link($inbox->user->id, ['controller' => 'Users', 'action' => 'view', $inbox->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($inbox->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($inbox->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($inbox->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($inbox->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($inbox->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Mensage') ?></h4>
        <?= $this->Text->autoParagraph(h($inbox->mensage)); ?>
    </div>
</div>
