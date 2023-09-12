<?php require base_path('view/partial/header.php') ?>

<div class="min-h-full">

    <?php require base_path("view/partial/nav.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note): ?>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <li>
                            <?= htmlspecialchars($note['body']) ?>
                        </li>
                    </a>
                <?php endforeach ?>
            </ul>
            <p class="mt-6">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>
        </div>
    </main>
</div>
<?php require base_path('view/partial/footer.php') ?>