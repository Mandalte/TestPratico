<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inboxs'), ['controller' => 'Inboxs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inbox'), ['controller' => 'Inboxs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Inboxs') ?></h4>
        <?php if (!empty($user->inboxs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Mensage') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->inboxs as $inboxs): ?>
            <tr>
                <td><?= h($inboxs->id) ?></td>
                <td><?= h($inboxs->user_id) ?></td>
                <td><?= h($inboxs->email) ?></td>
                <td><?= h($inboxs->title) ?></td>
                <td><?= h($inboxs->mensage) ?></td>
                <td><?= h($inboxs->created) ?></td>
                <td><?= h($inboxs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Inboxs', 'action' => 'view', $inboxs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inboxs', 'action' => 'edit', $inboxs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inboxs', 'action' => 'delete', $inboxs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inboxs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
