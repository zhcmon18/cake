<h1>
    Bookings tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
    <?php foreach ($bookings as $booking): ?>
        <article>
            <!-- Use the HtmlHelper to create a link -->
            <h4><?=
                $this->Html->link(
                        $booking->client_id, ['controller' => 'Bookings', 'action' => 'view', $booking->id]
                )
                ?></h4>
            <span><?= h($booking->created) ?>
        </article>
<?php endforeach; ?>
</section>
