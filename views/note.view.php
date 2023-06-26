<!-- HEAD -->

<?php require('partials/headSection.php') ?>

<!-- NAV BAR -->

<?php require('partials/nav.php') ?>

<!-- Header  -->

<?php require('partials/header.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a class="text-blue-500 hover:underline" href="/notes">Go Back...</a>
    <h1><?= $note['body'] ?></h1>
  </div>
</main>
<!-- FOOTER -->

<?php require('partials/footer.php') ?>