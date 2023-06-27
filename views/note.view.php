<!-- HEAD -->

<?php require('partials/headSection.php') ?>

<!-- NAV BAR -->

<?php require('partials/nav.php') ?>

<!-- Header  -->

<?php require('partials/header.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <a class="text-blue-500 hover:underline" href="/notes">Go Back...</a>
    <div class="flex mt-2  items-center text-center">
      <h1 class="border  p-2  bg-blue-500"><?= $note['body'] ?></h1>
      <form class="flex border  p-2 bg-red-400 items-center" method="post" action="/notes">
        <input type="hidden" name="_method" value="delete">

        <input type="hidden" name="id" value=<?= $note['id']?>>

        <button >x</button>
        
       
    </div>
    </form>
  </div>
</main>
<!-- FOOTER -->

<?php require('partials/footer.php') ?>