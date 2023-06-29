<li class="border-2 bg-gray-500 text-slate-300 p-4">
    <a class="text-blue-400 hover:underline" href=<?= "/note?id={$note['id']}" ?>>
        <?= htmlspecialchars($note['body'])  ?>
    </a>
    <div class="flex gap-1 ">
        <h2>Author:</h2>
        <?php foreach ($users as $user) : ?>

            <?php if ($user['id'] === $note['user_id']) : ?>
                <h4><?= htmlspecialchars($user['name'])  ?></h4>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</li>