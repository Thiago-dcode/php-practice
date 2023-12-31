<!-- HEAD -->

<?php require basePath('views/partials/headSection.php') ?>

<!-- NAV BAR -->

<?php require basePath('views/partials/nav.php') ?>

<!-- Header  -->

<?php require basePath('views/partials/header.php') ?>

<main>
  <div class="flex flex-col justify-center gap-4 items-center mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <h1>Hello from Notes page</h1>
    <ul class="flex gap-2 justify-center items-center flex-wrap ">
      <?php foreach ($notes as $note) : ?>
        <?php component('noteCard',[
          'note' => $note,
          'users' => $users
        ]) ?>
      <?php endforeach; ?>
    </ul>
    <a class="text-white border border-transparent active:shadow-none shadow-md rounded-md shadow-black p-2 bg-blue-500" href="/notes/create">Create a new note</a>
  </div>
</main>
<!-- FOOTER -->

<?php require basePath('views/partials/footer.php') ?>