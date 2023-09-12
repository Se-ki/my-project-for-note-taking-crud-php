<?php require base_path('view/partial/header.php') ?>

<div class="min-h-full">

    <?php require base_path("view/partial/nav.php") ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-6"><a href="/notes" class="text-blue-500 underline">Go back...</a></p>
            <p>
                <?= htmlspecialchars($note['body']) ?>
            </p>

            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>"
                    class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
            </footer>

            <!-- <form action="" method="POST" class="mt-6">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" id="" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form> -->
        </div>
    </main>
</div>
<?php require base_path('view/partial/footer.php') ?>