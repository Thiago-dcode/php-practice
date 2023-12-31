<!-- HEAD -->

<?php require basePath('views/partials/headSection.php') ?>

<!-- NAV BAR -->

<?php require basePath('views/partials/nav.php') ?>

<!-- Header  -->

<?php require basePath('views/partials/header.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a class="text-blue-500 hover:underline" href="/notes">Go Back...</a>
    <div class="flex mt-2  items-center text-center">
      <h1 class="border  p-2  bg-blue-500"><?= htmlspecialchars($note['body']) ?></h1>
      <h1>Author:<span><?= htmlspecialchars($user['name']) ?></span></h1>
      <a class="flex border  p-2 bg-green-400 items-center" href=<?= "/notes/edit?id={$note['id']}" ?>>Edit</a>
      <form class="flex border  p-2 bg-red-400 items-center" method="post" action="/notes">
        <input type="hidden" name="_method" value="delete">

        <input type="hidden" name="id" value=<?= $note['id'] ?>>

        <button>x</button>


    </div>
    </form>
  </div>
</main>
<!-- FOOTER -->

<?php require basePath('views/partials/footer.php') ?>