<!-- HEAD -->

<?php require('partials/headSection.php') ?>
<!-- nav bar -->

<?php require('partials/nav.php') ?>

<!-- Header  -->

<?php require('partials/header.php') ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h1>Hello from Notes page</h1>
    <ul>
      <?php foreach ($notes as $note) : ?>
        <?php require('partials/noteCard.php') ?>
      <?php endforeach; ?>
    </ul>
    <a href="/create-note">Create a new note</a>
  </div>
</main>
<!-- FOOTER -->

<?php require('partials/footer.php') ?>