<!-- HEAD -->

<?php require('partials/headSection.php') ?>

<!-- NAV BAR -->

<?php require('partials/nav.php') ?>

<!-- Header  -->

<?php require('partials/header.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="post" class="flex flex-col justify-center items-center gap-3" action="/notes">
            <div class="flex flex-col gap-2"> <label for="note">Note:</label>
                <textarea cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 blockp-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  id="note" name="note"><?= $_POST['note']?? '' ?></textarea>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-mono py-1 px-2 rounded">
                    Create!
                </button>
        </form>
        <div>
            <?php if (isset($error)) : ?>
                <?php foreach ($error as $err) : ?>
                    <p><?= $err ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
<!-- FOOTER -->

<?php require('partials/footer.php') ?>