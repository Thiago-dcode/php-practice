<li>
    <a href=<?= "/note?id={$note['id']}" ?>>
        <?= $note['body'] ?>
    </a>
    <h2>Author:</h2>
    <?php foreach ($users as $user) : ?>

        <?php if ($user['id'] === $note['user_id']) : ?>
            <h4><?= $user['name'] ?></h4>
        <?php endif; ?>
    <?php endforeach; ?>
</li>