<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inbox'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inboxs index large-9 medium-8 columns content">
    <h3><?= __('Inboxs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inboxs as $inbox): ?>
                <?php if($inbox->email==$usuario_corrente['email']): ?>
                    <tr>
                        <td><?= $inbox->has('user') ? $this->Html->link($inbox->user->id, ['controller' => 'Users', 'action' => 'view', $inbox->user->id]) : '' ?></td>
                        <td><?= h($inbox->title) ?></td>
                        <td><?= h($inbox->created) ?></td>
                        <td><?= h($inbox->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $inbox->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inbox->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inbox->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inbox->id)]) ?>
                        </td>
                    </tr>
                <?php endif ?>
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
