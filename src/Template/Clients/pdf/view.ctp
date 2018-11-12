<div class="clients view large-9 medium-8 columns content">
    <h3><?= __('Client') ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($client->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($client->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($client->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subscription') ?></th>
            <td><?= h($client->promotion->subscription->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= h($client->promotion->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($client->active ? __('Yes') : __('No')); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($client->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bookings') ?></h4>
        <?php if (!empty($client->bookings)): ?>
            <table cellpadding="5" cellspacing="5">
                <tr>
                    <th scope="col"><?= __('Created by') ?></th>
                    <th scope="col"><?= __('Car') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                </tr>
                <?php foreach ($client->bookings as $bookings): ?>
                    <tr>
                        <td><?= h($bookings['user']->email) ?></td>
                        <td><?= h($bookings['car']->model) . ' ' . h($bookings['car']->license) ?></td>
                        <td><?= h($bookings->created) ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
</div>